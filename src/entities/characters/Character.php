<?php

include_once(dirname(__FILE__)."/../../config/game/Config.php");

    abstract class Character {
        
        protected $lifePoints;

        protected $strengh;
        protected $smart;
        protected $speed;
        protected $resistance;
        protected $position;

        protected $weapon;
        protected $armor;

        public function __construct($lifePoints) {
            $this->lifePoints = $lifePoints;
        }
        
        abstract public function calculeDamage();
        abstract public function calculeDefend(Character $enemyChar);

        private function updateSpeed() {
            $this->speed -= $this->armor->getSpeedPenalty();
        }

        /**
         * Call after set weapon and armor
         */
        public function initialDuel() {
            $this->updateSpeed();
        }

        public function selectWeapon(Weapon $weapon) {
            $this->weapon = $weapon;
        }
        
        public function useArmor(Armor $armor) {
            $this->armor = $armor;
        } 

        public function takeOffArmor() {
            $this->armor = new NoArmor();
        } 

        public function getLifePoints()
        {
            return $this->lifePoints;
        }

        public function setLifePoints($lifePoints)
        {
            $this->lifePoints = $lifePoints;
        }

        public function getPosition()
        {
            return $this->position;
        }

        public function setPosition($position)
        {
            $this->position = $position;
        }

        public function getWeapon()
        {
            return $this->weapon;
        }

        public function setWeapon($weapon)
        {
            $this->weapon = $weapon;
        }

        public function getArmor()
        {
            return $this->armor;
        }

        public function setArmor($armor)
        {
            $this->armor = $armor;
        }
 
        public function getSpeed()
        {
            return $this->speed;
        }

        public function setSpeed($speed)
        {
            $this->speed = $speed;
        }
    }

?>