<?php

class Upload_file

{

	function upload_user_img()

	{

		$ci = &get_instance();

		$config['upload_path']		= "./uploads/user/original";

		$config['allowed_types']	= 'gif|jpg|png|jpeg|bmp|tiff';

		$config['max_size']     	= '2048'; #1MB = 1024

		$config['encrypt_name']		= "TRUE";

		$config['file_name']		= date('YmdHis');



		$ci->load->library('upload', $config);



		if($ci->upload->do_upload("x_file")):



			$data	 		= $ci->upload->data();



			#create thumbnail / resize image

			$ci->load->library('image_lib');

			// $medium_image	= $this->resize("./uploads/profile/asli/".$data['file_name'],"./uploads/profile/","512","512");

			$mini_image		= $this->resize("./uploads/user/original/".$data['file_name'],"./uploads/user/mini/","512","512");



			$result = array('err_code'	=> "00",

							'filename'	=> $data['file_name']);

		else:



			$result	= array('err_code'	=> "-99",

							'err_msg'	=> $ci->upload->display_errors('',''));



		endif;



		return $result;

	}


	function doUploadFlile( $module, $element_upload, $prefixFileName, $miniSize = "512" )

	{

		$ci = &get_instance();

		$config['upload_path']		= "./uploads/" . $module;

		$config['allowed_types']	= 'gif|jpg|png|jpeg|bmp|tiff|zip|rar';

		$config['max_size']     	= '2048'; #1MB = 1024

		$config['encrypt_name']		= "TRUE";

		$config['file_name']		= $prefixFileName . date('YmdHis');



		$ci->load->library('upload', $config);



		if($ci->upload->do_upload($element_upload)):



			$data	 		= $ci->upload->data();



			#create thumbnail / resize image

			// $ci->load->library('image_lib');

			// $medium_image	= $this->resize("./uploads/profile/asli/".$data['file_name'],"./uploads/profile/","512","512");

			// $mini_image		= $this->resize("../front/uploads/" . $module . "/".$data['file_name'],"../front/uploads/" . $module . "/mini/",$miniSize,$miniSize);



			$result = array('status_code'	=> "00",

							'file_name'	=> $data['file_name'],

							'path' => $module);

		else:



			$result	= array('status_code'	=> "-99",

							'status_msg'	=> $ci->upload->display_errors('',''));



		endif;



		return $result;

	}

	public function cancelUpload( $module ){

		$upload_path_original 		= "./uploads/" . $module;

		if( $this->input->post("op") == "delete" && $this->input->post("name") <> "" ){

			$file_name 				= $this->input->post("name");

			if( file_exists($upload_path_original . $file_name) ){

				unlink($upload_path_original . $file_name);

			}

		}

	}


	function doUploadInternalFile( $module, $element_upload, $miniSize = "512" )

	{

		$ci = &get_instance();

		$config['upload_path']		= "./uploads/" . $module . "/original";

		$config['allowed_types']	= 'gif|jpg|png|jpeg|bmp|tiff';

		$config['max_size']     	= '2048'; #1MB = 1024

		$config['encrypt_name']		= "TRUE";

		$config['file_name']		= date('YmdHis');



		$ci->load->library('upload', $config);



		if($ci->upload->do_upload($element_upload)):



			$data	 		= $ci->upload->data();



			#create thumbnail / resize image

			$ci->load->library('image_lib');

			// $medium_image	= $this->resize("./uploads/profile/asli/".$data['file_name'],"./uploads/profile/","512","512");

			$mini_image		= $this->resize("./uploads/" . $module . "/original/".$data['file_name'],"./uploads/" . $module . "/mini/",$miniSize,$miniSize);



			$result = array('err_code'	=> "00",

							'filename'	=> $data['file_name'],

							'path' => $module);

		else:



			$result	= array('err_code'	=> "-99",

							'err_msg'	=> $ci->upload->display_errors('',''));



		endif;



		return $result;

	}

	public function cancelInternalUpload( $module ){

		$upload_path_original 		= "./uploads/" . $module . "/original/";
		$upload_path_mini 			= "./uploads/" . $module . "/mini/";

		if( $this->input->post("op") == "delete" && $this->input->post("name") <> "" ){

			$file_name 				= $this->input->post("name");

			if( file_exists($upload_path_original . $file_name) ){

				unlink($upload_path_original . $file_name);

			}

			if( file_exists($upload_path_mini . $file_name) ){

				unlink($upload_path_mini . $file_name);

			}

		}

	}

	public function resize($file_asli,$path,$width,$height)

	{


		$ci = &get_instance();
		$ci->load->library('image_lib');


		$config['image_library']	= 'gd2';

		$config['create_thumb']		= TRUE;

		$config['thumb_marker']		= "";

		$config['maintain_ratio']	= FALSE;

		$config['width'] 			= $width;

		$config['height'] 			= $height;

		$config['quality'] 			= "80%";

		$config['source_image']		= "$file_asli";

		$config['new_image']    	= "$path";



		$ci->image_lib->initialize($config);

		$ci->image_lib->resize();

		$ci->image_lib->clear();



	}





	function doUploadPKSFile( $module, $element_upload, $miniSize = "512")

	{

		$ci = &get_instance();

		$config['upload_path']		= "./uploads/" . $module;

		$config['allowed_types']	= 'gif|jpg|png|jpeg|bmp|tiff|pdf|rar|zip';

		$config['max_size']     	= '2048'; #1MB = 1024

		$config['encrypt_name']		= "TRUE";

		$config['file_name']		= date('YmdHis');



		$ci->load->library('upload', $config);



		if($ci->upload->do_upload($element_upload)):



			$data	 		= $ci->upload->data();




			$result = array('err_code'	=> "00",

							'filename'	=> $data['file_name'],

							'path' => $module);

		else:



			$result	= array('err_code'	=> "-99",

							'err_msg'	=> $ci->upload->display_errors('',''));



		endif;



		return $result;

	}

	public function cancelUploadPKSFile( $module ){

		$upload_path_original 		= "./uploads/" . $module;

		if( $this->input->post("op") == "delete" && $this->input->post("name") <> "" ){

			$file_name 				= $this->input->post("name");

			if( file_exists($upload_path_original . $file_name) ){

				unlink($upload_path_original . $file_name);

			}

			if( file_exists($upload_path_mini . $file_name) ){

				unlink($upload_path_mini . $file_name);

			}

		}

	}


	/**
	 * Resize image - preserve ratio of width and height.
	 * @param string $sourceImage path to source JPEG image
	 * @param string $targetImage path to final JPEG image file
	 * @param int $maxWidth maximum width of final image (value 0 - width is optional)
	 * @param int $maxHeight maximum height of final image (value 0 - height is optional)
	 * @param int $quality quality of final image (0-100)
	 * @return bool
	 */
	function resizeImage($sourceImage, $targetImage, $maxWidth, $maxHeight, $quality = 80)
	{
	    // Obtain image from given source file.
	    if (!$image = @imagecreatefromjpeg($sourceImage))
	    {
	        return false;
	    }

	    // Get dimensions of source image.
	    list($origWidth, $origHeight) = getimagesize($sourceImage);

	    if ($maxWidth == 0)
	    {
	        $maxWidth  = $origWidth;
	    }

	    if ($maxHeight == 0)
	    {
	        $maxHeight = $origHeight;
	    }

	    // Calculate ratio of desired maximum sizes and original sizes.
	    $widthRatio = $maxWidth / $origWidth;
	    $heightRatio = $maxHeight / $origHeight;

	    // Ratio used for calculating new image dimensions.
	    $ratio = min($widthRatio, $heightRatio);

	    // Calculate new image dimensions.
	    $newWidth  = (int)$origWidth  * $ratio;
	    $newHeight = (int)$origHeight * $ratio;

	    // Create final image with new dimensions.
	    $newImage = imagecreatetruecolor($newWidth, $newHeight);
	    imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);
	    imagejpeg($newImage, $targetImage, $quality);

	    // Free up the memory.
	    imagedestroy($image);
	    imagedestroy($newImage);

	    return true;
	}



}



?>