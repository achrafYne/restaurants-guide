<?php
/**
 * @author 		achraf
 * @since 		26 Mai 2014
 * @copyright 	Sahadina
 */

namespace Sahadina\CategoryBundle\Entity;

use Symfony\Component\HttpFoundation\Request,
	 \A2lix\I18nDoctrineBundle\Doctrine\ORM\Util\Translatable;

/**
 * Category
 */
class Category
{
    /**
     * @var integer
     */
    private $level;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $childrens;

    /**
     * @var \Sahadina\CategoryBundle\Entity\Category
     */
    private $parent;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $restaurants;
	
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $translations;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->childrens 	= new \Doctrine\Common\Collections\ArrayCollection();
        $this->restaurants 	= new \Doctrine\Common\Collections\ArrayCollection();
        $this->translations = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
    	$request = Request::createFromGlobals();
    	$locale = $request->getLocale();
    	$translations = $this->getTranslations();
    	return !empty($this->translations['fr']) ? $translations['fr']->getName() : 'NO TRANSLATION';
    }

    /**
     * Set level
     *
     * @param integer $level
     *
     * @return Category
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add childrens
     *
     * @param \Sahadina\CategoryBundle\Entity\Category $childrens
     *
     * @return Category
     */
    public function addChildren(\Sahadina\CategoryBundle\Entity\Category $childrens)
    {
        $this->childrens[] = $childrens;

        return $this;
    }

    /**
     * Remove childrens
     *
     * @param \Sahadina\CategoryBundle\Entity\Category $childrens
     */
    public function removeChildren(\Sahadina\CategoryBundle\Entity\Category $childrens)
    {
        $this->childrens->removeElement($childrens);
    }

    /**
     * Get childrens
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildrens()
    {
        return $this->childrens;
    }

    /**
     * Set parent
     *
     * @param \Sahadina\CategoryBundle\Entity\Category $parent
     *
     * @return Category
     */
    public function setParent(\Sahadina\CategoryBundle\Entity\Category $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Sahadina\CategoryBundle\Entity\Category
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add restaurants
     *
     * @param \Sahadina\RestaurantBundle\Entity\Restaurant $restaurants
     *
     * @return Category
     */
    public function addRestaurant(\Sahadina\RestaurantBundle\Entity\Restaurant $restaurants)
    {
        $this->restaurants[] = $restaurants;

        return $this;
    }

    /**
     * Remove restaurants
     *
     * @param \Sahadina\RestaurantBundle\Entity\Restaurant $restaurants
     */
    public function removeRestaurant(\Sahadina\RestaurantBundle\Entity\Restaurant $restaurants)
    {
        $this->restaurants->removeElement($restaurants);
    }

    /**
     * Get restaurants
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRestaurants()
    {
        return $this->restaurants;
    }
    
    /**
     * Add translations
     *
     * @param \Sahadina\CategoryBundle\Entity\CategoryTranslation $translations
     * @return Restaurant
     */
    public function addTranslation(\Sahadina\CategoryBundle\Entity\CategoryTranslation $translation )
    
    {
    	$this->getTranslations()->set( $translation->getLocale(), $translation);
    	$translation->setTranslatable( $this );
    	return $this;
    }
    
    /**
     * Remove translations
     *
     * @param \Sahadina\CategoryBundle\Entity\CategoryTranslation $translations
     */
    public function removeTranslation( \Sahadina\CategoryBundle\Entity\CategoryTranslation $translations)
    {
    	$this->translations->removeElement($translations);
    }
    
    public static function getTranslationEntityClass()
    {
    	return 'Sahadina\CategoryBundle\Entity\CategoryTranslation';
    }
    
    public function getCurrentTranslation()
    {
    	return $this->getTranslations()->first();
    }
    /**
     * Get translations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTranslations()
    {
    	return $this->translations = $this->translations ? : new \Doctrine\Common\Collections\ArrayCollection();
    }
    /**
     * @param \Doctrine\Common\Collections\Collection $translations
     * @return \Sahadina\CategoryBundle\Entity\Category
     */
    public function setTranslations($translations)
    {
    	$this->translations = $translations;
    }
    
    public function __toString(){
    
    	return $this->getName();
    }
}
