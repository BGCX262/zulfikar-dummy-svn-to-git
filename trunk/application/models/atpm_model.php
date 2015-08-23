<?php

class Atpm_model extends CI_Model {
	public function getMerek($atpm_username) {
		$query=$this->db->get_where('atpm', array('atpm'=>$atpm_username));
		$array=$query->result_array();
		return $array[0]['merek'];
	}
	
	public function getMerekKat($atpm_username){
		$query=$this->db->where('atpm',$atpm_username);
		$array=$this->db->get('atpm')->result_array();
		return $array[0];
	}
	
	public function getTipeKat($merek){
		$this->db->where('merek',$merek);
		return $this->db->get("tipe")->result_array();
	}
	
	public function getTipeID($id_tipe){
		$this->db->where('id',$id_tipe);
		return $this->db->get("tipe")->result_array();
	}
	
	public function getKatalogKat($id_tipe){
		$this->db->where_in('id_tipe',$id_tipe);
		return $this->db->get("katalog")->result_array();
	}
	
	public function getKatalogTipe($id_katalog){
		$this->db->where('id',$id_katalog);
		return $this->db->get("katalog")->result_array();
	} 
	
	public function getEksterior($id_tipe){
		$this->db->where('id_tipe',$id_tipe);
		return $this->db->get("spekintext_eks")->result_array();
	}
	
	public function getInterior($id_tipe){
		$this->db->where('id_tipe',$id_tipe);
		return $this->db->get("spekintext_int")->result_array();
	}
	
	public function getIDWhere($arraymerekjenismodel){
		//print_r($arraymerekjenismodel);die;
		$this->db->where($arraymerekjenismodel);
		$query=$this->db->get("tipe");
		$array=$query->result_array(); 
		return $array[0]['id'];
	}

	public function kosongkanKatalogEks($id_tipe){
		//hilangkan katalog dengan nama atpm sesuatu
		$this->db->delete("spekintext_eks", array('id_tipe'=>$id_tipe));
	}

	public function kosongkanKatalogInt($id_tipe){
		//hilangkan katalog dengan nama atpm sesuatu
		$this->db->delete("spekintext_int", array("id_tipe"=>$id_tipe));
	}

	public function tambahkanKatalogEks($nama, $deskripsi, $namafile){
		//Inputnya satuan aja, jadi buka array
		$data=array(
			'id_tipe'=>$this->session->userdata('tipe_id'),
			'eks'=>$nama, 
			'eks_desc'=>$deskripsi, 
			'eks_doc'=>$namafile
		);
		$this->db->insert('spekintext_eks', $data);
	}

	public function tambahkanKatalogInt($nama_katalog, $deskripsi, $namafile){
		$data=array(
			'id_tipe'=>$this->session->userdata('tipe_id'),
			'int'=>$nama_katalog, 
			'int_desc'=>$deskripsi, 
			'int_doc'=>$namafile
		);
		$this->db->insert("spekintext_int", $data);
	}

	public function getPajak($id_atpm){
		$this->db->where("id_atpm",$id_atpm);
		$query = $this->db->get("hps");
		return $query->result_array();
	}

	public function getAllPajak(){
		$this->db->order_by('id_daerah ASC'); 
		return $this->db->get("hps")->result_array();
	}

	public function getAtpm($atpm){
		$this->db->where("atpm",$atpm);
		$query = $this->db->get("atpm");
		$array =  $query->result_array();		
		return $array[0];
	}
	
	public function getAtpmDealer($merek){
		$this->db->where('merekmobil',$merek);
		$this->db->where('status',3);
		$this->db->or_where('status',2);
		return $this->db->get("dealer")->result_array();
	}
	
	public function getTipe($atpm){
		$this->db->where('atpm_name',$atpm);
		return $this->db->get("tipe")->result_array();
	}
	
	public function getLalai(){
		$query = $this->db->get("lalai");
		$array = $query->result_array();
		return $array;
	}
	
	public function getEval($username){
		$this->db->where('username',$username);
		$query = $this->db->get("eval");
		$array = $query->result_array();
		return $array;
	}
		
	public function inputPajak($id_atpm, $pkb, $bbn, $ongkir, $asuransi, $daerah){
		for($a=0; $a<count($daerah); $a++){
			$data = array(
			"id_atpm" => $id_atpm,
			"id_daerah" => $daerah[$a]['id'],
			"pkb" => $pkb[$a+1],
			"bbn" => $bbn[$a+1],
			"ongkir" => $ongkir[$a+1],
			"asuransi" => $asuransi[$a+1]
			);
			$this->db->insert("hps", $data);	
		}
	}

	public function editPajak($id_atpm, $pkb, $bbn, $ongkir, $asuransi, $daerah){
		for($a=0; $a<count($daerah); $a++){
			$data = array(
			"pkb" => $pkb[$a+1],
			"bbn" => $bbn[$a+1],
			"ongkir" => $ongkir[$a+1],
			"asuransi" => $asuransi[$a+1]
			);
			$this->db->where("id_atpm", $id_atpm);
			$this->db->where("id_daerah", $daerah[$a]['id']);
			$this->db->update("hps", $data);	
		}
	}
	
	public function updateSpekintext_intImage($int, $int_doc){
		$this->db->where('int',$int);
		$this->db->update('spekintext_int',array("int_doc"=>$int_doc));
	}
	
	public function updateSpekintext_eksImage($eks, $eks_doc){
		$this->db->where('eks', $eks);
		$this->db->update('spekintext_eks',array("eks_doc"=>$eks_doc));
	}
	
	public function updateTipeSpecImage($id_tipe, $spec){
		$this->db->where('id',$id_tipe);
		$this->db->update('tipe',array("spec"=>$spec));
	}
	
	public function updateSpecImage($id, $imagename){
		$this->db->where('id', $id);
		$this->db->update('tipe', array("spec"=>$imagename));
	}
	
	public function deleteKatalog($id){
		$this->db->where('id',$id);
		$this->db->delete('katalog');
	}
	
	public function deleteInterior($int){
		$this->db->where('int',$int);
		$this->db->delete('spekintext_int');
	}

	public function deleteEksterior($eks){
		$this->db->where('eks',$eks);
		$this->db->delete('spekintext_eks');
	}
}
?>