<?php defined('BASEPATH') or exit('No direct script access allowed');

class Diklat extends CI_Controller
{

	protected $ci;

	function __construct(){
		parent::__construct();
		$this->ci =& get_instance();
	}

	public function index()
	{
		$setting = "";
		$template = $this->template->load($setting);
		$data = [];
		$template['konten'] = $this->load->view('master/diklat/list', $data, true);
		$this->load->view('template/container',$template);
	}
}
