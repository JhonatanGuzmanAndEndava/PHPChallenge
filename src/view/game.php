<?php

use Domain\Entities\Principal\Game as Game;

$nicknamep1 = $_POST['nicknamep1'];
$characterp1 = $_POST['characterp1'];
$weaponp1 = $_POST['weaponp1'];
$armorp1 = $_POST['armorp1'];
$nicknamep2 = $_POST['nicknamep2'];
$characterp2 = $_POST['characterp2'];
$weaponp2 = $_POST['weaponp2'];
$armorp2 = $_POST['armorp2'];

$game = new Game(16);
$game->setPlayerOne(1,$nicknamep1,5000);
$game->setPlayerTwo(2,$nicknamep2,5000);

if(strcmp($characterp1, "Arquero")) {
    $this->playerOne->setCharacter(new Archer());
}elseif(strcmp($characterp1, "Luchador")) {
    $this->playerOne->setCharacter(new Fighter());
}elseif(strcmp($characterp1, "Mago")) {
    $this->playerOne->setCharacter(new Wizard());
}elseif(strcmp($characterp1, "Tanque")) {
    $this->playerOne->setCharacter(new Tank());
}

?>