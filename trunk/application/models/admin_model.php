<?php

class Admin_model extends CI_Model {

    public function getAnggaran(){
        $query = $this->db->get("anggaran");
        return $query->result_array();
    }

    public function getDaerah(){
    	$this->db->order_by('id ASC'); 
        $query = $this->db->get("daerah");
        return $query->result_array();
    }

    public function input_anggaran($data){
        $this->db->insert("anggaran", $data);
    }
    
    public function getAllDealer(){
    	$this->db->where("status", 2);
    	return $this->db->get("dealer")->result_array();
    }
    
    public function getAllLalai(){
    	return $this->db->get("lalai")->result_array();    	
    }
    
    public function getEval($username){
    	$this->db->where("username", $username);
    	return $this->db->get("eval")->result_array();
    }
    
    public function deleteEval($username){
    	$this->db->where("username", $username);
    	$this->db->delete("eval");
    }
    
    public function inputEval($data){
    	$this->db->insert("eval", $data);
    }
    
    public function getAllUser(){
    	return $this->db->get("user")->result_array();
    }
    
    public function getUser($username){
    	$this->db->where("username", $username);
    	$query = $this->db->get("user")->result_array();
    	return $query[0];
    }
    
    public function getUlp($username){
    	$this->db->where("ulp", $username);
    	$query = $this->db->get("ulp")->result_array();
    	return $query[0];
    }
	
    public function getAtpm($username){
    	$this->db->where("atpm", $username);
    	$query = $this->db->get("atpm")->result_array();
    	return $query[0];
    }
    
    public function daftarUser($data){
    	$this->db->insert("user", $data);
    }
    
    public function updateUser($data, $user){
    	$this->db->where("username", $user);
    	$this->db->update("user", $data);
    }
    
    public function deleteUser($username){
    	$this->db->where("username", $username);
    	$this->db->delete("user");
    }
    
    public function daftarUlp($username){
    	$data = array(
    		"ulp" => $username
    	);
    	$this->db->insert("ulp", $data);
    }
    
	public function daftarAtpm($username){
    	$data = array(
    		"atpm" => $username
    	);
    	$this->db->insert("atpm", $data);
    }
    
    public function deleteUlp($username){
    	$this->db->where("ulp", $username);
    	$this->db->delete("ulp");
    }
    
	public function deleteAtpm($username){
    	$this->db->where("atpm", $username);
    	$this->db->delete("atpm");
    }
    
	public function updateUlp($data, $user){
    	$this->db->where("ulp", $user);
    	$this->db->update("ulp", $data);
    }
    
	public function updateAtpm($data, $user){
    	$this->db->where("atpm", $user);
    	$this->db->update("atpm", $data);
    }
    
    public function getPO(){
    	$query = $this->db->get("purchase_order");
        return $query->result_array();
    }
    
  	public function getInvoice(){
  		$this->db->where('status_invoice', 'Menunggu Admin');
  		$this->db->or_where('status_invoice', 'Dikirim');
    	$query = $this->db->get("purchase_order");
        return $query->result_array();
    }
}
?>
