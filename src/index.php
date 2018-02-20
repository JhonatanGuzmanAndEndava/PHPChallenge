<?php

<<<<<<< HEAD
    phpinfo();
=======
require __DIR__.'\..\vendor\autoload.php';
use Domain\Entities\Principal\Game as Game;

    function main() {
        $game = new Game(10);
        $game->initGame();
        $game->play();
    }

    main();
>>>>>>> jhonatan/basics

?>