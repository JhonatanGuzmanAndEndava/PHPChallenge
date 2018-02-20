<?php

namespace Domain\Entities\Weapons;

use Domain\Entities\Weapons\Weapon as Weapon;

    class Bow extends Weapon{
        
        public function __construct() {
            $thisDamage = 6;
            $thisRange = 10; 
            parent::__construct($thisDamage, $thisRange);
        }

    }
?>