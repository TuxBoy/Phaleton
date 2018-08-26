<?php
/**
 * Created by PhpStorm.
 * User: tuxboy
 * Date: 26/08/18
 * Time: 11:50
 */

namespace App\ServiceProvider;

use Phalcon\Session\Adapter\Files as SessionAdapter;


/**
 * Class SessionServiceProvider
 * @package App\ServiceProvider
 */
class SessionServiceProvider extends ServiceProvider
{

	public function register(): void
	{
		$this->di->setShared('session', function () {
			$session = new SessionAdapter();
			$session->start();

			return $session;
		});
	}

}