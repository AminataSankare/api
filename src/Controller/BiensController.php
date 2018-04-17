<?php

namespace App\Controller;

use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use App\Entity\Localite;
use App\Entity\Bien;
use App\Entity\Client;
use App\Entity\Image;
use App\Entity\Images;

use App\Entity\Reservation;
use Symfony\Component\PropertyAccess\PropertyAccess;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

   
class BiensController extends Controller
{
    /**
     * @Route("/api", name="api")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ApiController.php',
        ]);
    }

    /**
     * Lists all Biens
     * @FOSRest\Get("/api/biens")
     *
     * @return array
     */
    public function getBienAction( Request $request)
    {

        $repository = $this->getDoctrine()->getRepository(Images::class);
        // $repository = $this->getDoctrine()->getRepository(Image::class);

        // query for a single Product by its primary key (usually "id")
        $bien = $repository->findAll();

     /*   foreach($bien as $key=>$values){
            foreach($values->getImage() as $key1=>$images){ 
                $images->setImage(base64_encode(stream_get_contents($images->getImage())));
            }
        }*/

        if ($request->isMethod('POST')) {
            if ($_POST['localite'] != '' && $_POST['typebien'] != '' && $_POST['prixLocation'] != ''  ) {
                $listbien = $repository->findByValues($_POST['localite'], $_POST['typebien'],$_POST['prixLocation']);   
            }

        }

        if(!count($bien)){
            $response =array(
                "code"=>false,
                "msg"=>"liste des biens",
                "error"=>null,
                "data"=>null,

            );
            return new JsonResponse($response);
        }  

        $data = $this->get('jms_serializer')->serialize($bien, 'json'); 

            $response =array(
                "code"=>true,
                "msg"=>"liste des client",
                "error"=>null,
                "data"=>json_decode($data)
            );
            return new JsonResponse($response,Response::HTTP_OK  );

    }

    /**
     * Listes all Biens
     * @FOSRest\Get("/api/listbiens")
     *
     * @return array
     */
    public function listBienAction()
    {
        $em = $this->getDoctrine()->getManager();

        $listeReservations = $em->getRepository('App:Images')->findBien();

        $data = $this->get('jms_serializer')->serialize($listeReservations, 'json');
        if (!empty($listeReservations)) {
            $requete = array(
                'code' => 1,
                'message' => '',
            );

            $response = new Response($data);
            $response->headers->set('Content-Type', 'application/json');

            return $response;

        } else {
            $requete = array(
                'code' => 0,
                'message' => 'Aucun bien',
            );

            return new JsonResponse($requete, Response::HTTP_CREATED);

        }
       /*  return $this->render('biens/listBien.html.twig', [
            'controller_name' => 'BiensController',
        ],array('json' => $data ));*/

    }

    /**
     * Listes all Biens
     * @FOSRest\Get("/api/detailsbiens/{id}")
     *
     * @return array
     */
    public function detailAction($id)
    {
        if (!empty($id)){
        $detailBien = $this
        ->getDoctrine()
        ->getManager()
        ->getRepository('App:Images')
        ->find($id);
        //echo count($detailreservation);
     $data = $this->get('jms_serializer')->serialize($detailBien, 'json');
        if (!empty($detailBien) ) {
            $requete = array(
                'code' => 1,
                'message' => '',
            );

            $response = new Response($data);
            $response->headers->set('Content-Type', 'application/json');

            return $response;

        } else {
            $requete = array(
                'code' => 0,
                'message' => 'Aucun bien',
            );

            return new JsonResponse($requete, Response::HTTP_CREATED);

            }
        }
        else{

        }

    }

    /**
     * Listes all Biens
     * @FOSRest\Get ("/api/reserve")
     *
     * @return array
     */
      public function ListeReservationAction(Request $request)
    {


          $em = $this->getDoctrine()->getManager();

        $listeReservations = $em->getRepository('App:Reservation')->findAll();

        $data = $this->get('jms_serializer')->serialize($listeReservations, 'json');
        if (!empty($listeReservations)) {
            $requete = array(
                'code' => 1,
                'message' => '',
            );

            $response = new Response($data);
            $response->headers->set('Content-Type', 'application/json');

            return $response;

        } else {
            $requete = array(
                'code' => 0,
                'message' => 'Aucun bien',
            );

            return new JsonResponse($requete, Response::HTTP_CREATED);

        }


    }


    /**
     * faire une reservation.
     * @FOSRest\Get("/api/localite")
     *
     * @return array
     */
    public function LocaliteAction(){
        $em = $this->getDoctrine()->getManager();

        $listeLocalite = $em->getRepository('App:Localite')->findAll();

        $data = $this->get('jms_serializer')->serialize($listeLocalite, 'json');
        if (!empty($listeLocalite)) {
            $requete = array(
                'code' => 1,
                'message' => '',
            );

            $response = new Response($data);
            $response->headers->set('Content-Type', 'application/json');

            return $response;

        } else {
            $requete = array(
                'code' => 0,
                'message' => 'Aucun bien',
            );

            return new JsonResponse($requete, Response::HTTP_CREATED);

    }
}
/**
     * faire une reservation.
     * @FOSRest\Get("/api/typeBien")
     *
     * @return array
     */
    public function TypeBienAction(){
        $em = $this->getDoctrine()->getManager();

        $listeLocalite = $em->getRepository('App:TypeBien')->findAll();

        $data = $this->get('jms_serializer')->serialize($listeLocalite, 'json');
        if (!empty($listeLocalite)) {
            $requete = array(
                'code' => 1,
                'message' => '',
            );

            $response = new Response($data);
            $response->headers->set('Content-Type', 'application/json');

            return $response;

        } else {
            $requete = array(
                'code' => 0,
                'message' => 'Aucun bien',
            );

            return new JsonResponse($requete, Response::HTTP_CREATED);

    }
}


    /**
     *lister les biens par localité
     *@FOSRest\Get("/api/listeLocalite/{id}")
     *
     *@return array
     */
    public function TrouverLocaliteAction($id){
         if (!empty($id)){
        $trouve = $this
        ->getDoctrine()
        ->getManager()
        ->getRepository('App:Bien')
        ->findBy(array('localite'=>$id));
         foreach ($trouve as $trouve) {
                
                 $bien = $trouve->getId();
        $resultat = $this->getDoctrine()->getManager()->getRepository('App:Images')->findBy(array('bien'=>$bien));
       echo count($resultat);
        foreach ($resultat as $resultats) {
   // echo $resultats;

    $data = $this->get('jms_serializer')->serialize($resultats, 'json');
        if (!empty($resultats) ) {
            $requete = array(
                'code' => 1,
                'message' => '',
            );

            $response = new Response($data);
            $response->headers->set('Content-Type', 'application/json');

            return $response;

        } else {
            $requete = array(
                'code' => 0,
                'message' => 'Aucun bien',
            );

            return new JsonResponse($requete, Response::HTTP_CREATED);

            }
        }
         /*$data = $this->get('jms_serializer')->serialize($bien, 'json');
        if (!empty($bien) ) {
            $requete = array(
                'code' => 1,
                'message' => '',
            );

            $response = new Response($data);
            $response->headers->set('Content-Type', 'application/json');

            return $response;

        } else {
            $requete = array(
                'code' => 0,
                'message' => 'Aucun bien',
            );

            return new JsonResponse($requete, Response::HTTP_CREATED);

            }*/
        }
}
       
        //echo count($detailreservation);
    
        else{

        }
    }
   
    /**
     * faire une reservation.
     * @FOSRest\Post("/api/reservations/{id}")
     *
     * @return array
     */
    public function ReservationSAction(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
 //       $idBien = $request->get('idbien');
       //$idClient = $request->get('idclient');
        $idBien = $em->getRepository(Bien::class)->find($id);
        

 if (!empty($idBien)){
    //$idbien = $request->get('idBien');
    echo $idBien;
    //echo $idbien;
     
            $donnees = $request->get('_client');
            if(!empty($donnees))
            {
                $newClient = new Client();
                $newClient->setNomComplet($donnees['_nom_complet']);
                // $newClient->setPrenom($donnees['prenom']);
                $newClient->setNumPiece($donnees['num_piece']);
                $newClient->setTel($donnees['tel']);
                $newClient->setAdresse($donnees['adresse']);
                $newClient->setEmail($donnees['email']);
                $newClient->setPassword($donnees['password']);
            
                $em->persist($newClient);
                $em->flush();



                $idclient = $newClient->getId();
                $num = $newClient->getNumPiece();

             $idClient = $this->getDoctrine()->getManager()->getRepository('App:Client')->find($idclient);
            }
        
        
       
        $em = $this->getDoctrine()->getManager();
       
        $client = $em->getRepository(Client::class)->find($idClient);
        $idbien = $em->getRepository(Bien::class)->find($idBien);
       
echo $idbien;
        $reserve = new Reservation();
        //$reserve->setDateReservation(new \DateTime());
        $date = date('Y-m-d');
        $reserve->setDateReservation($date);
        $reserve->setEtat(0);
        $reserve->setBien($idbien);
        $reserve->setClient($client);
        $em->persist($reserve);
        $em->flush();

        $donnees= array(
            'code' => 1,
            'message' => 'sucess',
            'bien' => json_decode($this->get('jms_serializer')->serialize($reserve, 'json'))
        );
        return new JsonResponse($donnees, Response::HTTP_OK ); 
        

 }
 else { if (empty($idBien) || empty($client)) {
            $donnees= array(
                'code' => 0,
                'message' => 'error',
                'bien' => null
            );
            $response= new JsonResponse($donnees, 404);
        }

       
    }
 }

}