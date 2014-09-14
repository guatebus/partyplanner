<?php

namespace Party\Bundle\PublicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('PartyPublicBundle:Default:index.html.twig', array('name' => 'temp'));
    }
}
