<?php

namespace ActEnv\actualiteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use ActEnv\actualiteBundle\Entity\Actualite;


class LoadActualitedata implements FixtureInterface
{
    public function load($manager)
    {

        $lorem = <<<LOREM
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque mattis ligula ut nibh blandit ac faucibus ipsum euismod. Nulla facilisi. Donec pharetra ipsum ac tortor vehicula vitae ultricies dolor pellentesque. Aenean vel est leo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer viverra sodales eros, eu gravida arcu sollicitudin eget. Sed malesuada felis in dui fermentum non vulputate ante scelerisque. Aenean imperdiet ultricies urna, ac vulputate dui pellentesque ut. Praesent nec ipsum velit. Nulla facilisi. Sed vitae nibh diam, at consectetur lectus.
LOREM;


        $actualite0 = new Actualite();
        $actualite0->setTitle('une nouvelle nouvelle');
        $actualite0->setText($lorem);
        $actualite0->setIsOnline(true);
        $actualite0->setPublicationDate(new \DateTime());

        $actualite1 = new Actualite();
        $actualite1->setTitle('une nouvelle nouvelle pas en ligne');
        $actualite1->setText($lorem);
        $actualite1->setIsOnline(false);
        $actualite1->setPublicationDate(new \DateTime());

        $manager->persist($actualite0);
        $manager->persist($actualite1);

        $manager->flush();
    }
}
