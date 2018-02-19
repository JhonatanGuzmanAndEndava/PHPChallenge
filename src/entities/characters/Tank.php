<?php

    class Tank extends Character {

        public function __construct($lifePoints) {
            parent::__construct($lifePoints);

            $this->strengh = 33;
            $this->$smart = 18;
            $this->$speed = 3;
        }
        
        public function attack() {

        }

        public function defend() {

        }

        public function chooseWeapon($weapon) {

        } 
    }

?>