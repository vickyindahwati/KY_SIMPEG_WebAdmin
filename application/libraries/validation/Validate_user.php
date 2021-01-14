 <?php
class Validate_user

{

	protected 	$ci;



	public function __construct() {

		$this->ci =& get_instance();

		$this->ci->load->library('validation/validate_format');

		$this->ci->load->model('mquery');		

    }


    public function loginAdmin( $user_login, $user_password ){

      $arr_result       = array();

      /*1. Validate Username and Password*/
      $dt_validate      = $this->ci->mquery->validateAdminLogin( $user_login,
                                                                 $user_password
                                                                );

      if( $dt_validate[0]->row_count > 0 ){

        $arr_result     = array( 'errCode'   => '00',
                                 'errMsg'    => 'OK.');

      }else{        

        $arr_result     = array( 'errCode' => '07',
                                 'errMsg'  => 'Username or Password not valid.' );

      }

      return $arr_result;

    }

    public function loginManagement( $userLogin, $userPassword ){

      $arrResult        = array();

      $dtValidate       = $this->ci->mquery->validateManagementLogin( $userLogin, $userPassword );

      if( $dtValidate[0]->row_count > 0 ){

        $arrResult      = array( 'errCode'   => '00',
                                 'errMsg'    => 'OK');

      }else{

        $arrResult      = array( 'errCode' => '07',
                                 'errMsg'  => 'Username or Password not valid.' );

      }

      return $arrResult;

    }


}