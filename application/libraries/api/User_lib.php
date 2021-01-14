<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_lib{
    protected $ci;
    private $_xToken;

    public function __construct(){
        $this->ci =& get_instance();
        $this->ci->load->library('curl');

        $this->apiUrl = $this->ci->config->item("API_URL");
        $this->_xToken = $this->ci->session->userdata['SESSION_SIMPEG_E'];
    }

    public function doConfirmUpdate( $pEmployeeId, $pType, $pAdminId ){
        $xURLAPI = $this->apiUrl . "/user/confirm";
        $xParam = array( "id" => $pEmployeeId, 
                         "type" => $pType );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;
    }
    
}
?>