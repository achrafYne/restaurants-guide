<?php
/**
 * @author 		achraf
 * @since 		26 Mai 2014
 * @copyright 	Sahadina
 */

namespace Sahadina\GeoBundle\Entity;

use Symfony\Component\HttpFoundation\Request,
	 \A2lix\I18nDoctrineBundle\Doctrine\ORM\Util\Translatable;
/**
 * City
 */
class City
{
    
    /**
     * @var string
     */
    private $longitude;

    /**
     * @var string
     */
    private $latitude;

    /**
     * @var integer
     */
    private $id;

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
     * Set longitude
     *
     * @param string $longitude
     *
     * @return City
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     *
     * @return City
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
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
     * Add restaurants
     *
     * @param \Sahadina\RestaurantBundle\Entity\Restaurant $restaurants
     *
     * @return City
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
     * @param \Sahadina\GeoBundle\Entity\CityTranslation $translations
     * @return Restaurant
     */
    public function addTranslation(\Sahadina\GeoBundle\Entity\CityTranslation $translation )
    
    {
    	$this->getTranslations()->set( $translation->getLocale(), $translation);
    	$translation->setTranslatable( $this );
    	return $this;
    }
    
    /**
     * Remove translations
     *
     * @param \Sahadina\GeoBundle\Entity\CityTranslation $translations
     */
    public function removeTranslation( \Sahadina\GeoBundle\Entity\CityTranslation $translations)
    {
    	$this->translations->removeElement($translations);
    }
    
    public static function getTranslationEntityClass()
    {
    	return 'Sahadina\GeoBundle\Entity\CityTranslation';
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
     * @return \Sahadina\GeoBundle\Entity\City
     */
    public function setTranslations($translations)
    {
    	$this->translations = $translations;
    }
    
    public function __toString(){
    	 
    	return  $this->getName();
    }
}
