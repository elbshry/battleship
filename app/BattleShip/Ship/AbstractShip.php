<?php
namespace App\BattleShip\Ship;
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of AbstractShip
 *
 * @author ahmedmohamed
 */
abstract class AbstractShip implements ShipInterface {
    
    private $position = [];
    private $hits = [];
    
    public function setPosition(array $position) {
        $this->position = $position;
    }

    public function getPosition() {
        return $this->position;
    }
    
    public function isHit(array $hitPoint) {
        return in_array($hitPoint, $this->position);
    }
    
    public function isDestroyed() {
        return count($this->hits) == count($this->position);
    }
    
    public function storeHit($hitPoint) {
        if(!in_array($hitPoint, $this->hits)) {
            $this->hits += $hitPoint;
        }
    }
}
