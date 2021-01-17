<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Inappnotification_lib
{
    protected $ci;
    private $_xToken;

    public function __construct(){
        $this->ci =& get_instance();
        $this->ci->load->library('curl');

        $this->apiUrl = $this->ci->config->item("API_URL");
        $this->_xToken = $this->ci->session->userdata['SESSION_SIMPEG_E'];
        $this->apiUrl_V2 = $this->ci->config->item("API_URL_V2");
    }

    public function getNotification( $pLeaveDate ){
        $xURLAPI = $this->apiUrl_V2 . "/inapp_notification/list?keyword=";
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'x-method: simpeg',
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "GET", $xArrHeader);
        return $xAPIResult;
    }

    public function updateFlagProcessedNotification( $pId ){
        $xURLAPI = $this->apiUrl_V2 . "/inapp_notification/save";
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'x-method: simpeg',
        );
        $xParam = array(
            "id" => $pId,
            "is_processed" => 1,
            "act" => "update"
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;
    }

}
?>