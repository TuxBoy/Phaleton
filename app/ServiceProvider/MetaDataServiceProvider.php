<?php
/**
 * Created by PhpStorm.
 * User: tuxboy
 * Date: 26/08/18
 * Time: 11:50
 */

namespace App\ServiceProvider;

use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;

/**
 * Class MetaDataServiceProvider
 * @package App\ServiceProvider
 */
class MetaDataServiceProvider extends ServiceProvider
{

	public function register(): void
	{
		$this->di->setShared('modelsMetadata', function () {
			return new MetaDataAdapter();
		});
	}

}