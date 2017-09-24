<?php 

//setting path
$config['twig.path'] = __DIR__. '/../views';

//setting environment
$config['twig.environment'] = [
	'cache_status'	=> false,
	'debug_mode'	=> true,
	'ci_uri'		=> true,
];