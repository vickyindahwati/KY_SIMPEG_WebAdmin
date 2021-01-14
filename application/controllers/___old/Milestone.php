 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Milestone extends CI_Controller{

	protected $elementOption;


	function __construct(){

		parent::__construct();

		$this->load->model('mquery');
		$this->load->library('upload_file');

	}

	public function uploadFile(){

		$arr_result 	= array();

		$index 			= $this->uri->segment(3);

		$upload			= $this->upload_file->upload_milestone_file("milestone", "x_file_milestone_" . $index);

		$arr_result[]	= $upload['filename'];

		echo json_encode( $arr_result );

	}

	public function cancelUploadFile(){

		$fileName 		= $this->input->post('name');

		$this->upload_file->cancelUploadFile("milestone", $fileName);

	}

}
?>