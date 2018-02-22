<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../../vendor/twbs/bootstrap/dist/css/bootstrap.min.css"> -->

    <title>Role play game</title>
</head>

<body>

    <?php
        require __DIR__.'\..\..\vendor\autoload.php';

        use Domain\Entities\Principal\Game as Game;
        use Domain\Entities\Principal\Player as Player;

        use Domain\Entities\Principal\CharacterFactory as CharacterFactory; 

        if(isset($_POST['nicknamep1'])) {

            session_start();

            $nicknamep1 = $_POST['nicknamep1'];
            $characterp1 = $_POST['characterp1'];
            $weaponp1 = $_POST['weaponp1'];
            $armorp1 = $_POST['armorp1'];
            $nicknamep2 = $_POST['nicknamep2'];
            $characterp2 = $_POST['characterp2'];
            $weaponp2 = $_POST['weaponp2'];
            $armorp2 = $_POST['armorp2'];

            $game = Game::getInstance();
            $game->setPlayerOne(1,$nicknamep1,5000);
            $game->setPlayerTwo(2,$nicknamep2,5000);

            $game->getPlayerOne()->setCharacter(CharacterFactory::createCharacter($characterp1, $weaponp1, $armorp1));
            $game->getPlayerTwo()->setCharacter(CharacterFactory::createCharacter($characterp2, $weaponp2, $armorp2));

            $game->setPlayerPositions();

            $_SESSION['game'] = $game;
            $_SESSION['counter'] = 1;

        }else{ 
            session_start();
        }
    ?>

    <center><h1>Bienvenido</h1></center>

    <div class="container">
        <div class = "row">
        <div class="col-md-6">
            <h3>Progreso de la batalla</h3>
            <br>
            <?php

                session_start();

                if(isset($_POST['action1']) || isset($_POST['action2'])) {
                    $action1 = $_POST['action1'];
                    $action2 = $_POST['action2'];

                    $game = $_SESSION['game'];

                    if( $_SESSION['counter']%2 == 1) {
                        $game->playTurn($game->getPlayerOne(), $game->getPlayerTwo(), $action1, $action2);
                    }else {
                        $game->playTurn($game->getPlayerTwo(), $game->getPlayerOne(), $action1, $action2);
                    }

                    if($game->isPlayerOneDead()) {
                        echo "Juego Terminado. Gana el jugador 2"."<br>"; die;
                    }
                    elseif($game->isPlayerTwoDead()) {
                        echo "Juego Terminado. Gana el jugador 1"."<br>"; die;
                    }
                    $_SESSION['counter']++;
                }

            ?>

        </div>

        <div class="col-md-6">
            <form role="form" method="POST" action="init.php">
                <h2>Turno del jugador</h2>

                <div class="form-group">
                    <label for="Accion 1">Accion 1</label>

                    <select class="form-control" name="action1">
                        <option>Atacar</option>
                        <option>Acercarse</option>
                        <option>Alejarse</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="Accion 2">Accion 2</label>

                    <select class="form-control" name="action2">
                        <option>Atacar</option>
                        <option>Acercarse</option>
                        <option>Alejarse</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Listo!</button>
                </div>

            </form>

            <h2>Informacion</h2>
            <br>
            <?php   
                
                session_start();

                if(isset($_SESSION['game'])) {
                    $player1 = $_SESSION['game']->getPlayerOne();
                    $player2 = $_SESSION['game']->getPlayerTwo();

                    echo "Jugadores a: ".$_SESSION['game']->getDistanceBetweenBoth()." pasos de distancia"."<br><br>";

                    $_SESSION['game']->printPlayersInfo();
                }
                
            ?>

        </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <!-- <script src="../../vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script> -->
</body>

</html>