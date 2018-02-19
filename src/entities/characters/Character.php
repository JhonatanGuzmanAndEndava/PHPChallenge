<?php

    abstract class Character {
        
        private $lifePoints;

        private $strengh;
        private $smart;
        private $speed;
        
        public function __construct($lifePoints = 100) {
            $this->lifePoints = $lifePoints;
        }

        abstract public function attack();
        abstract public function defend();
        abstract public function chooseWeapon($weapon);
    }

?>