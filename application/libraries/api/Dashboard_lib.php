<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard_lib
{
    protected $ci;
    private $_xToken;

    public function __construct(){
        $this->ci =& get_instance();
        $this->ci->load->library('curl');

        $this->apiUrl = $this->ci->config->item("API_URL");
        $this->_xToken = $this->ci->session->userdata['SESSION_SIMPEG_E'];
    }

    /*Employee Birthday*/
    public function getTodayEmployeeBirthday($pUserId){
        $xURLAPI = $this->apiUrl . "/dashboard/birthday";
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'X-ID: ' . $pUserId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "GET", $xArrHeader);
        return json_decode($xAPIResult);
    }

    /*Employee Pendidikan Terakhir*/
    public function getPendidikanTerakhir( $pUserId ){
        $xURLAPI = $this->apiUrl . "/dashboard/pendidikan_terakhir?id=" . $pUserId;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'X-ID: ' . $pUserId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, "", "GET", $xArrHeader);
        return json_decode($xAPIResult);
    }

    /*Employee Peninjauan Masa Kerja*/
    public function getPeninjauanMasaKerja( $pUserId ){
        $xURLAPI = $this->apiUrl . "/dashboard/pmk?id=" . $pUserId;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'X-ID: ' . $pUserId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, "", "GET", $xArrHeader);
        return json_decode($xAPIResult);
    }

    /*Employee News*/
    public function getNews(){
        $xURLAPI = $this->apiUrl . "/dashboard/news";
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'X-ID: ' . $pUserId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, "", "GET", $xArrHeader);
        return json_decode($xAPIResult);
    }

    /*Employee SKP*/
    public function getSKP($pId){
        $xURLAPI = $this->apiUrl . "/dashboard/skp?id=" . $pId . "&year=" . ( (int)date('Y') - 1 );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'X-ID: ' . $pUserId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, "", "GET", $xArrHeader);
        return json_decode($xAPIResult);
    }

    /*Attendance Info*/
    public function getAttendanceInfo($pId){
        $xURLAPI = $this->apiUrl . "/attendance/info?id=" . $pId;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'X-ID: ' . $pUserId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, "", "GET", $xArrHeader);
        return json_decode($xAPIResult);
    }

}