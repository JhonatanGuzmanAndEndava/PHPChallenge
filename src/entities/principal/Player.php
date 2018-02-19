<?php

    class Player {

        private $id;
        private $nickname;
        private $money;
        private $character;

        public function __construct(int $id, string $nickname, $money, $character) {
            $this->id = $id;
            $this->nickname = $nickname;
            $this->character = $character;
            $this->money = $money;
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
        }*/

        
    }

?>