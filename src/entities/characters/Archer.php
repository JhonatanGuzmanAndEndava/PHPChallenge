<?php

namespace Domain\Entities\Characters;

use Domain\Entities\Characters\Character as Character;

    class Archer extends Character {

        public function __construct($lifePoints = 100) {
            parent::__construct($lifePoints);

            $this->strengh = 48;
            $this->smart = 20;
            $this->speed = 6;
            $this->resistance = 5;
        }
        
        public function calculeDamage() {
            $totalDamage = $this->strengh + $this->weapon->getDamage();
            if ($this->weapon instanceof Bow) {
                return $totalDamage + Config::$weaponBonus;
            }elseif ($this->weapon instanceof Wand) {
                return $this->smart + $this->weapon->getDamage();
            }else {
                return $totalDamage;
            }
        }

        public function calculeDefend(Character $enemyChar) {
            if ($enemyChar->getWeapon() instanceof Bow) {
                return $this->resistance + $this->armor->getShieldPoints() + Config::$armorBonus;
            }
            return $this->resistance + $this->armor->getShieldPoints();
        }
        
    }

?>