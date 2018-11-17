<?php
namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class HomeController extends AbstractController
{

/**
 * @Route("/", name = "home")
 * @return Response
 */



public function index():Response
{
  return $this->render('pages/home.html.twig');
}

}
