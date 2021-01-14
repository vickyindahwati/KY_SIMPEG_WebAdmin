<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 


function statusLabel( $status ){

	$class_status = "";
    $class_label  = "";

    if( $status == 1 ){
        $class_status = "bg-green";
        $class_label  = "Active";
    }
    else{ 
        $class_status = "bg-red"; 
        $class_label  = "Not Active";
    }

    return ('<small class="label pull-left ' . $class_status . '">' . $class_label . '</small>');

}


function availabilityLabel( $status ){

	$class_status = "";
    $class_label  = "";

    if( $status == 1 ){
        $class_status = "bg-green";
        $class_label  = "Available";
    }
    else{ 
        $class_status = "bg-red"; 
        $class_label  = "Not Available";
    }

    return htmlentities('<small class="label pull-left ' . $class_status . '">' . $class_label . '</small>');

}


function genderLabel( $status ){

	$class_status = "";
    $class_label  = "";

    if( $status == 'Men' ){
        $class_status = "bg-light-blue disabled";
        $class_label  = "Men";
    }
    else if( $status == 'Women' ){ 
        $class_status = "bg-maroon disabled"; 
        $class_label  = "Women";
    }

    return htmlentities('<small class="label pull-left ' . $class_status . '">' . $class_label . '</small>');

}

?>