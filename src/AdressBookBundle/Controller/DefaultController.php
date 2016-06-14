<?php

namespace AdressBookBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AdressBookBundle:Default:index.html.twig');
    }
}
