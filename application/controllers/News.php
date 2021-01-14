<?php defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller{

  protected $ci;

	private $_xUserId;
	private $_xToken;
  private $_xUnorId;
  private $_xRoleId;
  private $_xIsFirstLogin;

	function __construct(){

    		parent::__construct();

    		$this->ci =& get_instance();
    		$this->ci->load->library('api/employee_lib');
        $this->ci->load->library('global_lib');
    		$this->load->library('upload_file');
    		$this->load->library('acl');

    		$this->_xUserId = $this->ci->session->userdata['SESSION_SIMPEG_A'];
        $this->_xRoleId = $this->ci->session->userdata['SESSION_SIMPEG_D'];
        $this->_xToken = $this->ci->session->userdata['SESSION_SIMPEG_E'];
        $this->_xUnorId = $this->ci->session->userdata['SESSION_SIMPEG_H'];
        $this->_xIsFirstLogin = $this->ci->session->userdata['SESSION_SIMPEG_I'];
        

  }
    
  public function index(){

      if( $this->_xIsFirstLogin == 1 ){
        redirect("index.php/employee/changePassword", "refresh");
      }else{

        $setting = "";
        $template = $this->template->load($setting);        

        if( $this->ci->acl->has_permission('NEWS') ){

          $template['konten'] = $this->load->view('news/list', $data, true);
          #load container for template view        
         
        }else{
          $data = array('title' => 'Pesan Peringatan', 'content' => 'Anda tidak memiliki akses ke halaman ini');
          $template['konten'] = $this->load->view('errors/no_permission', $data, true);
        }
               
        $this->load->view('template/container',$template);
      }
  		
  }

  public function getTableData(){
    $xId = $this->_xRoleId;
    $xKeyword = $this->input->post('search');
    $xStart = $this->input->post('start');
    $xLength = $this->input->post('length');
    $xDraw = $this->input->post('draw');     
    $xModule = $this->input->post('module');
    // echo "MODULE : " . $xModule;
    $jsonResult = $this->ci->employee_lib->getTableData( $xModule,
                                                           $this->_xUserId,
                                                           $xId,
                                                           str_replace(" ", "%20", $xKeyword['value']),
                                                           $xLength,
                                                           $xStart,
                                                           $xDraw );
    $this->output
        ->set_content_type('application/json')
        ->set_output($jsonResult);
  }

  public function getDetailData(){
    $xId = $this->input->post('id');
    $xModule = "/news/view";
    // echo "MODULE : " . $xModule;
    $jsonResult = $this->ci->employee_lib->getDetailData( $xModule,
                                                           $this->_xRoleId,
                                                           $xId );
    $this->output
        ->set_content_type('application/json')
        ->set_output($jsonResult);
  }

  public function save(){
    $xArrResult = array();
    $xArrResult = $this->ci->employee_lib->saveNews(  $this->_xUserId,
                                                      $this->_xRoleId,
                                                      $this->input->post('x_id_news'),
                                                      $this->input->post('x_title'),
                                                      $this->input->post('x_content'),
                                                      $this->input->post('x_effective_date'),
                                                      $this->input->post('x_expire_at'),
                                                      $this->input->post('x_status'),
                                                      $this->input->post('x_act')
                                                       );
      
    $this->output
        ->set_content_type('application/json')
        ->set_output($xArrResult);

  }

  public function deleteData(){
      $xId = $this->input->post('x_confirm_delete_id');       
      $xModule = $this->input->post('x_confirm_delete_module');
      $jsonResult = $this->ci->employee_lib->deleteData( $xModule,
                                                         $this->_xUserId,
                                                         $xId );

      $this->output
        ->set_content_type('application/json')
        ->set_output($jsonResult);

  }

  public function showTableList(){
    $data             = array();
    $this->load->view('news/data', $data);
  }

}