<?php

namespace Devcamp\Bundle\PlayerBundle\Controller;

use Devcamp\Bundle\PlayerBundle\Entity\Player;
use Devcamp\Bundle\PlayerBundle\Form\PlayerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CreateController extends Controller
{
    public function addAction(Request $request) {

        $player = new Player();
        $form = $this->createForm(new PlayerType, $player);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $this
                ->get('devcamp_core.user_manager')
                ->encodePassword($player, $form->get('password')->getData())
            ;

            $em = $this->getDoctrine()->getManager();
            $em->persist($player);
            $em->flush();

            return $this->redirect($this->generateUrl('devcamp_player_list'));
        }

        return $this->render('DevcampPlayerBundle::add.html.twig',
            array(
                'form'=>$form->createView(),
        ));
    }

    public function listAction() {

        $em         = $this->getDoctrine()->getManager();
        $players    = $em->getRepository('DevcampPlayerBundle:Player')->findAll();

        return $this->render('DevcampPlayerBundle:List:players.html.twig', array(
                'players' => $players,
            ));
    }
} 
