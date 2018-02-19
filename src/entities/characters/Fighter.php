<?php

include_once("Character.php");

    class Fighter extends Character {

        public function __construct($lifePoints = 100) {
            parent::__construct($lifePoints);
            
            $this->strengh = 55;
            $this->smart = 5;
            $this->speed = 7;
            $this->resistance = 12;
        }

        public function calculeDamage() {
            $totalDamage = $this->strengh + $this->weapon->getDamage();
            if ($this->weapon instanceof Sword) {
                return $totalDamage + Config::$weaponBonus;
            }elseif ($this->weapon instanceof Wand) {
                return $this->smart + $this->weapon->getDamage();
            }else {
                return $totalDamage;
            }
        }

        public function calculeDefend(Character $enemyChar) {
            if ($enemyChar->getWeapon() instanceof Sword || $enemyChar->getWeapon() instanceof Axe || $enemyChar->getWeapon() instanceof Mallet) {
                return $this->resistance + Config::$armorBonus;
            }
            return $this->resistance;
        }
    }

?>