<?php

namespace App\Controller;
use App\Entity\Register;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GymsoController extends AbstractController
{
    /**
     * @Route("/", name="gymso")
     */
    public function index(): Response
    {
        return $this->render('gymso/index.html.twig'); 
        
    }

        /**
     * @Route("/class", name="class")
     */
    public function class(): Response
    {
        return $this->render('gymso/class.html.twig'); 
        
    }

    
        /**
     * @Route("/register", name="register")
     */
    public function register(): Response
    {
        return $this->render('gymso/register.html.twig'); 

        
        
    }




            /**
     * @Route("/register/new", name="register_new")
     * method({ "POST"})
     */
    public function register_new(Request $request)
    {
        $register = new register();
        $form = $this->createFormBuilder($register)
        ->add('cf_name', TextType::class)
        ->add('cf_email', TextType::class)
        ->add('cf_phone', TextType::class)
        ->add('cf_message', TextType::class)
        ->add('submit', SubmitType::class)
        ->getForm();

        
        if($request->isMethod('POST')) {
            $form->handleRequest($request);
            if($form-> isValid()){
                
                $em = $this->getDoctrine()->getManager();
                $em->persist($register);
                $em->flush();
                $request->getSession()->getFlashBag()->add('notice', 'you are a new member');
            //    return $this->redirectToRoute('voir',array('id' => $register->getId())); 
            }
        }
   
        return $this->render('gymso/register_new.html.twig' ,array('form' => $form->createView()));
        }


        /**
         * @Route ("/voir/{id}", name="voir", requirements={"id"="\d+"})
         */
        public function voir($id){
            $repository = $this->getDoctrine()>getManager()->getRepository(register::class);
            $register= $repository->find($id);
            if(null===$register){
                throw new NorFoundException("le job ayant l'id ".$id. " n'esxiste pas");

            }
            return $this->render('gymso/registered.html.twig', ['register' => $register]);
        }


        
        /**
     * @Route("/schedule", name="schedule")
     */
    public function schedule(): Response
    {
        return $this->render('gymso/schedule.html.twig'); 
        
    }

    /**
    * @Route("/contact", name="contact")
    */
    public function contact(): Response
    {
        return $this->render('gymso/contact.html.twig'); 
        
    }





}
