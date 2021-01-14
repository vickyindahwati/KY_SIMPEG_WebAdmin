<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Person extends CI_Controller{

	protected $elementOption;


	function __construct(){

		parent::__construct();

		$this->load->model('mquery');
		$this->load->library('upload_file');
		$this->load->library('export');

	}

	

}