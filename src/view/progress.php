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

    <center><h1>Bienvenido</h1></center>

    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <h3>Progreso de la batalla</h3>
                <br>
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

                    //TODO: Play by turns
                    $action1 = $_POST['action1'];
                    $action2 = $_POST['action2'];
                    $game = Game::getInstance();
                    $game->playTurn($game->getPlayerOne(), $game->getPlayerTwo(), $action1, $action2);

                    //$game->play();

                ?>

            </div>

            <h2>Informacion</h2>
            <br>
            <?php   

                $player1 = Game::getInstance()->getPlayerOne();
                $player2 = Game::getInstance()->getPlayerTwo();
                echo "Nombre: ".$player1->getNickname()."<br>";
                echo "Puntos de vida restantes: ".$player1->getCharacter()->getLifePoints()."<br>";
                echo "Ataque: ".$player1->getCharacter()->calculeDamage()."<br>";
                echo "Defensa: ".$player1->getCharacter()->calculeDefend($player2->getCharacter())."<br>";
                echo "Posicion: ".$player1->getCharacter()->getPosition()."<br>";
                
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