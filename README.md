# CI Twig -- Twig Templating for CodeIgniter

Simple Twig Templating for CodeIgniter 3 or later.

## Instalation

Copy All Files from this Repo into Your CI application directory.

### Load Class Twig

Before you start with this library, please paste this code into top of your index.php.

	// Load composer autoload
	require __DIR__. '/vendor/autoload.php';

## Basic Usage

### Config

In config/twig.php, you can setting path and environment for this library.
	
	// setting path
	$config['twig.path'] = __DIR__. '/../views';

	//setting environment
	$config['twig.environment'] = [
		'cache_status'	=> false,
		'debug_mode'	=> true
	];

### Load this library

To use this library load it or better yet, autoload it.
	
	//setting autoload for twig
	$autoload['libraries'] = array('twig');

	//or you can load manually in your controllers
	$this->load->library('twig');

### Display twig

	//set value to display in your page
	$data['title'] = 'Template';
	$data['user'] = 'Chongieball';

	//load template
	$this->twig->display('page.twig', $data);

In your page.twig, you just print the value with this: 

	{{title}}
	{{user}}

## Uri-helper functions in twig

You can use uri-helper function like 'base_url', 'current_url', and 'uri_string'. Just add or change 'ci_uri' to TRUE

	//add config in config/twig.php
	//setting path
	$config['twig.path'] = __DIR__. '/../views';

	//setting environment
	$config['twig.environment'] = [
		'cache_status'	=> false,
		'debug_mode'	=> true,
		'ci_uri'		=> true
	]; 

In your template.twig just call the functions

	{{base_url()}}
	{{current_url()}}
	{{uri_string()}}

## CI-Twig Hooks

You can add hooks for add global variable and flash message in this library

### Add Global Variable

Setting in config/hooks.php

	//setting hooks in config/hooks
	$hook['post_controller_constructor'][] = [
		'class' 	=> 'TwigHook',
		'function'	=> 'addGlobals',
		'filename'	=> 'TwigHook.php',
		'filepath'	=> 'hooks',
		'params'	=> [
			//key of global variable
			'user'	=> [
				//if session is true, it will be $_SESSION[$value]
				'value' 	=> 'user',
				'is_session'=> TRUE,
			],
			'error' => [
				'value'		=> 'errors',
				'is_session'=> FALSE,
			],
		],
	];
	
	//set global variable value in controllers
	$this->session->set_userdata('user', 'this is user global variable');
	$this->twig->display('page.twig');

In your page.twig
	{{user}}

### Flash message

Add some config in config/hooks.php

	//add Flash message
	$hook['post_controller_constructor'][] = [
		'class' 	=> 'TwigHook',
		'function'	=> 'addFlash',
		'filename'	=> 'TwigHook.php',
		'filepath'	=> 'hooks',
		'params'	=> [],
	];

Set flash in your controller
	
	//set flash data
	$this->session->set_flashdata('success', 'test flash success');
	$this->twig->display('page.twig');

And in your page.twig
	{{flash.success}}