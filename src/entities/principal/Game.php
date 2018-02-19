<?php

include_once("Player.php");
include_once(dirname(__FILE__)."/../characters/Archer.php");
include_once(dirname(__FILE__)."/../characters/Wizard.php");
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
            $this->playerOne->setCharacter(new Archer());
            $this->playerTwo->setCharacter(new Wizard());
                        
            //Set Weapon
            $this->playerOne->getCharacter()->selectWeapon(new Bow());
            $this->playerTwo->getCharacter()->selectWeapon(new Wand());

            //Set armor
            $this->playerOne->getCharacter()->useArmor(new Helmet());
            $this->playerTwo->getCharacter()->useArmor(new ClothVest());

            //Configure position
            $this->playerOne->getCharacter()->setPosition(-5);
            $this->playerTwo->getCharacter()->setPosition(5);

            //Configure initial duel
            $this->playerOne->getCharacter()->initialDuel();
            $this->playerTwo->getCharacter()->initialDuel();

        }

        /**
         * TODO: Who start first?
         */
        public function play() {

            $cont = 0; 
            while(true) {

                $this->printLog();

                $this->playerOne->attack($this->playerTwo);
                $this->playerOne->defend($this->playerTwo);
                $this->playerOne->gettingCloser($this->playerTwo);

                $this->playerTwo->attack($this->playerOne);
                $this->playerTwo->defend($this->playerOne);
                $this->playerTwo->gettingCloser($this->playerOne);

                if($this->playerOne->getCharacter()->getLifePoints() <= 0) {
                    echo "Pierde jugador 1";
                    break;
                }elseif($this->playerTwo->getCharacter()->getLifePoints() <= 0) {
                    echo "Pierde jugador 2";
                    break;
                }

                if($cont > $this->numberOfRounds) {
                    echo "Se acabaron las rondas";
                    $this->printLog();
                    break;
                }
                ++$cont;

            }


            /*
            $this->playerOne->attack($this->playerTwo);
            $this->playerOne->defend($this->playerTwo);
            $this->playerOne->gettingCloser($this->playerTwo);

            $this->playerTwo->attack($this->playerOne);
            $this->playerTwo->defend($this->playerOne);
            $this->playerTwo->gettingCloser($this->playerOne);

            $this->playerOne->attack($this->playerTwo);
            $this->playerOne->defend($this->playerTwo);
            $this->playerOne->gettingCloser($this->playerTwo);

            $this->playerTwo->attack($this->playerOne);
            $this->playerTwo->defend($this->playerOne);
            $this->playerTwo->gettingCloser($this->playerOne);
            */
        }

        private function printLog() {
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
        }

    }

?>