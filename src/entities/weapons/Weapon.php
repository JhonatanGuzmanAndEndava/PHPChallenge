<?php

    abstract class Weapon {
        private $damage;
        private $range;

        public function __construct($damage, $range) {
            $this->damage = $damage;
            $this->range = $range;
        }
    }

?>