<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile_lib
{
    protected $ci;
    private $_xToken;

    public function __construct(){
        $this->ci =& get_instance();
        $this->ci->load->library('curl');

        $this->apiUrl = $this->ci->config->item("API_URL");
        $this->_xToken = $this->ci->session->userdata['SESSION_SIMPEG_E'];
    }

    public function getProfile( $pUserId ){
        $xURLAPI = $this->apiUrl . "/user/profile?id=" . $pUserId;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($param),
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, "", "GET", $xArrHeader);
        //echo $xURLAPI;
        return json_decode($xAPIResult,true);

    }

    public function updateProfile( $pUserId, $pTelepon, $pEmail, $pAlamatTinggal, $pAlamatKTP ){
        $xURLAPI = $this->apiUrl . "/user/update";
        $xParam = array( "telepon" => $pTelepon, 
                         "email" => $pEmail,
                         "alamat_tinggal" => $pAlamatTinggal,
                         "alamat_ktp" => $pAlamatKTP );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pUserId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;
    }

    public function confirmUpdateProfile( $pId, $pType, $pReason, $pUserId ){
        $xURLAPI = $this->apiUrl . "/user/confirm";
        $xParam = array( "id" => $pId, 
                         "type" => $pType,
                         "reason" => $pReason );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'x-id: ' . $pUserId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;
    }

    public function uploadPhoto( $pUserId, $pPhoto ){
        $xURLAPI = $this->apiUrl . "/user/uploadPhoto";
        $xParam = array( "id" => $pUserId, 
                         "photo" => $pPhoto );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pUserId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;
    }

    public function checkUserPending( $pUserId ){
        $xURLAPI = $this->apiUrl . "/user/pending?id=" . $pUserId;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',  
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, "", "GET", $xArrHeader);
        //echo $xURLAPI;
        return json_decode($xAPIResult,true);
    }

    public function getLastRequestUpdate( $pUserId ){
        $xURLAPI = $this->apiUrl . "/user/last_request_update?id=" . $pUserId;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($param),
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, "", "GET", $xArrHeader);
        //echo $xURLAPI;
        return json_decode($xAPIResult,true);

    }

    public function uploadSK( $pUserId, $pId, $pFileName, $pModule ){
        $xURLAPI = $this->apiUrl . "/user/" . $pModule . "/upload_sk";
        $xParam = array( "id" => $pId, 
                         "file_name" => $pFileName );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pUserId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;
    }
}
?>