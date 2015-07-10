<?php

namespace FindWorkerBundle\Controller;

use FindWorkerBundle\Entity\Project;
use FindWorkerBundle\Form\ProjectType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProjectController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
	{
		$em = $this->getDoctrine()->getManager();

        $project = new Project();

    	$form = $this->createForm(new ProjectType(), $project,
    		array(
	    		'attr' => array(
	    			'method'=> 'post',
	    			'novalidate' => "novalidate"
	    			//action de formulaire pointe vers cette même action de controller
			)
	    ));

		// gère la requête
	    $form->handleRequest($request);

	    // si mon formulaire est valide
        if($form->isValid())
        {
            //mettre en cache
	    	$em->persist($project);

	    	//enregistrer en bdd
	    	$em->flush();
	    	//return $this->redirectToRoute('find_worker_new');
            return $this->redirect($this->generateUrl('find_worker_profiles_list', array( 'languages' => $project->getSkills() )));
	    }
        return $this->render('FindWorkerBundle:Project:new.html.twig',
        ['form'=>$form->createView()]
        );
	}

    public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $listProject = $this->getDoctrine()->getRepository('FindWorkerBundle:Project')->findAll();

        return $this->render('FindWorkerBundle:Project:list.html.twig', array(
            'projects'=> $listProject
        ));
    }

    public function detailAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $detail =$em->getRepository('FindWorkerBundle:Project')->find($id);

        return $this->render("FindWorkerBundle:Project:detail.html.twig", array(
            'project' => $detail
        )
        );
    }

    public function editAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $project = $em->getRepository('FindWorkerBundle:Project')->find($id);
        $form = $this->createForm(new ProjectType(), $project,
            array(
                'attr' => array(
                    'method'=> 'post',
                    'novalidate' => "novalidate"
                    //'action' => $this->generateUrl('store_frontend_prject_')
                    //action de formulaire pointe vers cette même action de controller

                )
            ));


        // gère la requête
        $form->handleRequest($request);

        // si mon formulaire est valide
        if($form->isValid())
        {
            //mettre en cache
            $em->persist($project);

            //enregistrer en bdd
            $em->flush();
            return $this->redirectToRoute('find_worker_project_list');


        }
        return $this->render("FindWorkerBundle:Project:edit.html.twig",
            [
                'form' => $form->createView(),
                'project' => $project
            ]
        );
    }

    public function removeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $project =$em->getRepository('FindWorkerBundle:Project')->find($id);

        $em->remove($project);
        $em->flush();

        //créer un message flash
//		$this->get('session')->getFlashBag->add(
//			'notice',
//			'Votre produit a bien été supprimé'
//		);

        return $this->redirectToRoute('find_worker_project_list');
    }
}