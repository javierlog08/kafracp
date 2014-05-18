<?php
namespace common\modules\setup;

use Yii;

class SetupRBAC {
	

	/*
    * Define default app permisions and default roles
    */
    function install() 
    {
    	include_once(__DIR__ . '/DefaultModuleAccess.php');
    	$this->setupPermissions($defaulAdminPermissions);
    	$this->setupPermissions($defaulPlayerPermissions);
    	$this->setupRoles("admin",$defaulAdminPermissions);
    	$this->setupRoles("player",$defaulPlayerPermissions);

    }

    /*
    * Create permisions on database manager
    */
    function setupPermissions($permissions) 
    {
        $auth = Yii::$app->authManager;
    	foreach($permissions as $name=>$description) {
    		$p = $auth->createPermission($name);
	    	$p->description = $description;
	    	$auth->add($p); 

    	}
    }


    /*
    * Create roles and assign permisions to that roles
    */
    function setupRoles($role,$permissions) 
    {
        $auth = Yii::$app->authManager;
        $r = $auth->createRole($role);
    	$auth->add($r);
    	foreach($permissions as $name=>$description)
    		 $auth->addChild($r, $auth->getPermission($name));
    }
}