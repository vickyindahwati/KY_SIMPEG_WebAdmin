<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends CI_Controller{


	function __construct(){

		parent::__construct();

		$this->load->model('mquery');
		$this->load->library('upload_file');

	}


	public function index(){

		#get template design

		$setting					= "";

		$template					= $this->template->load($setting);	

		$data 						= array();

		$session_operator_id		= $this->session->userdata['SESSION_GR_E'];

		$data['title']				= 'Driver Data';
		$data['rs_trayek']			= $this->mquery->getTrayek( $session_operator_id );

		
		$template['konten']			= $this->load->view('map', $data, true);


		#load container for template view

		$this->load->view('template/container',$template);

	}

}