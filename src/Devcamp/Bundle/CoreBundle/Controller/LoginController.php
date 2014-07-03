<?php

namespace Devcamp\Bundle\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;

class LoginController extends Controller
{
    public function loginAction(Request $request)
    {
        $session = $request->getSession();
        if ($username = $session->get(SecurityContextInterface::LAST_USERNAME)) {
            $session->remove(SecurityContextInterface::LAST_USERNAME);
        }

        if ($error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR)) {
            $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
        }

        return $this->render('DevcampCoreBundle:Login:login.html.twig', array(
            'username' => $username,
            'error'    => $error,
        ));
    }
}
