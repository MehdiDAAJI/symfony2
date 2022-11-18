<?php

namespace App\DataFixtures;

use App\Entity\Program;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    const PROGRAMS = [
        [
            "title" => "Avatar",
            "synopsis" => "Sur le monde extraterrestre luxuriant de Pandora vivent les Na'vi, des êtres qui semblent primitifs, mais qui sont très évolués. Jake Sully, un ancien Marine paralysé, redevient mobile grâce à un tel Avatar et tombe amoureux d'une femme Na'vi. Alors qu'un lien avec elle grandit, il est entraîné dans une bataille pour la survie de son monde.",
            "poster" => "https://fr.web.img4.acsta.net/pictures/22/08/25/09/04/2146702.jpg",
            "category" => "category_Fantastique"
        ],
        [
            "title" => "Le Transporteur",
            "synopsis" => "Frank, un as du volant, accepte, contre de coquettes rétributions, de convoyer des colis douteux sans poser de questions. Il respecte les règles du milieu, ne se fait jamais attraper et entretient des rapports très courtois avec Tarconi, un policier. En attendant, Frank vit confortablement à Nice, en bord de mer. Un jour, en voulant changer une roue, il ouvre le sac qu'il doit livrer et découvre une belle Chinoise, Lai.",
            "poster" => "https://fr.web.img4.acsta.net/medias/nmedia/00/02/53/48/affiche2.jpg",
            "category" => "category_Action"
        ],
        [
            "title" => "Avengers",
            "synopsis" => "Quand un ennemi inattendu fait surface pour menacer la sécurité et l'équilibre mondial, Nick Fury, directeur de l'agence internationale pour le maintien de la paix, connue sous le nom du S.H.I.E.L.D., doit former une équipe pour éviter une catastrophe mondiale imminente. Un effort de recrutement à l'échelle mondiale est mis en place, pour finalement réunir l'équipe de super héros de rêve, dont Iron Man, l'incroyable Hulk, Thor, Captain America, Hawkeye et Black Widow.",
            "poster" => "https://fr.web.img3.acsta.net/medias/nmedia/18/85/31/58/20042068.jpg",
            "category" => "category_Aventure"
        ],
        [
            "title" => "La reine des neiges",
            "synopsis" => "Anna, une jeune fille aussi audacieuse qu'optimiste, se lance dans un incroyable voyage en compagnie de Kristoff, un montagnard expérimenté, et de son fidèle renne Sven, à la recherche de sa soeur, Elsa, la reine des neiges qui a plongé le royaume d'Arendelle dans un hiver éternel. En chemin, ils vont rencontrer de mystérieux trolls et un drôle de bonhomme de neige nommé Olaf, braver les conditions extrêmes des sommets escarpés et glacés, et affronter la magie qui les guette à chaque pas.",
            "poster" => "https://www.chroniquedisney.fr/imgAnimation/2010/2013-neiges-01-big.jpg",
            "category" => "category_Animation"
        ],
        [
            "title" => "Conjuring, les dossiers Warren",
            "synopsis" => "L'histoire horrible, mais vraie, d'Ed et Lorraine Warren, enquêteurs paranormaux réputés dans le monde entier, venus en aide à une famille terrorisée par une présence inquiétante dans leur ferme isolée. Contraints d'affronter une créature démoniaque d'une force redoutable, les Warren se retrouvent face à l'affaire la plus terrifiante de leur carrière.",
            "poster" => "https://fr.web.img6.acsta.net/pictures/210/025/21002526_20130430172022533.jpg",
            "category" => "category_Horreur"
        ]

    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::PROGRAMS as $value) {
            $program = new Program();
            $program->setTitle($value['title']);
            $program->setSynopsis($value['synopsis']);
            $program->setPoster($value['poster']);
            $program->setCategory($this->getReference($value['category']));
            $manager->persist($program);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
