<?php

namespace Devcamp\Bundle\SupporterBundle\Controller;

use Devcamp\Bundle\SupporterBundle\Entity\Address;
use Devcamp\Bundle\SupporterBundle\Entity\SupporterAddress;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CreateAddressController extends Controller
{
    public function addAction()
    {
        $em = $this->getDoctrine()->getManager();

        $supporter = $em->getRepository('DevcampSupporterBundle:Supporter')->findOneBy(array(
            'email' => 'hugo.loris@gmail.com'
        ));

        $address            = new Address();
        $supporterAddress   = new SupporterAddress();

        $supporterAddress->setAddress($address);
        $supporterAddress->setSupporter($supporter);

        return $this->render('::base.html.twig');
    }

    public function listAction(){
        return $this->render('::base.html.twig');
    }
}
