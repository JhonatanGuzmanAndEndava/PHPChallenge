<?php

    class Game {

        private $numberOfRounds;
        private $playerOne;
        private $playerTwo;

        public function __construct(int $numberOfRounds) {
            $this->numberOfRounds = $numberOfRounds;
        }
        
        public function initGame() {
            //Set the players
            $this->playerOne = setPlayer(1,"PLAYER1", 5000);
            $this->playerTwo = setPlayer(2,"PLAYER2", 5000);

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

                printLog();

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
                    printLog();
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



        /**
         * TODO: A factory method design pattern
         */
        private function setPlayer($id, $nickname, $money) {
            return new Player($id, $nickname, $money);
        }

        private function printLog() {
            echo "Vida del jugador 1: ".$this->playerOne->getCharacter()->getLifePoints();
            echo "Vida del jugador 2: ".$this->playerTwo->getCharacter()->getLifePoints();
            echo "<br>";
            echo "jugador 1 tiene de ataque: ".$this->playerOne->getCharacter()->calculeDamage();
            echo "jugador 2 tiene de ataque: ".$this->playerOne->getCharacter()->calculeDamage();
            echo "<br>";
            echo "jugador 1 se defiende: ".$this->playerOne->getCharacter()->calculeDefend();
            echo "jugador 2 se defiende: ".$this->playerOne->getCharacter()->calculeDefend();
            echo "<br>";
            echo "jugador 1 está en : ".$this->playerOne->getCharacter()->getPosition();
            echo "jugador 2 está en : ".$this->playerOne->getCharacter()->getPosition();
        }

    }

?>