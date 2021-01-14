<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller{

	private $userId;
	private $dbAESKey;

	function __construct(){
		parent::__construct();
		$this->load->library('curl');
		$this->dbAESKey 			= $this->config->item("dbAESKey");
	}

	public function index(){

		#get template design

		$setting					= "";

		$template					= $this->template->load($setting);	

		$data 						= array();

		$data['title']				= 'Customer List';
		
		$template['konten']			= $this->load->view('master/member/list', $data, true);


		#load container for template view

		$this->load->view('template/container',$template);

	}

	public function getList(){

		$data 						= array();
		$this->load->view('master/member/data', $data);

	}

	public function getMemberData(){
		
		$keyword 					= "";
		$start 						= $this->input->post('start');
		$length 					= $this->input->post('length');
		$draw 						= $this->input->post('draw');

		$api 						= "/member/getMember";
		$postData 					= array("keyword"	=> "",
											"key"		=> $this->dbAESKey,
											"start"		=> $start,
											"limit"		=> $length,
											"draw"		=> $draw);

		$jsonResult 				= $this->curl->sendAPIMaster( $api, json_encode($postData) );

		$this->output
        	->set_content_type('application/json')
        	->set_output($jsonResult);

	}


}
?>