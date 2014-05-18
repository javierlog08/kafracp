<?php
/*
|  Kafra Control Panel Configs
|----------------------------------------------------------------------------------
|
| Main Configurations. (Themes, ServerName etc.)
|
|----------------------------------------------------------------------------------
*/

$config = [
	'serverName'=>	"Kafra CP",		// Your Server Name
	'themes'=>	['basic'],			// First tample will be default on the array
	'passwordMD5' => false,			// Is your server using MD5 for passwords ?
];



/*
|  Modules configs
|----------------------------------------------------------------------------------
|
| If you are installing a new module add it here.
| For convention path to your module must be:
| 
| 'YourModuleName' => [
|     	'class' => 'root\backend\modules\YourModuleName\YourModuleNameClass',
|  ],
| 
|
|----------------------------------------------------------------------------------
*/
$modules = [
	'auth' => [
		'class' => 'root\backend\modules\auth\AuthModule',
    ],
	'home' => [
     	'class' => 'root\backend\modules\home\HomeModule',
    ],

];


/*
|  Core Configs
|----------------------------------------------------------------------------------
|
| Don't Touch unless you know Yii2.
|
|----------------------------------------------------------------------------------
*/

$params = array_merge($config,$params);

foreach($config['themes'] as $i=>$theme) {
	$themePaths['@app/views'] = '@root/backend/themes/'.$config['themes'][$i].'/main';
	$themePaths['@root/backend/modules'] = '@root/backend/themes/'.$config['themes'][$i];

}

$core = [
	'defaultRoute' => '/home/admin/dash',
	'modules' => $modules,
    'components' => [
	    'view' => [
	        'theme' => [
	            'pathMap' => $themePaths,
	        ],
	    ],
	    'errorHandler' => [
	            'errorAction' => 'home/admin/error',
	     ],
	    'user' => [
	    	'identityClass' => 'common\models\Login',
			'enableAutoLogin' => false,
			'loginUrl' => ['auth/user/login'],
		],
	],
	'params' => $params,
];
return $core;