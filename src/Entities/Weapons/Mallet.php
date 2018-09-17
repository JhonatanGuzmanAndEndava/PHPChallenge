<?php

namespace Domain\Entities\Weapons;

use Domain\Entities\Weapons\Weapon as Weapon;

    class Mallet extends Weapon{
        
        public function __construct() {
            $thisDamage = 12;
            $thisRange = 5; 
            parent::__construct($thisDamage, $thisRange);
        }

    }
?>