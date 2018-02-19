<?php

include_once("Weapon.php");

    class Bow extends Weapon{
        
        public function __construct() {
            $thisDamage = 6;
            $thisRange = 10; 
            parent::__construct($thisDamage, $thisRange);
        }

    }
?>