<?php

    class Archer extends Character {

        public function __construct($lifePoints) {
            parent::__construct($lifePoints);

            $this->strengh = 48;
            $this->$smart = 20;
            $this->$speed = 6;
        }
        
        public function attack() {

        }

        public function defend() {

        }

        public function chooseWeapon($weapon) {

        } 
    }

?>