<?php
namespace App\ServiceProvider;

use Phalcon\Mvc\Dispatcher;


class DispatcherServiceProvider extends ServiceProvider
{

	public function register(): void
	{
		$this->di->setShared('dispatcher', function () {
			$dispatcher = new Dispatcher();
			$dispatcher->setDefaultNamespace(getenv('APP_CTRL_NS'));
			return $dispatcher;
		});
	}

}