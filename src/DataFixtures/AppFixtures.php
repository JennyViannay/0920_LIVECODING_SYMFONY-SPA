<?php

namespace App\DataFixtures;

use App\Entity\Race;
use App\Entity\Refuge;
use App\Entity\Specie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $refugesNames = ['Spa Paris', 'Spa Marseille', 'Spa Bordeaux', 'Spa Toulouse', 'Spa Nice'];
        $refugesAddress = ['Paris', 'Marseille', 'Bordeaux', 'Toulouse', 'Nice'];
        for ($i = 0; $i < 5; $i++) {
            $refuge = new Refuge();
            $refuge->setName($refugesNames[$i]);
            $refuge->setAddress($refugesAddress[$i]);
            $manager->persist($refuge);
        }

        $races = ['Batard', 'Chihuaha', 'Persan', 'Bulldog', 'Garou'];
        for ($i = 0; $i < 5; $i++) {
            $race = new Race();
            $race->setName($races[$i]);
            $manager->persist($race);
        }

        $species = ['Chien', 'Chat', 'Loup'];
        for ($i = 0; $i < 3; $i++) {
            $specie = new Specie();
            $specie->setName($species[$i]);
            $manager->persist($specie);
        }

        $manager->flush();
    }
}
