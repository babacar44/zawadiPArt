<?php

namespace App\Controller;

use App\Form\ChildType;
use App\Repository\ChildRepository;
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
class ChildController extends AbstractController
{
    /**
     * @Route("/child",  methods={"GET"})
     */
    public function index(ChildRepository $childRepository, SerializerInterface $serializer)
    {
       $all =  $childRepository->selectAll();

       $data = $serializer->serialize($all, 'json',['groups'=>['child']]);
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
     * @Route("/child/{id}",  methods={"GET"})
     */
    public function show(ChildRepository $childRepository, $id, SerializerInterface $serializer)
    {
       $trouver =  $childRepository->selectOne($id);

       if (!$trouver) {
           # code...
           return new JsonResponse([
            'msg'=> 'id Not Found',
            
        ],404);
       }

       $data = $serializer->serialize($trouver, 'json',['groups'=>['child']]);

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
     * @Route("/child_edit/{id}", methods={"PUT"})
     */
    public function edit(Request $request, $id,ChildRepository $childRepository)
    {
        $trouver =$childRepository->find($id);
            
                dump($trouver);die();

        if (!$trouver) {
            return new JsonResponse([
                'msg'=> 'id Not Found',
                
            ],404);
        }

        $form = $this->createForm(ChildType::class, $trouver);
        $data=json_decode($request->getContent(),true);//si json

        if(!$data){
            $data=$request->request->all();//si non json
        }
       $form->handleRequest($request);
       $form->submit( (object)$data);
      //  dump($data);die();


       if ($form->isSubmitted() ) {
            $doctrine = $this->getDoctrine()->getManager();
            
            $doctrine->persist( (object)$data);
           // dump($data);die();
            $doctrine->flush();

            return new JsonResponse([
                'msg'=> 'success Updated',
                
            ],200);
        }

    }

   
}
