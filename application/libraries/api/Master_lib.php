<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Master_lib
{
    protected $ci;
    private $_xToken;

    public function __construct(){
        $this->ci =& get_instance();
        $this->ci->load->library('curl');

        $this->apiUrl = $this->ci->config->item("API_URL");
        $this->_xToken = $this->ci->session->userdata['SESSION_SIMPEG_E'];
    }

    /*Golongan*/
    public function getGolonganList(){
    	$xURLAPI = $this->apiUrl . "/master/golongan";
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',       
            'X-ID: ' . $pUserId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, "", "GET", $xArrHeader);
        //echo $xURLAPI;
        return json_decode($xAPIResult);
    }

    /*Unit Kerja*/
    public function getUnitKerjaList(){
        $xURLAPI = $this->apiUrl . "/master/unit_kerja";
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',       
            'X-ID: ' . $pUserId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, "", "GET", $xArrHeader);
        //echo $xURLAPI;
        return json_decode($xAPIResult,true);
    }

    /*All Master*/
    public function getMaster($modulepPath, $keyword = ''){
        $xURLAPI = $this->apiUrl . "/master/" . $modulepPath . "?keyword=" . $keyword;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',       
            'X-ID: ' . $pUserId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, "", "GET", $xArrHeader);
        //echo $xURLAPI;
        return json_decode($xAPIResult);
    }

    public function getMaster_2($modulepPath, $keyword = ''){
        $xURLAPI = $this->apiUrl . "/master/" . $modulepPath . "?keyword=" . $keyword;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',       
            'X-ID: ' . $pUserId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, "", "GET", $xArrHeader);
        //echo $xURLAPI;
        return json_decode($xAPIResult,true);
    }

    public function getMasterById($pUserId, $pModule, $pId = ''){
        $xURLAPI = $this->apiUrl . $pModule . "?id=" . $pId;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',       
            'X-ID: ' . $pUserId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, "", "GET", $xArrHeader);
        //echo $xURLAPI;
        return json_decode($xAPIResult, true);
    }

}