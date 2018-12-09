<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Alerts
{
	public static $alerts = array(
				'success' => array(),
				'warning' => array(),
				'error' => array(),
				'info' => array(),
			);

	public static function Success($message)
	{
		self::AddAlert('success', $message);
	}

	public static function Warning($message)
	{
		self::AddAlert('warning', $message);
	}

	public static function Error($message)
	{
		self::AddAlert('error', $message);
	}

	public static function Info($message)
	{
		self::AddAlert('info', $message);
	}

	public static function AddAlert($type, $message)
	{
		$CI =& get_instance();
		self::$alerts[$type][] = $message;
        $CI->session->set_flashdata('Alerts', self::$alerts);
	}

	public static function GetAlerts()
	{
		$CI =& get_instance();
		$flashAlerts = $CI->session->flashdata('Alerts');

		if($flashAlerts)
			return $flashAlerts;

		return self::$alerts;
	}
}