<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="app_home")
     */
    public function index(Request $request)
    {
        if($this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('admin');
        }
        if($this->isGranted('ROLE_USER')) {
            /*            if(! is_null($this->getUser())){
                            echo "<br>";
                            echo " id: ".$this->getUser()->getId();
                            echo " roles :   ";
                            print_r($this->getUser()->getRoles());
                            die();
                        }*/
            return $this->redirectToRoute('app_home');
        }
        return $this->render('home/index.html.twig');

    }
}
