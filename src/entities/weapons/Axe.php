<?php

    class Axe extends Weapon{
        
        public function __construct() {
            $thisDamage = 8;
            $thisRange = 7; 
            parent::__construct($thisDamage, $thisRange);
        }

    }
?>