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
    
    public static function create($name, $type) {
        $shipCls = sprintf('\App\BattleShip\Ship\%sShip', $type);      
        if(!class_exists($shipCls)) {
            throw new \InvalidArgumentException(sprintf('The ship type %s does not exist', $type));
        }
        return new $shipCls($name);
    }
    

    
}
