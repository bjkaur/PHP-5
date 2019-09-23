<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author 
 * @access public
 * To load view for register
 *
 */
 class Register extends CI_Controller {
 	
 	/**
 	 * function to load view
 	 */
 	public function index(){
 		$this->load->view('view_register');
 		
 	}
 	
 }
 

		