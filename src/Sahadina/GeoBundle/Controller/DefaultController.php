<?php

namespace Sahadina\GeoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{   
    /**
     * Get Restaurant
     */
	public function indexAction()
    {	
    	/**
    	 *  Get request params 
    	 */
    	$params = $this->getRequest()->attributes->all();
    	
    	$em 	= $this->getDoctrine()->getManager();
    	
    	$limit 	= $this->container->getParameter('limit_pagination_list');
    	$page 	=!empty($params['page'])  ? $params['page'] : 1;
    	$offset = 	($page * $limit) - $limit;
    	
    	/**
    	 * get site restaurant form BD order by date of creation
    	 * @param int $ofsset
    	 * @param int $limit
    	 * @param array $params 
    	 */
    	$response		= $em->getRepository('SahadinaRestaurantBundle:Restaurant')->getList($offset,$limit,$params);
    	
    	/**
    	 * calculate the parameters of pagination
    	 * @todo centralise this traitemnt to be used by order controller
    	 * 
    	 */
    	$last_page   	= ceil($response['total'] / $limit);
    	$previous_page  = $page > 1 ? $page - 1 : 1;
    	$next_page      = $page < $last_page ? $page + 1 : $last_page;
    	
    	/**
    	 * Render View
    	 */
    	return $this->render('SahadinaGeoBundle:Default:index.html.twig', array(
    			'restaurants' 	=> 	$response['restaurants'],
    			'last_page' 	=> 	$last_page,
    			'previous_page' => 	$previous_page,
    			'current_page'	=> 	$page,
    			'next_page' 	=> 	$next_page,
    			'total' 		=>	$response['total'],
    			'locale'		=>	!empty($params['_locale']) ? $params['_locale'] : $this->getRequest()->getLocale()
    	));
    }
    
    /**
     * return cities
     * @param int $city_id
     */
    public function citiesListAction($city_id= null)
    {
    	$em = $this->getDoctrine()->getManager();
    
    	$cities= $em->getRepository('SahadinaGeoBundle:City')->getCities();
    	
    	return $this->render('SahadinaGeoBundle:Default:citiesList.html.twig', array(
    			'currentCityId' => $city_id,
    			'cities'     => $cities
    	));
    }
    
}
