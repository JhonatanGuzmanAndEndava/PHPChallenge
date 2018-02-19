<?php

    class Helmet extends Armor{
        
        public function __construct() {
            $shieldPoints = 5;
            parent::__construct($shieldPoints);
        }

    }
?>