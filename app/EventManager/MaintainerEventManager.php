<?php
namespace App\EventManager;

use SDAM\Config;
use SDAM\EntityAdapter\EntityAdapter;
use SDAM\Maintainer;

class MaintainerEventManager
{

	/**
	 * @throws \Doctrine\DBAL\DBALException
	 * @throws \PhpDocReader\AnnotationException
	 * @throws \ReflectionException
	 * @throws \Throwable
	 */
	public function beforeDispatch()
	{
		Config::current()->configure([
			Config::DATABASE => [
				'dbname'   => 'phalcon',
       			'user'     => 'root',
       			'password' => 'root',
       			'host'     => 'localhost',
       			'driver'   => 'pdo_mysql',
			],
			Config::ENTITY_PATH => 'App\Model'
		]);
		(new Maintainer([], new EntityAdapter(ROOTPATH . '/app/Model')))->run();
	}
}