<?php

namespace Domain\Entities\Characters;

use Domain\Entities\Characters\Character as Character;
use Domain\Config\Game\Config as Config;
use Domain\Entities\Weapons\Sword as Sword;
use Domain\Entities\Weapons\Wand as Wand;
use Domain\Entities\Weapons\Mallet as Mallet;
use Domain\Entities\Weapons\Axe as Axe;
use Domain\Entities\Weapons\Bow as Bow;

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
                return $this->resistance + $this->armor->getShieldPoints() + Config::$armorBonus;
            }
            return $this->resistance + $this->armor->getShieldPoints();
        }
    }

?>