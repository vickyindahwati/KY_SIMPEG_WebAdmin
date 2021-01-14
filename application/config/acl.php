<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['acl_table_users'] = 'users';
$config['acl_table_permissions'] = 'user_privilege';
$config['acl_table_role_permissions'] = 'user_role_privilege';
$config['acl_user_session_key'] = 'SESSION_SIMPEG_A';

$config['acl_users_fields'] = array(
	'id' => 'id',
	'role_id' => 'role'
);

$config['acl_role_permissions_fields'] = array(
	'id' => 'id',
	'role_id' => 'user_role_id',
	'permission_id' => 'user_privilege_id'
);

$config['acl_permissions_fields'] = array(
	'id' => 'id',
	'key' => 'key'
);



/*$config['acl_restricted'] = array(

	'controller/method' => array(
		'allow_roles' => array(1),
		'allow_users' => array(1),
		'error_msg' => 'You do not have permission to visit this page!'
	),

	'welcome/*' => array(
		'allow_roles' => array(1),
		'allow_users' => array(1),
		'error_msg' => 'You do not have permission to visit this page!'
	)

);*/