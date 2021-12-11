<?php defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_feedback_diklat extends CI_Controller
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
		$template['konten'] = $this->load->view('report/feedback_diklat/list', $data, true);
		$this->load->view('template/container',$template);
	}
}
