<?php

namespace App\DataFixtures;

use App\Entity\Toy;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ToyFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for($j = 1; $j < 11; $j++) {
            $toy = new Toy();
            $toy->setTitle($faker->sentence(4));
            $toy->setSize($faker->numberBetween(5, 30));
            $toy->setNumbercopies($faker->numberBetween(200, 20000));
            $toy->setDescription($faker->sentence(4));
            $toy->setPrice($faker->numberBetween(30, 500));
            $toy->setPicture('https://cdn.shopify.com/s/files/1/0088/7557/3306/products/22_3in_Graffiti_King9th_ProductIMG_R34_750x750.jpg?v=1666621811');
            $toy->setLinktopurchase('https://superplastic.co/collections/janky-vinyl-designer-art-toys/products/king-janky-the-9th-graf-king');
            $brand = $this->getReference('brand_'. $j);
            $toy->setBrand($brand);
            $manager->persist($toy);
        }

        $manager->flush();
    }

    public function getDependencies() : array
    {
        return [
            BrandFixtures::class,
        ];
    }
}
