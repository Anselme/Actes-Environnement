<?php

namespace ActEnv\actualiteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use ActEnv\actualiteBundle\Entity\Actualite;


class LoadActualitedata implements FixtureInterface
{
    public function load($manager)
    {
        $actualite0 = new Actualite();
        $actualite0->setTitle('une nouvelle nouvelle');
        $actualite0->setText('blab bla bla la');

        $actualite1 = new Actualite();
        $actualite1->setTitle('une nouvelle nouvelle');
        $actualite1->setText('blab bla bla la');

        $manager->persist($actualite0);
        $manager->persist($actualite1);

        $manager->flush();
    }
}
