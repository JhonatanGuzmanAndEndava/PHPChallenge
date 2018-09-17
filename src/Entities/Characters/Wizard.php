<?php

namespace Domain\Entities\Characters;

use Domain\Entities\Characters\Character as Character;
use Domain\Config\Game\Config as Config;
use Domain\Entities\Weapons\Sword as Sword;
use Domain\Entities\Weapons\Wand as Wand;
use Domain\Entities\Weapons\Mallet as Mallet;
use Domain\Entities\Weapons\Axe as Axe;
use Domain\Entities\Weapons\Bow as Bow;

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
                return $this->smart + $this->weapon->getDamage() + Config::$weaponBonus;
            }else {
                return $this->strengh + $this->weapon->getDamage();
            }
        }

        public function calculeDefend(Character $enemyChar) {
            if ($enemyChar->getWeapon() instanceof Wand) {
                return $this->resistance + $this->armor->getShieldPoints() + Config::$armorBonus;
            }
            return $this->resistance + $this->armor->getShieldPoints();
        }
    }

?>