<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Country;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadCountriesData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        $x = 0;
        while ($x++ < 25) {
            $contryname = $faker->country($x);
            $slug = str_replace(' ', '-', $contryname);
            $slug = preg_replace('/[^A-Za-z\-]/', '', $slug);

            $country = new Country();
            $country->setName($contryname);
            $country->setSlug(strtolower($slug));
            $country->setDescription($faker->text);
            $country->setImage($faker->imageUrl(22, 15));

            $manager->persist($country);
            $manager->flush();
            $this->addReference("country-{$x}", $country);
        }


    }

    public function getOrder()
    {
        return 1;
    }
}