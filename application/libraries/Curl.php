<?php 
class Curl 

{
	function __construct()

    {

		$ci =& get_instance();

    }


	function getDistanceFromGoogle($origins, $destinations, $mode = 'driving')

	{

		$url	= $url	= "https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&key=AIzaSyA6VTuponJTtOwt2kI2qIOPHWB10GX8Hc0&mode=" . $mode . "&origins=" . $origins . "&destinations=" . $destinations;	


		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_POST, FALSE);

		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, '120');

		curl_setopt($ch, CURLOPT_TIMEOUT, 120);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

		

		$result = curl_exec($ch);

		if($result === false)

		{

			$resultData['errCode']	= curl_errno($ch);

			$resultData['errMsg']	= curl_error($ch);

			return $resultData;

		}

		else

		{

			return $result;

		}

		curl_close($ch);

	}



	function sendAPI($apiURL, $param, $method, $arrHeader = null)

	{

		$url	= $url	= $apiURL;

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);

		if( $arrHeader == null ){
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
				'Content-Type: application/json',                                                                                
				'Content-Length: ' . strlen($param)
			));
		}else{
			curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
		}		

		if( $method == 'POST' ){
			curl_setopt($ch, CURLOPT_POSTFIELDS, $param);
			curl_setopt($ch, CURLOPT_POST, true);
		}else if( $method == 'GET' ){
			curl_setopt($ch, CURLOPT_GET, true);
		}
		

		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, '120');

		curl_setopt($ch, CURLOPT_TIMEOUT, 120);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);		

		$result = curl_exec($ch);

		if($result === false)

		{

			$resultData['errCode']	= curl_errno($ch);

			$resultData['errMsg']	= curl_error($ch);

			return $resultData;

		}

		else

		{

			return $result;

		}

		curl_close($ch);

	}

}

?>