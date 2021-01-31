<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/test', name: 'test')]
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->getConnection()->connect();
        $connected = $em->getConnection()->isConnected();
        dd($connected);
        $users = [
            'Timmy',
            'Sasha',
            'Andrey',
        ];

        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
            'users' => $users,
        ]);
    }
}
