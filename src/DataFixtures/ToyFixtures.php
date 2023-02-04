<?php

namespace App\DataFixtures;

use App\Entity\Toy;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ToyFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager): void
    {
$toys = [
    ['title' => 'KING JANKY THE 9TH GRAF KING BY JANKY',
        'size' => '3',
        'numbercopies' => '999',
        'linktopurchase' => 'https://superplastic.co/collections/janky-vinyl-designer-art-toys/products/king-janky-the-9th-graf-king',
        'price' => '35',
        'description' => "In continuation of the highly anticipated sold-out series, King Janky the 9th was designed by SUPERPLASTIC’s synthetic celebrity & toy designer, Janky.",
        'picture' => 'https://cdn.shopify.com/s/files/1/0088/7557/3306/products/22_3in_Graffiti_King9th_ProductIMG_R34_1000x1000.jpg?v=1666621811',],

    ['title' => 'QUEEN JANKY THE 9TH GRAF QUEEN BY JANKY',
        'size' => '3',
        'numbercopies' => '999',
        'linktopurchase' => 'https://superplastic.co/collections/janky-vinyl-designer-art-toys/products/queen-janky-the-9th-graf-queen',
        'price' => '35',
        'description' => "The first edition of Queen Janky the 9th is designed by SUPERPLASTIC’s synthetic celebrity & toy designer, Janky.",
        'picture' => 'https://cdn.shopify.com/s/files/1/0088/7557/3306/products/22_3in_Graffiti_Queen9th_ProductIMG_R34_1000x1000.jpg?v=1666622731',],

    ['title' => 'SUPERPLASTIC X GORILLAZ MINI SERIES 3',
        'size' => '4',
        'numbercopies' => '4000',
        'linktopurchase' => 'https://superplastic.co/collections/janky-vinyl-designer-art-toys/products/superplastic-x-gorillaz-mini-series',
        'price' => '17',
        'description' => "The Gorillaz Mini Series is here with their first ever blind box collection. 2D, Murdoc, Russel, Noodle and their extended family from Gorillaz world including Bonesy, Pazuzu and more are here.",
        'picture' => 'https://cdn.shopify.com/s/files/1/0088/7557/3306/products/21_Gorillaz_Mini_Series_1_Website_product_Images_RoundUp_1000x1000.jpg?v=1636392633',],

    ['title' => 'SUPERGHOST BY TREVOR ANDREW',
        'size' => '8',
        'numbercopies' => '2500',
        'linktopurchase' => 'https://superplastic.co/collections/janky-vinyl-designer-art-toys/products/superghost-real-ghost-superkranky-by-trevor-andrew',
        'price' => '100',
        'description' => "Created with legendary artist, musician & fashion designer Trevor Andrew, Superghost is 8-exclusive-inches of flawless SUPERPLASTIC signature soft vinyl.",
        'picture' => 'https://cdn.shopify.com/s/files/1/0088/7557/3306/products/SJ_TroubleAndrew_SuperGhost_Pink_webProductImages_1500x2000_R34_1000x1000.jpg?v=1662661848',],

    ['title' => 'HEARTBREAKER AKA HB BY VINCE STAPLES',
        'size' => '10',
        'numbercopies' => '2000',
        'linktopurchase' => 'https://superplastic.co/collections/janky-vinyl-designer-art-toys/products/heartbreaker-aka-hb-by-vince-staples',
        'price' => '110',
        'description' => "Created by acclaimed rapper & singer Vince Staples, Heartbreaker aka HB is 10-perfect-inches of signature SUPERPLASTIC soft vinyl inspired by his latest album Ramona Park Broke My Heart.",
        'picture' => 'https://cdn.shopify.com/s/files/1/0088/7557/3306/products/22_CCVinceStaples_Gray_WebsiteProductImages_1500x2000_R34_1000x1000.jpg?v=1668447392',],

    ['title' => "LIL’ HELPERS CROSS FADED BY JANKY & GUGGIMON",
        'size' => '15',
        'numbercopies' => '1500',
        'linktopurchase' => 'https://superplastic.co/collections/janky-vinyl-designer-art-toys/products/lil-helpers-cross-faded-15',
        'price' => '190',
        'description' => "Designed by SUPERPLASTIC’s synthetic celebrities & toy designers, Janky & Guggimon, the fifth edition of the exclusive signature series draws inspiration from the demonic helpers of the SUPERPLASTIC universe.",
        'picture' => 'https://cdn.shopify.com/s/files/1/0088/7557/3306/products/Helpers_BOTH_Gradient_ProductImages_1500x2000_a827fd51-69f7-4179-8217-0fb9e3b12e9d_1000x1000.jpg?v=1667311651',],

    ['title' => "LIL' HELPERS PRETTY N' KINK BY JANKY & GUGGIMON",
        'size' => '15',
        'numbercopies' => '2000',
        'linktopurchase' => 'https://superplastic.co/collections/janky-vinyl-designer-art-toys/products/lil-helpers-pretty-n-kink',
        'price' => '190',
        'description' => "Designed by SUPERPLASTIC’s synthetic celebrities & toy designers, Janky & Guggimon, the fourth edition of the exclusive signature series draws inspiration from the demonic helpers of the SUPERPLASTIC universe.",
        'picture' => 'https://cdn.shopify.com/s/files/1/0088/7557/3306/products/PrettyNpink_Helpers_BOTH_BW_ProductImages_1500x2000_bc7f0881-d024-48cd-aa2f-bb6a7815b933_1000x1000.jpg?v=1661957596',],

    ['title' => 'ASTRONAUT SET BY GORILLAZ',
        'size' => '20',
        'numbercopies' => '2000',
        'linktopurchase' => 'https://superplastic.co/collections/janky-vinyl-designer-art-toys/products/superplastic-x-gorillaz-astronaut-set',
        'price' => '420',
        'description' => "Inspired by the ’Strange Timez’ Gorlliaz episode, Astronaut Noodle, Russel, 2D & Murdoc are ready for take off in 12-limited-inches of SUPERPLASTIC soft vinyl.",
        'picture' => 'https://cdn.shopify.com/s/files/1/0088/7557/3306/products/21_Gorillaz_Spacesuits_RoundUp_1000x1000.jpg?v=1635860374',],

    ['title' => "FASHION ACCIDENT 'DEF NOTEZ' SUPERJANKY BY JANK",
        'size' => '8',
        'numbercopies' => '15000',
        'linktopurchase' => 'https://superplastic.co/collections/janky-vinyl-designer-art-toys/products/fashion-accident-superjanky-def-notez',
        'price' => '110',
        'description' => "Fashion Accident Def Notez features a glowing vinyl finish with enough dilated eyes to see every version of the future. He comes with a removable emotional support paddle for swatting away feelings and headphones to keep the world on mute.",
        'picture' => 'https://cdn.shopify.com/s/files/1/0088/7557/3306/products/SJ_8in_FashionAccident_GID_ProductImages_1500x2000_R34_1000x1000.jpg?v=1649868886',],

    ['title' => 'KRANKY SERIES ONE BY MIST',
        'size' => '4',
        'numbercopies' => '4500',
        'linktopurchase' => 'https://superplastic.co/collections/janky-vinyl-designer-art-toys/products/kranky-series-one-by-superplastic',
        'price' => '30',
        'description' => "SUPERPLASTIC’s synthetic celebrities, Janky & Guggimon, collaborated with 14 world-renowned graffiti artists to design the limited edition blind box series Kranky Series One.",
        'picture' => 'https://cdn.shopify.com/s/files/1/0088/7557/3306/products/Kranky_Series1_MIST_R3_4_6a229e38-ef81-4b45-b49e-cbb124770b5d_1000x1000.jpg?v=1634062807',],
];
        foreach ($toys as $key => $value) {
            $toy = new Toy();
            $toy->setTitle($value['title']);
            $toy->setSize($value['size']);
            $toy->setNumbercopies($value['numbercopies']);
            $toy->setLinktopurchase($value['linktopurchase']);
            $toy->setPrice($value['price']);
            $toy->setDescription($value['description']);
            $toy->setPicture($value['picture']);
            $toy->setBrand($this->getReference('brand_'. $key));
            $manager->persist($toy);
            $manager->flush();

        }


    }

    public function getDependencies() : array
    {
        return [
            BrandFixtures::class,
        ];
    }
}