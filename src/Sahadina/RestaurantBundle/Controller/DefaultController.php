<?php
/**
 * 
 * @author achraf
 * @since 27 Mai 2014
 * @copyright Sahadina
 */

namespace Sahadina\RestaurantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
	/**
	 * Fiche Restaurant
	 */
    public function indexAction()
    {
        $params= $this->getRequest()->attributes->all();
		$em = $this->getDoctrine()->getManager();
		
        $restaurant = $em->getRepository('SahadinaRestaurantBundle:Restaurant')->find($params['id']);
        
        if (!$restaurant) {
        	throw $this->createNotFoundException('Unable to find Restaurant .');
        }
        $translate 		= $restaurant->getTranslations();
        $description 	= !empty($translate[$params['_locale']]) ? $translate[$params['_locale']]->getDescription():$translate['fr']->getDescription();
        $seo = $this->container->get('sonata.seo.page');
        $seo->setTitle($restaurant->getName())
	        ->addMeta('name', 	 'description',$description)
	        ->addMeta('property', 'og:title', $restaurant->getName())
	        ->addMeta('property', 'og:type', 'Annuaire')
	        ->addMeta('property', 'og:description', $description);
        	return $this->render('SahadinaRestaurantBundle:Default:index.html.twig', array('restaurant' => $restaurant));
    }
}
