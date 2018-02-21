<?php

require __DIR__.'\..\..\vendor\autoload.php';
use Domain\Entities\Principal\Game as Game;

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

//Character
if(strcmp($characterp1, "Arquero") == 0) {
    $game->getPlayerOne()->setCharacter(new Archer());
}elseif(strcmp($characterp1, "Luchador") == 0) {
    $game->getPlayerOne()->setCharacter(new Fighter());
}elseif(strcmp($characterp1, "Mago") == 0) {
    $game->getPlayerOne()->setCharacter(new Wizard());
}elseif(strcmp($characterp1, "Tanque") == 0) {
    $game->getPlayerOne()->setCharacter(new Tank());
}

if(strcmp($characterp2, "Arquero") == 0) {
    $game->getPlayerTwo()->setCharacter(new Archer());
}elseif(strcmp($characterp2, "Luchador") == 0) {
    $game->getPlayerTwo()->setCharacter(new Fighter());
}elseif(strcmp($characterp2, "Mago") == 0) {
    $game->getPlayerTwo()->setCharacter(new Wizard());
}elseif(strcmp($characterp2, "Tanque") == 0) {
    $game->getPlayerTwo()->setCharacter(new Tank());
}

//Weapon
if(strcmp($weaponp1, "Arco") == 0) {
    $game->getPlayerOne()->getCharacter()->selectWeapon(new Bow());
}elseif(strcmp($weaponp1, "Hacha") == 0) {
    $game->getPlayerOne()->getCharacter()->selectWeapon(new Axe());
}elseif(strcmp($weaponp1, "Espada") == 0) {
    $game->getPlayerOne()->getCharacter()->selectWeapon(new Sword());
}elseif(strcmp($weaponp1, "Mazo") == 0) {
    $game->getPlayerOne()->getCharacter()->selectWeapon(new Mallet());
}elseif(strcmp($weaponp1, "Varita") == 0) {
    $game->getPlayerOne()->getCharacter()->selectWeapon(new Wand());
}

if(strcmp($weaponp2, "Arco") == 0) {
    $game->getPlayerTwo()->getCharacter()->selectWeapon(new Bow());
}elseif(strcmp($weaponp2, "Hacha") == 0) {
    $game->getPlayerTwo()->getCharacter()->selectWeapon(new Axe());
}elseif(strcmp($weaponp2, "Espada") == 0) {
    $game->getPlayerTwo()->getCharacter()->selectWeapon(new Sword());
}elseif(strcmp($weaponp2, "Mazo") == 0) {
    $game->getPlayerTwo()->getCharacter()->selectWeapon(new Mallet());
}elseif(strcmp($weaponp2, "Varita") == 0) {
    $game->getPlayerTwo()->getCharacter()->selectWeapon(new Wand());
}

//Armor
if(strcmp($armorp1, "Armadura de tela") == 0) {
    $game->getPlayerOne()->getCharacter()->useArmor(new ClothVest());
}elseif(strcmp($armorp1, "Armadura de malla") == 0) {
    $game->getPlayerOne()->getCharacter()->useArmor(new VestMail());
}elseif(strcmp($armorp1, "Casco") == 0) {
    $game->getPlayerOne()->getCharacter()->useArmor(new Helmet());
}elseif(strcmp($armorp1, "Escudo") == 0) {
    $game->getPlayerOne()->getCharacter()->useArmor(new Shield());
}elseif(strcmp($armorp1, "Sin armadura") == 0) {
    $game->getPlayerOne()->getCharacter()->useArmor(new NoArmor());
}

if(strcmp($armorp2, "Armadura de tela") == 0) {
    $game->getPlayerTwo()->getCharacter()->useArmor(new ClothVest());
}elseif(strcmp($armorp2, "Armadura de malla") == 0) {
    $game->getPlayerTwo()->getCharacter()->useArmor(new VestMail());
}elseif(strcmp($armorp2, "Casco") == 0) {
    $game->getPlayerTwo()->getCharacter()->useArmor(new Helmet());
}elseif(strcmp($armorp2, "Escudo") == 0) {
    $game->getPlayerTwo()->getCharacter()->useArmor(new Shield());
}elseif(strcmp($armorp2, "Sin armadura") == 0) {
    $game->getPlayerTwo()->getCharacter()->useArmor(new NoArmor());
}

$game->setPlayerPositions();
$game->play();

?>