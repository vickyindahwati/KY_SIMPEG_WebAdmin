<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

class Person extends REST_Controller {

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


    public function searchPersonByName_get(){

        $jo_result                  = array();

        $keyword                    = $this->input->get('q');


        $rs                         = $this->mquery->searchPersonByName( $keyword );
        $total                      = count( $rs );

        if( count( $rs ) > 0 ){

            $jo_result['total_count']           = $total;
            $jo_result['incomplete_results']    = false;

            foreach( $rs as $data ){
                
                $jo_result['items'][]           = array( 'id'               => $data->person_id,
                                                         'name'             => $data->full_name,
                                                         'photo'            => ( $data->photo == '' || $data->photo == '(NULL)' ? 'default.png' : $data->photo ),
                                                         'memberNumber'     => $data->member_number );

            }

            $this->response($jo_result, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code

        }

    }

}

?>