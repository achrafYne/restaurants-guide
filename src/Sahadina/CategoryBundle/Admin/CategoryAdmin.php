<?php
/**
 * 
 * @author achraf
 * @since 26 Mai 2014
 * @copyright sahadina
 */

namespace Sahadina\CategoryBundle\Admin;

use Sonata\AdminBundle\Admin\Admin,
 	Sonata\AdminBundle\Datagrid\ListMapper,
 	Sonata\AdminBundle\Datagrid\DatagridMapper,
 	Sonata\AdminBundle\Validator\ErrorElement,
 	Sonata\AdminBundle\Form\FormMapper;

class CategoryAdmin extends Admin{
	
	protected $datagridValues = array(
	);
	
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
		->with('Translation',array('collapsed'=>true))
			->add('parent')
			->add('childrens',null,	array('required' => false))
			->add(
	            'translations',
	            'a2lix_translations',
	            array(
	                'label'		=>'Translations',
	                'attr' 		=> array('class' => 'input-xlarge'),
	                'label_attr'=>array('class' =>'sr-only'),
	            	'validation_groups'=>array('new','edit'), 
	                'sonata_admin'=>"Sahadina\CategoryBundle\Entity\Category",
	                'fields'=>array(
	                    'name'=>array('field_type'=>'text','attr'=>array('class'=>'input-xlarge')),
	                	'url'=>array('field_type'=>'text','attr'=>array('class'=>'input-xlarge')),
	                 )
	             )
	        );
       
			
	
	}
	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper->add('childrens');
	}
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
			->addIdentifier('name')
			->add('_action', 'actions', array(
				'actions' => array(
						'edit' => array(),
						'delete' => array(),
				)
		));
	}
	
	/**
	 * @param Sahadina\CategoryBundle\Entity\Category $category
	 * @see \Sonata\AdminBundle\Admin\Admin::prePersist()
	 * 
	 */
	public function prePersist($category) {
		
	
	}
	
	/**
	 * @param Sahadina\CategoryBundle\Entity\Category $category
	 * @see \Sonata\AdminBundle\Admin\Admin::preUpdate()
	 */
	public function preUpdate($category) {
	
	}
}