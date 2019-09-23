<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 * @author 
 * sends email with Gmail
 * 
 */
class Email extends CI_Controller {
	function __construct()
	{
		//referencing the controller class
		parent::__construct();
		
	}
	
	function index()
	{
		//$this->load->view('content_newsletter');
	}
	
	function send_email()
	{
		
		$path = $this->config->item('server_root');
		//echo $path; die();
		//path for http://localhost/arrahmaantravel/email/index
		//is C:/xampp/htdocs
		
		//attach an attachment
		//$file points directly to the file we need to attach
		//once we get to the root, need to add the path to the file .txt
		//apend '/arrahmaantravel/attachments/info.txt'
		$file = $path . '/arrahmaantravel/attachments/info.txt';
		
		//attaching the file with an  email
		$this->email->attach($file);
		
		$config = Array(
				//protocol: how to send the email
				'protocol' => 'smtp',
				'smpt_host' => 'ssl://smtp.gmail.com',
				'smtp_port' => 465,				
				'smtp_user' => 'arrahmaantravel@gmail.com',
				'smtp_pass' => 'test',
				'mailpath' => '/usr/sbin/sendmail',
				'charset' => 'iso-8859-1',
				'mailtype' => 'html',
				'wordwrap' => TRUE				
				);
		
		//loading email library and passing configuration array
		$this->load->library('email', $config);
		
		//add a new line
		$this->email->set_newline("\r\n");
		
		$this->email->from('arrahmaantravel@gmail.com', 'Ayesha Fatima Siddique');
		$this->email->to('arrahmaantravel@gmail.com');
		$this->email->subject('Testing.. This is the subject');
		$this->email->message('');		
		//
		if($this->email->send())
		{
			//if email sent
			echo 'Thanks.';
		}
		else 
		{
				//CI function: show_error
				show_error($this->email->print_debugger());
		}
	}
}
		