<?php

namespace FindWorkerBundle\Controller;

use FindWorkerBundle\Entity\SearchProfile;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends Controller
{

    public function searchAction(Request $request) {

        $searchProfile = new SearchProfile();
        $form = $this->createFormBuilder($searchProfile)
            ->add('Skills', 'text', array(
                'attr' => array(
                    'placeholder' => 'Ajoutez une compétence',
                    'class' => 'add-competence-input'
                )
                ))
            ->add('Valider', 'submit')
            ->getForm();

        $form->handleRequest($request);

        //var_dump($request);

        if($form->isValid())
        {
            //return $this->redirectToRoute('find_worker_profiles_list', $languages);
            return $this->redirect($this->generateUrl('find_worker_profiles_list', array( 'languages' => $searchProfile->getSkills() )));

        }
        
        return $this->render('FindWorkerBundle:Profile:search.html.twig', ['form'=>$form->createView()]);
    }

    public function listAction(Request $request, $languages) {
        
        $arrLanguages = explode(",", $languages);
        $skills = implode("+", $arrLanguages);
        
        $client = new \Github\Client();
        $client->authenticate("valeriemontoya90", "babar91", "http_password");
        $client->setOption('api_limit', 5000);

        $tmp = [];
        $users = [];
        $ranking = [];

        $profiles = $client->api('search')->users('language:'+$skills);

        foreach($profiles["items"] as $key => $value) {
            $levelOfPerformance = 0;
            
            //get infos' user
            $username = $value["login"];
            $user = $client->api('user')->show($username);

            //Algorithme
            if ( isset($user["email"]) ) {
                $levelOfPerformance += 30;
            }
            if ( isset($user["avatar_url"]) ) {
                $levelOfPerformance += 30;
            }
            if ( isset($user["followers"]) ) {
                $levelOfPerformance += $user["followers"]*20;
            }
            if ( isset($user["public_repos"]) ) {
                $levelOfPerformance += $user["public_repos"]*50;
            }
            if ( isset($user["location"]) ) {
                $levelOfPerformance += 5;
            }

            $ranking[$levelOfPerformance] = array( "user" => $user ,  "levelOfPerformance" => $levelOfPerformance);
        }

        
        krsort($ranking);

        foreach($ranking as $key => $value) {
            $users[] = $value['user'];
        }
        
        return $this->render('FindWorkerBundle:Profile:list.html.twig', array('users' => $users));
    }

    public function detailAction(Request $request, $login) {

        $client = new \Github\Client();
        $client->authenticate("Lonelie", "Uremindme22", "http_password");
        $user = $client->api('user')->show($login);

        return $this->render('FindWorkerBundle:Profile:detail.html.twig', array('user' => $user));
    } 
}
