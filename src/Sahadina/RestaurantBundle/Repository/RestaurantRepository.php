<?php
/**
 * 
 * @author achraf
 * @since 26 Mai 2014
 * @copyright Sahadina
 */
namespace Sahadina\RestaurantBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * RestaurantRepository
 .
 */
class RestaurantRepository extends EntityRepository
{	
	/**
	 * Get restaurants list
	 * @param int $page
	 * @param int $max
	 * @param array $params
	 */
	public function getList($offset,$limit,$params){
		
		$query = $this->createQueryBuilder('r');
		
		if(!empty($params['city_id'])){
			$query ->where('r.city.id = :city_id')
			->setParameter('city', $params['city_id']);
		}
		$query->orderBy('r.createdAt', 'ASC');
		$total= $query->getQuery()->getResult();
		$restaurants= $query->setFirstResult($offset)->setMaxResults($limit)->getQuery()->getResult();
    	return array('restaurants'=>$restaurants,'total' =>count($total));
	}
	
	/**
	 * get restaurant by id
	 * @param integer $id
	 * @return \Sahadina\RestaurantBundle\Entity\Restaurant
	 */
	public function getReastaurant($id){
	
		$query = $this->createQueryBuilder('r')
		->where('r.id = :id')
		->setParameter('id', $id)
		->setMaxResults(1)
		->getQuery();
		try {
			$restaurant = $query->getSingleResult();
		} catch (\Doctrine\Orm\NoResultException $e) {
			$restaurant = null;
		}
		return $restaurant;
	}
}
