<?php
/**
 * Created by PhpStorm.
 * User: tuxboy
 * Date: 26/08/18
 * Time: 11:47
 */

namespace App\ServiceProvider;

use Phalcon\Db\Adapter\Pdo\Factory;

/**
 * Class DbConnectionServiceProvider
 * @package App\ServiceProvider
 */
class DbConnectionServiceProvider extends ServiceProvider
{

	public function register(): void
	{
		$this->di->setShared('db', function () {

			$options = [
				'adapter'  => getenv('APP_DB_ADAPTER'),
				'host'     => getenv('APP_DB_HOST'),
				'username' => getenv('APP_DB_USERNAME'),
				'password' => getenv('APP_DB_PASSWORD'),
				'dbname'   => getenv('APP_DB_DBNAME'),
				'charset'  => getenv('APP_DB_CHARSET'),
			];

			$connection = Factory::load($options);

			return $connection;
		});
	}

}