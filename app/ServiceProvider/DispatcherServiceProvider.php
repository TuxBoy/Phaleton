<?php
namespace App\ServiceProvider;

use App\EventManager\MaintainerEventManager;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Events\Manager as EventsManager;


class DispatcherServiceProvider extends ServiceProvider
{

	public function register(): void
	{
		$this->di->setShared('dispatcher', function () {
			$dispatcher = new Dispatcher();
			$dispatcher->setDefaultNamespace(getenv('APP_CTRL_NS'));

			// Create an events manager
			$eventsManager = new EventsManager();

			// Listen for events produced in the dispatcher using the Security plugin
			$eventsManager->attach(
				'dispatch:beforeDispatch',
				new MaintainerEventManager()
			);

			$dispatcher->setEventsManager($eventsManager);
			return $dispatcher;
		});
	}

}