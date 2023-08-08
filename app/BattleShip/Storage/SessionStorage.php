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

    public function getGameStatus() {
        $playerOne = session('p1');
        $playerTwo = session('p2');
        
        return ['p1' => $playerOne, 'p2' => $playerTwo];
    }

    public function storeGameStatus($playerOne, $playerTwo) {
        session(['p1', $playerOne, 'p2' => $playerTwo]);
    }
    
    public function hasStatus() {
        $playerOne = session('p1');
        $playerTwo = session('p2');
        
        return $playerOne && $playerTwo;
    }
}
