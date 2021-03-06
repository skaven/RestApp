<?php


namespace Gearbox\SecurityBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Gearbox\SecurityBundle\Entity\User;

class LoadUserData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        $userAdmin->setUsername('admin');
        $userAdmin->setEmail('alexander@odmedia.nl');
        $userAdmin->setPlainPassword('admin');
        $userAdmin->setEnabled(true);
        $userAdmin->addRole('ROLE_ADMIN');
        $userAdmin->addRole('ROLE_API');

        $alex = new User();
        $alex->setUsername('alex');
        $alex->setEmail('brouwer.alexander@gmail.com');
        $alex->setPlainPassword('alex');
        $alex->setEnabled(true);
        $alex->addRole('ROLE_API');

        $manager->persist($userAdmin);
        $manager->persist($alex);
        $manager->flush();
    }
} 