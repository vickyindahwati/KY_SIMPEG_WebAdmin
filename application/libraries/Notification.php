<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification

{

	public function __construct() {

		$ci = &get_instance();

		$ci->load->library('email');
		
		$ci->load->library('converter');

	}
	

	public function report_notification( $destination_email,
										 $mail_host,
										 $mail_username,
										 $mail_password,
										 $mail_port,
										 $mail_subject,
										 $mail_body,
										 $mail_attachment = '' ){

		$ci = &get_instance();

		$ci->load->library('email');
		
		
		$ci->email->initialize(array(
					'protocol' => 'smtp',
					'smtp_host' => $mail_host,
					'smtp_user' => $mail_username,
					'smtp_pass' => $mail_password,
					'smtp_port' => $mail_port,
					'smtp_crypto' => 'tls',
					'crlf' => "\r\n",
					'newline' => "\r\n",
					'mailtype' => 'html'
		));

		// echo "User name : " . $mail_username . " | " . $mail_password . "   ";
		
		$subject 		= $mail_subject;
		
		$body			= $mail_body;
		
		$ci->email->from($mail_username, 'KLIK-KLOP');
		$ci->email->to($destination_email);
		$ci->email->subject($subject);
		$ci->email->message($body);

		if( $mail_attachment <> '' ){

			$ci->email->attach($mail_attachment);

		}

		$ci->email->send();
		
		$result_send = $ci->email->print_debugger();

		// echo $result_send;
		
		return $result_send;

	}


	public function reset_password_notification( $destination_email,
												 $mail_host,
												 $mail_username,
												 $mail_password,
												 $mail_port,
												 $mail_subject,
												 $mail_body ){

		$ci = &get_instance();

		$ci->load->library('email');
		
		
		$ci->email->initialize(array(
					'protocol' => 'smtp',
					'smtp_host' => $mail_host,
					'smtp_user' => $mail_username,
					'smtp_pass' => $mail_password,
					'smtp_port' => $mail_port,
					'smtp_crypto' => 'tls',
					'crlf' => "\r\n",
					'newline' => "\r\n",
					'mailtype' => 'html'
		));
		
		$subject 		= $mail_subject;
		
		$body			= $mail_body;
		
		$ci->email->from($mail_username, 'KLIK-KLOP');
		$ci->email->to($destination_email);
		$ci->email->subject($subject);
		$ci->email->message($body);
		$ci->email->send();
		
		$result_send = $ci->email->print_debugger();

		// echo $result_send;
		
		return $result_send;

	}

	
	public function registration_notification( $destination_email,
											   $mail_host,
											   $mail_username,
											   $mail_password,
											   $mail_port,
											   $mail_subject,
											   $mail_body,
											   $mail_attachment = '' ){

		$ci = &get_instance();

		$ci->load->library('email');
		
		
		$ci->email->initialize(array(
					'protocol' => 'smtp',
					'smtp_host' => $mail_host,
					'smtp_user' => $mail_username,
					'smtp_pass' => $mail_password,
					'smtp_port' => $mail_port,
					'smtp_crypto' => 'ssl',
					'crlf' => "\r\n",
					'newline' => "\r\n",
					'mailtype' => 'html'
		));

		// echo "User name : " . $mail_username . " | " . $mail_password . "   ";
		
		$subject 		= $mail_subject;
		
		$body			= $mail_body;
		
		$ci->email->from($mail_username, 'GRASP-ROAD');
		$ci->email->to($destination_email);
		$ci->email->subject($subject);
		$ci->email->message($body);

		if( $mail_attachment <> '' ){

			$ci->email->attach($mail_attachment);

		}

		$ci->email->send();
		
		$result_send = $ci->email->print_debugger();

		// echo $result_send;
		
		return $result_send;

	}
	
}

?>