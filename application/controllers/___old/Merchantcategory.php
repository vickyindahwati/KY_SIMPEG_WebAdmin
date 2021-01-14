 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchantcategory extends CI_Controller{

	private $msgSuccessAdd;
	private $msgFailedAdd;
	private $msgSuccessUpdate;
	private $primaryKeyColumnName;
	private $crudTable;
	private $userId;
	private $departmentId;


	function __construct(){

		parent::__construct();

		$this->load->model('mquery');
		$this->load->library('upload_file');

		$this->msgSuccessAdd		= "Add Merchant Category successfully";
		$this->msgFailedAdd			= "Add Merchant Category failed";
		$this->msgSuccessUpdate 	= "Update Merchant Category successfully";

		$this->primaryKeyColumnName	= "merchantCategoryId";
		$this->crudTable 			= "ms_merchantcategories";
		$this->userId 				= $this->converter->decode( $this->session->userdata['SESSION_AYRS_A'] );


	}

	public function index(){

		#get template design

		$setting					= "";

		$template					= $this->template->load($setting);	

		$data 						= array();

		$data['title']				= 'MERCHANT CATEGORIES';
		
		$template['konten']			= $this->load->view('master/merchant_category/list', $data, true);


		#load container for template view

		$this->load->view('template/container',$template);

	}

	public function getMerchantCategoryData(){

		$data['rs']					= $this->mgeneral->getWhere( array( 'status'	=> 1,
																		'isDelete'	=> 0),
																 "ms_merchantcategories" );

		$this->load->view('master/merchant_category/data', $data);

	}

	public function save(){

		$act 							= $this->input->post( 'x_act' );

		$data['categoryName']			= $this->input->post('x_category_name');
		$data['status']					= $this->input->post('x_status');
		$fileIcon 						= $this->input->post('x_file_icon');
		$fileLandscape 					= $this->input->post('x_file_landscape');
		
		if( $act == 'add' ){

			$data['created']			= date('Y-m-d H:i:s');
			$data['createdUser']		= $this->userId;

			if( $fileIcon <> '' ){
				$data['icon']			= $fileIcon;
			}
			if( $fileLandscape <> '' ){
				$data['photoLandscape']	= $fileLandscape;
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

			if( $fileIcon <> '' ){
				$data['icon']			= $fileIcon;
			}
			if( $fileLandscape <> '' ){
				$data['photoLandscape']	= $fileLandscape;
			}

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

	public function uploadFileIcon(){

		$arr_result 	= array();

		$upload			= $this->upload_file->doUploadFlile("merchant_categories/icon", "x_file_icon", "100");

		$arr_result[]	= $upload['filename'];

		echo json_encode( $arr_result );

	}


	public function cancelUploadFileIcon(){

		$this->upload_file->cancelUpload("merchant_categories/icon");

	}


	public function uploadFileLandscape(){

		$arr_result 	= array();

		$upload			= $this->upload_file->doUploadFlile("merchant_categories/landscape", "x_file_landscape", "100");

		$arr_result[]	= $upload['filename'];

		echo json_encode( $arr_result );

	}


	public function cancelUploadFileLandscape(){

		$this->upload_file->cancelUpload("merchant_categories/landscape");

	}

}

?>