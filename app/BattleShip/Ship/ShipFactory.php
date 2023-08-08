<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\BattleShip\Ship;

/**
 * Description of ShipFactory
 *
 * @author ahmedmohamed
 */
class ShipFactory {
    
    public static function create($type='Default') {
        $shipCls = sprintf('\App\BattleShip\Ship\%sShip', $type);        
        return new $shipCls();
    }
    

    
}
