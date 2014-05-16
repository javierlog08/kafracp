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
	'serverName'=>	"Kafra CP",
	'themes'=>	['basic'],
];



/*
|  Modules configs
|----------------------------------------------------------------------------------
|
| If you are installing a new module add it here.
| For convention path to your module must be:
| 
| 'YourModuleName' => [
|     	'class' => 'root\frontend\modules\YourModuleName\YourModuleNameClass',
|  ],
| 
|
|----------------------------------------------------------------------------------
*/
$modules = [
	'home' => [
     	'class' => 'root\frontend\modules\home\HomeModule',
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
	$themePaths['@app/views'] = '@root/frontend/themes/'.$config['themes'][$i].'/main';
	$themePaths['@root/frontend/modules'] = '@root/frontend/themes/'.$config['themes'][$i];

}

$core = [
	'modules' => $modules,
    'components' => [
	    'view' => [
	        'theme' => [
	            'pathMap' => $themePaths,
	        ],
	    ],
	    'errorHandler' => [
	            'errorAction' => 'home/default/error',
	     ],
	],
	'params' => $params,
];
return $core;