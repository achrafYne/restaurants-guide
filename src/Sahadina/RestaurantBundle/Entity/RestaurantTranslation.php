<?php
/**
 * @author 		achraf
 * @since 		26 Mai 2014
 * @copyright 	Sahadina
 */

namespace Sahadina\RestaurantBundle\Entity;

use Doctrine\ORM\Mapping as ORM,
 	A2lix\I18nDoctrineBundle\Doctrine\Interfaces\ManyLocalesInterface,
	Sahadina\RestaurantBundle\Utils\Sahadina;

/**
 * @ORM\Entity
 */
class RestaurantTranslation implements \A2lix\I18nDoctrineBundle\Doctrine\Interfaces\ManyLocalesInterface
{
	use \A2lix\I18nDoctrineBundle\Doctrine\ORM\Util\Translatable;
	
	
	protected $translatable;
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $locale;

    /**
     * @var array
     */
    private $locales;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return RestaurantTranslation
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return RestaurantTranslation
     */
    public function setUrl($url)
    {
        $this->url =   Sahadina::Sanitize($this->getName());
        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url =  Sahadina::Sanitize($this->getName());;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return RestaurantTranslation
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set locale
     *
     * @param string $locale
     *
     * @return RestaurantTranslation
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Get locale
     *
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set locales
     *
     * @param array $locales
     *
     * @return RestaurantTranslation
     */
    public function setLocales($locales)
    {
        $this->locales = $locales;

        return $this;
    }

    /**
     * Get locales
     *
     * @return array
     */
    public function getLocales()
    {
        return $this->locales;
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
    
    public function getTranslatable()
    {
    	return $this->translatable;
    }
    
    public function setTranslatable( $translatable )
    {
    	$this->translatable = $translatable;
    	return $this;
    }
    
    public function __toString(){
    
    	return $this->getName();
    }
}
