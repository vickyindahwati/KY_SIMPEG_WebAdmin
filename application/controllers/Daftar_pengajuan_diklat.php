<?php defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_pengajuan_diklat extends CI_Controller
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
		$template['konten'] = $this->load->view('daftar_pengajuan_diklat/list', $data, true);
		$this->load->view('template/container',$template);
	}

	public function show($id)
	{
		$setting = "";
		$template = $this->template->load($setting);
		$data = ['id' => $id];
		$template['konten'] = $this->load->view('daftar_pengajuan_diklat/detail', $data, true);
		$this->load->view('template/container',$template);
	}
}
