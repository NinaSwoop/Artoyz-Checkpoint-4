<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ToyFixtures extends Fixture
{
    const TOYS = [
        ['title' => '', 'size' => "", 'numbercopies' => '', 'price' => '', 'linktopurchase' =>'', 'description' => '', 'picture' => ''],
    ];

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
