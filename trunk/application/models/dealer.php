<?php
class Dealer extends CI_Model {
	public function getUsernameWithStatus($status) {
		$this->db->where(array("status"=>$status));
		$this->db->select('username');
		$query=$this->db->get('dealer');
		return $query->result_array();
	}

	public function getStatus($username) {
		$this->db->where(array("username"=>$username));
		$this->db->select('status');
		$query=$this->db->get('dealer');
		$data=$query->result_array();
		return $data[0]['status'];
	}
	
	public function updateStatus($username, $status){
		$this->db->where("username", $username);
    	$this->db->update('dealer', array("status"=>$status));
	}

	public function isUsernameWaitingForApproval($username){
		$query=$this->db->query("SELECT * FROM dealer WHERE (status=1 OR status=3) AND username='$username'" );
		$jumlah=$query->num_rows();
		return $jumlah==1;
	}

	public function getAllDocument($username){
		$this->db->where(array("username"=>$username));
		$query=$this->db->get('dealer');
		$array=$query->result_array();
		return $array[0];
	}
	
	public function updateInfo($username, $data){
		$this->db->where(array("username"=>$username));
		$this->db->update('dealer', $data);
	}
}
?>