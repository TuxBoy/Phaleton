<?php
namespace App\ServiceProvider;

use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;

class ViewServiceProvider extends ServiceProvider
{

	public function register(): void
	{
		$this->di->setShared('view', function () {
			$view = new View();
			$view->setDI($this);
			$view->setViewsDir(ROOTPATH . getenv('APP_DIRS_VIEWS'));

			$view->registerEngines([
				'.twig' => function ($view, $di) {
					return new View\Engine\Twig($view, $di, [
						'cache' => false,
					]);
				},
				'.php' => PhpEngine::class
			]);

			return $view;
		});
	}
}