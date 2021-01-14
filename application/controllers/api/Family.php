<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

class Family extends REST_Controller {

    protected $ci;

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

        $this->ci         =& get_instance();

        $this->ci->load->model('mquery');


        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['user_get']['limit'] = 500; // 500 requests per hour per user/key
    }

    public function getFamilyData_post(){

        $jo_result                  = array();

        $draw                       = $this->input->post('draw');
        $keyword                    = $this->input->post('search');
        $start                      = ( $this->input->post('start') == null || $this->input->post('start') == "" ? 0 : $this->input->post('start' ) );
        $length                     = ( $this->input->post('length') == null  || $this->input->post('length') == "" ? 10 : $this->input->post('length' ) );



        $rs                         = $this->mquery->getFamilyData( $keyword, $start, $length );
        $rs_total                   = $this->mquery->getTotalFamilyData( $keyword );

        if( count( $rs ) > 0 ){

            $jo_result['draw']              = $draw;
            $jo_result['recordsTotal']      = $rs_total[0]->numRow;
            $jo_result['recordsFiltered']   = $rs_total[0]->numRow;

            foreach( $rs as $data ){

                $class_status     = "";
                $class_label      = "";

                if( $data->status == 1 ){
                    $class_status = "bg-green";
                    $class_label  = "Active";
                  }
                  else{ 
                    $class_status = "bg-red"; 
                    $class_label  = "Not Active";
                  }

                $jo_result['data'][]        = array( $data->branch_name,
                                                     $data->kkj_number,
                                                     $data->house_holder_name,
                                                     '<img src="' . CONST_IMG_PROFILE . $data->hh_photo . '" width="80">',
                                                     $data->created,
                                                     '<small class="label pull-left ' . $class_status . '">' . $class_label . '</small>' );

            }

            $this->response($jo_result, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code

        }

    }

}

?>