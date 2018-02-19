<?php

    class NoArmor extends Armor{
        
        public function __construct() {
            $shieldPoints = 0;
            $speedPenalty = 0;
            parent::__construct($shieldPoints, $speedPenalty);
        }

    }
?>