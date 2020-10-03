<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ConferenceController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $req)
    {
   /*     return $this->render('conference/index.html.twig', [
            'controller_name' => 'ConferenceController',
        ]);
    */
        $saludo='';
        if($name=$req->query->get('hello')){
            $saludo = sprintf('<h1>Hello %s</h1>', htmlspecialchars($name));
        }
        return new Response('<html><body>'.$saludo.'<img src="/images/under-construction.gif" /></body></html>');
    }
}
