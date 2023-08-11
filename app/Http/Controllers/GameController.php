<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class GameController extends BaseController
{

    public function play(\Illuminate\Http\Request $request)
    {
        /** @var \App\BattleShip\Storage\StorageInterface $storage **/
        $storage = \App\BattleShip\Storage\StorageFactory::create('session');
        if(!$storage->hasGame()) {
            $players = $request->except('_token');
            $playerOneShips = new \App\BattleShip\Ship\ShipComposite();
            $this->createShips($playerOneShips);
            $playerTwoShips = new \App\BattleShip\Ship\ShipComposite();
            $this->createShips($playerTwoShips);
            $game = new \App\BattleShip\BattleShipGame($players['p1'], $playerOneShips, $players['p2'], $playerTwoShips);
            $game->setNextPlayer('p1');
            $storage->storeGame($game);
        }
        $game = $storage->getGame();
        return view('game', ['game'=> $game]);
    }
    
    public function checkHit(\Illuminate\Http\Request $request) {
        $i = $request->get('i');
        $j = $request->get('j');
        if(!$i || !$j) {
            return response()->json(['Error' => sprintf('Invalid params %s, %s', $i, $j)]);
        }
        
        /** @var \App\BattleShip\Storage\StorageInterface **/
        $storage = \App\BattleShip\Storage\StorageFactory::create('session');
        /** @var \App\BattleShip\BattleShipGame $game **/
        $game = $storage->getGame();
        /** @var \App\BattleShip\Ship\ShipComposite $ships **/
        $ships = $request->get('player') == 'p1' ? $game->getPlayerOneShips() : $game->getPlayerTwoShips();
        $hitPoint = [$i, $j];
        if($ships->isMatch($hitPoint)) {
            $ships->storeHit($hitPoint);
            $response = ['class' => 'hit', 'message' => 'You have a hit :)', 'won' => false];
            if($ships->isDestroyed()) {
                $response['won'] = true;
            }
        } else {
            $ships->storeMissedHit($hitPoint);
            $response = ['class' => 'miss', 'message' => 'You have missed this shot :(', 'won' => false];
        }
        $response['currentPlayer'] = $request->get('player');
        $response['nextPlayer'] = $request->get('player') == 'p1' ? 'p2' : 'p1';
        $game->setNextPlayer($response['nextPlayer']);
        $storage->storeGame($game);
        return response()->json($response);
    }
    
    public function resetGame() {
        /** @var \App\BattleShip\Storage\StorageInterface $storage **/
        $storage = \App\BattleShip\Storage\StorageFactory::create('session');
        $storage->destroyGame();
        return response()->redirectTo('/');
    }
    
    private function createShips($player) {
        //'AirCraft' => 5, 'BattleShip' => 4, 'Submarine' => 3, 'Cruiser' => 3, 
        $ships = ['Destroyer' => 2];
        foreach ($ships as $name => $length) {
            $player->attachShip(\App\BattleShip\Ship\ShipFactory::create($name, 'default'), $length);
        }
        return $player;
    }
}
