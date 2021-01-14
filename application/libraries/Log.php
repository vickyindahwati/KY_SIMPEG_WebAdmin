<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log

{

	protected 	$ci;



	public function __construct() {

        $this->ci =& get_instance();

	}
	
	
	#	Save Log
	public function saveMembersLogs( $member_id, $log_type, $ip ){
	
		$arr_log = array('member_id'		=> $member_id,
				 		 'log_type'	 		=> $log_type,
						 'from_ip'			=> $ip
		);
	
		$log_id = $this->ci->mgeneral->save($arr_log, 'memberslogs');
	
		return $log_id;
	
	}


	#	Save Member Activity
	public function saveMembersActivities_subscribeCategory( $member_id, $category_name, $activity ){

		$description = '';

		if( $activity == 'follow_category' )$description = str_replace('[#CategoryName#]', $category_name, CONST_LOG_MSG_FOLLOW_CATEGORY);
		else if( $activity == 'unfollow_category' )$description = str_replace('[#CategoryName#]', $category_name, CONST_LOG_MSG_UNFOLLOW_CATEGORY);
	
		$arr_log = array('member_id'		=> $member_id,
				 		 'log_date'	 		=> date('Y-m-d H:i:s'),
						 'activity'			=> $activity,
						 'description'		=> $description
		);
	
		$log_id = $this->ci->mgeneral->save($arr_log, 'membersactivities');
	
		return $log_id;
	
	}


	public function saveMembersActivities_subscribeSupplier( $member_id, $supplier_name, $activity ){

		$description = '';

		if( $activity == 'follow_supplier' )$description = str_replace('[#SupplierName#]', $supplier_name, CONST_LOG_MSG_FOLLOW_SUPPLIER);
		else if( $activity == 'unfollow_supplier' )$description = str_replace('[#SupplierName#]', $supplier_name, CONST_LOG_MSG_UNFOLLOW_SUPPLIER);
	
		$arr_log = array('member_id'		=> $member_id,
				 		 'log_date'	 		=> date('Y-m-d H:i:s'),
						 'activity'			=> $activity,
						 'description'		=> $description
		);
	
		$log_id = $this->ci->mgeneral->save($arr_log, 'membersactivities');
	
		return $log_id;
	
	}
	
}

?>