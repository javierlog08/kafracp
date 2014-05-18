<?php

/*
| Backend Modules Permissions
|-------------------------------------------------------
| This are permisions and roles to use on that modules 
| that come installed on Kafra panel backend by default
|-------------------------------------------------------
*/
$defaulAdminPermissions = [
	'adminDashboard' => 'Access to Backend Dashboard',
	'adminAccountManagment' => 'Account ban, Storage Information, Characters Management',
	'adminGuildManagment' => 'View Guild castles, Revoke castles, View Guild Storage',
	'adminServerManagment' => 'Server Logs, GDB Logs view, Server runtime screens. Server start/stop/restart',
	'adminCpLogManagment' => 'View control panel logs: Password restarts, email changes',
	'adminSystemConfig' => 'Change server IP , Change Map / Char / Login Ports, Change Server Name',
	'adminThemeManagment' => 'Create for those web designers than also want edit server database -_- .',
	'adminDonations' => 'Payment History, Item Cart List',
];

/*
| Frontend Modules Permissions
|-------------------------------------------------------
| This are permisions and roles to use on that modules 
| that come installed on Kafra panel frontend by default
|-------------------------------------------------------
*/
$defaulPlayerPermissions = [
	'playerAccountManagement' => 'Allow users access to their account panel',
	'playerAccountStorage' => 'Allow users to see their storages',
	'playerAccountChangeSex' => 'Change account Sex',
	'playerAccountChangeEmail' => 'Change Player account Mail',
	'playerCharacterDelete' => 'Allow Detele character to players',
	'playerCharacterViews' => 'Allow Users to view their characters',
	'playerCharacterInventory' => 'Allow Users to see their inventory',
	'playerCharacterEquipInfo' => 'Allow users to see character equip',
	'playerResetCharacterPosition' => 'Allow reset characters positon and die to avoid bugs',
	'playerCharacterSharedBuild' => 'Allow to users shared their builds to the world',
];
