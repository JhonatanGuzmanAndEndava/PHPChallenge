<?php

namespace Domain\Entities\Armors;

    abstract class Armor {
        private $shieldPoints;
        private $speedPenalty;

        public function __construct($shieldPoints, $speedPenalty) {
            $this->shieldPoints = $shieldPoints;
            $this->speedPenalty = $speedPenalty;
        }

        public function getShieldPoints()
        {
            return $this->shieldPoints;
        }

        public function setShieldPoints($shieldPoints)
        {
            $this->shieldPoints = $shieldPoints;
        }

        public function getSpeedPenalty()
        {
            return $this->speedPenalty;
        }

        public function setSpeedPenalty($speedPenalty)
        {
            $this->speedPenalty = $speedPenalty;
        }
    }
?>