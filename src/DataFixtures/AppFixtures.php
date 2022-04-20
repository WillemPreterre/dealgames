<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Annonce;
use App\Entity\Category;
use App\Repository\AnnonceRepository;
use App\Repository\CategoryRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    private $annonceRepo;
    private $categoryRepo;
    private $hashPassword;

    public function __construct(AnnonceRepository $annonceRepository,CategoryRepository $categoryRepository, UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->annonceRepo = $annonceRepository;
        $this->categoryRepo = $categoryRepository;
        $this->hashPassword = $userPasswordHasher;

    }

    public function load(ObjectManager $manager): void
    {

        $user = new User();
        $user->setEmail('willem.preterre@gmail.com')
        ->setNom('préterre')
        ->setPrenom('willem')
        ->setIsVerified(true)
        ->setRoles(['ROLE_ADMIN'])
        ->setPassword($this->hashPassword->hashPassword($user, 'pommeret'));
                
        $annonces = [
            "Elden Ring" => [
                'annonce_title' => 'Elden Ring',
                'annonce_description' => 'Elden Ring for PC is an action role playing game (ARPG) written by superstars George R R Martin (the author of the Song of Ice and Fire series of books which begat television show Game of Thrones) and Hidetaka Miyazake (who is famed for many popular video games: from the Souls series, to Bloodborne, to Sekiro amongst many others).',
                'annonce_date' => new \DateTime("2021-02-05"),
                'annonce_date_modif' => new \DateTime("2021-02-05"),
                'category' => 'jeux',
                'photo_name' => 'Elden-ring.jpg',
                'user' => $user
            ],
            "LEGO Star Wars: The Skywalker Saga " => [
                'annonce_title' => 'LEGO Star Wars: The Skywalker Saga ',
                'annonce_description' => 'About This Game Play through all nine Star Wars saga films in a brand-new LEGO video game unlike any other. Experience fun-filled adventures, whimsical humor, and the freedom to fully immerse yourself in the LEGO Star Wars galaxy. Want to play as a Jedi? A Sith? Rebel, bounty hunter, or droid? LEGO Star Wars: The Skywalker Saga features hundreds of playable characters from throughout the galaxy. ',
                'annonce_date' => new \DateTime("2022-03-12"),
                'annonce_date_modif' => new \DateTime("2022-03-12"),
                'category' => 'jeux',
                'photo_name' => 'lego-starwars.jpg',
                'user' => $user
            ],
            "Planet Zoo: Wetlands Animal Pack" => [
                'annonce_title' => 'Planet Zoo: Wetlands Animal Pack ',
                'annonce_description' => 'About This Content Where there is water, there is life! Discover the richness of the wetlands with the Planet Zoo: Wetlands Animal Pack and embrace eight diverse new species. These highly requested animals comprise of seven habitat species and ',
                'annonce_date' => new \DateTime("2022-01-23"),
                'annonce_date_modif' => new \DateTime("2022-01-23"),
                'category' => 'jeux',
                'photo_name' => 'planet-Zoo.jpg',
                'user' => $user
            ],
            "Tiny Tina's Wonderlands: Chaotic Great Edition (Europe)" => [
                'annonce_title' => 'Tiny Tina\'s Wonderlands: Chaotic Great Edition (Europe) ',
                'annonce_description' => 'About This Game Embark on an epic adventure full of whimsy, wonder, and high-powered weaponry! Bullets, magic, and broadswords collide across this chaotic fantasy world brought to life by the unpredictable Tiny Tina. Roll your own multiclass hero ',
                'annonce_date' => new \DateTime("2022-03-25"),
                'annonce_date_modif' => new \DateTime("2022-03-25"),
                'category' => 'jeux',
                'photo_name' => 'Tiny-Tina.jpg',
                'user' => $user
            ],
            "Core Keeper" => [
                'annonce_title' => 'Core Keeper',
                'annonce_description' => 'About This Game Drawn towards a mysterious relic, you are an explorer who awakens in an ancient cavern of creatures, resources and trinkets. Trapped deep underground will your survival skills be up to the task? Mine relics and resources to ',
                'annonce_date' => new \DateTime("2017-06-18"),
                'annonce_date_modif' => new \DateTime("2017-06-18"),
                'category' => 'jeux',
                'photo_name' => 'Core-Keeper.jpg',
                'user' => $user
            ],
            "Godfall Ultimate Edition" => [
                'annonce_title' => 'Godfall Ultimate Edition',
                'annonce_description' => 'About This Game Smash through your enemies and seize ultimate power in this loot-powered action adventure set in a bright fantasy world. Godfall: Ultimate Edition is the best and most complete way to enjoy Godfall. Experience everything assembled ',
                'annonce_date' => new \DateTime("2019-07-23"),
                'annonce_date_modif' => new \DateTime("2019-07-23"),
                'category' => 'jeux',
                'photo_name' => 'godfall.jpg',
                'user' => $user
            ],
            "Risk of Rain 2: Survivors of the Void" => [
                'annonce_title' => 'Risk of Rain 2: Survivors of the Void',
                'annonce_description' => 'About This Content The Gateway to The Void has opened! The corrupting power it contained has engulfed Petrichor V and plunged the planet into darkness. For millennia, The Void Creatures have grown dominant by taking artifacts from  ',
                'annonce_date' => new \DateTime("2020-05-07"),
                'annonce_date_modif' => new \DateTime("2020-05-07"),
                'category' => 'jeux',
                'photo_name' => 'ROR2.jpg',
                'user' => $user
            ],
            "Sony PlayStation 5 Édition Standard" => [
                'annonce_title' => 'Sony PlayStation 5 Édition Standard',
                'annonce_description' => 'PlayStation 5 avec lecteur Blu-ray. Une console révolutionnaire entièrement centrée sur le joueur pour des expériences encore plus immersives et connectées avec vos jeux PS5 et PS4 rétrocompatibles. ',
                'annonce_date' => new \DateTime("2018-03-06"),
                'annonce_date_modif' => new \DateTime("2018-03-06"),
                'category' => 'consoles',
                'photo_name' => 'PS5.jpg',
                'user' => $user
            ],
            " Xbox Series X " => [
                'annonce_title' => ' Xbox Series X ',
                'annonce_description' => 'Découvrez la toute nouvelle Xbox dernière génération, la plus puissante et la plus rapide jamais conçue avec son lecteur Blu-ray 4K ',
                'annonce_date' => new \DateTime("2015-07-14"),
                'annonce_date_modif' => new \DateTime("2015-07-14"),
                'category' => 'consoles',
                'photo_name' => 'XBOX-X.jpg',
                'user' => $user
            ],
            " Console Nintendo Switch " => [
                'annonce_title' => ' Console Nintendo Switch ',
                'annonce_description' => '
                La Nintendo Switch (modèle OLED) possède des dimensions proches de celles de la Nintendo Switch Elle dispose d’un écran OLED plus grand aux couleurs intenses et aux contrastes élevés Elle dispose aussi d’un large support ajustable pour le jeu en mode sur table, d’une nouvelle station d’accueil.',
                'annonce_date' => new \DateTime("2019-09-01"),
                'annonce_date_modif' => new \DateTime("2019-09-01"),
                'category' => 'consoles',
                'photo_name' => 'nintendo.jpg',
                'user' => $user
            ],
            " PDP Manette Filaire pour Xbox Series XIS Noir  " => [
                'annonce_title' => 'PDP Manette Filaire pour Xbox Series XIS Noir  ',
                'annonce_description' => 'Prise casque 3,5 mm avec commandes audio intégrées Double bouton texturé sur les gachettes droite et gauche Compatible avec Xbox One S/X, Xbox Series X/S et Windows Double moteur de vibration Câble détachable de 2m40.',
                'annonce_date' => new \DateTime("2019-09-01"),
                'annonce_date_modif' => new \DateTime("2019-09-01"),
                'category' => 'accessoires',
                'photo_name' => 'manette-xbox.jpg',
                'user' => $user
            ],
            " Nintendo Paire de Manettes Joy-Con Gauche Violet Néon/Droite Orange Néon   " => [
                'annonce_title' => 'Nintendo Paire de Manettes Joy-Con Gauche Violet Néon/Droite Orange Néon   ',
                'annonce_description' => '2 manettes avec support en violet et Orange',
                'annonce_date' => new \DateTime("2017-06-09"),
                'annonce_date_modif' => new \DateTime("2017-06-09"),
                'category' => 'accessoires',
                'photo_name' => 'nintendo-manette.jpg',
                'user' => $user
            ],
            " Casque de jeu filaire LucidSound LS10P pour Sony PlayStation   " => [
                'annonce_title' => 'Casque de jeu filaire LucidSound LS10P pour Sony PlayStation',
                'annonce_description' => 'CONÇU POUR UN CONFORT OPTIMAL : confort supérieur durant les longues campagnes avec des oreillettes douces en mousse à mémoire et un casque léger et flexible. Les écouteurs spacieux pivotent à plat pour être posés confortablement sur votre cou entre deux parties. ',
                'annonce_date' => new \DateTime("2017-12-24"),
                'annonce_date_modif' => new \DateTime("2017-12-24"),
                'category' => 'accessoires',
                'photo_name' => 'LucidSound.jpg',
                'user' => $user
            ],
        ];

        $categories = [
            'accessoires' => [
                'category_name' => 'accessoires',
            ],
            'jeux' => [
                'category_name' => 'jeux',
            ],
            'consoles' => [
                'category_name' => 'consoles',
            ],
        ];
        foreach ($categories as $category ) {


            $c = New Category();

            $c->setCategoryName($category['category_name']);

            $manager->persist($c);
        }
        $manager->flush();




        foreach ($annonces as $annonce ) {
            $a = New Annonce();

                $a->setAnnonceTitle($annonce['annonce_title']);
                $a->setAnnonceDescription($annonce['annonce_description']);
                $a->setAnnonceDate($annonce['annonce_date']);
                $a->setAnnonceDateModif($annonce['annonce_date_modif']);
                $a->setPhotoName($annonce['photo_name']);
                $a->setUser($annonce['user']);
    
            $categoryForAnnonce = $this->categoryRepo->findOneBy(['category_name'=>$annonce['category']]);
            $a->setRelation($categoryForAnnonce);   
            $manager->persist($a);
        }

        $manager->flush();

    }
}
