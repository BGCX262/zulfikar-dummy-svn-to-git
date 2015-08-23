
<?php
class keuangan_model extends CI_Model{
	function getPOInvoice(){
		$this->db->select('*');
		$this->db->from('purchase_order');
		$this->db->where('status_invoice',"Dikirim");
		$query = $this->db->get();
		$query_result = $query->result_array();
		return $query_result;	
	}
	function getTipeDariPOIn($PO){
		$this->db->select('*');
		$this->db->from('purchase_order, pesanan, tipe');
		$this->db->where('pesanan.id_PO', $PO, 'tipe.id = pesanan.id_tipe', 'pesanan.id_PO = purchase_order.id_PO');
		$query = $this->db->get();
		$query_result = $query->result_array();
		return $query_result;
	}
	function getPoId($id_PO){
		$this->db->where('id_PO',$id_PO);
		return $this->db->get('purchase_order')->result_array();
		
	}
	function getPesanan($id_PO){
		$this->db->where('id_PO',$id_PO);
		return $this->db->get('pesanan')->result_array();
	}
	public function getStokInvoice($id_stok_warna){
		$this->db->where('id_stok_warna',$id_stok_warna);
		return $this->db->get('warna_stok')->result_array();
		
	} 
	function getKatalogPesan($id_katalog){
		$this->db->where('id',$id_katalog);
		return $this->db->get('katalog')->result_array();
	}
	function getTipePesan($id_tipe){
		$this->db->where('id',$id_tipe);
		return $this->db->get('tipe')->result_array();
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
	function getDealerName($dealer){
		$this->db->where('username',$dealer);
		return $this->db->get('dealer')->result_array();
	}
	function getAnggaran($nomor_ang){
		$this->db->where('nomor_ang',$nomor_ang);
		return $this->db->get('anggaran')->result_array();
	}
	function getDaerah($daerah){
		$this->db->where('id',$daerah);
		return $this->db->get('daerah')->result_array();
	}
}
?>