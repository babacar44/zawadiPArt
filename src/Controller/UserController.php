<?php

namespace App\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractFOSRestController
{
    /**
     * @Route("/user", name="user")
     */
    public function index()
    {
        return [
            'message'=>"welcome to your controller",
            'path'=>'src/Controller/userController.php'
        ];
    }
}
