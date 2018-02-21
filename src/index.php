<?php

require __DIR__.'\..\vendor\autoload.php';
use Domain\Entities\Principal\Game as Game;

    function main() {
        $game = Game::getInstance();
        $game->initGame_test();
        $game->play();
    }

    main();

?>