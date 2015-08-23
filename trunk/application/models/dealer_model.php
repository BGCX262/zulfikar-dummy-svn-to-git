<?php
class dealer_model extends CI_Model{
	function select_all($merek){
		return $this->db->where('merek' , $merek)->get('tipe')->result_array();	
	}
	
	function select_all2(){
		return $this->db->get('atpm')->result_array();
	}
	
	public function getTipe($id_tipe){
		//$this->db->where("merek", $merek);
		$this->db->where("id", $id_tipe);
		$query = $this->db->get("tipe");
		$array = $query->result_array();
		return $array[0];	
	}
	
	public function getKatalog($id_tipe){
		$this->db->where('id', $id_tipe);
		$query = $this->db->get("katalog");
		$array = $query->result_array();
		return $array;		
	}
	
	public function getKatalogWhereIn($id_tipe){
		$this->db->where_in("id_tipe", $id_tipe);
		$query = $this->db->get("katalog");
		$array = $query->result_array();
		return $array;		
	}
	
	function getDealer($username){
		$this->db->where('username', $username);
		$query = $this->db->get('dealer');
		$array = $query->result_array();
		return $array[0];
	}
	
	function inputHarga($id_katalog, $daerah, $username){
		for($a=0; $a<count($daerah); $a++){
			$data=array(
			'id_katalog'=>$id_katalog,
			'id_daerah'=>$daerah[$a]['id'],
			'OnTR'=>0,
			'username'=>$username
			);
			$this->db->insert('harga',$data);
		}
	}
	
	function editHarga($id){
		$this->db->where('id_katalog', $id);
		$query = $this->db->get('harga');
		$array = $query->result_array();
		return $array;
	}
	
	function getHarga($id, $username){
		$username=$this->session->userdata('username');
		$this->db->where('id_katalog', $id);
		$this->db->where('username', $username);
		$this->db->order_by('id_daerah asc');
		$query = $this->db->get('harga');
		$array = $query->result_array();
		return $array;
	}
	
	function getKatalogg($id_katalog){
		$this->db->where('id', $id_katalog);
		$query = $this->db->get('katalog');
		$array = $query->result_array();
		return $array[0];
	}
	
	
	function getAtpm($id){
		$this->db->where('id', $id);
		$query = $this->db->get('atpm');
		$array = $query->result_array();
		return $array;
	}
	
	function select_all3(){
		return $this->db->get('daerah')->result_array();
	}
	
	function select_harga(){
		$query = $this->db->get('harga');
		$array = $query->result_array();
		return $array;
	}
	function getPO(){
		return $this->db->get('purchase_order')->result_array();
	}
	/*function getPoDealer($dealer){
		$this->db->where('username',$dealer);
		return $this->db->get('dealer')->result_array();
	}*/
	function getPODealer($dealer){
		$this->db->where('dealer',$dealer);
		return $this->db->get('purchase_order')->result_array();
		
	}
	function getIdPO($dealer){
		$this->db->where('dealer',$dealer);
		return $this->db->get('purchase_order')->result_array();
	}
	function getPoId($id_PO){
		$this->db->where('id_PO',$id_PO);
		return $this->db->get('purchase_order')->result_array();
	}
	function getAnggaran($nomor_ang){
		$this->db->where('nomor_ang',$nomor_ang);
		return $this->db->get('anggaran')->result_array();
	}
	function getDaerah($daerah){
		$this->db->where('id',$daerah);
		return $this->db->get('daerah')->result_array();
	}
	function getPesanan($id_PO){
		$this->db->where('id_PO',$id_PO);
		return $this->db->get('pesanan')->result_array();
	}
	function getTipePesan($id_tipe){
		$this->db->select('*');
		$this->db->from('tipe');
		$this->db->where('tipe.id', $id_tipe);
		$this->db->join('katalog','tipe.id=katalog.id_tipe');
		$query = $this->db->get();
		 return $query->result_array();
	}
	function getIdStok($id_stok_warna){
		$this->db->where('id_stok_warna',$id_stok_warna);
		return $this->db->get('warna_stok')->result_array();
	}
	function getWarna($id_warna){
		$this->db->where('ID',$id_warna);
		return $this->db->get('warna')->result_array();
	}
	
	function getKatalogPesanDesi($id_tipe){
		$this->db->select('*');
		$this->db->from('katalog');
		$this->db->where('katalog.id_tipe', $id_tipe);
		$this->db->join('tipe','tipe.id=katalog.id_tipe');
		$query = $this->db->get();
		 return $query->result_array();	
	}
	function getKatalogPesan($id_katalog){
		$this->db->where('id',$id_katalog);
		return $this->db->get('katalog')->result_array();
	}
	function getStok($dealer){
		$this->db->where('username_dealer',$dealer);
		return $this->db->get('warna_stok')->result_array();
	}
	function getStokKat($dealer){
		$this->db->where('username_dealer', $dealer);
		return $this->db->get('warna_stok')->result_array();
	}
	function getStokKatalog($id_katalog){
		$this->db->where('id_katalog',$id_katalog);
		return $this->db->get('warna_stok')->result_array();
	}
	function getDealerName($dealer){
		$this->db->where('username',$dealer);
		return $this->db->get('dealer')->result_array();
	}
	function updateStok($array,$data){
		$this->db->where($array);
		$this->db->update("warna_stok",$data);
	} 
	function getPO_status($status_dealer){
		$this->db->where('status_dealer',$status_dealer);
		return $this->db->get('purchase_order')->result_array();
	}
	
	function getLalai(){
		$query = $this->db->get('lalai');
		$array = $query->result_array();
		return $array;
	}
	
	function getEval($username){
		$this->db->where("username", $username);
		$query = $this->db->get('eval')->result_array();
		return $query;
	}
	
	function getNotif($id_lalai){
		$this->db->where("id_lalai", $id_lalai);
	}
	function getPurchaseOrder($dealer){
	 	$this->db->select('*');
		$this->db->from('purchase_order');
		$this->db->where('dealer',$dealer);
		$query = $this->db->get();
		return $query->result_array();	
	}
	function getTipeDariPO($PO){
		$this->db->select('*');
		$this->db->from('purchase_order, pesanan, tipe');
		$this->db->where('pesanan.id_PO', $PO, 'tipe.id = pesanan.id_tipe', 'pesanan.id_PO = purchase_order.id_PO');
		$query = $this->db->get();
		$query_result = $query->result_array();
		return $query_result;
	}
	function getWarnaDariPO($PO){
		$this->db->select('*');
		$this->db->from('purchase_order');
		$this->db->where('purchase_order.id_PO', $PO);
		$this->db->join('pesanan','purchase_order.id_PO=pesanan.id_PO');
		$this->db->join('warna_stok','warna_stok.id_stok_warna=pesanan.id_stok_warna');
		$this->db->join ('warna','warna.ID=warna_stok.ID_warna');
		$this->db->where('pesanan.id_stok_warna = warna_stok.id_stok_warna');
		$query = $this->db->get();
		 return $query->result_array();
	}
	function getPOInvoice($username){
		$this->db->select('*');
		$this->db->from('purchase_order');
		$this->db->where('dealer', $username);
		$this->db->where('status_dealer',"Telah diterima");
		$query = $this->db->get();
		$query_result = $query->result_array();
		return $query_result;	
	}
	public function getPesananInvoice($id_PO){
		$this->db->where('id_PO',$id_PO);
		return $this->db->get('pesanan')->result_array();
		
	} 
	public function getStokInvoice($id_stok_warna){
		$this->db->where('id_stok_warna',$id_stok_warna);
		return $this->db->get('warna_stok')->result_array();
		
	} 
	public function getKatalogInvoice($id_katalog){
		$this->db->where('id',$id_katalog);
		return $this->db->get('katalog')->result_array();
		
	} 
	public function getTipeInvoice($id_tipe){
		$this->db->where('id',$id_tipe);
		return $this->db->get('tipe')->result_array();
		
	} 
	function getTipeDariPOIn($PO){
		$this->db->select('*');
		$this->db->from('purchase_order, pesanan, tipe');
		$this->db->where('pesanan.id_PO', $PO, 'tipe.id = pesanan.id_tipe', 'pesanan.id_PO = purchase_order.id_PO');
		$query = $this->db->get();
		$query_result = $query->result_array();
		return $query_result;
	}
	function getJenisKatalog($PO){
		$this->db->select('*');
		$this->db->from('purchase_order, pesanan, tipe, katalog');
		$this->db->where('pesanan.id_PO', $PO, 'tipe.id = pesanan.id_tipe', 'pesanan.id_PO = purchase_order.id_PO', 'katalog.id_tipe = tipe.id');
		$query = $this->db->get();
		$query_result = $query->result_array();
		return $query_result;
	}
	public function getAnggPOInvoice($nomor_ang){
		$this->db->where('nomor_ang',$nomor_ang);
		return $this->db->get('anggaran')->result_array();
	}
	public function getDaerahInvoice($id_daerah){
		$this->db->where('id',$id_daerah);
		return $this->db->get('daerah')->result_array();
	}
	public function getDealerInvoice($dealer){
		$this->db->where('username',$dealer);
		return $this->db->get('dealer')->result_array();
	}
	public function getIdPOInvoice($id_PO){
		$this->db->where('id_PO',$id_PO);
		return $this->db->get('purchase_order')->result_array();
	}
	public function getNamaUlp($username){
		$this->db->where('ulp',$username);
		return $this->db->get('ulp')->result_array();
	}
	public function getPesananPR($id_PO){
		$this->db->where('id_PO',$id_PO);
		return $this->db->get('pesanan_pr')->result_array();
	}
	public function getPenawaran($id_po){
		$this->db->where('id_po', $id_po);
		return $this->db->get('penawaran')->result_array();
	}
	public function getTawaran($dealer){
		$this->db->select('*');
		$this->db->from('penawaran');
		$this->db->where('penawaran.username_dealer', $dealer);
		$this->db->join('purchase_order','purchase_order.id_PO=penawaran.id_PO');
		//$this->db->join('pesanan_pr','pesanan_pr.id_PO=purchase_order.id_PO');
		//$this->db->join('warna','pesanan_pr.id_warna=warna.ID');
		$query = $this->db->get();
		$query_result = $query->result_array();
		return $query_result;
	}
	public function getPORequest($id_po){
		$this->db->select('*');
		$this->db->from('pesanan_pr');
		$this->db->where('pesanan_pr.id_PO', $id_po);
		$this->db->join('purchase_order','purchase_order.id_PO=pesanan_pr.id_PO');
		//$this->db->join('pesanan_pr','pesanan_pr.id_PO=purchase_order.id_PO');
		$this->db->join('warna','pesanan_pr.id_warna=warna.ID');
		$query = $this->db->get();
		$query_result = $query->result_array();
		return $query_result;
	}
	public function getWarnaKatalog($id_warna){
		$this->db->where('ID_warna', $id_warna);
		return $this->db->get('warna_stok')->result_array();
	}
	public function getWarnaPR($id_warna){
		$this->db->where('ID', $id_warna);
		return $this->db->get('warna')->result_array();
	}
	public function getWarnaAsli($PO){
		$this->db->select('*');
		$this->db->from('warna');
		$this->db->where('id_PO', $PO);
		$this->db->join('pesanan_pr','pesanan_pr.id_warna=warna.ID');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getWarnaPesanan($id_po){
		$this->db->where('id_PO', $id_po);
		return $this->db->get('pesanan_pr')->result_array();
	}
	public function getTawaranDealer($id_po, $dealer){
		$this->db->where('id_po', $id_po);
		$this->db->where('username_dealer', $dealer);
		return $this->db->get('penawaran')->result_array();;
	}
}
 	
?>