<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class TwigExtension extends \Twig_Extension
{
	protected $CI;

	function __construct()
	{
		$this->CI = &get_instance();
		$this->CI->load->helper('url');
	}

	public function getName()
    {
        return 'codeigniter';
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('base_url', array($this, 'baseUrl')),
            new \Twig_SimpleFunction('current_url', array($this, 'currentUrl')),
            new \Twig_SimpleFunction('uri_string', array($this, 'uriString')),
        ];
    }

	public function baseUrl($uri = '', $protocol = NULL)
	{
		return base_url($uri, $protocol);
	}

	public function currentUrl()
	{
		return current_url();
	}

	public function uriString()
	{
		return uri_string();
	}
}