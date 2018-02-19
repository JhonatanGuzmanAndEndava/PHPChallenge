<?php

    class VestMail extends Armor{
        
        public function __construct() {
            $shieldPoints = 15;
            $speedPenalty = 3;
            parent::__construct($shieldPoints, $speedPenalty);
        }

    }
?>