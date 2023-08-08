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
class ShipComposite implements ShipInterface {
    
    private $ships;
    
    public function __construct() {
        $this->ships = new \SplObjectStorage();
    }

    public function attachShip(AbstractShip $ship, $length) {
        
        $position = $this->createShipPosition($length);
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

    public function isHit(array $hitPoint) {
        /** @var AbstractShip $ship **/
        foreach ($this->ships as $ship) {
            if($ship->isHit($hitPoint)) {
                $ship->storeHit($hitPoint);
            }
        }
    }
    
    private function createShipPosition($length) {
        $startPoint = [rand(1, 10), rand(1, 10)];
        $newPosition = [0 => $startPoint];
        $extendDirection = rand(0, 1);
        $fixedDirection = $extendDirection == 1 ? 0 : 1;
        for($i=1; $i<$length; $i++) {
            $newPoint = [];
            $newPoint[$fixedDirection] = $startPoint[$fixedDirection];
            $newPoint[$extendDirection] = $startPoint[$extendDirection] + $i;
            $newPosition[$i] = $newPoint;
        }
        
        while(!$this->isPositionAvailable($newPosition)) {
            $newPosition = $this->createShipPosition($length);
        }
        
        return $newPosition;
    }
    
    private function isPositionAvailable($position) {
        /** @var AbstractShip $ship **/
        foreach ($this->ships as $ship) {
            $shipPosition = $ship->getPosition();
            if(count(array_intersect($position, $shipPosition)) > 0) {
                return false;
            }
        }
        
        return true;
    }
}
