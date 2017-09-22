<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/
$hook['post_controller_constructor'][] = [
	'class' 	=> 'TwigHook',
	'function'	=> 'addGlobals',
	'filename'	=> 'TwigHook.php',
	'filepath'	=> 'hooks',
	'params'	=> [
		'user'	=> [
			'value' 	=> 'user',
			'is_session'=> TRUE,
		],
		'error' => [
			'value'		=> 'errors',
			'is_session'=> FALSE,
		],
	],
];