<?php

namespace Bgcc\Justimmo\Symfony2Bundle\Service;

use Justimmo\Api\JustimmoApi;
use Psr\Log\NullLogger;
use Justimmo\Model\RealtyQuery;
use Justimmo\Cache\NullCache;
use Justimmo\Model\Wrapper\V1\RealtyWrapper;
use Justimmo\Model\Mapper\V1\RealtyMapper;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Api
{

	/**
	 * @var \Symfony\Component\DependencyInjection\ContainerInterface
	 */
	protected $container;

	protected $api;

	/**
	 * Constructor
	 *
	 * @param \Symfony\Component\DependencyInjection\ContainerInterface $service_container
	 */
	public function __construct(ContainerInterface $service_container)
	{
		$this->container = $service_container;
	}

	public function getApi()
	{
		if (!$this->api) {
			$this->api = new JustimmoApi(
				$this->container->getParameter('bgcc_justimmo_api.username'),
				$this->container->getParameter('bgcc_justimmo_api.password'),
				new NullLogger(),
				new NullCache()
			);
		}

		return $this->api;

	}

	public function getQuery()
	{
		$mapper = new RealtyMapper();
		$wrapper = new RealtyWrapper($mapper);

		return new RealtyQuery($this->getApi(), $wrapper, $mapper);
	}

	/**
	 * Get employee list
	 *
	 * @param array $params
	 * @return \SimpleXMLElement
	 */
	public function getEmployeeList(array $params = array())
	{
		return simplexml_load_string($this->getApi()->callEmployeeList($params));
	}

}