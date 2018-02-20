<?php

include_once("Player.php");
include_once(dirname(__FILE__)."/../characters/Archer.php");
include_once(dirname(__FILE__)."/../characters/Wizard.php");
include_once(dirname(__FILE__)."/../characters/Fighter.php");
include_once(dirname(__FILE__)."/../weapons/Sword.php");
include_once(dirname(__FILE__)."/../weapons/Bow.php");
include_once(dirname(__FILE__)."/../weapons/Wand.php");
include_once(dirname(__FILE__)."/../armors/Helmet.php");
include_once(dirname(__FILE__)."/../armors/ClothVest.php");

    class Game {

        private $numberOfRounds;
        private $playerOne;
        private $playerTwo;

        public function __construct(int $numberOfRounds) {
            $this->numberOfRounds = $numberOfRounds;
        }
        
        /**
         * TODO: A factory method design pattern
         */
        private function setPlayer($id, $nickname, $money) {
            return new Player($id, $nickname, $money);
        }

        public function initGame() {
            //Set the players
            $this->playerOne = $this->setPlayer(1,"PLAYER1", 5000);
            $this->playerTwo = $this->setPlayer(2,"PLAYER2", 5000);

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
            $this->playerOne->getCharacter()->setPosition(-50);
            $this->playerTwo->getCharacter()->setPosition(50);

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

                if($this->playerTwo->getCharacter()->getLifePoints() <= 0) {
                    echo "Pierde jugador 2";
                    break;
                }

                $this->playerTwo->attack($this->playerOne);
                $this->playerTwo->defend($this->playerOne);
                $this->playerTwo->walkAway($this->playerOne);

                $this->printPositionPlayer($this->playerTwo);
                $this->printLifePlayer($this->playerOne);
                
                if($this->playerOne->getCharacter()->getLifePoints() <= 0) {
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