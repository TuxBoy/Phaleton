<?php


return [

	// Service providers list
	'view'           => \App\ServiceProvider\ViewServiceProvider::class,
	'dispatcher'     => \App\ServiceProvider\DispatcherServiceProvider::class,
	'url'            => \App\ServiceProvider\UrlServiceProvider::class,
	'db'             => \App\ServiceProvider\DbConnectionServiceProvider::class,
	'modelsMetadata' => \App\ServiceProvider\MetaDataServiceProvider::class,
	'flash'          => \App\ServiceProvider\FlashServiceProvider::class,
	'session'        => \App\ServiceProvider\SessionServiceProvider::class,

];
