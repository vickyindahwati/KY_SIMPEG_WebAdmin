<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller{

	function __construct(){

		parent::__construct();
		$this->load->helper('download');

	}

	public function index(){
		$content			= file_get_contents('http://localhost/IIRS/issuer/uploads/merchant/qrcode/5430153822.png');
		$fileNameContent 	= '5430153822.png';
		force_download($fileNameContent,$content);
	}

	public function downloadMerchantQRCode(){
		$fileName 			= $this->input->post( 'fn' );
		$content 			= file_get_contents( CONST_MERCHANT_QRCODE . $fileName );
		force_download( $fileName, $content );
	}

}

?>