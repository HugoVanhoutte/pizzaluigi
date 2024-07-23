<?php

namespace App\DataFixtures;

use App\Entity\Booking;
use App\Entity\Note;
use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class AppFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr-FR');
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i < 500; $i++) {
            $booking = new Booking();
            $booking
                ->setName($this->faker->name())
                ->setGuests(mt_rand(1, 16))
                ->setDatetime($this->faker->dateTimeBetween( 'now', '+1 week'))
                ->setPhone($this->faker->phoneNumber())
                ->setEmail($this->faker->email())
            ;

            $manager->persist($booking);
        }

        for ($i = 1; $i < 500; $i++) {
            $note = new Note();
            $note
                ->setName($this->faker->name())
                ->setContent($this->faker->paragraph())
                ->setNote(mt_rand(1, 5))
                ;
            $manager->persist($note);
        }

        for ($i = 1; $i < 500; $i++) {
            $post = new Post();
            $post
                ->setTitle($this->faker->sentence())
                ->setContent($this->faker->paragraph())
                ;
            $manager->persist($post);
        }

        $manager->flush();
    }
}
