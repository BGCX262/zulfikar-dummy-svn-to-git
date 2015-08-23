<?php

class User extends CI_Model {
	public function insertNewUser($username, $password, $email, $role){
		$array=array(
			"username"=>$username, 
			"password"=>$password, 
			"email"=>$email, 
			"role"=>$role
		);
		
		$this->db->insert("user", $array);
	}
	
	public function checkUsernamePassword($username, $password) {
		//$hashedpassword=md5($password);

		$this->db->where("username", $username);
		$this->db->where("password", $password);
		$this->db->from("user");
		$count=$this->db->count_all_results();

		if($count==1) {
			return true;
		}else if($count==0) {
			return false;
		}else {
			die("Tidak boleh ada 2 username yang sama");
		}
	}

	public function getRole($username) {
		$query=$this->db->get_where('user', array("username"=>$username));
		$row=$query->result_array();
		return $row[0]['role'];
	}

	public function setRole($username, $role){
		$this->db->where('username', $username);
		$this->db->update('user', array("role"=>$role));
	}

	public function getUserWithRole($role) {
		if(strcmp($role, "admin")==0) {
			$query=$this->db->get_where("user", array("role"=>1));
		}
		else if(strcmp($role, "calondealer")==0) {
			$query=$this->db->get_where("user", array("role"=>2));
		}
		else if(strcmp($role, "dealer")==0) {
			$query=$this->db->get_where("user", array("role"=>3));
		}
		else if(strcmp($role, "adminulp")==0) {
			$query=$this->db->get_where("user", array("role"=>4));
		}
		else if(strcmp($role, "atpm")==0) {
			$query=$this->db->get_where("user", array("role"=>5));
		}
		else if(strcmp($role, "admin")==0) {
			$query=$this->db->get_where("user", array("role"=>6));
		}
		else if(strcmp($role, "keuangan")==0) {
			$query=$this->db->get_where("user", array("role"=>7));
		}
		else die( "bug : cek lagi parameter user yang dimasukkan pada fungsi 'getUserWithRole'");

		return $query->result_array();

	}
}


?>
