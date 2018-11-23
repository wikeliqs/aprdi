<?php
/**
 * User: akmalbashan
 * Date: 23-Nov-18
 * Time: 10:46 AM
 */

use Jenssegers\Blade\Blade;

if (!function_exists('view')) {
	function view($view, $data = []) {
		$path = APPPATH.'views';
		$blade = new Blade($path, $path . '/cache');
		
		$CI	=&	get_instance();
		$data['ci'] = $CI;
		echo $blade->make($view, $data);
	}
}
