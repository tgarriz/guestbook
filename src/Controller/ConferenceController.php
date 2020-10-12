<?php

namespace App\Controller;

use Twig\Environment;
use App\Entity\Conference;
use App\Repository\CommentRepository;
use App\Repository\ConferenceRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ConferenceController extends AbstractController
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(ConferenceRepository $conferenceRepository)
    {
        return new Response($this->twig->render('conference/index.html.twig',
            [
                'conferences'=>$conferenceRepository->findAll(),
            ]));
    }

    /**
     * @Route("/conference/{id}", name="conference")
     */
    public function show(Conference $conference,CommentRepository $commentRepository)
    {
        return new Response($this->twig->render('conference/show.html.twig',
                [
                    'conference'=>$conference,
                    'comments'=>$commentRepository->findBy(['conference'=>$conference])
                ]));
    }
    
}
