<?php 

    namespace Domain\Entities\Principal;

    use Domain\Entities\Principal\Player as Player;

    use Domain\Entities\Characters\Character as Character;
    use Domain\Entities\Characters\Archer as Archer;
    use Domain\Entities\Characters\Fighter as Fighter;
    use Domain\Entities\Characters\Tank as Tank;
    use Domain\Entities\Characters\Wizard as Wizard;

    use Domain\Entities\Weapons\Weapon as Weapon;
    use Domain\Entities\Weapons\Axe as Axe;
    use Domain\Entities\Weapons\Bow as Bow;
    use Domain\Entities\Weapons\Mallet as Mallet;
    use Domain\Entities\Weapons\Sword as Sword;
    use Domain\Entities\Weapons\Wand as Wand;

    use Domain\Entities\Armors\Armor as Armor;
    use Domain\Entities\Armors\Helmet as Helmet;
    use Domain\Entities\Armors\NoArmor as NoArmor;
    use Domain\Entities\Armors\Shield as Shield;
    use Domain\Entities\Armors\VestMail as VestMail;
    use Domain\Entities\Armors\ClothVest as ClothVest;

    class CharacterFactory {
        
        private static function selectCharacter($character) {
            if(strcmp($character, "Arquero") == 0) {
                return new Archer();
            }elseif(strcmp($character, "Luchador") == 0) {
                return new Fighter();
            }elseif(strcmp($character, "Mago") == 0) {
                return new Wizard();
            }elseif(strcmp($character, "Tanque") == 0) {
                return new Tank();
            }
        }

        private static function createWeapon($weapon) {
            if(strcmp($weapon, "Arco") == 0) {
                return new Bow();
            }elseif(strcmp($weapon, "Hacha") == 0) {
                return new Axe();
            }elseif(strcmp($weapon, "Espada") == 0) {
                return new Sword();
            }elseif(strcmp($weapon, "Mazo") == 0) {
                return new Mallet();
            }elseif(strcmp($weapon, "Varita") == 0) {
                return new Wand();
            }            
        }

        private static function createArmor($armor) {
            if(strcmp($armor, "Armadura de tela") == 0) {
                return new ClothVest();
            }elseif(strcmp($armor, "Armadura de malla") == 0) {
                return new VestMail();
            }elseif(strcmp($armor, "Casco") == 0) {
                return new Helmet();
            }elseif(strcmp($armor, "Escudo") == 0) {
                return new Shield();
            }elseif(strcmp($armor, "Sin armadura") == 0) {
                return new NoArmor();
            }
        }

        public static function createCharacter($character, $weapon, $armor) {
            $newWeapon = self::createWeapon($weapon);
            $newArmor = self::createArmor($armor);
            $instance = self::selectCharacter($character);
            $instance->selectWeapon($newWeapon);
            $instance->useArmor($newArmor);
            return $instance;
        }
    } 

?>