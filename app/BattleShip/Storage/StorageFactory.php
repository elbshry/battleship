<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\BattleShip\Storage;

/**
 * Description of StorageFactory
 *
 * @author ahmedmohamed
 */
class StorageFactory {
    
    public static function create($type) {
        $storageCls = sprintf('\App\BattleShip\Storage\%sStorage', ucfirst(strtolower($type)));
        if(!class_exists($storageCls)) {
            throw new \InvalidArgumentException(sprintf('The Storage type %s does not exist', $type));
        }
        
        return new $storageCls();
    }
}
