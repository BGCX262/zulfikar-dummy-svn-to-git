<?php
class Kualifikasi extends CI_Model{
	public function getAllKualifikasi($username){
		$query=$this->db->get_where('kualifikasi', array('username'=>$username));
		$row=$query->result_array();
		return $row[0];
	}

	public function updateKualifikasi($data, $username){
		$this->db->where("username", $username);
		$this->db->update('kualifikasi', $data);
	}

	public function getKomentar($username){
		$this->db->where(array('username'=>$username));
		$this->db->select("komentar");
		$query=$this->db->get('kualifikasi');
		$row=$query->result_array();
		return $row[0]['komentar'];
	}





}
?>
