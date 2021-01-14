<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendancereport extends CI_Controller{

	protected $elementOption;


	function __construct(){

		parent::__construct();

		$this->load->model('mquery');
		$this->load->library('upload_file');
		$this->load->library('export');

	}


	public function index(){

		#get template design

		$setting					= "";

		$template					= $this->template->load($setting);	

		$data 						= array();

		$data['title']				= 'General Report Attendance';
		$data['elementOption']		= $this->getTreeGroup( 0 );
		$data['rsTerminalId']		= $this->getTerminalID();
		
		$template['konten']			= $this->load->view('report/general_attendance/list', $data, true);


		#load container for template view

		$this->load->view('template/container',$template);

	}


	private function getTerminalID(){

		return $this->mgeneral->getWhere( array(), 'terminals', 'terminal_id', 'ASC' );

	}


	private function getTreeGroup( $id,
								   $sublev = '0' ){

		$rsGroup			= $this->mquery->getGroupData( $id );

		if( count( $rsGroup ) > 0 ){



			foreach( $rsGroup as $dtGroup ){

				$ss			= '';

				if( $sublev !== '0' ){

					for( $i = 0; $i <= $sublev*10;$i++ ){
						$ss .= '&nbsp;';
					}

					$ss		.= '|';

					for( $i = 0; $i <= $sublev; $i++ ){
						$ss .= '-';
					}

					$ss   	.= '&gt;&gt;';

				}

				$this->elementOption	.= '<option value="' . $dtGroup->group_id . '">' . $ss . $dtGroup->group_name . '</option>';

				$this->getTreeGroup( $dtGroup->group_id, $sublev + 1 );

			}

		}

		return $this->elementOption;

	}


	public function getAttendanceData(){

		$data 						= array();
		$param						= array();

		$data['title']				= 'Attendance Data';


		$attendDate 				= explode(" - ",$this->input->post('date'));
		$arrStartDate 				= explode( "/", $attendDate[0] );
		$arrEndDate 				= explode( "/", $attendDate[1] );

		$param['startDate']			= $arrStartDate[2] . "-" . $arrStartDate[0] . "-" . $arrStartDate[1];
		$param['endDate']			= $arrEndDate[2] . "-" . $arrEndDate[0] . "-" . $arrEndDate[1];
		$param['startTime']			= $this->input->post('startTime');
		$param['endTime']			= $this->input->post('endTime');
		$param['groupId']			= $this->input->post('group');
		$param['terminalId']		= implode(",",$this->input->post('terminalId'));

		$data['rs']					= $this->mquery->getNitGenAttendance( $param );

		$this->load->view('report/general_attendance/data', $data);

	}

	public function exportAttendance(){

		$attendDate 				= explode(" - ",$this->input->post('date'));
		$arrStartDate 				= explode( "/", $attendDate[0] );
		$arrEndDate 				= explode( "/", $attendDate[1] );

		/*$param['startDate']			= '2016-07-06';//$arrStartDate[2] . "-" . $arrStartDate[0] . "-" . $arrStartDate[1];
		$param['endDate']			= '2016-07-07';//$arrEndDate[2] . "-" . $arrEndDate[0] . "-" . $arrEndDate[1];
		$param['startTime']			= '00:00';//$this->input->post('startTime');
		$param['endTime']			= '23:59';//$this->input->post('endTime');
		$param['groupId']			= '';//$this->input->post('group');
		$param['terminalId']		= '';//implode(",",$this->input->post('terminalId'));*/

		$param['startDate']			= $arrStartDate[2] . "-" . $arrStartDate[0] . "-" . $arrStartDate[1];
		$param['endDate']			= $arrEndDate[2] . "-" . $arrEndDate[0] . "-" . $arrEndDate[1];
		$param['startTime']			= $this->input->post('startTime');
		$param['endTime']			= $this->input->post('endTime');
		$param['groupId']			= $this->input->post('group');
		$param['terminalId']		= implode(",",$this->input->post('terminalId'));

		$file_name					= $this->export->exportWorkerAttendance( $param );

		$result['fileName']			= $file_name;

		echo json_encode($result);

	}


}

?>