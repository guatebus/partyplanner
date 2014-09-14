<?php

namespace Party\Bundle\PublicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PartyPublicBundle:Default:index.html.twig', array('name' => $name));
    }
}
