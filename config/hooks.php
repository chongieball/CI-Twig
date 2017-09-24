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
//add Global variable
$hook['post_controller_constructor'][] = [
	'class' 	=> 'TwigHook',
	'function'	=> 'addGlobals',
	'filename'	=> 'TwigHook.php',
	'filepath'	=> 'hooks',
	'params'	=> [
	],
];

//add Flash message
$hook['post_controller_constructor'][] = [
	'class' 	=> 'TwigHook',
	'function'	=> 'addFlash',
	'filename'	=> 'TwigHook.php',
	'filepath'	=> 'hooks',
	'params'	=> [],
];