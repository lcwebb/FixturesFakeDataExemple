<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Contact;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for($i = 0; $i < 50; $i++){
            $contact = $this->createContact(
                $faker->lastName(),
                $faker->firstName(),
                $faker->phoneNumber(),

            );
            $manager->persist($contact);
        }

        $manager->flush();
    }

    private function createContact(string $name, string $firstname, string $phone) : Contact
    {
        $contact = new Contact();

        $contact
        ->setName($name)
        ->setFirstname($firstname)
        ->setPhone($phone);

        return $contact;
    }
}
