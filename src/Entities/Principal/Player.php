<?php

namespace Domain\Entities\Principal;

use Domain\Entities\Principal\Actions as Actions;

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
            $scopeWeapon = $this->character->getWeapon()->getRange();
            $myPosition = $this->character->getPosition();
            $hisPosition = $player->character->getPosition();
            $scopeWithEnemy = abs($myPosition - $hisPosition);
            if($scopeWithEnemy <= $scopeWeapon) {
                $damage = $this->character->calculeDamage();
                $player->getCharacter()->setLifePoints($player->getCharacter()->getLifePoints() - $damage);
                return true;
            }else {
                echo "Too far to atack for player ".$this->id."<br>";
                return false;
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
            $myPosition = $this->character->getPosition();
            $hisPosition = $player->character->getPosition();
            $distance = abs($myPosition - $hisPosition);
            $mySteps = $this->character->getSpeed();
            if($hisPosition < 0 && $myPosition > $hisPosition && $distance >= $mySteps ) {
                $this->character->setPosition($this->character->getPosition() - $mySteps);
            }elseif($hisPosition < 0 && $myPosition < $hisPosition && $distance >= $mySteps ) {
                $this->character->setPosition($this->character->getPosition() + $mySteps);
            }elseif ($hisPosition >= 0 && $myPosition < $hisPosition && $distance >= $mySteps){
                $this->character->setPosition($this->character->getPosition() + $mySteps);
            }elseif ($hisPosition >= 0 && $myPosition > $hisPosition && $distance >= $mySteps){
                $this->character->setPosition($this->character->getPosition() - $mySteps);
            }else {
                $this->character->setPosition($hisPosition);
            }
        }

        public function walkAway(Player $player) { 
            $myPosition = $this->character->getPosition();
            $hisPosition = $player->character->getPosition();
            $distance = abs($myPosition - $hisPosition);
            $mySteps = $this->character->getSpeed();
            if($hisPosition <= $myPosition) {
                $this->character->setPosition($this->character->getPosition() + $mySteps);
            }elseif ($hisPosition > $myPosition){
                $this->character->setPosition($this->character->getPosition() - $mySteps);
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
    }

?>