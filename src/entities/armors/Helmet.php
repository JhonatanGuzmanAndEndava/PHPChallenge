<?php

    class Helmet extends Armor{
        
        public function __construct() {
            $shieldPoints = 5;
            $speedPenalty = 1;
            parent::__construct($shieldPoints, $speedPenalty);
        }

    }
?>