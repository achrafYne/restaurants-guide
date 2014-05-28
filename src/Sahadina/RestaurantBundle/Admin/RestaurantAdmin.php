<?php
/**
 * 
 * @author achraf
 * @since 26 Mai 2014
 * @copyright sahadina
 */
namespace Sahadina\RestaurantBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Symfony\Component\Validator\Constraints\MaxLength;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class RestaurantAdmin extends Admin{
	// setup the defaut sort column and order
	protected $datagridValues = array(
			
	);
	/**Preview Mode is an optional view of an object before it is persisted or updated.*/
	public $supportsPreviewMode = true;
	
	protected function configureFormFields(FormMapper $formMapper)
	{
		
		$subject = $this->getSubject();
		$id = $subject->getId();
		$formMapper
			->with('Translation',array('collapsed'=>true))
				->add(
		            'translations', 'a2lix_translations')
		->with('Infos Générales',array('collapsed'=>true))
			->add('logo', 'sonata_type_model_list', 
					array('required' => false), 
					array('allow_delete' => true,
						  'link_parameters'   => array('context' => 'restaurant')))
			->add('categories')
			->add('isActivated')
		->with('coordonnées')
			->add('city')
			->add('address')
			->add('zipCode')
			->add('telephone')
			->add('email')
			->add('siteWeb')
			->add('longitude')
			->add('latitude')
          ->with('Tarifs')
            ->add('minPrice')
            ->add('maxPrice')
            ->add('currency')
            ->end()
        ->with('Social')
            ->add('facebook')
            ->add('twitter')
            ->add('youtube')
            ->end() ;
            parent::configureFormFields($formMapper);
		}
	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper
		->add('isActivated')
		->add('city')
		->add('categories');
	}
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
		->addIdentifier('name')
		->add('logo', 'string', array('template' => 'SonataMediaBundle:MediaAdmin:list_image.html.twig'))
		->add('isActivated')
		->add('city')
		->add('categories')
		->add('createdAt')
		->add('updatedAt')
		->add('createdBy')
		->add('updatedBy')
		->add('_action', 'actions', array(
				'actions' => array(
						/*'view' => array(),*/
						'edit' => array(),
						'delete' => array(),
				)
		));
	}
	/**
	 * 
	 * @param Sahadina\RestaurantBundle\Entity\Restaurant $restaurant
	 */
	public function prePersist($restaurant)
	{	
			$this->_beforeSave($restaurant,'prePersist');
	}
	
	/**
	 *
	 * @param Sahadina\RestaurantBundle\Entity\Restaurant $restaurant
	 */
	public function preUpdate($restaurant)
	{
		$this->_beforeSave($restaurant,'preUpdate');
	}
	
	/**
	 * Set  CreatedBy/UpdatedBy
	 * @param Sahadina\RestaurantBundle\Entity\Restaurant $restaurant
	 */
	protected function _beforeSave($restaurant,$methode){
		/* set media restaurant  */
		if($restaurant->getLogo()){
			$restaurant->getLogo()->setRestaurant($restaurant);
		}
		/**
			Get Current User
		 */
		$container= $this->getConfigurationPool()->getContainer();
		$securityContext = $container->get('security.context');
		$user= $securityContext->getToken()->getUser();
		
		if($methode=='preUpdate'){
			$restaurant->setUpdatedBy($user);
		}
		if($methode=='prePersist'){
			$restaurant->setCreatedBy($user);
		}
	}
	
	/**
	 * @see \Sonata\AdminBundle\Admin\Admin::getNewInstance()
	 */
	 
	public function getNewInstance()
	{
		$class = $this->getClass();
	
		return new $class('', array());
	}
}