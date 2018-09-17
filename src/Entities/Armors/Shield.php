<?php

namespace Domain\Entities\Armors;

use Domain\Entities\Armors\Armor as Armor;

    class Shield extends Armor{
        
        public function __construct() {
            $shieldPoints = 20;
            $speedPenalty = 4;
            parent::__construct($shieldPoints, $speedPenalty);
        }

    }
?>