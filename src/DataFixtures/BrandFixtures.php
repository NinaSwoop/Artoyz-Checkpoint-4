<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BrandFixtures extends Fixture
{
const BRANDS= [
['name' => 'Superplastic', 'description' => "Superplastic is a global entertainment brand that creates and manages a roster of world famous synthetic artists and influencers.", 'city' => 'Burlington', 'picture' => 'https://cdn.shopify.com/s/files/1/0584/3841/files/Kidrobot-logo-6-19-200px_200x51.png?v=1614308931'],
['name' => 'KidRobot', 'description' => "Kidrobot is acknowledged worldwide as the premier creator and dealer of limited edition art toys, signature apparel and lifestyle accessories.", 'city' => 'Los Angeles', 'picture' => 'https://cdn.shopify.com/s/files/1/0584/3841/files/Kidrobot-logo-6-19-200px_200x51.png?v=1614308931'],
['name' => 'Minty fresh', 'description' => "Minty fresh is acknowledged worldwide as the premier creator and dealer of limited edition art toys.", 'city' => 'NYC', 'picture' => 'https://cdn.shopify.com/s/files/1/0584/3841/files/Kidrobot-logo-6-19-200px_200x51.png?v=1614308931'],
['name' => 'Wanderlust', 'description' => "Wanderlust is acknowledged worldwide as the premier creator and dealer of limited edition art toys, signature apparel and lifestyle accessories.", 'city' => 'San Francisco', 'picture' => 'https://cdn.shopify.com/s/files/1/0584/3841/files/Kidrobot-logo-6-19-200px_200x51.png?v=1614308931'],
['name' => 'Attakus', 'description' => "Attakus is acknowledged worldwide as the premier creator and dealer of limited edition art toys, signature apparel and lifestyle accessories.", 'city' => 'NYC', 'picture' => 'https://cdn.shopify.com/s/files/1/0584/3841/files/Kidrobot-logo-6-19-200px_200x51.png?v=1614308931'],
['name' => 'Tenacious Toys', 'description' => "Tenacious Toysis acknowledged worldwide as the premier creator and dealer of limited edition art toys, signature apparel and lifestyle accessories.", 'city' => 'Santa Cruz', 'picture' => 'https://cdn.shopify.com/s/files/1/0584/3841/files/Kidrobot-logo-6-19-200px_200x51.png?v=1614308931'],
['name' => 'Superplastic', 'description' => "Superplastic is a global entertainment brand that creates and manages a roster of world famous synthetic artists and influencers.", 'city' => 'Burlington', 'picture' => 'https://cdn.shopify.com/s/files/1/0584/3841/files/Kidrobot-logo-6-19-200px_200x51.png?v=1614308931'],
['name' => 'KidRobot', 'description' => "Kidrobot is acknowledged worldwide as the premier creator and dealer of limited edition art toys, signature apparel and lifestyle accessories.", 'city' => 'Los Angeles', 'picture' => 'https://cdn.shopify.com/s/files/1/0584/3841/files/Kidrobot-logo-6-19-200px_200x51.png?v=1614308931'],
['name' => 'Minty fresh', 'description' => "Minty fresh is acknowledged worldwide as the premier creator and dealer of limited edition art toys.", 'city' => 'NYC', 'picture' => 'https://cdn.shopify.com/s/files/1/0584/3841/files/Kidrobot-logo-6-19-200px_200x51.png?v=1614308931'],
['name' => 'Wanderlust', 'description' => "Wanderlust is acknowledged worldwide as the premier creator and dealer of limited edition art toys, signature apparel and lifestyle accessories.", 'city' => 'San Francisco', 'picture' => 'https://cdn.shopify.com/s/files/1/0584/3841/files/Kidrobot-logo-6-19-200px_200x51.png?v=1614308931'],
];

    public function load(ObjectManager $manager): void
    {

        foreach (self::BRANDS as $key => $value) {
            $brand = new Brand();
            $brand->setName(self::BRANDS[$key]['name']);
            $brand->setDescription(self::BRANDS[$key]['description']);
            $brand->setCity(self::BRANDS[$key]['city']);
            $brand->setPicture(self::BRANDS[$key]['picture']);
            $this->addReference('brand_' . $key, $brand);

            $manager->persist($brand);
        }

        $manager->flush();
    }
}