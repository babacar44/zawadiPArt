<?php

namespace App\Controller;

use App\Entity\Missing;
use App\Form\MissingType;
use App\Repository\MissingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/api")
 */
class MissingController extends AbstractController
{
    /**
     * @Route("/missing_show", name="missing_index", methods={"GET"})
     */
    public function index(MissingRepository $missingRepository, SerializerInterface $serializer)
    {
        $missing = $missingRepository->findAll();
        $data = $serializer->serialize($missing, 'json');

       // dump($data);die();
       return new Response(
        $data,
        200,
        [
            'Content-Type' => 'application/json'
        ]
    );
    }

    /**
     * @Route("/missing_show_One/{id}", name="missing_index", methods={"GET"})
     */
    public function chercher(MissingRepository $missingRepository, SerializerInterface $serializer,$id)
    {


        $missing = $missingRepository->find($id);

        if (!$missing) {
            return new JsonResponse([
                'msg'=> 'id Not Found',
                
            ],404);
        }
        $data = $serializer->serialize($missing, 'json');

       // dump($data);die();
       return new Response(
        $data,
        200,
        [
            'Content-Type' => 'application/json'
        ]
    );
    }

    /**
     * @Route("/missing_new", methods={"POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager, SerializerInterface $serializer,ValidatorInterface $validator)
    {
        $missing = new Missing();
        $form = $this->createForm(MissingType::class, $missing);
        $form->handleRequest($request);
        $data = json_decode($request->getContent(), true);
        $data = $request->request->all();
        $form->submit($data);


       //  dump($missing);die();
        if ($form->isSubmitted()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($missing);
            $entityManager->flush();

            $data = [
                'status' => 201,
                'message' => 'Donnee bien ajoutée'
            ];

            return new JsonResponse($data, 201);

        }

        $data = [
            'status' => 500,
            'message' => 'Donnee non ajoutée'
        ];

        return new JsonResponse($data, 201);

    }


    /**
     * @Route("/missing_edit/{id}",  methods={"PUT"})
     */
    public function uptadeAction(Request $request,MissingRepository $missingRepository,$id)
    {
       // $data = $request->getContent();
       // parse_str($data, $data_arr);
        $trouver = $missingRepository->find($id);
            

        if (!$trouver) {
            return new JsonResponse([
                'msg'=> 'id Not Found',
                
            ],404);
        }

        $form = $this->createForm(MissingType::class, $trouver);
        $data=json_decode($request->getContent(),true);//si json

        if(!$data){
            $data=$request->request->all();//si non json
        }
        $form->handleRequest($request);
        $form->submit($data);
       // dump($data);die();


        if ($form->isSubmitted() ) {
            $doctrine = $this->getDoctrine()->getManager();
            $doctrine->persist($trouver);
            $doctrine->flush();

            return new JsonResponse([
                'msg'=> 'sucess Updated',
                
            ],200);
        }

       
    }

}
