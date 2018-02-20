<?php

namespace Domain\Entities\Weapons;

    abstract class Weapon {
        private $damage;
        private $range;

        public function __construct($damage, $range) {
            $this->damage = $damage;
            $this->range = $range;
        }
 
        public function getDamage()
        {
            return $this->damage;
        }

        public function setDamage($damage)
        {
            $this->damage = $damage;
        }

        public function getRange()
        {
            return $this->range;
        }

        public function setRange($range)
        {
            $this->range = $range;
        }
    }

?>