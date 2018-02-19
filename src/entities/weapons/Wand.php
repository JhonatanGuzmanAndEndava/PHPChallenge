<?php

include_once("Weapon.php");

    class Wand extends Weapon{
        
        public function __construct() {
            $thisDamage = 7;
            $thisRange = 9; 
            parent::__construct($thisDamage, $thisRange);
        }

    }
?>