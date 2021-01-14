<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Openingimage extends CI_Controller{

	private $msgSuccessAdd;
	private $msgFailedAdd;
	private $msgSuccessUpdate;
	private $primaryKeyColumnName;
	private $crudTable;
	private $userId;


	function __construct(){

		parent::__construct();

		$this->load->model('mquery');
		$this->load->library('upload_file');

		$this->msgSuccessAdd		= "Add Opening Image successfully";
		$this->msgFailedAdd			= "Add Opening Image failed";
		$this->msgSuccessUpdate 	= "Update Opening Image successfully";

		$this->primaryKeyColumnName	= "id";
		$this->crudTable 			= "ms_openingimages";
		$this->userId 				= $this->converter->decode( $this->session->userdata['SESSION_AYRS_A'] );

	}

	public function index(){

		#get template design

		$setting					= "";

		$template					= $this->template->load($setting);	

		$data 						= array();

		$data['title']				= 'Opening Image';
		
		$template['konten']			= $this->load->view('master/opening_image/list', $data, true);


		#load container for template view

		$this->load->view('template/container',$template);

	}

	public function getOpeningImageData(){

		$data 						= array();
 
		$data['rs']					= $this->mgeneral->getWhere( array( 'status' => 1, 'isDelete' => 0 ),
																 "ms_openingimages" );

		$this->load->view('master/opening_image/data', $data);

	}


	public function save(){

		$act 							= $this->input->post( 'x_act' );

		$data['status']					= $this->input->post('x_status');
		$data['sequence']				= $this->input->post('x_sequence');
		$file 							= $this->input->post('x_file');
		
		if( $act == 'add' ){

			$data['created']			= date('Y-m-d H:i:s');
			$data['createdUser']		= $this->userId;

			if( $file <> '' ){
				$data['photo']			= $file;
			}

			$lastId 					= $this->mgeneral->save( $data, $this->crudTable );

			if( (int)$lastId > 0 ){

				$arrResult					= array( 'errCode'		=> '00',
								 	 				 'errMsg'		=> $this->msgSuccessAdd
								 	 			    );

			}else{

				$arrResult				= array( 'errCode'		=> '-99',
											 	 'errMsg'		=> $this->msgFailedAdd);

			}

		}else{

			$id 						= $this->converter->decode( $this->input->post('x_id') );

			$this->mgeneral->update( array( $this->primaryKeyColumnName	=> $id ),
									 $data,
									 $this->crudTable );

			$arrResult					= array( 'errCode'		=> '00',
											 	 'errMsg'		=> $this->msgSuccessUpdate);

		}

		echo json_encode($arrResult);

	}

	public function delete(){

		$arrResult  = array();

		$id 		= $this->converter->decode( $this->input->post( 'id' ) );

		$this->mgeneral->delete( array( $this->primaryKeyColumnName => $id ), $this->crudTable );

		$arrResult 	= array( 'errCode'	=> '00',
							 'errMsg'	=> $this->msgSuccessDelete );

		echo json_encode($arrResult);

	}

	public function uploadFile(){

		$arr_result 	= array();

		$upload			= $this->upload_file->doUploadFlile("opening_image", "x_file", "100");

		$arr_result[]	= $upload['filename'];

		echo json_encode( $arr_result );

	}


	public function cancelUploadFile(){

		$this->upload_file->cancelUpload("opening_image");

	}	

}

?>