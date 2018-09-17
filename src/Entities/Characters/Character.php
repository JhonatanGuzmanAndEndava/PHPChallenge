<?php

namespace Domain\Entities\Characters;

use Domain\Config\Game\Config as Config;
use Domain\Entities\Weapons\Weapon as Weapon;
use Domain\Entities\Armors\Armor as Armor;

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

        public function selectWeapon(Weapon $weapon) {
            $this->weapon = $weapon;
        }
        
        public function useArmor(Armor $armor) {
            if(is_null($this->armor)) {
                $this->armor = $armor;
                $this->speed -= $this->armor->getSpeedPenalty();
            }else {
                $this->speed += $this->armor->getSpeedPenalty();
                $this->armor = $armor;
                $this->speed -= $this->armor->getSpeedPenalty();
            }
        } 

        public function takeOffArmor() {
            //TODO: make sure you have an armor
            $this->speed += $this->armor->getSpeedPenalty();
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