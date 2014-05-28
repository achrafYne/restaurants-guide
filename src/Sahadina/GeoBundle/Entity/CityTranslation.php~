<?php
/**
 * @author 		achraf
 * @since 		26 Mai 2014
 * @copyright 	Sahadina
 * @package 	Sahadina\GeoBundle\Entity
 */

namespace Sahadina\GeoBundle\Entity;

use Doctrine\ORM\Mapping as ORM,
 	A2lix\I18nDoctrineBundle\Doctrine\Interfaces\ManyLocalesInterface,
 	\A2lix\I18nDoctrineBundle\Doctrine\ORM\Util\Translatable,
	Sahadina\RestaurantBundle\Utils\Sahadina;

/**
 * CityTranslation
 */
class CityTranslation implements \A2lix\I18nDoctrineBundle\Doctrine\Interfaces\ManyLocalesInterface
{
	
	
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
     * @return CityTranslation
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
     * @return CityTranslation
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
        return Sahadina::Sanitize($this->getName());
    }

    /**
     * Set locale
     *
     * @param string $locale
     *
     * @return CityTranslation
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
     * @return CityTranslation
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
