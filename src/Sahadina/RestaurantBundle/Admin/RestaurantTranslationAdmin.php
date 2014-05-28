<?php
/**
 * 
 * @author achraf
 * @since 26 Mai  2014
 * @copyright Sahadina
 */
namespace Sahadina\RestaurantBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

class RestaurantTranslationAdmin extends Admin {
	
	/* Languages  */
	protected $_locales=array('fr','en','es');
	
	/* Translate fields*/
	
	protected $_fields=array('name','description','url');
	
	/**
	 * Configure the list
	 * @param \Sonata\AdminBundle\Datagrid\ListMapper $list
	 */
	protected function configureListFields(ListMapper $list) {
		
		
		$list
			->addIdentifier('field', 'choice',array ('label' => 'Champ' ,'choices' => $fields),array('choices' => $this->_fields))
			->add('content'	, null, array ('label' => 'Traduction'))
			->add('locale'	, 'choice',	array ('label' => 'Lng','choices' => $this->_locales ),array('choices' => $this->_locales))
			->add('_action'	, 'actions', array ('actions' => array ('edit' => array ())));
	}
	
	/**
	 * Configure the form
	 * @param FormMapper $formMapper formMapper
	 */
	protected function configureFormFields(FormMapper $formMapper) {
		$formMapper
				->add('field'	, 'choice'	,	array('label' 	=> 'Champ','choices' => $this->_fields))
				->add('content'	, 'text'	, 	array ('label' 	=> 'Translation'))
				->add('locale'	, 'choice'	,	array ('label' 	=> 'Lng','choices' => $this->_locales));
	}
}