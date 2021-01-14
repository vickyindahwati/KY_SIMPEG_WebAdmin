<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_lib
{
    protected $ci;
    private $_xToken;

    public function __construct(){
        $this->ci =& get_instance();
        $this->ci->load->library('curl');

        $this->apiUrl = $this->ci->config->item("API_URL");
        $this->_xToken = $this->ci->session->userdata['SESSION_SIMPEG_E'];
    }

    public function doLogin( $pUsername, $pPassword ){

        $xURLAPI = $this->apiUrl . "/login";
        $xParam = array( "nip" => $pUsername, "password" => $pPassword );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", null);
        //echo $xURLAPI;
        return json_decode($xAPIResult,true);

    }

    public function doForgotPassword( $pNIP ){

        $xURLAPI = $this->apiUrl . "/forgotPassword";
        $xParam = array( "nip" => $pNIP );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", null);
        //echo $xURLAPI;
        return json_decode($xAPIResult,true);

    }
}
?>