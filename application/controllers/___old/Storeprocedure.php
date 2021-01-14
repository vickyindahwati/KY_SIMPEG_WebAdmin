<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Storeprocedure{

	protected $dbHashKey;
	protected $ci;

	private $userId;
	private $roleId;
	private $userName;

	function __construct(){

		$this->ci 				=& get_instance();
		$this->dbHashKey 		= $this->ci->config->item('dbHashKey');

	}

	public function index(){

	}

	public function generateAccountNumber(){

		$sqlSP					= 'CALL sp_generate_account_number()';
		$rsSP 					= $this->ci->mgeneral->callStoreProc( $sqlSP, array() );

		if( $rsSP[0]->errCode == '00' ){
			return $rsSP[0]->accountNumber;
		}else{
			return '';
		}

	}

	public function SP_Advertise( $param ){
		$arrResult 				= array();

		$sqlSP 					= 'CALL sp_register_advertise( ' . $this->ci->mgeneral->printDataBinding( count($param) ) . ' )';
		$rsSP 					= $this->ci->mgeneral->callStoreProc( $sqlSP, $param );

		if( $rsSP[0]->errCode == '00' ){
			$arrResult 			= array( 'errCode'	=> '00',
										 'errMsg'	=> 'Save advertise data successfully.' . $param[2] );
		}else{
			$arrResult 			= array( 'errCode'	=> '00',
										 'errMsg'	=> 'Save advertise data failed. Err : ' . $rsSP[0]->errMsg );
		}

		return $arrResult;
	}

}
?>