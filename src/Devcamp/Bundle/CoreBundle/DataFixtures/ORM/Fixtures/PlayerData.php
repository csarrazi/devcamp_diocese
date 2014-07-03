<?php

namespace Devcamp\Bundle\CoreBundle\DataFixtures\ORM\Fixtures;

use Devcamp\Bundle\CoreBundle\Manager\UserManager;
use Devcamp\Bundle\PlayerBundle\Entity\Player;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bridge\Doctrine\Tests\Fixtures\ContainerAwareFixture;

class PlayerData extends ContainerAwareFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager){

        $samples = array(
            array(
                'Hugo Lloris',
                'hugo.loris@gmail.com',
                '0678452345',
                'abcd'
            ),
            array(
                'Steve Mandanda',
                'steve.mandanda@gmail.com',
                '0678452345',
                'abcd'
            ),
        );

        foreach($samples as $sample) {
            list($username, $email, $cellphone, $password) = $sample;

            $player = new Player();

            $player->setUsername($username)
                ->setEmail($email)
                ->setCellphone($cellphone);

            $this
                ->container
                ->get('devcamp_core.user_manager')
                ->encodePassword($player, $password)
            ;

            $manager->persist($player);
        }
        $manager->flush();
    }

    public function getOrder(){
        return 1;
    }
}
