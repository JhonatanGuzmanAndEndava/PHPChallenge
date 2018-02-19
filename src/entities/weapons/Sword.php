<?php

include_once("Weapon.php");

    class Sword extends Weapon{
        
        public function __construct() {
            $thisDamage = 15;
            $thisRange = 4; 
            parent::__construct($thisDamage, $thisRange);
        }

    }
?>