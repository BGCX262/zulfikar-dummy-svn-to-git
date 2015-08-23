<?php
class ulp_model extends CI_Model{
	function getTipe(){
		$query = $this->db->get("tipe");
		return $query->result_array();
	}
	function getKatalog(){
	$query = $this->db->get("katalog");
	return $query->result_array();	
	}
	function getTipeId($id_tipe){
		$this->db->where('id',$id_tipe);
		return $this->db->get('tipe')->result_array();
	}
	function getAtpm($atpm){
		$this->db->where('atpm',$atpm);
		return $this->db->get('atpm')->result_array();
	}
	function getInt($id_tipe){
		$this->db->where('id_tipe',$id_tipe);
		return $this->db->get('spekintext_int')->result_array();
	}
	function getEks($id_tipe){
		$this->db->where('id_tipe',$id_tipe);
		return $this->db->get('spekintext_eks')->result_array();
	}
	function getMaterialPlan($id_ajuan){
		$this->db->where('id_ajuan',$id_ajuan);
		return $this->db->get('material_plan')->result_array();
	}
	function getKatalog1($id_tipe){
		$this->db->where('id_tipe',$id_tipe);
		return $this->db->get('katalog')->result_array();
	}

	function group($var){
		$this->db->select($var);
		$this->db->group_by($var);
		$query = $this->db->get('katalog');
		return $query->result_array();
	}
	function getAjuan($username){
		$this->db->select('*');
		$this->db->from('material_plan');
		$this->db->where('material_plan.username', $username);
		$this->db->join('katalog','material_plan.id_katalog = katalog.id');
		$this->db->join('tipe','tipe.id=katalog.id_tipe');
		$query = $this->db->get();
		 return $query->result_array();
	}
	function getTipe1($id_tipe){
		$this->db->select('*');
		$this->db->from('tipe');
		$this->db->where('id', $id_tipe);
		$query = $this->db->get();
		 return $query->result_array();
	}
	
	function cari_tipe($merek, $jenis, $model)
	{
		$this->db->select('*');
		$this->db->from('tipe');
		$this->db->like('merek', $merek, 'jenis', $jenis, 'model', $model) ;
		$query=$this->db->get();
		$query_result=$query->result_array();
		return $query_result;
	}
	function cari_katalog($tipe,$transmisi, $cc)
	{
		$this->db->select('*');
		$this->db->from('katalog');
		$this->db->like('transmisi', $transmisi, 'cc', $cc, 'tipe', $tipe) ;
		$query=$this->db->get();
		$query_result=$query->result_array();
		return $query_result;
	}
	function cari_kt($id_katalog){
		$this->db->select('*');
		$this->db->from('katalog');
		$this->db->where("id", $id_katalog);
		$query=$this->db->get();
		$query_result=$query->result_array();
		return $query_result;
	}
	function cari_tp($id_tipe){
		$this->db->select('*');
		$this->db->from('tipe');
		$this->db->where("id", $id_tipe);
		$query=$this->db->get();
		$query_result=$query->result_array();
		return $query_result;
	}
	function getHPS($id_daerah){
		$this->db->select('id, id_daerah, pkb, bbn, ongkir');
		$this->db->from('hps');
		$this->db->where('id_daerah', $id_daerah);
		$query=$this->db->get();
		$query_result=$query->result_array();
		return $query_result;
	}
	function cari_daerah ($id_daerah){
		$this->db->select('id, daerah');
		$this->db->from('daerah');
		$this->db->where('id', $id_daerah) ;
		$query=$this->db->get();
		$query_result=$query->result_array();
		return $query_result;
	}
	function cmb_daerah(){
		return $this->db->get('daerah')->result_array();
	}
	function input_form($data){
		$this->db->insert('material_plan',$data);
	}
	function getmaterial_plan(){
		return $this->db->get('material_plan')->result_array();
	}
	function tampil_hps(){
		return $this->db->get('material_plan')->result_array();
	}
	function cari_NMA($NMA, $thn){
		$this->db->select('*');
		$this->db->from('anggaran, daerah');
		$this->db->where('anggaran.nomor_ang', $NMA, 'anggaran.tahun', $thn) ;
		$this->db->where ('anggaran.daerah = daerah.id');
		$query=$this->db->get();
		$query_result=$query->result_array();
		return $query_result;
	}
	function getStokWarna($id_katalog){
		$this->db->select('*');
		$this->db->from('warna_stok');
		$this->db->where('warna_stok.id_katalog', $id_katalog);
		$query=$this->db->get();
		return $query_result = $query->result_array();
	}
	function getWarna($id_tipe){
		$this->db->select('*');
		$this->db->from('warna');
		$this->db->where('warna.id_tipe', $id_tipe);
		$query=$this->db->get();
		return $query_result = $query->result_array();
	}
	function getPesananPR($id_PO){
		$this->db->select('*');
		$this->db->from('pesanan_pr');
		$this->db->where('id_PO', $id_PO);
		$query=$this->db->get();
		return $query_result = $query->result_array();
	}
	function getNMA($NMA){
		$this->db->select('*');
		$this->db->from('anggaran, daerah');
		$this->db->where('anggaran.nomor_ang', $NMA) ;
		$this->db->where('anggaran.daerah = daerah.id');
		$query=$this->db->get();
		$query_result=$query->result_array();
		return $query_result;
	}
	function getIdDaerah($NMA){
		$this->db->select('daerah');
		$this->db->from('anggaran');
		$this->db->where('nomor_ang', $NMA);
		$query=$this->db->get();
		$query_result=$query->result_array();
		return $query_result;
	}
	function getONTR($id_katalog, $daerah, $dealer){
		$this->db->select('OnTR, username');
		$this->db->from('harga');
		$this->db->where('id_katalog', $id_katalog);
		$this->db->where('id_daerah', $daerah);
		$this->db->where('username', $dealer);
		$query=$this->db->get();
		$query_result=$query->result_array();
		return $query_result;
	}
	function getONTRminimum($ONTR){
		$this->db->select_min('OnTR');
		$this->db->from('harga');
		$query=$this->db->get();
		$query_result = $query->result_array();
		return $query_result;
	}
	function getDealerDenganOnTR ($ONTR) {
		$this->db->select('*');
		$this->db->from('harga');
		$this->db->where('OnTR', $ONTR);
		$query=$this->db->get();
		$query_result=$query->result_array();
		return $query_result;
	}
	function getPenawaran($id_PO, $daerah, $id_katalog) {
		$ajuan = 'Telah Mengajukan';
		$this->db->select('*');
		$this->db->from('penawaran');
		$this->db->where('penawaran.id_po', $id_PO);
		$this->db->join('harga','harga.username=penawaran.username_dealer');
		$this->db->where('harga.id_daerah', $daerah);
		$this->db->where('harga.id_katalog', $id_katalog);
		$this->db->where('penawaran.dealer_ajuan', $ajuan);
		$query = $this->db->get();
		return $query->result_array();
	}
	function getPenawaran2($id_PO, $daerah, $id_katalog, $dealer) {
		$this->db->select('*');
		$this->db->from('penawaran');
		$this->db->where('penawaran.id_po', $id_PO);
		$this->db->join('harga','harga.username=penawaran.username_dealer');
		$this->db->where('harga.id_daerah', $daerah);
		$this->db->where('harga.id_katalog', $id_katalog);
		$this->db->where('harga.username', $dealer);
		$query = $this->db->get();
		 return $query->result_array();
	}
function inputPO($data){
		$this->db->insert('purchase_order',$data);
	}
	function updatePO($data, $id_PO){
		$this->db->where('id_PO', $id_PO);
		$this->db->update('purchase_order', $data); 
	}
function inputPenawaran($data1){
		$this->db->insert('penawaran',$data1);
	}
	function inputPesanan($data){
		$this->db->insert('pesanan',$data);
	}
	function inputPesananPR($data){
		$this->db->insert('pesanan_pr',$data);
	}
	function getPO($NMA){
		$this->db->select('*');
		$this->db->from('purchase_order');
		$this->db->where('nomor_ang', $NMA);
		$query = $this->db->get();
		$query_result = $query->result_array();
		return $query_result;
	}
	function updateAnggaran($statusAnggaran, $NMA){
		$this->db->where('nomor_ang', $NMA);
		$this->db->update('anggaran', $statusAnggaran); 
	}
	function getPurchaseOrder($username){
		$this->db->select('*');
		$this->db->from('purchase_order');
		$this->db->where('username', $username);
		$query = $this->db->get();
		$query_result = $query->result_array();
		return $query_result;	
	}
	function getPR($username){
		$kosong = "";
		$this->db->select('*');
		$this->db->from('purchase_order');
		$this->db->where('username', $username);
		$this->db->where('dealer', $kosong);
		$query = $this->db->get();
		$query_result = $query->result_array();
		return $query_result;	
	}
	function getPRdariPO($id_PO){
		$this->db->select('*');
		$this->db->from('purchase_order');
		$this->db->where('id_PO', $id_PO);
		$query = $this->db->get();
		$query_result = $query->result_array();
		return $query_result;	
	}
	function getTipeDariPO($PO){
		$this->db->select('*');
		$this->db->from('purchase_order, pesanan, tipe');
		$this->db->where('pesanan.id_PO', $PO, 'tipe.id = pesanan.id_tipe', 'pesanan.id_PO = purchase_order.id_PO');
		$query = $this->db->get();
		$query_result = $query->result_array();
		return $query_result;
	}
	function getTipeDariPO2($PO){
		$this->db->select('*');
		$this->db->from('purchase_order');
		$this->db->where('purchase_order.id_PO', $PO);
		$this->db->join('pesanan_pr','purchase_order.id_PO=pesanan_pr.id_PO');
		$this->db->join('warna','warna.ID=pesanan_pr.id_warna');
		$this->db->join ('tipe','warna.ID_tipe=tipe.id');
		$query = $this->db->get();
		$query_result = $query->result_array();
		return $query_result;
	}
	function getKatalogDariPesanan($id_tipe){
		$this->db->select('*');
		$this->db->from('katalog');
		$this->db->where('katalog.id_tipe', $id_tipe);
		$query = $this->db->get();
		$query_result = $query->result_array();
		return $query_result;
	}
	function getPOInvoice($username){
		$this->db->select('*');
		$this->db->from('purchase_order');
		$this->db->where('username', $username);
		$this->db->where('status_dealer',"Dikirim");
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
	public function getIdPOInvoice($id_PO){
		$this->db->where('id_PO',$id_PO);
		return $this->db->get('purchase_order')->result_array();
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
	public function getWarnaInvoice($id_warna){
		$this->db->where('ID',$id_warna);
		return $this->db->get('warna')->result_array();
	}
	function cariDealer($merek){
		$this->db->select('username');
		$this->db->from ('dealer');
		$this->db->where('merekmobil', $merek);
		$query = $this->db->get();
		 return $query->result_array();
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
	function getWarnaDariPR($PO){
		$this->db->select('*');
		$this->db->from('purchase_order');
		$this->db->where('purchase_order.id_PO', $PO);
		$this->db->join('pesanan_pr','purchase_order.id_PO=pesanan_pr.id_PO');
		$this->db->join ('warna','warna.ID=pesanan_pr.id_warna');
		$query = $this->db->get();
		 return $query->result_array();
	}
	function getTipeDariPOInUlp($PO){
		$this->db->select('*');
		$this->db->from('pesanan');
		$this->db->where('pesanan.id_PO', $PO);
		$this->db->join('warna_stok','pesanan.id_stok_warna=warna_stok.id_stok_warna');
		$this->db->join('katalog','katalog.id=warna_stok.id_katalog');
		$this->db->join('tipe','tipe.id=katalog.id_tipe');
		$query = $this->db->get();
		//print_r($query); die;
		return $query->result_array();
		
		/*$this->db->select('*');
		$this->db->from('purchase_order, pesanan, tipe');
		$this->db->where('pesanan.id_PO', $PO, 'tipe.id = pesanan.id_tipe', 'pesanan.id_PO = purchase_order.id_PO');
		$query = $this->db->get();
		$query_result = $query->result_array();
		return $query_result;*/
	}
	
	function getTipeDariPoIn($PO){
		$this->db->select('*');
		$this->db->from('purchase_order, pesanan, tipe');
		$this->db->where('pesanan.id_PO', $PO, 'tipe.id=pesanan.id_tipe', 'pesanan.id_PO = purchaseOrder.id_PO');
		$query = $this->db->get();
		$query_result=$query->result_array();
		return $query_result();
	}
	
	
	public function getTipeSelect($data){
		return $this->db->get_where("tipe", $data)->result_array();	
	}
	
	public function getKatalogSelect($data){
		return $this->db->get_where("katalog", $data)->result_array();
	}
	
	public function getKatalogNol($data){
		$query =  $this->db->get_where("katalog", $data)->result_array();
		return $query[0];
	}
	
	public function getTipeGroup($data, $group){
		$this->db->group_by($group);
		return $this->db->get_where("tipe", $data)->result_array();
	}
	
	public function getKatalogGroup($data, $group){
		$this->db->group_by($group);
		return $this->db->get_where("katalog", $data)->result_array();
	}
	
	public function getKatalogGroupNol($data, $group){
		$this->db->group_by($group);
		$query = $this->db->get_where("katalog", $data)->result_array();
		return $query[0];
	}
	
	public function getTipeG($group){
		$this->db->group_by($group);
		return $this->db->get("tipe")->result_array();
	}
	
	public function getKatalogG($group){
		$this->db->group_by($group);
		return $this->db->get("katalog")->result_array();
	}
	
	function getPoId($id_PO){
		$this->db->where('id_PO',$id_PO);
		return $this->db->get('purchase_order')->result_array();
		
	}
	
	function getPesanan($id_PO){
		$this->db->where('id_PO',$id_PO);
		return $this->db->get('pesanan')->result_array();
	}
	
	function getIdStok($id_stok_warna){
		$this->db->where('id_stok_warna',$id_stok_warna);
		return $this->db->get('warna_stok')->result_array();
	}
	
	function getKatalogPesan($id_katalog){
		$this->db->where('id',$id_katalog);
		return $this->db->get('katalog')->result_array();
	}

}

?>