<?php
/**
 * Created by PhpStorm.
 * User: tuxboy
 * Date: 26/08/18
 * Time: 11:50
 */

namespace App\ServiceProvider;

use Phalcon\Flash\Direct as Flash;


/**
 * Class MetaDataServiceProvider
 * @package App\ServiceProvider
 */
class FlashServiceProvider extends ServiceProvider
{

	public function register(): void
	{
		$this->di->set('flash', function () {
			return new Flash([
				'error'   => 'alert alert-danger',
				'success' => 'alert alert-success',
				'notice'  => 'alert alert-info',
				'warning' => 'alert alert-warning'
			]);
		});
	}

}