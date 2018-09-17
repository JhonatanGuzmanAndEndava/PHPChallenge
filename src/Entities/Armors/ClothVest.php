<?php

namespace Domain\Entities\Armors;

use Domain\Entities\Armors\Armor as Armor;

    class ClothVest extends Armor{
        
        public function __construct() {
            $shieldPoints = 10;
            $speedPenalty = 2;
            parent::__construct($shieldPoints, $speedPenalty);
        }

    }
?>