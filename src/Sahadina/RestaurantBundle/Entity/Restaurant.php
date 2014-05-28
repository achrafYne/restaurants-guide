<?php
/**
 * @author 		achraf
 * @since 		26 Mai 2014
 * @copyright 	Sahadina
 */

namespace Sahadina\RestaurantBundle\Entity;

use Symfony\Component\HttpFoundation\Request,
	\A2lix\I18nDoctrineBundle\Doctrine\ORM\Util\Translatable,
	Doctrine\Common\Persistence\Event\LifecycleEventArgs,
	Symfony\Component\DependencyInjection\ContainerInterface,
 	Doctrine\ORM\Mapping as ORM;


class Restaurant
{
    
	protected $_securityContext;
	protected $_container;
    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $zipCode;

    /**
     * @var string
     */
    private $telephone;

    /**
     * @var string
     */
    private $email;
    
    /**
     * @var boolean
     */
    private $isActivated;

    /**
     * @var string
     */
    private $longitude;

    /**
     * @var string
     */
    private $latitude;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Sahadina\GeoBundle\Entity\City
     */
    private $city;

    /**
     * @var \Application\Sonata\UserBundle\Entity\User
     */
    private $updatedBy;

    /**
     * @var \Application\Sonata\UserBundle\Entity\User
     */
    private $createdBy;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $categories;
	
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $translations;
    
    /**
     * Constructor
     */
    public function __construct($container)
    {	
    	$this->categories 		= new \Doctrine\Common\Collections\ArrayCollection();
        $this->translations 	= new \Doctrine\Common\Collections\ArrayCollection();
        $this->_container 		= $container;
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
     * Set address
     *
     * @param string $address
     *
     * @return Restaurant
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set zipCode
     *
     * @param string $zipCode
     *
     * @return Restaurant
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * Get zipCode
     *
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Restaurant
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Restaurant
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Restaurant
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    
    /**
     * Set isActivated
     *
     * @param boolean $isActivated
     *
     * @return Restaurant
     */
    public function setIsActivated($isActivated)
    {
        $this->isActivated = $isActivated;

        return $this;
    }

    /**
     * Get isActivated
     *
     * @return boolean
     */
    public function getIsActivated()
    {
        return $this->isActivated;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Restaurant
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
     * Set longitude
     *
     * @param string $longitude
     *
     * @return Restaurant
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
     * @return Restaurant
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Restaurant
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Restaurant
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
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
     * Set city
     *
     * @param \Sahadina\GeoBundle\Entity\City $city
     *
     * @return Restaurant
     */
    public function setCity(\Sahadina\GeoBundle\Entity\City $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \Sahadina\GeoBundle\Entity\City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set updatedBy
     *
     * @param \Application\Sonata\UserBundle\Entity\User $updatedBy
     *
     * @return Restaurant
     */
    public function setUpdatedBy(\Application\Sonata\UserBundle\Entity\User $updatedBy = null)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return \Application\Sonata\UserBundle\Entity\User
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Set createdBy
     *
     * @param \Application\Sonata\UserBundle\Entity\User $createdBy
     *
     * @return Restaurant
     */
    public function setCreatedBy(\Application\Sonata\UserBundle\Entity\User $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \Application\Sonata\UserBundle\Entity\User
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Add categories
     *
     * @param \Sahadina\CategoryBundle\Entity\Category $categories
     *
     * @return Restaurant
     */
    public function addCategory(\Sahadina\CategoryBundle\Entity\Category $categories)
    {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     * @param \Sahadina\CategoryBundle\Entity\Category $categories
     */
    public function removeCategory(\Sahadina\CategoryBundle\Entity\Category $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }
    
    /**
     * @ORM\PrePersist
     */
    public function setPrePersistValues()
    {	
    	/*$securityContext = $this->_container->get('security.context');
    	$user= $securityContext->getToken()->getUser();
    	var_dump($user);die;*/
   		 if(!$this->getCreatedAt()){
			$this->createdAt = new \DateTime();
		}
    }

    /**
     * @ORM\PreUpdate
     */
    public function setPreUpdateValues()
    {	
    	/*$securityContext = $this->_container->get('security.context');
    	$user= $securityContext->getToken()->getUser();
    	var_dump($user);die;*/
    	$this->updatedAt = new \DateTime();
    }
    /**
     * @var string
     */
    private $currency;

    /**
     * @var float
     */
    private $minPrice;

    /**
     * @var float
     */
    private $maxPrice;

    /**
     * @var string
     */
    private $facebook;

    /**
     * @var string
     */
    private $twitter;

    /**
     * @var string
     */
    private $youtube;


    /**
     * Set currency
     *
     * @param string $currency
     *
     * @return Restaurant
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set minPrice
     *
     * @param float $minPrice
     *
     * @return Restaurant
     */
    public function setMinPrice($minPrice)
    {
        $this->minPrice = $minPrice;

        return $this;
    }

    /**
     * Get minPrice
     *
     * @return float
     */
    public function getMinPrice()
    {
        return $this->minPrice;
    }

    /**
     * Set maxPrice
     *
     * @param float $maxPrice
     *
     * @return Restaurant
     */
    public function setMaxPrice($maxPrice)
    {
        $this->maxPrice = $maxPrice;

        return $this;
    }

    /**
     * Get maxPrice
     *
     * @return float
     */
    public function getMaxPrice()
    {
        return $this->maxPrice;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     *
     * @return Restaurant
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     *
     * @return Restaurant
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get twitter
     *
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set youtube
     *
     * @param string $youtube
     *
     * @return Restaurant
     */
    public function setYoutube($youtube)
    {
        $this->youtube = $youtube;

        return $this;
    }

    /**
     * Get youtube
     *
     * @return string
     */
    public function getYoutube()
    {
        return $this->youtube;
    }
    
    /**
     * Add translations
     *
     * @param \Sahadina\RestaurantBundle\Entity\RestaurantTranslation $translations
     * @return Restaurant
     */
    public function addTranslation(\Sahadina\RestaurantBundle\Entity\RestaurantTranslation $translation)
    
    {
    	$this->getTranslations()->set( $translation->getLocale(), $translation);
    	$translation->setTranslatable( $this );
    	return $this;
    }
    
    /**
     * Remove translations
     *
     * @param \Sahadina\RestaurantBundle\Entity\RestaurantTranslation $translations
     */
    public function removeTranslation( \Sahadina\RestaurantBundle\Entity\RestaurantTranslation $translations)
    {
    	$this->translations->removeElement($translations);
    }
    
    public static function getTranslationEntityClass()
    {	
    	return 'Sahadina\RestaurantBundle\Entity\RestaurantTranslation';
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
     * @return \Sahadina\RestaurantBundle\Entity\Restaurant
     */
    public function setTranslations($translations)
    {
    	$this->translations = $translations;
    }
    
    public function __toString(){
    	
    	return $this->getName();
    }
    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     */
    private $logo;


    /**
     * Set logo
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $logo
     *
     * @return Restaurant
     */
    public function setLogo(\Application\Sonata\MediaBundle\Entity\Media $logo = null)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media
     */
    public function getLogo()
    {
        return $this->logo;
    }
    /**
     * @var string
     */
    private $siteWeb;


    /**
     * Set siteWeb
     *
     * @param string $siteWeb
     *
     * @return Restaurant
     */
    public function setSiteWeb($siteWeb)
    {
        $this->siteWeb = $siteWeb;

        return $this;
    }

    /**
     * Get siteWeb
     *
     * @return string
     */
    public function getSiteWeb()
    {
        return $this->siteWeb;
    }
}
