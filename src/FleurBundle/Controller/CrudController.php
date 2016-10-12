<?php

namespace FleurBundle\Controller;

use FleurBundle\Entity\Bouquet;
use FleurBundle\Form\BouquetType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class CrudController extends Controller{
    /**
     * @Route("/admin", name="admin")
     * @Template("FleurBundle:Default:Admin.html.twig")
     */
    public function getBouquet(){
        $em = $this->getDoctrine()->getEntityManager();
        $bouquet = $em->getRepository("FleurBundle:Bouquet")->findAll();
        return array("varBouquet" => $bouquet);
    }
    
    /**
     * @Route("/admin/formAjout", name="formAjout")
     * @Template("FleurBundle:Default:ajout.html.twig")
     */
    public function formAddBouquet(){
        $f = $this->createForm(BouquetType::class, new Bouquet());
        return array("formAddBouquet" => $f->createView());
    }

    /**
     * @Route("/admin/bouquet/add", name="valid")
     */
    public function addBouquet(Request $request) {
        $addBouquet = new Bouquet();
        $f = $this->createForm(BouquetType::class, $addBouquet);
        $f->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $em->persist($addBouquet);
        $em->flush();

        return $this->redirect($this->generateUrl('admin'));
    }
    
    /**
     * @Route("/admin/bouquet/supr/{id}", name="suprBouquet")
     */
    public function deleteBouquet($id) {
        $em = $this->getDoctrine()->getEntityManager();
        $getId = $em->find("FleurBundle:Bouquet", $id);
        $em->remove($getId);
        $em->flush();
        
        return $this->redirect($this->generateUrl('admin'));
    }
    
    /**
     * @Route("admin/bouquet/edit/{id}", name="editBouquet")
     * @Template("FleurBundle:Default:edit.html.twig")
     * 
     */
    public function editBouquet($id,  Bouquet $up){
        //on retourne un formulaire avec les valeurs existantes de l'instance avec l'id correspondant. 
        return array("formBouquet" => $this->createForm(BouquetType::class, $up)->createView(),'id'=>$id);
    }
    
     
   /**
    * @Route("admin/bouquet/update/{id}",name="modifBouquet")
    */
   public function  uptdateBouquet(Request $request , Bouquet $up){
        $em = $this->getDoctrine()->getManager();
        
        $f= $this->createForm(BouquetType::class,$up);
        $f->handleRequest($request);
        
        if($f->isValid())
        {
        
        $em->merge($up);
        $em->flush();
        }
        
        return $this->redirectToRoute('admin');
   }
}
