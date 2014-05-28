<?php
/**
 * 
 * @author achraf
 * @since  26 Mai 2014
 * @copyright Sahadina
 */
namespace Sahadina\RestaurantBundle\Twig;
use Symfony\Component\DependencyInjection\ContainerInterface;


class MediaExtension extends \Twig_Extension 
{
	/**
	 *
	 * @var ContainerInterface
	 */
	protected $container;
	
	/**
	 *
	 * @param ContainerInterface $container
	 */
	public function __construct(ContainerInterface $container=null)
	{
		$this->container = $container;
	}
	/**
	 * (non-PHPdoc)
	 * @see Twig_Extension::getFunctions()
	 */
	public function getFunctions() {
		return array(
            'media_public_url' => new \Twig_Function_Method($this, 'getMediaPublicUrl')
        );
	}
	
    /**
     * 
     * @param  $media
     * @param  $format
     * @return  public media url
     */ 
	public function getMediaPublicUrl($media, $format)
	{	
		
		$provider = $this->container->get($media->getProviderName());

    	return $provider->generatePublicUrl($media, $format);
	}
    /**
     * (non-PHPdoc)
     * @see Twig_ExtensionInterface::getName()
     */
    public function getName()
    {
        return 'media';
    }
}
