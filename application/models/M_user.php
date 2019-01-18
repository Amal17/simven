<?php defined('BASEPATH')OR exit('akses ga ada');

class M_user extends CI_Model{
	public function GetAll(){
		$data = $this -> db -> get('tb_user');
		return $data -> result_array();
	}

	public function insertUser($data){
		$r = $this -> db -> insert('tb_user', $data);
		return $r;
	}

	public function deleteUser($username){
		$this -> db -> where('username', $username);
		$r = $this -> db -> delete('tb_user');
		return $r;
	}

	public function updateUser($username, $data){
		$this -> db -> where('username', $username);
		$r = $this -> db -> update('tb_user', $data);
		return $r;
	}

	public function periksaUser($username){
		$this->db->where('username', $username);
		$r = $this->db->get('tb_user');
		return $r->result_array();	
	}
}