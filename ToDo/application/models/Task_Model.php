<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task_Model extends CI_Model {

		public function getAll(){
			$query = $this->db->query("select * from task order by time desc");   // getting all the tasks
			return $query->result();
		}
		
		public function AddNote($content){
			$query = $this->db->insert('task',$content);    // inserting one task
			$query = $this->db->query("select * from task order by time desc");  // retrieving new set of tasks
			return $query->result();
		}
		
		public function DeleteNote($id){
			$this->db->where("id",$id);
			$this->db->delete('task');   // deleting task
			$query = $this->db->query("select * from task order by time desc");  // retrieving new set of tasks
			return $query->result();
		}
		
}
