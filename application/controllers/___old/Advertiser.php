<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Advertiser extends CI_Controller{


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

		$data['title']				= 'Advertiser';
		
		$template['konten']			= $this->load->view('master/advertiser/list', $data, true);


		#load container for template view

		$this->load->view('template/container',$template);

	}

	public function getAdvertiserData(){

		$data 						= array();

		$keyword 					= $this->input->post('x_keyword');
 
		$data['rs']					= $this->mquery->getAdvertiserData( $keyword );

		$this->load->view('master/advertiser/data', $data);

	}


	public function save(){

		$session_user_id 								= $this->session->userdata['SESSION_AYRS_A'];		
		$act 											= $this->input->post('x_act');
		$arrResult										= array();
		$data 											= array();

		$data['companyName']							= $this->input->post('x_name');
		$file											= $this->input->post('x_file');
		
		$data['status']									= $this->input->post('x_status');

		if( $act == 'add' ){	

			if( $file <> '' ){
				$data['logo']							= $file;
			}

			$companyId 									= $this->mgeneral->save( $data, 'ms_companies' );

			if( (int)$companyId > 0 ){

				$arrResult								= array( 'errCode'		=> '00',
											 	 				 'errMsg'		=> 'Successfully Add Advertiser');

			}else{

				$arrResult								= array( 'errCode'		=> '00',
											 	 				 'errMsg'		=> 'Failed Add Advertiser');

			}

		}else{

			$id 										= $this->converter->decode( $this->input->post('x_id') );
			$file										= $this->input->post('x_file');

			if( $file <> '' ){
				$data['logo']							= $file;
			}

			$this->mgeneral->update( array( 'companyId'	=> $id ),
									 $data,
									 'ms_companies' );

			$arrResult									= array( 'errCode'		=> '00',
											 	 				 'errMsg'		=> 'Successfully update Advertiser');

		}

		echo json_encode($arrResult);

	}


	public function delete(){

		$arrResult  = array();

		$id 		= $this->converter->decode( $this->input->post( 'id' ) );

		$this->mgeneral->delete( array( 'companyId' => $id ), 'ms_companies' );

		$arrResult 	= array( 'errCode'	=> '00',
							 'errMsg'	=> 'Successfully delete advertiser.' );

		echo json_encode($arrResult);

	}

	public function uploadFile(){

		$arr_result 	= array();

		$upload			= $this->upload_file->doUploadInternalFile("company", "x_file", "100");

		$arr_result[]	= $upload['filename'];

		echo json_encode( $arr_result );

	}


	public function cancelUploadFile(){

		$this->upload_file->cancelInternalUpload("company");

	}

}

?>