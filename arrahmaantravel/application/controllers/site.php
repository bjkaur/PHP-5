<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	//default function, index function is the first function that runs when index controller is called
	public function index(){
		//echo "Site working <br>";
		//$this->hello();		
		//$this->addStuff();
		
		/*load function instead of just one view*/
		$this->home();
		//$this->load->view("view_home");
	}
	
	public function home(){
		$this->load->model("model_get");
		//home is $page in controller in this case
		//it will look in the db where 'page' is 'home'
		//store the data in the data array called results
		$data["results"] = $this->model_get->getData("home");
		//now pass in the data array to the view we want to use it in
		
		$this->load->view("site_header");
		$this->load->view("site_nav");
		$this->load->view("content_home", $data);
		$this->load->view("site_footer");
		
	}
	
	public function about(){
		$this->load->model("model_get");
		//results from view/content_about
		$data["results"] = $this->model_get->getData("about");
		
		$this->load->view("site_header");
		$this->load->view("site_nav");
		$this->load->view("content_about", $data);
		$this->load->view("site_footer");
	
	}
	
	public function contact(){
		$data["msg"] ="";
		
		
		$this->load->view("site_header");
		$this->load->view("site_nav");
		$this->load->view("content_contact", $data);
		$this->load->view("site_footer");
		
	}
	
	public function send_email(){
		$this->load->library("form_validation");
		//xss_clean prvents anyone from performing cross site scripting into the fields
		$this->form_validation->set_rules("fullName", "Full Name", "required|alpha|xss_clean"); //"required|alpha": for only alphabets
		$this->form_validation->set_rules("custemail", "Email", "required|valid_email|xss_clean"); //"required|valid_email": for only email format
		$this->form_validation->set_rules("message", "Message", "required|xss_clean"); //"required": msg not to be blank
		
		//if above is false
		if ($this->form_validation->run() == FALSE) {
			$data["msg"] = "";
			
			//load contact form again
			$this->load->view("site_header");
			$this->load->view("site_nav");
			$this->load->view("content_contact", $data);
			$this->load->view("site_footer");
		}
		else {
			//echo this $data on content_contact
			
			$path = $this->config->item('server_root');
			
			$config = Array(
					//protocol: how to send the email
					'protocol' => 'smtp',
					'smpt_host' => 'ssl://smtp.gmail.com',
					'smtp_port' => 465,
					'smtp_user' => 'arrahmaantravel@gmail.com',
					'smtp_pass' => 'Bismillah89@',
					'mailpath' => '/usr/sbin/sendmail',
					'charset' => 'iso-8859-1',
					'mailtype' => 'html',
					'wordwrap' => TRUE
			);
			
			//loading email library and passing configuration array
			$this->load->library('email', $config);
			
			//add a new line
			$this->email->set_newline("\r\n");
			
			$this->email->from(set_value("custemail"), set_value("fullName"));
			$this->email->to('arrahmaantravel@gmail.com');
			$this->email->subject('Customer Enquiry');
			$this->email->message(set_value("message"));
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
			
			
			//$data["msg"] = "Thank you.";
			
			
			$this->load->view("site_header");
			$this->load->view("site_nav");
			$this->load->view("site_footer");			
		}
		
	}
	
	
	/**
	 * 
	 * $flightsearch is an object of flightsearch class to get access to everything in Flight class.
	 * */
	public function flights(){		
		parent::__construct();
		$this->load->model("model_get");
		$result=$this->model_get->getFlightData();
        $this->load->view('content_flightsearch', $result);
        		
		include_once 'flightsearch.php';
		$flightsearch = new Flightsearch();
		echo $flightsearch->airlineName;
		$flightsearch->setAirlineName("ABC Flight");
		echo "$flightsearch->airlineName <br />";
		
		
		
		//$this->load->model("model_get");
	//	$data["results"] = $this->model_get->getData("flights");
				
		$this->load->view("site_header");
		$this->load->view("site_nav");
		$this->load->view("site_footer");
		
	}
	
	function logout(){
		$this->load->view("view_home");
	}
	
	
	function calendar(){
		$this->load->library("calendar");
		
		//generating calendar
		echo $this->calendar->generate();		
	}
	
	/*public function hello(){
		echo "asslam";
	}
	
	public function addStuff(){
		//calling the model
		$this->load->model("math");
		//calling the model's function
		echo $this->math->add(2, 3);
	}
	
	public function home(){
		//add values into this field
		//make an array called data, title is the object called Ar Rahman Tr...
		$data['title'] = "Book cheap flights - Ar Rahman Travel";
		//new variables
		$data['var1'] = "4";
		$data['var2'] = "5";
		
		$this->load->model("math");
		
		//call the function in the model
		//pass two params
		//make new variable $data['addTotal'], addTotal is an object in this array
		$data['addTotal'] = $this->math->add($data['var1'], $data['var2']);
		
		//passing same values into subTotal
		$data['subTotal'] = $this->math->sub($data['var1'], $data['var2']);
		
		//then we sending everything to $data in load->view
		
		//when we load the view, tell it which view to load by passing data array , $data
		//when we pass array into a view all the objects in the array become variables in the view 
		$this->load->view("view_home", $data);
	}
	
	//another page
	function about(){
		$data['title'] = "About Us";
		$this->load->view("view_about");
	}
	
	function getDbValues(){
		$this->load->model("get_db");
		
		//getAllValues: function in the Model (get_db.php)
		$data['results'] = $this->get_db->getAllValues();
		
		$this->load->view("view_db", $data);		
	}
	
	
	 //insertValues to insert rows(s) in the db
	function insertValues(){
		$this->load->model("get_db");
		
		$newRow = array(				
			//"name" => "any"
			//1st array
			array("name" => "Mike"),
			array("name" => "Ayesha"),
			array("name" => "Jeet")
		);
		
		//when we insert values
		//$this->get_db->insert1($newRow);
		
		$this->get_db->insert2($newRow);
		echo "Row added successfully";
	}
	
	function updateValues(){
		$this->load->model("get_db");
	
		//create new array called newRow
		//SQL command: UPDATE `test` SET `name` = 'Angela' WHERE `id=2`
		$newRow = array(
			array(
				//"name" => "Angela"
				
				//multi dimenstional arrays
				//id: WHERE
				"id" => "3",
				"name" => "Lara"
			),
			array(
				"id" => "4",
				"name" => "Kirpal"
			)
		);
	
		//load model's function
		//$this->get_db->update1($newRow);
		$this->get_db->update2($newRow);
		
		echo "Updated!";
		
	}
	
	function deleteValues(){
		$this->load->model("get_db");
	
		$deletedRow = array(
				"id" => "2"
		);
	
		//call the function from the model
		$this->get_db->delete1($deletedRow);
	
		echo "Deleted!";
	
	}
	
	function emptyTable(){
		$this->load->model("get_db");
		$oldRow = "test";
		//call the function
		$this->get_db->empty1($oldRow);
		echo "Emptied";
		}*/
	
}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */