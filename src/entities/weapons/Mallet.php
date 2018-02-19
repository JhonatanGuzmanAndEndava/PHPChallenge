<?php

include_once("Weapon.php");

    class Mallet extends Weapon{
        
        public function __construct() {
            $thisDamage = 12;
            $thisRange = 5; 
            parent::__construct($thisDamage, $thisRange);
        }

    }
?>