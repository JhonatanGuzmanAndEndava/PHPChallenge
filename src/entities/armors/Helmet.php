<?php

namespace Domain\Entities\Armors;

use Domain\Entities\Armors\Armor as Armor;

    class Helmet extends Armor{
        
        public function __construct() {
            $shieldPoints = 5;
            $speedPenalty = 1;
            parent::__construct($shieldPoints, $speedPenalty);
        }

    }
?>