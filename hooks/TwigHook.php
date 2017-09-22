<?php 

defined('BASEPATH') OR exit('No direct script access allowed');  

/**
* Hook for Twig
*/
class TwigHook
{
	protected $ci;

	public function __construct()
	{
		$this->ci =& get_instance();
	}

	public function addGlobals(array $params)
	{
		foreach ($params as $globalKey => $value) {
			if ($value['is_session'] == true) {
				$globalValue = $this->ci->session->userdata($value['value']);
			} else {
				$globalValue = $value['value'];
			}
			$this->ci->twig->addGlobal($globalKey, $globalValue);
		}
	}	
}