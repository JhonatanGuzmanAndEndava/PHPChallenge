<?php

include_once("Armor.php");

    class ClothVest extends Armor{
        
        public function __construct() {
            $shieldPoints = 10;
            $speedPenalty = 2;
            parent::__construct($shieldPoints, $speedPenalty);
        }

    }
?>