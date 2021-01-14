<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Userunor_lib
{
	protected $ci;
    private $_xToken;

    public function __construct(){
        $this->ci =& get_instance();
        $this->ci->load->library('curl');

        $this->apiUrl = $this->ci->config->item("API_URL");
        $this->_xToken = $this->ci->session->userdata['SESSION_SIMPEG_E'];
    }

    public function addUnorHeader( $pAdminId, $pId, $pCode, $pName, $pEffectiveDate, $pAct ){
        $xURLAPI = $this->apiUrl . "/user/jabatan/header/add";
        //echo "URL : " . $xURLAPI;
        $xParam = array( "code" => $pCode, 
                         "name" => $pName,
                         "id" => $pId,
                         "effective_date" => $pEffectiveDate,
                         "act" => $pAct );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;
    }

    public function addUnorDetail( $pAdminId, $pId, $pHeaderId, $pUnorId, $pUserId, $pEffectiveDate, $pAct ){
        $xURLAPI = $this->apiUrl . "/user/jabatan/detail/add";
        //echo "URL : " . $xURLAPI;
        $xParam = array( "id" => $pId, 
                         "unor_header_id" => $pHeaderId,
                         "unor_id" => $pUnorId,
                         "user_id" => $pUserId,
                         "effective_date" => $pEffectiveDate,
                         "act" => $pAct );
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