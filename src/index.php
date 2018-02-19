<?php

include_once("entities/principal/Game.php");

    function main() {
        $game = new Game(10);
        $game->initGame();
        $game->play();
    }

    main();

?>