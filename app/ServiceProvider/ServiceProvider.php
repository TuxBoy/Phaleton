<?php
namespace App\ServiceProvider;

use Exception;
use Phalcon\DiInterface;

class ServiceProvider
{

	/**
	 * @var DiInterface
	 */
	protected $di;

	/**
	 * @var string[]
	 */
	protected $servicesProvider;

	/**
	 * ServiceProvider constructor.
	 *
	 * @param DiInterface $di
	 * @param string[] $servicesProvider
	 */
	public function __construct(DiInterface &$di, array $servicesProvider = [])
	{
		$this->di = $di;
		$this->servicesProvider = $servicesProvider;
	}

	public function register(): void
	{
		// To implement
	}

	public function load(): void
	{
		foreach ($this->servicesProvider as $name => $serviceProvider) {
			if (!class_exists($serviceProvider)) {
				throw new Exception("Service provider $serviceProvider does not exist");
			}
			(new $serviceProvider($this->di, $this->servicesProvider))->register();
		}
	}

}