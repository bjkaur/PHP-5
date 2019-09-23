<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author B Kaur
 * @abstract Flightsearch class to search flights
 * @var airlineName
 */
class Flightsearch extends CI_Controller {
	//attributes
	//public $aircraft;
	public $airlineName;
	public $flightFrom;
	
	function __construct()
	{
		//referencing the controller class
		parent::__construct();
	}
	
	function index()
	{
		//$this->load->view('content_newsletter');
	}
	
	function flight() {
	
	}
	
	/**
	 * function to set variable flightNo to $flightno
	 * @param one parameter - flight number
	 * @return flight number
	 * */
	
	public function setAirlineName ($airlinename){
		$this->airlineName = $airlinename;
	}
	
	public function getAirlineName(){
		return $this->airlineName;
	}
	
	public function setflightFrom ($flightFrom){
		$this->flightFrom = $flightFrom;
	}
	
	public function getflightFrom(){
		return $this->flightFrom;
	}
	
	
	
}
		