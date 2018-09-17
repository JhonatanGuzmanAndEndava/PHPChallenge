<?php

namespace Domain\Entities\Weapons;

use Domain\Entities\Weapons\Weapon as Weapon;

    class Sword extends Weapon{
        
        public function __construct() {
            $thisDamage = 15;
            $thisRange = 4; 
            parent::__construct($thisDamage, $thisRange);
        }

    }
?>