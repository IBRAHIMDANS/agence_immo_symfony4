<?php
namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class  PropertyController extends AbstractController
{
    /**
     * @var PropertyRepository
     */
    private $repository;

    public function  __construct(PropertyRepository $repository, ObjectManager $manager)
    {
        $this->repository = $repository;
        $this->manager = $manager;
    }


    /**
     * @Route("/biens" , name = "property.index")
     * @return Response
     */
    public function index(): Response
    {
        
        return  $this->render("property/index.html.twig",['menu' => 'properties']);
    }
}