<?php

    class Wizard extends Character {

        public function __construct($lifePoints) {
            parent::__construct($lifePoints);

            $this->strengh = 12;
            $this->$smart = 65;
            $this->$speed = 5;
        }
        
        public function attack() {

        }

        public function defend() {

        }

        public function chooseWeapon($weapon) {

        } 
    }

?>