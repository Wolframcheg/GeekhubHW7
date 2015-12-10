<?php
namespace AppBundle\DataFixtures\ORM\prod;

use AppBundle\Entity\Country;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;


class LoadCountriesData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        $countries = ['France', 'England', 'Czech Republic', 'Iceland', 'Austria', 'Northern Ireland', 'Portugal',
                      'Spain', 'Switzerland', 'Italy', 'Belgium', 'Wales', 'Romania', 'Albania', 'Germany', 'Poland',
                      'Russia', ' Slovakia', 'Croatia', 'Turkey' , 'Hungary', 'Republic of Ireland', 'Sweden', 'Ukraine'];

        $x = -1;
        foreach($countries as $x => $value) {
            $contryname = $value;
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