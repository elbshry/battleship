<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class GameController extends BaseController
{

    public function play(\App\Http\Requests\PlayersRequest $request)
    {
        $players = $request->except('_token');
        return view('game', $players);
    }
}
