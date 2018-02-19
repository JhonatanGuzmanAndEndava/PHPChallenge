<?php

    class Fighter extends Character {

        public function __construct($lifePoints) {
            parent::__construct($lifePoints);
            
            $this->strengh = 55;
            $this->$smart = 5;
            $this->$speed = 7;
        }
        
        public function attack() {

        }

        public function defend() {

        }

        public function chooseWeapon($weapon) {

        } 
    }

?>