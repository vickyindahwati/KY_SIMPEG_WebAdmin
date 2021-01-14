<?php
class Validate_format

{

	

	function __construct()

    {

		$ci =& get_instance();

    }

	

	function cekDate($date, $format = 'YYYY-MM-DD'){

		if(strlen($date) >= 8 && strlen($date) <= 10){

			$separator_only = str_replace(array('M','D','Y'),'', $format);

			$separator = $separator_only[0];

			if($separator){

				$regexp = str_replace($separator, "\\" . $separator, $format);

				$regexp = str_replace('MM', '(0[1-9]|1[0-2])', $regexp);

				$regexp = str_replace('M', '(0?[1-9]|1[0-2])', $regexp);

				$regexp = str_replace('DD', '(0[1-9]|[1-2][0-9]|3[0-1])', $regexp);

				$regexp = str_replace('D', '(0?[1-9]|[1-2][0-9]|3[0-1])', $regexp);

				$regexp = str_replace('YYYY', '\d{4}', $regexp);

				$regexp = str_replace('YY', '\d{2}', $regexp);

				if($regexp != $date && preg_match('/'.$regexp.'$/', $date)){

					foreach (array_combine(explode($separator,$format), explode($separator,$date)) as $key=>$value) {

						if ($key == 'YY') $year = '20'.$value;

						if ($key == 'YYYY') $year = $value;

						if ($key[0] == 'M') $month = $value;

						if ($key[0] == 'D') $day = $value;

					}

					if (checkdate($month,$day,$year)) return true;

				}

			}

		}

		return false;

	}

	

	function cekEmail($email)

	{

	   if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email)):

	   		return true;

	   else:

	   		return false;

	   endif;

	}



	public function cek_token($user_id, $token) {

		$ci =& get_instance();

		$query = $ci->mgeneral->getWhere(array("user_id" => $user_id, "security_token"=>$token), "user");

		if (count($query) == 0) {

			return true; 

		} else {

			return false; 

		}

	}



	public function cek_userdata($field, $value) {

		$ci =& get_instance();

		$query	= $ci->mgeneral->getWhere(array("$field" => $value), "user");

		if (count($query) == 0) {

			return true; 

		} else {

			return false; 

		}

	}

}

?>