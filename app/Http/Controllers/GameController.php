<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class GameController extends BaseController
{

    public function play(\Illuminate\Http\Request $request)
    {
        /** @var \App\BattleShip\Storage\StorageInterface **/
        $storage = \App\BattleShip\Storage\StorageFactory::create('session');
        if(!$storage->hasGame()) {
            $players = $request->except('_token');
            $playerOneShips = new \App\BattleShip\Ship\ShipComposite();
            $this->createShips($playerOneShips);
            $playerTwoShips = new \App\BattleShip\Ship\ShipComposite();
            $this->createShips($playerTwoShips);
            $game = new \App\BattleShip\BattleShipGame($players['p1'], $playerOneShips, $players['p2'], $playerTwoShips);
            $storage->storeGame($game);
        }
        $game = $storage->getGame();
//        dd($game->getPlayerOneShips()->getShips());
        return view('game', ['game'=> $game]);
    }
    
    private function createShips($player) {
        $ships = ['AirCraft' => 5, 'BattleShip' => 4, 'Submarine' => 3, 'Cruiser' => 3, 'Destroyer' => 2];
        foreach ($ships as $name => $length) {
            $player->attachShip(\App\BattleShip\Ship\ShipFactory::create($name, 'default'), $length);
        }
        return $player;
    }
}
