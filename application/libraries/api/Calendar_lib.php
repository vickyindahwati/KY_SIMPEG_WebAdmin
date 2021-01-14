<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar_lib
{
    protected $ci;
    private $_xToken;

    public function __construct(){
        $this->ci =& get_instance();
        $this->ci->load->library('curl');

        $this->apiUrl = $this->ci->config->item("API_URL_V2");
        $this->_xToken = $this->ci->session->userdata['SESSION_SIMPEG_E'];
    }

    public function getCalendarHoliday( $pKeyword, $pLimit, $pOffset ){
        $xUrlAPI = $this->apiUrl . '/holiday/list?keyword=' . $pKeyword . '&offset=' . $pOffset . '&limit=' . $pLimit;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'x-method: simpeg',
        );
        $xAPIResult = $this->ci->curl->sendAPI($xUrlAPI, json_encode($xParam), "GET", $xArrHeader);
        return ($xAPIResult);
    }
}

?>