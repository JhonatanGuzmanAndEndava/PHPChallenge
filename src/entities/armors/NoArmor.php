<?php

namespace Domain\Entities\Armors;

use Domain\Entities\Armors\Armor as Armor;

    class NoArmor extends Armor{
        
        public function __construct() {
            $shieldPoints = 0;
            $speedPenalty = 0;
            parent::__construct($shieldPoints, $speedPenalty);
        }

    }
?>