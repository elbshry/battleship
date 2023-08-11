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
    private $name;
    
    public function __construct($name) {
        $this->name = $name;
    }
    
    public function setPosition(array $position) {
        $this->position = $position;
    }

    public function getPosition() {
        return $this->position;
    }
    
    public function isMatch(array $hitPoint) {
        return in_array($hitPoint, $this->position);
    }
    
    public function isDestroyed() {
        return count($this->hits) == count($this->position);
    }
    
    public function storeHit($hitPoint) {
        if(!in_array($hitPoint, $this->hits)) {
            $this->hits[] = $hitPoint;
        }
    }

    public function isHit(array $hitPoint) {
        return in_array($hitPoint, $this->hits);
    }
    
    public function getName() {
        return $this->name;
    }
}
