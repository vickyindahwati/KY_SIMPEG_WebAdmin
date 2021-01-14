<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Unor_lib
{
    protected $ci;
    private $_xToken;

    public function __construct(){
        $this->ci =& get_instance();
        $this->ci->load->library('curl');

        $this->apiUrl = $this->ci->config->item("API_URL");
        $this->_xToken = $this->ci->session->userdata['SESSION_SIMPEG_E'];
    }

    public function getUnorList( $pKeyword, $pLimit, $pOffset, $pDraw, $pType ){
        $xURLAPI = $this->apiUrl . "/unor?keyword=" . $pKeyword . "&offset=" . $pOffset . "&limit=" . $pLimit . "&draw=" . $pDraw . "&type=" . $pType;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',       
            'X-ID: ' . $pUserId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, "", "GET", $xArrHeader);
        //echo $xURLAPI;
        return $xAPIResult;
    }

    public function save( $pAdminId, $pId, $pName, $pParentId, $pType, $pAct ){
        $xURLAPI = $this->apiUrl . "/unor/add";
        $xParam = array( "id" => $pId,
                         "name" => $pName,
                         "parent_id" => $pParentId,
                         "type" => $pType,
                         "act" => $pAct  );
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