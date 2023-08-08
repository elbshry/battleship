<?php

namespace App\BattleShip\Storage;

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPInterface.php to edit this template
 */

/**
 *
 * @author ahmedmohamed
 */
interface StorageInterface {
    
    function storeGameStatus();
    
    function getGameStatus();
    
    function hasStatus();
    
}
