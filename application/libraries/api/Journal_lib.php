<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Journal_lib
{
	protected $ci;
	private $_xToken;

	public function __construct(){
        $this->ci =& get_instance();
        $this->ci->load->library('curl');

        $this->apiUrl = $this->ci->config->item("API_URL");
        $this->_xToken = $this->ci->session->userdata['SESSION_SIMPEG_E'];
    }

    public function getJournalList( $pUserId, $pRoleId, $pKeyword, $pTglJournal, $pUnorInduk, $pLimit, $pOffset, $pDraw, $pOrderColumn, $pOrderDir ){
        $xURLAPI = $this->apiUrl . "/journal/list?id=" . $pUserId . "&keyword=" . $pKeyword . "&offset=" . $pOffset . "&limit=" . $pLimit . "&draw=" . $pDraw . "&tgl_jurnal=" . $pTglJournal . "&unor_induk_id=" . $pUnorInduk . "&role_id=" . $pRoleId . "&order_col=" . $pOrderColumn . "&order_dir=" . $pOrderDir;;
        //echo ">>> API : " . $xURLAPI;
        $xArrHeader = array(                                                                          
            'Content-Type: application/json',
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "GET", $xArrHeader);
        return ($xAPIResult);
    }

    public function saveJournal( $pUserId, $pJournalDate, $pSubject, $pBody ){
    	$xURLAPI = $this->apiUrl . "/journal/save";
    	$xParam = array( "tgl_jurnal" => $pJournalDate,
    				     "id" => $pUserId,
    				     "subject" => $pSubject,
    				     "body" => $pBody );
    	$xArrHeader = array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($xParam)),
            'X-ID: ' . $pAdminId,
            'Authorization: Bearer ' . $this->_xToken
        );
        $xAPIResult = $this->ci->curl->sendAPI($xURLAPI, json_encode($xParam), "POST", $xArrHeader);
        return $xAPIResult;
    }

    public function cancelJournal( $pId ){
    	$xURLAPI = $this->apiUrl . "/journal/cancel";
    	$xParam = array( "id" => $pId );
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