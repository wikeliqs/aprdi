<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package        CodeIgniter
 * @author         ExpressionEngine Dev Team
 * @copyright      Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license        http://codeigniter.com/user_guide/license.html
 * @link           http://codeigniter.com
 * @since          Version 1.0
 * @filesource
 */


if (!function_exists('is_active')) {
	
	function is_active($selected_page_name = "")
	{
		$CI =& get_instance();
		$CI->load->library('session');
		
		if ($CI->session->userdata('last_page') == $selected_page_name) {
			return "active";
		} else {
			return "";
		}
	}
}

if (!function_exists('is_multi_level_active')) {
	function is_multi_level_active($selected_pages = "", $item = "")
	{
		$CI =& get_instance();
		$CI->load->library('session');
		
		for ($i = 0; $i < sizeof($selected_pages); $i++) {
			if ($CI->session->userdata('last_page') == $selected_pages[$i]) {
				if ($item == 1) {
					return "opened active";
				} else {
					return "opened";
				}
			}
		}
		return "";
	}
}

if (!function_exists('get_settings')) {
	function get_settings($key = '')
	{
		$CI =& get_instance();
		$CI->load->database();
		
		$CI->db->where('key', $key);
		$result = $CI->db->get('settings')->row()->value;
		return $result;
	}
}

if (!function_exists('get_frontend_settings')) {
	function get_frontend_settings($key = '')
	{
		$CI =& get_instance();
		$CI->load->database();
		
		$CI->db->where('key', $key);
		$result = $CI->db->get('frontend_settings')->row()->value;
		return $result;
	}
}

if (!function_exists('slugify')) {
	function slugify($text)
	{
		$text = preg_replace('~[^\\pL\d]+~u', '-', $text);
		$text = trim($text, '-');
		$text = strtolower($text);
		$text = preg_replace('~[^-\w]+~', '', $text);
		if (empty($text))
			return 'n-a';
		return $text;
	}
}

if (!function_exists('form_dropdown_date')) {
	function form_dropdown_date($name, $selected = null, $extra = [])
	{
		$arrDate = [''=>'Choose Date'];
		for ($i = 1; $i <= 31; $i++) {
			$arrDate[$i] = $i;
		}
		$extra['placeholder'] = 'Choose Date';
		return form_dropdown($name, $arrDate, $selected, $extra);
	}
}

if (!function_exists('form_dropdown_month')) {
	function form_dropdown_month($name, $selected = null, $extra = [])
	{
		$arrMonth = [
			''  => 'Choose Month',
			'01' => 'January',
			'02' => 'February',
			'03' => 'March',
			'04' => 'April',
			'05' => 'May',
			'06' => 'June',
			'07' => 'July',
			'08' => 'August',
			'09' => 'September',
			'10' => 'October',
			'11' => 'November',
			'12' => 'December',
		];
		return form_dropdown($name, $arrMonth, $selected, $extra);
	}
}

if (!function_exists('form_dropdown_year')) {
	function form_dropdown_year($name, $selected = null, $extra = [], $year_start = 1900, $year_end = null)
	{
		$year_end = empty($year_end) ? date('Y'):$year_end;
		$affYear = [''=>'Choose Year'];
		for ($i = $year_start; $i <= $year_end; $i++) {
			$affYear[$i] = $i;
		}
		return form_dropdown($name, $affYear, $selected, $extra);
	}
}

// ------------------------------------------------------------------------
/* End of file user_helper.php */
/* Location: ./system/helpers/common.php */
