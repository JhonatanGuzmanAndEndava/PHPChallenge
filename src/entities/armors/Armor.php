<?php

    abstract class Armor {
        private $shieldPoints;

        public function __construct($shieldPoints) {
            $this->shieldPoints = $shieldPoints;
        }
    }
?>