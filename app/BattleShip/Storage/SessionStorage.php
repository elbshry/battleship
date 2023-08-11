<?php

namespace App\BattleShip\Storage;
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of SessionStorage
 *
 * @author ahmedmohamed
 */
class SessionStorage implements StorageInterface {

    public function getGame() {
        $game = session('BattleShipGame');
        return $game;
    }

    public function storeGame(\App\BattleShip\BattleShipGame $game) {
        session(['BattleShipGame' => $game]);
    }
    
    public function hasGame() {
        $game = session('BattleShipGame');
        
        return $game != null;
    }
    
    public function destroyGame() {
        session(['BattleShipGame' => null]);
    }
}
