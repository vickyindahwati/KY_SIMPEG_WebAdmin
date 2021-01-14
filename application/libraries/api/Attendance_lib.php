<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Attendance_lib
{
    protected $ci;
    private $_xToken;

    public function __construct(){
        $this->ci =& get_instance();
        $this->ci->load->library('curl');

        $this->apiUrl = $this->ci->config->item("API_URL");
        $this->_xToken = $this->ci->session->userdata['SESSION_SIMPEG_E'];
    }

    public function getAttendanceInfo( $pUserId ){
        $xURLAPI = $this->apiUrl . "/attendance/info?id=" . $pUserId;
        //echo ">>> API : " . $xURLAPI;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "GET", $xArrHeader);
        return json_decode($xAPIResult);
    }

    public function clockIn( $pUserId, $pLatitude, $pLongitude, $pClockIn ){
        $xURLAPI = $this->apiUrl . "/attendance/clock_in";
        $xParam = array( "id" => $pUserId,
                         "latitude" => $pLatitude,
                         "longitude" => $pLongitude,
                         "time_clockin" => $pClockIn );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;
    }

    public function clockOut( $pUserId, $pLatitude, $pLongitude, $pClockOut ){
        $xURLAPI = $this->apiUrl . "/attendance/clock_out";
        $xParam = array( "id" => $pUserId,
                         "latitude" => $pLatitude,
                         "longitude" => $pLongitude,
                         "time_clockout" => $pClockOut );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;
    }

    public function updateHealthyCheckStatus( $pUserId, $pHealthyCheckStatus, $HealthyCheckDescription ){
        $xURLAPI = $this->apiUrl . "/attendance/update_healthy_check";
        $xParam = array( "id" => $pUserId,
                         "healthy_check_status" => $pHealthyCheckStatus,
                         "healthy_check_desc" => $HealthyCheckDescription );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;
    }

    public function updateHealthyCheckStatusClockout( $pUserId, $pHealthyCheckStatus, $HealthyCheckDescription ){
        $xURLAPI = $this->apiUrl . "/attendance/update_healthy_check_clockout";
        $xParam = array( "id" => $pUserId,
                         "healthy_check_status" => $pHealthyCheckStatus,
                         "healthy_check_desc" => $HealthyCheckDescription );
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;
    }

    public function getAttendanceReport( $pUserId, $pRoleId, $pKeyword, $pTglAbsensi, $pUnorIndukId, $pKondisiKesehatan, $pLimit, $pOffset, $pDraw, $pOrderColumn, $pOrderDir ){
        $xURLAPI = $this->apiUrl . "/attendance/report?id=" . $pUserId . "&keyword=" . $pKeyword . "&tgl_absen=" . $pTglAbsensi . "&unor_induk_id=" . $pUnorIndukId . "&offset=" . $pOffset . "&limit=" . $pLimit . "&draw=" . $pDraw . "&kondisi_kesehatan=" . $pKondisiKesehatan . "&role_id=" . $pRoleId . "&order_col=" . $pOrderColumn . "&order_dir=" . $pOrderDir;;
        //echo ">>> API : " . $xURLAPI;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "GET", $xArrHeader);
        return ($xAPIResult);
    }

}