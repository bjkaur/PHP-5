<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author 
 * @access public
 * Login
 *
 */
 class Login extends CI_Controller {
 	
 	/**
 	 * function to load view
 	 */
 	public function index(){
		$this->load->view("view_login");
  	}
  	
  	/**
  	 * function check validation errors, if user already
  	 */
  	public function checkLogin(){
  		$this->form_validation->set_rules("username", "Username", "required");
  		//callback verify to verify the password, _verifyUser can be given any other name.
  		$this->form_validation->set_rules("password", "Password", "required|callback_verifyUser");
  		
  		//if validation fails
  		if($this->form_validation->run() == false){
  			$this->load->view("view_login");
  		}
  		else{	
  			//after checking the database through verifyUser
  			redirect("site/logout");
  		}
  	}
 	
  	/**
  	 * getting the values user enters from the login form
  	 * @var  
  	 */
  	public function verifyUser(){
  		//value entered in username field (same used in checkLogin) will be assigned to name variable
  		$name = $this->input->post("username");	
  		$pass = $this->input->post("password");
  		
  		//load the model
  		$this->load->model("model_login");
  		
  		//using login funtion in model_login to check the db
  		//if user exists return true
  		//and takes the user to home view using else in checkLogin
  		if($this->model_login->login($name, $pass)){
  			return true;
  		}
  		//else shows an error msg i.e. can not find the user
  		else{
  			$this->form_validation->set_message("verifyUser", "Incorrect Username or Password.");
  			return false;
  		}
  	}
 }
 

		