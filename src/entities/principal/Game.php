<?php

namespace Domain\Entities\Principal;

use Domain\Entities\Principal\Player as Player;
use Domain\Entities\Characters\Archer as Archer;
use Domain\Entities\Characters\Fighter as Fighter;
use Domain\Entities\Characters\Tank as Tank;
use Domain\Entities\Characters\Wizard as Wizard;

use Domain\Entities\Weapons\Axe as Axe;
use Domain\Entities\Weapons\Bow as Bow;
use Domain\Entities\Weapons\Mallet as Mallet;
use Domain\Entities\Weapons\Sword as Sword;
use Domain\Entities\Weapons\Wand as Wand;

use Domain\Entities\Armors\Helmet as Helmet;
use Domain\Entities\Armors\NoArmor as NoArmor;
use Domain\Entities\Armors\Shield as Shield;
use Domain\Entities\Armors\VestMail as VestMail;
use Domain\Entities\Armors\ClothVest as ClothVest;

    class Game {
        private $numberOfRounds;
        private $playerOne;
        private $playerTwo;

        private function __construct(int $numberOfRounds = 16) {
            $this->numberOfRounds = $numberOfRounds;
        }

        public static function getInstance() {
            static $instance = null;
            
            if (null === $instance) {
               $instance = new static();
            }
            return $instance;
         }

        /**
         * TODO: A factory method design pattern
         */
        public function setPlayerOne($id, $nickname, $money) {
            $this->playerOne = new Player($id, $nickname, $money);
        }

        public function setPlayerTwo($id, $nickname, $money) {
            $this->playerTwo = new Player($id, $nickname, $money);
        }

        public function getPlayerOne() {
            return $this->playerOne;
        }

        public function getPlayerTwo() {
            return $this->playerTwo;
        }

        public function initGame_test() {
            //Set the players
            $this->setPlayerOne(1,"PLAYER1", 5000);
            $this->setPlayerTwo(2,"PLAYER2", 5000);

            //Set Character
            $this->playerOne->setCharacter(new Fighter());
            $this->playerTwo->setCharacter(new Wizard());
                        
            //Set Weapon
            $this->playerOne->getCharacter()->selectWeapon(new Sword());
            $this->playerTwo->getCharacter()->selectWeapon(new Wand());

            //Set armor
            $this->playerOne->getCharacter()->useArmor(new Helmet());
            $this->playerTwo->getCharacter()->useArmor(new ClothVest());

            //Configure position
            $this->playerOne->getCharacter()->setPosition(-5);
            $this->playerTwo->getCharacter()->setPosition(5);

        }

        public function setPlayerPositions($pos1 = -5, $pos2 = 5) {
            $this->playerOne->getCharacter()->setPosition($pos1);
            $this->playerTwo->getCharacter()->setPosition($pos2);
        }

        public function initGame() {
            
        }   

        /**
         * TODO: Who start first?
         */
        public function play() {

            $this->printInitialInfo();

            $cont = 0; 
            while(true) {

                $this->playerOne->attack($this->playerTwo);
                $this->playerOne->defend($this->playerTwo);
                $this->playerOne->gettingCloser($this->playerTwo);

                $this->printPositionPlayer($this->playerOne);
                $this->printLifePlayer($this->playerTwo);

                if($this->playerTwoIsDead()) {
                    echo "Pierde jugador 2";
                    break;
                }

                $this->playerTwo->attack($this->playerOne);
                $this->playerTwo->defend($this->playerOne);
                $this->playerTwo->walkAway($this->playerOne);

                $this->printPositionPlayer($this->playerTwo);
                $this->printLifePlayer($this->playerOne);
                
                if($this->playerOneIsDead()) {
                    echo "Pierde jugador 1";
                    break;
                }

                if($cont > $this->numberOfRounds) {
                    echo "Se acabaron las rondas"."<br>";
                    $this->printLifePlayer($this->playerOne);
                    $this->printLifePlayer($this->playerTwo);
                    echo "empate"."<br>";
                    break;
                }
                ++$cont;

            }
        }

        public function playTurn(Player $player, Player $enemyPlayer, $action1, $action2) {
            
            if(strcmp($action1,$action2) == 0) {
                echo "No se puede usar la misma accion 2 veces. Turno perdido";
            }else {
                $this->doAnAction($player, $enemyPlayer, $action1);
                $this->doAnAction($player, $enemyPlayer, $action2);
            }
        }

        private function doAnAction(Player $player, Player $enemyPlayer, $action) {
            if(strcmp($action,"Atacar") == 0) {
                $player->attack($enemyPlayer);
                $enemyPlayer->defend($player);
                $this->printAttackLog($player, $enemyPlayer, $this->canAttack($player, $enemyPlayer));
            }elseif(strcmp($action,"Acercarse") == 0) {
                $player->gettingCloser($enemyPlayer);
                $this->printWalkLog($player);
            }elseif(strcmp($action,"Alejarse") == 0) {
                $player->walkAway($enemyPlayer);
                $this->printWalkLog($player);
            }
        }

        public function getDistanceBetweenBoth() {
            return abs($this->playerOne->getCharacter()->getPosition()-$this->playerTwo->getCharacter()->getPosition());
        }

        public function canAttack(Player $player, Player $enemyPlayer) {
            $scopeWeapon = $player->getCharacter()->getWeapon()->getRange();
            $myPosition = $player->getCharacter()->getPosition();
            $hisPosition = $enemyPlayer->getCharacter()->getPosition();
            $scopeWithEnemy = abs($myPosition - $hisPosition);
            return $scopeWithEnemy <= $scopeWeapon ? true : false; 
        }

        public function isPlayerOneDead() {
            return $this->playerOne->getCharacter()->getLifePoints() <= 0 ? true : false;
        }

        public function isPlayerTwoDead() {
            return $this->playerOne->getCharacter()->getLifePoints() <= 0 ? true : false;
        }

        public function printAttackLog(Player $player, Player $enemyPlayer, $canAttack) {
            if($canAttack) {
                $damage = $player->getCharacter()->calculeDamage();
                $defend = $enemyPlayer->getCharacter()->calculeDefend($player->getCharacter());
                echo "Jugador ".$player->getId()." (".$player->getNickname().")"." causa ".$damage."<br>";
                echo "Jugador ".$enemyPlayer->getId()." (".$enemyPlayer->getNickname().")"." se defiende ".$defend."<br>";
                echo "Daño total: ".var_dump($damage - $defend)."<br>";
            }else {
                echo "Demasiado lejos para atacar"."<br>";
            }
        }

        public function printWalkLog(Player $player) {
            echo "Jugador ".$player->getId()." (".$player->getNickname().")"." camina ".$player->getCharacter()->getSpeed()." pasos<br>";
            echo "Nueva posicion: ". $player->getCharacter()->getPosition()."<br>";
        }

        private function printInitialInfo() {

            echo "Vida del jugador 1: ".$this->playerOne->getCharacter()->getLifePoints()."<br>";
            echo "Vida del jugador 2: ".$this->playerTwo->getCharacter()->getLifePoints()."<br>";
            echo "<br>";
            echo "jugador 1 tiene de ataque: ".$this->playerOne->getCharacter()->calculeDamage()."<br>";
            echo "jugador 2 tiene de ataque: ".$this->playerTwo->getCharacter()->calculeDamage()."<br>";
            echo "<br>";
            echo "jugador 1 se defiende: ".$this->playerOne->getCharacter()->calculeDefend($this->playerTwo->getCharacter())."<br>";
            echo "jugador 2 se defiende: ".$this->playerTwo->getCharacter()->calculeDefend($this->playerOne->getCharacter())."<br>";
            echo "<br>";
            echo "jugador 1 está en : ".$this->playerOne->getCharacter()->getPosition()."<br>";
            echo "jugador 2 está en : ".$this->playerTwo->getCharacter()->getPosition()."<br>";
            echo "<br>";
        }

        private function printPositionPlayer(Player $player) {
            echo "Ahora jugador ".$player->getId()." está en : ".$player->getCharacter()->getPosition()."<br>";
        }

        private function printLifePlayer(Player $player) {
            echo "Ahora jugador ".$player->getId()." tiene : ".$player->getCharacter()->getLifePoints()." de vida"."<br>";
        }

    }

?>