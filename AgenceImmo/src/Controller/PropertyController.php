<?php
namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Property;
use App\Entity\PropertySeach;
use App\Form\ContactType;
use App\Notification\ContactNotification;
use App\Repository\PropertyRepository;
use App\Form\PropertySearchType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;
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
    public function index(PaginatorInterface $paginator, Request $request): Response
    {
$search = new PropertySeach();
$form= $this->createForm(PropertySearchType::class,$search);
$form->handleRequest($request);
        $properties = $paginator->paginate(
         $this->repository->findAllVisibleQuery($search),
         $request->query->getInt('page',1),
          15
        );
        return  $this->render("property/index.html.twig",['menu' => 'properties',
            'allitems' => $properties,
            'forms' => $form->createView()]);
    }

    /**
     * @Route("/biens/{slug}-{id}",name  = "property.show", requirements={"slug" : "[a-z0-9\-]*" })
     * @param Property $property
     * @return Response
     */
    public function show(Property $property, string $slug, Request $request, ContactNotification $notification):Response
    {

    if ($property->getSlug() !== $slug){
       return $this->redirectToRoute('property.show',[
            'id' => $property->getId(),
        'slug' => $property->getSlug()
        ],301);
    }
        $contact = new Contact();
        $contact->setProperty($property);
        $form= $this->createForm(ContactType::class,$contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $notification->notify($contact);
            $this->addFlash('success','votre email a été envoyé');
//            return $this->redirectToRoute('property.show',[
//                'id' => $property->getId(),
//                'slug'=>$property->getSlug()
//            ]);
        }
        return $this->render('property/show.html.twig',[
            'menu' => 'properties',
            'property' => $property,
            'form' => $form->createView()
        ]);
    }
}