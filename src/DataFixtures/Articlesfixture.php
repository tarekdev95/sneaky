<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory; // Import Faker
use App\Entity\Articles; // Import de l'entité Article

class Articlesfixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Initialisation de Faker
        $faker = Factory::create();

        // Création de plusieurs articles
        for ($j = 1; $j <= mt_rand(10, 22); $j++) {
            // Création d'un nouvel article
            $articles = new Articles();
            
            // Remplissage des champs de l'article
            $articles->setName($faker->word()); // Génère un mot comme nom
            $articles->setPrice($faker->randomFloat(2,10,100)); // Génère un mot comme nom
            $articles->setbrand($faker->company()); // Génère un mot comme nom
            $articles->setDetail($faker->randomLetter); // Génère un mot comme nom
            $articles->setImg("https://picsum.photos/id/" . mt_rand(1, 200) . "/275/400");
                    
            // Persistance de l'article
            $manager->persist($articles);
        }

        // Envoi des données en base
        $manager->flush();
    }
}
