<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPInterface.php to edit this template
 */

namespace App\BattleShip\Ship;

/**
 *
 * @author ahmedmohamed
 */
interface ShipCompositeInterface {
    
    function attachShip(AbstractShip $ship, $length);
    
    function isDestroyed();
    
    function storeHit(array $hitPoint);
    
    function isMatch(array $hitPoint);
    
    function storeMissedHit(array $hitPoint);
    
}
