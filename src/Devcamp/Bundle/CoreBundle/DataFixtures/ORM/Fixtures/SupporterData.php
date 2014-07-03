<?php

namespace Devcamp\Bundle\CoreBundle\DataFixtures\ORM\Fixtures;

use Devcamp\Bundle\SupporterBundle\Entity\Supporter;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bridge\Doctrine\Tests\Fixtures\ContainerAwareFixture;

class SupporterData extends ContainerAwareFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager){

        $samples = array(
            array(
                'user',
                'hugo.loris@gmail.com',
                '0678452345',
                'abcd'
            ),
            array(
                'User2',
                'steve.mandanda@gmail.com',
                '0678452345',
                'abcd'
            ),
        );

        foreach($samples as $sample) {
            list($username, $email, $cellphone, $password) = $sample;

            $supporter = new Supporter();
            $supporter->setUsername($username)
                ->setEmail($email)
                ->setCellphone($cellphone);
            $this
                ->container
                ->get('devcamp_core.user_manager')
                ->encodePassword($supporter, $password)
            ;

            $manager->persist($supporter);
        }
        $manager->flush();
    }

    public function getOrder(){
        return 2;
    }
}
