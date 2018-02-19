<?php 

    interface Actions {
        public function attack(Player $player);
        public function defend(Player $player);
        public function gettingCloser(Player $player);
        public function walkAway(Player $player);
    }

?>