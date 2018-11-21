<?php

namespace App\DataFixtures;

use App\Entity\Property;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class PropertyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i=0;$i<100;$i++){
            $property=new Property();
            $property
                ->setSold(false)
                ->setAddress($faker->address)
                ->setSurface($faker->numberBetween(28,358))
                ->setHeat($faker->numberBetween(0,count(Property::HEAT)-1))
                ->setPostalCode($faker->postcode)
                ->setCity($faker->city)
                ->setBedrooms($faker->numberBetween(1,9))
                ->setDescription($faker->sentence(3,true))
                ->setFloor($faker->numberBetween(0,15))
                ->setPrice($faker->numberBetween(100000,9999990))
                ->setRooms($faker->numberBetween(2,10))
                ->setTitle($faker->words(3,true));
            $manager->persist($property);
            $manager->flush();

        }

    }
}
