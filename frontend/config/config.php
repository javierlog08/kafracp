<?php

$config = [
	'modules' => [
        'home' => [
            'class' => 'root\frontend\modules\home\HomeModule',
        ],
    ],
    'components' => [
	    'view' => [
	        'theme' => [
	            'pathMap' => [
	                '@root/frontend/modules' => '@root/frontend/themes/basic',
	            ],
	        ],
	    ],
	    'errorHandler' => [
	            'errorAction' => 'home/default/error',
	     ],
	],
];

return $config;