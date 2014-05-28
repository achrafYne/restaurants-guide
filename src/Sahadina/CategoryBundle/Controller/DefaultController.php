<?php
/**
 * 
 * @author achraf
 * @since 27 Mai 2014
 * @copyright Sahadina
 */
namespace Sahadina\CategoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {	die('here');
        return $this->render('SahadinaCategoryBundle:Default:index.html.twig', array('name' => $name));
    }
    
    /**
     * get list of categories
     */
    public function categoriesListAction($currentCategory=null){
    
    	$em = $this->getDoctrine()->getManager();
    	
    	$categories= $em->getRepository('SahadinaCategoryBundle:Category')->findAll();
    	return $this->render('SahadinaCategoryBundle:Default:categoriesList.html.twig', array(
    			'currentCategory' => $currentCategory,
    			'categories'     => $categories
    	));
    	
    }
}
