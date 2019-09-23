<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author 
 * Search flights
 * 
 */
class Flight extends CI_Controller {
	//attributes
	//public $aircraft;
	public $flightNo;
	public $airlineName;
	public $flightFrom;
	public $destination;
	public $outbound;
	public $inbound;
	//public $logo;
	public $price;
	
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
	public function setFlightNo($flightno){
		$this->flightNo = $flightno;
	}
	
	public function getFlightNo(){
		return $this->flightNo;
	}
	
	public function setAirlineName ($airlinename){
		$this->airlineName = $airlinename;
	}
	
	public function getAirlineName(){
		return $this->airlineName;
	}
	
	public function setFlightFrom ($flightFrom){
		$this->flightFrom = $flightFrom;
	}
	
	public function getFlightFrom(){
		return $this->flightFrom;
	}
	
	public function setTo ($destination){
		$this->destination = $destination;
	}
	
	public function getTo(){
		return $this->destination;
	}
	
	public function setOutbound ($outbound){
		$this->outbound = $outbound;
	}
	
	public function getOutbound(){
		return $this->outbound;	
	}
	
	public function setInbound ($inbound){
		$this->inbound = $inbound;
	}
	
	public function getInbound(){
		return $this->inbound;
	}
	
	public function setPrice ($price){
		$this->price = price;
	}
	
	
	public function getPrice(){
		return $this->price;
	}
	
	
	
}
		