<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Global_lib{
	protected $ci;

	function __construct(){
		$this->ci 	=& get_instance();

	}

	 function buildTree(Array $data, $parent = 0) {
	    $tree = array();
	    foreach ($data as $d) {
	        if ($d['parent'] == $parent) {
	            $children = $this->buildTree($data, $d['id']);
	            // set a trivial key
	            if (!empty($children)) {
	                $d['_children'] = $children;
	            }
	            $tree[] = $d;
	        }
	    }
	    return $tree;
	}

	function printTree($tree, $selectedValue, $r = 0, $p = null, &$strOption = '') {
		$index = 0;
	    foreach ($tree as $i => $t) {
	        $dash = ($t['parent'] == 0) ? '' : str_repeat('&nbsp;', $r) .' ';
	        //printf("\t<option value='%d'>%s%s</option>\n", $t['id'], $dash, $t['name']);
	        
	        //$strOption .=  $dash . $t['name'];
	        if (isset($t['_children'])) {
	        	$strOption .= '<option value="' . $t['id'] . '" style="font-weight: bold;">' . $dash . strtoupper($t['name']) . '</option>';
	            $this->printTree($t['_children'], $selectedValue, $r+1, $t['parent'], $strOption); 
	            
	        }else{
	        	$strOption .= '<option value="' . $t['id'] . '" ' . ( $selectedValue == $t['id'] ? 'selected="selected"' : '' ) . '>' . $dash . $t['name'] . '</option>';
	        }

	    }

	    return $strOption;
	}

	function truncate($str, $width) {
	    return strtok(wordwrap($str, $width, "...\n"), "\n");
	}

	function shapeSpace_truncate_string_at_word($string, $limit, $break = ".", $pad = "...") {  
	
		if (strlen($string) <= $limit) return $string;
		
		if (false !== ($max = strpos($string, $break, $limit))) {
			 
			if ($max < strlen($string) - 1) {
				
				$string = substr($string, 0, $max) . $pad;
				
			}
			
		}
		
		return $string;
		
	}

	function monthNameIndonesia( $month ){
		$arrMonth = array( "Januari","Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" );

		return $arrMonth[$month];
	}

	function buildDropdownOption(Array $data) {
	    $option = "";
	    $index = 0;	    
	    foreach ($data as $d) {
	    	$selected = "";
	    	if( $index == 0 )$selected = 'selected="selected"';
	        $option .= '<option value="' . $d['id'] . '" ' . $selected . '>' . $d['name'] . '</option>';
	        $index++;
	    }
	    return $option;
	}

	function buildDropdownOption_User(Array $data) {
	    $option = "";
	    $index = 0;	    
	    foreach ($data as $d) {
	    	$selected = "";
	    	if( $index == 0 )$selected = 'selected="selected"';
	        $option .= '<option value="' . $d['id'] . '" ' . $selected . '>(' . $d['nip'] . ') ' . $d['name'] . '</option>';
	        $index++;
	    }
	    return $option;
	}
}