<?php

namespace Devcamp\Bundle\PlayerBundle\Controller;

use Devcamp\Bundle\PlayerBundle\Entity\Player;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Devcamp\Bundle\PlayerBundle\Form\PlayerType;

class UpdateController extends Controller
{
    public function editAction(Player $id, Request $request) {
        $form = $this->createForm(new PlayerType(), $id);

        $form->handleRequest($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($id);
            $em->flush();

            return $this->redirect($this->generateUrl('devcamp_player_list'));
        }

        return $this->render('DevcampPlayerBundle::add.html.twig',array(
            'form'=>$form->createView()
        ));
    }

    public function deleteAction(Player $id) {

        $em = $this->getDoctrine()->getManager();
        $em->remove($id);
        $em->flush();

        return $this->redirect($this->generateUrl('devcamp_player_list'));

    }
}