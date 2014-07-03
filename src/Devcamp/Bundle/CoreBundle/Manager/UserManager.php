<?php

namespace Devcamp\Bundle\CoreBundle\Manager;

use Devcamp\Bundle\CoreBundle\Entity\User;
use Psr\Log\LoggerInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class UserManager
{
    private $factory;
    private $logger;

    public function __construct(EncoderFactoryInterface $factory, LoggerInterface $logger)
    {
        $this->factory = $factory;
        $this->logger = $logger;
    }

    public function encodePassword(User $user, $newPassword)
    {
        $encoder = $this->factory->getEncoder($user);

        $salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);

        $user->setSalt($salt);

        $user->setPassword($encoder->encodePassword($newPassword, $salt));

        $this->logger->info(sprintf('Encoded password for user %s', $user->getUsername()));
    }
}
