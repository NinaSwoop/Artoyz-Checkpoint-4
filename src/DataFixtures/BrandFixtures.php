<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class BrandFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for($i = 1; $i < 11; $i++) {
            $brand = new Brand();
            $brand->setName($faker->word(4));
            $brand->setDescription('Superplastic is a global entertainment brand that creates and manages a roster of world famous synthetic artists and influencers.');
            $brand->setCity($faker->city());
            $brand->setPicture('https://cdn.shopify.com/s/files/1/0584/3841/files/Kidrobot-logo-6-19-200px_200x51.png?v=1614308931');
            $this->addReference('brand_' . $i, $brand);

            $manager->persist($brand);
        }

        $manager->flush();
    }
}