<?php

namespace Domain\Entities\Weapons;

use Domain\Entities\Weapons\Weapon as Weapon;

    class Wand extends Weapon{
        
        public function __construct() {
            $thisDamage = 7;
            $thisRange = 9; 
            parent::__construct($thisDamage, $thisRange);
        }

    }
?>