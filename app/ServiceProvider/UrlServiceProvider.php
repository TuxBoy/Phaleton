<?php
namespace App\ServiceProvider;

use Phalcon\Mvc\Url as UrlResolver;

class UrlServiceProvider extends ServiceProvider
{

	public function register(): void
	{

		$this->di->setShared('url', function () {
			$url = new UrlResolver();
			$url->setBaseUri(getenv('APP_BASE_URI'));
			return $url;
		});
	}
}