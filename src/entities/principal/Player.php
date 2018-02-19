<?php

    class Player implements Actions{

        private $id;
        private $nickname;
        private $money;
        private $character;

        public function __construct(int $id, string $nickname, $money) {
            $this->id = $id;
            $this->nickname = $nickname;
            $this->money = $money;
        }

        public function attack(Player $player) {
            //TODO: Look out with abs
            $scopeWeapon = $this->character->getWeapon()->getRange();
            $myPosition = $this->character->getPosition();
            $hisPosition = $player->getPosition();
            $scopeWithEnemy = abs($myPosition - $hisPosition);
            if($scopeWithEnemy <= $scopeWeapon) {
                $damage = $this->character->calculeDamage();
                $player->getCharacter->setLifePoints($damage);
            }else {
                echo "Too far";
            }
        }

        public function defend(Player $player) {
            $points = $this->character->getLifePoints();
            $restore = $this->character->calculeDefend($player->getCharacter());
            $total = $points + $restore; 
            if($total > 100 ) {
                $this->character->setLifePoints(100);
            }else { 
                $this->character->setLifePoints($total);
            } 
        }

        public function gettingCloser(Player $player) {
            //TODO: check what if I am too close
            $myPosition = $this->character->getPosition();
            $hisPosition = $player->getPosition();
            if($hisPosition < 0) {
                $this->character->setPosition($this->character->getPosition() - $this->character->getSpeed());
            }else {
                $this->character->setPosition($this->character->getPosition() + $this->character->getSpeed());
            }
        }

        public function walkAway(Player $player) { 
            $myPosition = $this->character->getPosition();
            $hisPosition = $player->getPosition();
            if($hisPosition < 0) {
                $this->character->setPosition($this->character->getPosition() + $this->character->getSpeed());
            }else {
                $this->character->setPosition($this->character->getPosition() - $this->character->getSpeed());
            }
        }

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
        }

        public function getNickname()
        {
            return $this->nickname;
        }

        public function setNickname($nickname)
        {
            $this->nickname = $nickname;
        }

        public function getMoney()
        {
            return $this->money;
        }

        public function setMoney($money)
        {
            $this->money = $money;
        }

        public function getCharacter()
        {
            return $this->character;
        }

        public function setCharacter($character)
        {
            $this->character = $character;
        }

        /*
        public function __get($property) {
            if (property_exists($this, $property)) {
                return $this->$property;
            }
        }
        
        public function __set($property, $value) {
            if (property_exists($this, $property)) {
                $this->$property = $value;
            }
        }
        */
        
    }

?>