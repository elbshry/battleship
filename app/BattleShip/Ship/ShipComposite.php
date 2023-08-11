<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\BattleShip\Ship;

/**
 * Description of ShipComposite
 *
 * @author ahmedmohamed
 */
class ShipComposite implements ShipCompositeInterface {
    
    private $ships;
    private $missedHits = [];
    
    public function __construct() {
        $this->ships = new \SplObjectStorage();
    }
    
    public function attachShip(AbstractShip $ship, $length) {
        $position = $this->createShipPosition($length);
        while (!$this->isPositionAvailable($position)) {
            $position = $this->createShipPosition($length);
        }
        $ship->setPosition($position);
        $this->ships->attach($ship);
    }
    
    public function isDestroyed() {
        /** @var AbstractShip $ship **/
        foreach ($this->ships as $ship) {
            if (!$ship->isDestroyed()) {
                return false;
            }
        }
        return true;
    }
    
    public function storeHit(array $hitPoint) {
        /** @var AbstractShip $ship **/
        foreach ($this->ships as $ship) {
            if($ship->isMatch($hitPoint)) {
                $ship->storeHit($hitPoint);
            }
        }
    }
    
    public function isHit(array $hitPoint) {
        /** @var AbstractShip $ship **/
        foreach ($this->ships as $ship) {
            if($ship->isHit($hitPoint)) {
                return true;
            }
        }
        return false;
    }
    
    public function isMatch(array $hitPoint) {
        /** @var AbstractShip $ship **/
        foreach ($this->ships as $ship) {
            if($ship->isMatch($hitPoint)) {
                return $ship->getName();
            }
        }
        return false;
    }
    
    public function storeMissedHit(array $hitPoint) {
        $this->missedHits[] = $hitPoint;
    }
    
    public function isMissedHit(array $hitPoint) {
        return in_array($hitPoint, $this->missedHits);
    }


    public function getShips() {
        return $this->ships;
    }
    
    private function createShipPosition($length) {
        $startPoint = [rand(1, 10) /** H **/, rand(1, 10) /** V **/];
        $newPosition = [0 => $startPoint];
        $extendDirection = rand(0, 1);
        for($i=1; $i<$length; $i++) {
            $newPoint = [];
            if($extendDirection == 1) {
                $newPoint[0] = $startPoint[0];
                $newPoint[1] = $startPoint[1] + $i;
            } else {
                $newPoint[0] = $startPoint[0] + $i;
                $newPoint[1] = $startPoint[1];
            }
            
            $newPosition[$i] = $newPoint;
        }
        return $newPosition;
    }
    
    private function isPositionAvailable($position) {
        $currentPositions = [];
        /** @var AbstractShip $ship **/
        foreach ($this->ships as $ship) {
            $currentPositions = array_merge($currentPositions, $ship->getPosition());
        }
        foreach ($position as $point) {
            if($point[0] > 10 || $point[1] > 10) {
                return false;
            }
            if(in_array($point, $currentPositions)) {
                return false;
            }
        }
        
        return true;
    }
}
