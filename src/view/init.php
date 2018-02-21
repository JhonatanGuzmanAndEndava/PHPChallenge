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
    ?>

    <center><h1>Bienvenido</h1></center>

    <div class="container">
            <form role="form" method="POST" action="progress.php">
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