<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class GameController extends BaseController
{

    public function play(\App\Http\Requests\PlayersRequest $request)
    {
        /** @var \App\BattleShip\Storage\StorageInterface **/
        $storage = \App\BattleShip\Storage\StorageFactory::create('session');
        if(!$storage->hasStatus()) {
            $players = $request->except('_token');
            $playerOneShips = new \App\BattleShip\Ship\ShipComposite($players['p1']);
            $playerTwoShips = new \App\BattleShip\Ship\ShipComposite($players['p2']);
            $storage->storeGameStatus($playerOneShips, $playerTwoShips);
        }
        $game = $storage->getGameStatus();
        return view('game', $game);
    }
}
