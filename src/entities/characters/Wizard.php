<?php

    class Wizard extends Character {

        public function __construct($lifePoints = 100) {
            parent::__construct($lifePoints);

            $this->strengh = 12;
            $this->smart = 65;
            $this->speed = 4;
            $this->resistance = 8;
        }

        public function calculeDamage() {
            if ($this->weapon instanceof Wand) {
                return $this->smart + $weapon->getDamage() + Config::$weaponBonus;
            }else {
                return $this->strengh + $weapon->getDamage();
            }
        }

        public function calculeDefend(Character $enemyChar) {
            if ($enemyChar->getWeapon() instanceof Wand) {
                return $this->resistance + Config::$armorBonus;
            }
            return $this->resistance;
        }
    }

?>