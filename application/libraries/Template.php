<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Template 

{

	

	function load($setting)

	{

		$ci = & get_instance();

		$this->cekLogin();		

		$data								= array();

		$temp['inc_header']					= $ci->load->view('template/inc_header',$setting['inc_header'],true);

		$temp['header_nav']					= $ci->load->view('template/header_nav',$setting['menu'],true);

		$temp['sidebar']					= $ci->load->view('template/sidebar',$data,true);

		

		return $temp;

	}

	

	function cekLogin()

	{

		$ci = & get_instance();

		// echo $ci->converter->decode('nxMGIVsgnSbnoRYGQXvPzsjUB9itjDVB_w1ii1guYg0');break;
		//echo $ci->session->userdata('SESSION_SIMPEG_E');
		if($ci->session->userdata('SESSION_SIMPEG_E')=="")

		{

			redirect("index.php/login","refresh");

		}

	}

	

}



?>