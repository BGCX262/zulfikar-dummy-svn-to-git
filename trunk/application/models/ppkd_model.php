<?php

class ppkd_model extends CI_Model {
 
	function getajuanren(){
		$this->db->select('*');
		$this->db->from('material_plan');
		$this->db->join('katalog','material_plan.id_katalog=katalog.id');
		$this->db->join('tipe','tipe.id=katalog.id_tipe');
		
		$query=$this->db->get();
		return $query->result_array();
	}
	
	/*function getajuanren(){
		$this->db->select('*');
		$this->db->from('material_plan');
		$this->db->join('tipe','material_plan.id_tipe=tipe.id');
		
		$query=$this->db->get();
		return $query->result_array();
	} */
	
	function gettipe($id_tipe){
		$this->db->where('id',$id_tipe);
		return $this->db->get('tipe')->result_array();
		
	}
	function getmat($id_ajuan){
		$this->db->where('id_ajuan',$id_ajuan);
		return $this->db->get('material_plan')->result_array();
		
	}
	
	function getKatalogg($id_kat){
		$this->db->where('id', $id_kat);
		$query = $this->db->get('katalog');
		$array = $query->result_array();
		return $array[0];
	}
	
	function getKata($id_kat){
		$this->db->where('id',$id_kat);
		return $this->db->get('katalog')->result_array();
	}
	function getHps($id_atpm){
		$this->db->where('id_atpm',$id_atpm);
		return $this->db->get('hps')->result_array();
	}
	function getDaerah($daerah){
		$this->db->where('id',$daerah);
		return $this->db->get('daerah')->result_array();
	}
	function getAtpm($atpm){
		$this->db->where('atpm',$atpm);
		return $this->db->get('atpm')->result_array();
		
	}
	function update($id_ajuan){
		$data= array (
				//"id_ajuan"=>"$id_ajuan",
				//"id_tipe"=> $_POST['id_tipe'],
				//"jumlah" => $_POST['jumlah'],
				//"keperluan"=> $_POST['keperluan'],
				//"departemen"=> $_POST['departemen'],
				//"daerah"=> $_POST['daerah'],
				//"total_hps"=>$_POST['total_hps'],
				"status"=>$_POST['status']			
			);
		$this->db->where('id_ajuan',$id_ajuan);
		$this->db->update('material_plan',$data);
	}
	
}

	
/*	function gettipe($id_tipe){
		$this->db->where('id',$id_tipe);
		return $this->db->get('tipe')->result_array();
		
	}
	function getmat($id_ajuan){
		$this->db->where('id_ajuan',$id_ajuan);
		return $this->db->get('material_plan')->result_array();
		
	}
	function getKata($id_kat){
		$this->db->where('id_tipe',$id_kat);
		return $this->db->get('katalog')->result_array();
		
	}
	function getHps($id_atpm){
		$this->db->where('id_atpm',$id_atpm);
		return $this->db->get('hps')->result_array();
	}
	function getDaerah($daerah){
		$this->db->where('id',$daerah);
		return $this->db->get('daerah')->result_array();
	}
	function getAtpm($atpm){
		$this->db->where('atpm',$atpm);
		return $this->db->get('atpm')->result_array();
		
	}
	function update($id_ajuan){
		$data= array (
				//"id_ajuan"=>"$id_ajuan",
				//"id_tipe"=> $_POST['id_tipe'],
				//"jumlah" => $_POST['jumlah'],
				//"keperluan"=> $_POST['keperluan'],
				//"departemen"=> $_POST['departemen'],
				//"daerah"=> $_POST['daerah'],
				//"total_hps"=>$_POST['total_hps'],
				"status"=>$_POST['status']			
			);
		$this->db->where('id_ajuan',$id_ajuan);
		$this->db->update('material_plan',$data);
	}
	
}
?> */