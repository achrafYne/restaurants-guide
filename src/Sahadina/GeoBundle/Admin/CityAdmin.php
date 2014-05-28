<?php
/**
 * 
 * @author achraf
 * @since 26 Mai 2014
 * @copyright sahadina
 */

namespace Sahadina\GeoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin,
 	Sonata\AdminBundle\Datagrid\ListMapper,
 	Sonata\AdminBundle\Datagrid\DatagridMapper,
 	Sonata\AdminBundle\Validator\ErrorElement,
 	Sonata\AdminBundle\Form\FormMapper;
 	

class CityAdmin extends Admin{
	
	protected $datagridValues = array(
			'_sort_order' => 'ASC',
			'_sort_by' => 'name'
	);
	protected function configureFormFields(FormMapper $formMapper)
	{
        $formMapper
        	->add('translations', 'a2lix_translations')
			->add('longitude')
			->add('latitude');
	}
	
	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		//$datagridMapper->add('name');
	}
	
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
		->addIdentifier('name')
		->add('_action', 'actions', array(
				'actions' => array(
						'view' => array(),
						'edit' => array(),
						'delete' => array(),
				)
		));
	}
	/**
	 * @param Sahadina\GeoBundle\Entity\City $city
	 * @see \Sonata\AdminBundle\Admin\Admin::prePersist()
	 * 
	 */
	public function prePersist($category) {
		
	
	}
	
	/**
	 * @param Sahadina\GeoBundle\Entity\City $city
	 * @see \Sonata\AdminBundle\Admin\Admin::preUpdate()
	 */
	public function preUpdate($category) {
	
	}
}