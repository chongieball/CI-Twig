<?php 

defined('BASEPATH') OR exit('No direct script access allowed');  

/**
* CIT
*
* Twig templating for Codeigniter 
*/
class Twig
{
	protected $CI;

	protected $path;
	protected $twig;
	protected $twigLoader;
	protected $twigEnv;


	function __construct()
	{
		$this->CI = get_instance();

		//load twig configs
		//default name : twig.php
		$this->CI->config->load('twig');

		//add twig view path
		$this->setPath();

		$this->twigLoader = new \Twig_Loader_Filesystem($this->path);

		$this->getEnvironment();

		$this->setEnvironment();

		if ($this->twigEnv['debug_mode']) {
			$this->twig->addExtension(new \Twig_Extension_Debug());
		}

	}

	protected function setPath($path = 'twig.path')
	{
		$this->path = $this->CI->config->item($path);
	}

	/**
	 * Get Environment from config
	 * @param  array  $environment
	 */
	protected function getEnvironment($environment = 'twig.environment')
	{
		$env = $this->CI->config->item($environment);

		if ($env['cache_status'] && $env['cache_loc']) {
			$env['chache'] = $env['cache_loc'];
			unset($env['chache_status']);
		}

		$this->twigEnv = $env;
	}

	/**
	 * Export Environment to Twig Environment
	 */
	private function setEnvironment()
	{
		$this->twig = new \Twig_Environment($this->twigLoader, $this->twigEnv);
	}

	public function addGlobal($name, $value)
	{
		$this->twig->addGlobal($name, $value);
	}

	public function render($template, $data = [])
	{
		return $this->twig->loadTemplate($template)->render($data);
	}

	public function display($template, $data = [])
	{
		$this->CI->output->set_output($this->render($template, $data));
	}

}