<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require(APPPATH.'libraries/REST_Controller.php');
class Cards extends REST_Controller {
	function __construct() {
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");		
		$method = $_SERVER['REQUEST_METHOD'];
		if($method == "OPTIONS") {
			die();
		}
		parent::__construct();
	}
	
	public function index()
	{
		// doing nothing 
	}
	
	public function FetchCards_get(){
		//fetch all the tasks
		header("Content-Type:application/json");
		$this->load->model('Task_Model');
		$data=$this->Task_Model->getAll();
		$this->response($data,200);
	}
	
	public function CreateCard_post(){			
		//insert one task and return the new set of tasks
		header("Content-Type:application/json");
		$data=array("content" => $this->post('content'));
		$this->load->model('Task_Model');
		$data=$this->Task_Model->AddNote($data);
		$this->response($data,200);
	}

	public function DeleteCard_delete($id){
		// delete one task using the id supplied in the argument and return the new set of tasks
		header("Content-Type:application/json");
		$this->load->model('Task_Model');
		$data=$this->Task_Model->DeleteNote($id);
		$this->response($data,200);
	
	}
	
}