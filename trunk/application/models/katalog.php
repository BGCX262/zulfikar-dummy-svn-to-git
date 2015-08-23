<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Katalog extends CI_Model{
	public function apakahTelahSubmit($merek, $jenis, $model){
		//$wheredata=array("merek"=> $merek, "jenis"=>$jenis, "model"=>$model);
		//$this->db->where($wheredata);
		//$jumlah=$this->db->count_all("tipe");
		$query="SELECT COUNT(*) AS `numrows` FROM `tipe` WHERE merek='".$merek."' AND jenis='".$jenis."' AND model='".$model."'";
		$jumlah=$this->db->query($query);
		$jumlah=$jumlah->result_array();
		return $jumlah[0]['numrows']==1;
	}
	
	public function updateMerekJenisModel($merek, $jenis, $model, $data){
		$this->db->where(array("merek"=> $merek, "jenis"=>$jenis, "model"=>$model));
		$this->db->update("tipe", $data);
	} 

	public function getData($id_tipe){
		$this->db->where("id", $id_tipe);
		$query=$this->db->get("tipe");
		$array=$query->result_array();
		return $array[0];
	}
	
	public function getDataTipe($id_tipe){
		$this->db->where("id_tipe", $id_tipe);
		$data=$this->db->get("katalog");
		return $data->result_array();
	}
	
	public function getTipe($atpm){
		$this->db->where("atpm_name", $atpm);
		$query = $this->db->get("tipe");
		$array = $query->result_array();
		return $array[0];
	}
		
	
	public function getDataKatalog($name){
            $this->db->where("atpm_name", $name);
            $query = $this->db->get("tipe");
            return $query->result_array();
    }
    
    public function getIDKatalog($id_katalog){
    		$this->db->where("id_katalog", $id_katalog);
            $query = $this->db->get("katalog");
            return $query->result_array();
    }
        
	public function getKatalog(){
		$query=$this->db->get("katalog");
		$array=$query->result_array();
		return $array[0];
	}

	public function katalogMerek($merekmobil){
		$this->db->where('merek',$merekmobil);
		$query = $this->db->get('katalog');
		$array = $query->result_array();
		return $array[0];
	}

	var $table="katalog";

	public function getAllDataKatalog(){
		return $this->db->get($this->table)->result_array();
	}
	
	public function getAllDataStok($username){
            $this->db->where("username", $username);
            $query = $this->db->get("stok_warna");
            return $query->result_array();
	}

        public function updateStok($where, $data){
        	$this->db->where($where);
        	$this->db->update("warna_stok",$data);
        }
        
   	public function inp_stok($data){
   		$this->db->insert("warna_stok", $data);
   	}
        
  	public function getKatalogByID($id){
  		$this->db->where("id", $id);
  		$query = $this->db->get("katalog")->result_array();
  		return $query[0];
  	}
  	
  	public function getWarnaByIdTipe($ID_tipe){
  		$this->db->where("ID_tipe", $ID_tipe);
  		return $this->db->get("warna")->result_array();
  	}
  	
  	public function getStokWarnaByIdKatalogUsername($id_katalog, $username){
  		return $this->db->get_where("warna_stok",  array('id_katalog' => $id_katalog, 'username_dealer' => $username))->result_array();
  	}
}