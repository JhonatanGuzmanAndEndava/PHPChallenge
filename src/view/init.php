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

        if(isset($_POST['nicknamep1'])) {

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
            session_start();
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
                //TODO: Play by turns
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

                    echo "<h4>Jugador 1</h4>"."<br>";
                    echo "Nombre: ".$player1->getNickname()."<br>";
                    echo "Puntos de vida restantes: ".$player1->getCharacter()->getLifePoints()."<br>";
                    echo "Ataque: ".$player1->getCharacter()->calculeDamage()."<br>";
                    echo "Alcance del arma: ".$player1->getCharacter()->getWeapon()->getRange()."<br>";
                    echo "Defensa: ".$player1->getCharacter()->calculeDefend($player2->getCharacter())."<br>";
                    echo "Posicion: ".$player1->getCharacter()->getPosition()."<br>";
                    echo "Velocidad: ".$player1->getCharacter()->getSpeed()."<br><br>";
                
                    echo "<h4>Jugador 2</h4>"."<br>";
                    echo "Nombre: ".$player2->getNickname()."<br>";
                    echo "Puntos de vida restantes: ".$player2->getCharacter()->getLifePoints()."<br>";
                    echo "Ataque: ".$player2->getCharacter()->calculeDamage()."<br>";
                    echo "Alcance del arma: ".$player2->getCharacter()->getWeapon()->getRange()."<br>";
                    echo "Defensa: ".$player2->getCharacter()->calculeDefend($player1->getCharacter())."<br>";
                    echo "Posicion: ".$player2->getCharacter()->getPosition()."<br>";
                    echo "Velocidad: ".$player2->getCharacter()->getSpeed()."<br><br>";
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