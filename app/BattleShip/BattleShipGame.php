<?php

namespace App\BattleShip;
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of BattleShipGame
 *
 * @author ahmedmohamed
 */
class BattleShipGame {
    
    private $p1;
    private $p2;
    private $p1Ships;
    private $p2Ships;
    private $nextPlayer;
    
    public function __construct($p1, Ship\ShipComposite $p1Ships, $p2, Ship\ShipComposite $p2Ships) {
        $this->p1 = $p1;
        $this->p2 = $p2;
        $this->p1Ships = $p1Ships;
        $this->p2Ships = $p2Ships;
    }
    
    public function getPlayerOne() {
        return $this->p1;
    }
    
    public function getPlayerTwo() {
        return $this->p2;
    }
    
    public function getPlayerOneShips() {
        return $this->p1Ships;
    }
        
    public function getPlayerTwoShips() {
        return $this->p2Ships;
    }
    
    public function setNextPlayer($player) {
        $this->nextPlayer = $player;
    }
    
    public function getNextPlayer() {
        return $this->nextPlayer;
    }
}
