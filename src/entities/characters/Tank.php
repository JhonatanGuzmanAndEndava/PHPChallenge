<?php

include_once("Character.php");

    class Tank extends Character {

        public function __construct($lifePoints = 100) {
            parent::__construct($lifePoints);

            $this->strengh = 33;
            $this->smart = 18;
            $this->speed = 4;
            $this->resistance = 25;
        }
        
        public function calculeDamage() {
            $totalDamage = $this->strengh + $this->weapon->getDamage();
            if ($this->weapon instanceof Mallet || $this->weapon instanceof Axe) {
                return $totalDamage + Config::$weaponBonus;
            }elseif ($this->weapon instanceof Wand) {
                return $this->smart + $this->weapon->getDamage();
            }else {
                return $totalDamage;
            }
        }

        public function calculeDefend(Character $enemyChar) {
            return $this->resistance + Config::$armorBonus;
        }
    }

?>