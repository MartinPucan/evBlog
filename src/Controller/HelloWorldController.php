<?php

namespace App\Controller;

use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloWorldController extends AbstractController
{
    /**
     * @Route("/", name="hello_world")
     * @throws Exception
     */
    public function index(): Response
    {
        $sortedUsers = $this->getSortedUsers();

        $number = rand(1, 100);

        return $this->render('helloworld/index.html.twig', [
            'number' => $number,
            'users' => $sortedUsers
        ]);
    }

    private function getSortedUsers(): array
    {
        $sortedUsers = $this->getUsers();

        uksort($sortedUsers, function (string $a, string $b): int {
            return $a <=> $b;
        });

        return $sortedUsers;
    }

    private function getUsers(): array
    {
        return [
            'John',
            'Joe',
            'Alan',
            'Frank',
            'Mark'
        ];
    }
}
