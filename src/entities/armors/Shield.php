<?php

include_once("Armor.php");

    class Shield extends Armor{
        
        public function __construct() {
            $shieldPoints = 20;
            $speedPenalty = 4;
            parent::__construct($shieldPoints, $speedPenalty);
        }

    }
?>