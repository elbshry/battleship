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
interface ShipInterface {
    
    function setPosition(array $position);
    
    function getPosition();
    
    function isMatch(array $hitPoint);
        
    function isDestroyed();
    
    function storeHit(array $hitPoint);
    
    function isHit(array $hitPoint);
        
}
