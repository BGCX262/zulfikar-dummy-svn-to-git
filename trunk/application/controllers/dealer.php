<?php
class dealer extends CI_Controller{
	public function insertNewDealer($username){
		$data=array(
			"username"=>$username, 
			"status"=>0
		);
		$this->db->insert("dealer", $data);
	}
	
	public function dealer1(){
	$user = $this->session->userdata('username');
	$this->load->model('dealer_model');
	$data['dealer'] = $this->dealer_model->getDealer($user);
	$data['tes']=$this->dealer_model->select_all($data['dealer']['merekmobil']);
	$where = array();
	for($i=0; $i<count($data['tes']); $i++){
		array_push($where, $data['tes'][$i]['id']);
	}
	$data['katalog'] = $this->dealer_model->getKatalogWhereIn($where);
	$this->load->view("dealer_browse", $data);
	}
	
	public function tampilharga(){
	$id_katalog= $_GET['id_katalog'];
	//$id_tipe= $_GET['id_tipe'];
	$this->load->model('dealer_model');
	$username=$this->session->userdata('username');
	$dealer=$this->dealer_model->getDealer($username);
	//$data['tipe']= $this->dealer_model->getTipee($id_tipe, $id_katalog);
	$katalogg= $this->dealer_model->getKatalogg($id_katalog);
	$data['katalog']= $this->dealer_model->getKatalogg($id_katalog);
	$data['tipe']= $this->dealer_model->getTipe($katalogg['id_tipe']);
	$data['daerah']= $this->dealer_model->select_all3();
	$data['harga'] = $this->dealer_model->getHarga($id_katalog, $username);
	if($data['harga']==null){
		$this->dealer_model->inputHarga($id_katalog, $data['daerah'],$username );
	};
	$data['harga'] = $this->dealer_model->getHarga($id_katalog, $username);
    $this->load->view("dealer_harga", $data);
	}
	
	
	
	public function inputHarga(){
	$this->load->model('dealer_model');
	$id_katalog=$_GET['id_katalog'];
	$username=$this->session->userdata('username');
	$daerah=$this->dealer_model->select_all3();
	for($i=0; $i<count($daerah);$i++){
		$this->db->where('id_katalog',$id_katalog);
		$this->db->where('id_daerah',$daerah[$i]['id']);
		$this->db->where('username',$username);
		$data=array(
					'username'=>$username,
					'OnTR'=>$_GET['ontr'.$i]);
		$this->db->update('harga',$data);
	}
	redirect(base_url()."index.php/dealer/dealer1");
	}
	
	/*public function input_stok($atpm_name){
		$this->load->model("katalog");
		$id_katalog= $_GET['id_katalog'];
		$katalogg= $this->dealer_model->getKatalogg($id_katalog);
		$data['katalog']= $this->dealer_model->getKatalogg($id_katalog);
		$data['tipe']= $this->dealer_model->getTipe($katalogg['id_tipe']);
		$data['data']=$this->katalog->getDataKatalog($atpm_name);
		$data['warna']=$this->katalog->getAllDataStok($this->session->userdata("username"));
		$this->load->view("input_stok", $data);
	}

	public function inputStok(){
		$username=$this->session->userdata("username");
		$this->load->model("katalog");
		$warna = $this->katalog->getAllDataWarna($username);
		$stock=array();
		for($i=0;$i<count($warna);$i++){
			$stock[$warna[$i]['warna']] = $_GET[$warna[$i]['warna']];
		}
		$this->katalog->inputStok($username, $stock);
		redirect(base_url()."index.php/dealer/input_stok/".$warna[0]['atpm_name']);
	}*/
	
	
	public function evaluasi(){
	$this->load->model('dealer_model');
	$username=$this->session->userdata('username');
	$dealer=$this->dealer_model->getDealer($username);
	$data['lalai']=$this->dealer_model->getLalai();
	$data['eval']=$this->dealer_model->getEval($username);
	if($data['eval']==null){
		$this->dealer_model->getEval($username);
	}
	$data['lalai']=$this->dealer_model->getLalai();
	$this->load->view("dealer_eval", $data);
	}
	
	public function notifikasi(){
	$user = $this->session->userdata('username');
	$this->load->model('dealer_model');
	$data['dealer'] = $this->dealer_model->getDealer($user);
	$data['lalai']=$this->dealer_model->getLalai();
	if($data['lalai']==null){
		$this->dealer_model->getLalai($id_lalai);
	}
	print_r($data);
	$this->load->view("dealer_notif", $data);
	}
	
	
	public function getNotifikasi(){
		$this->load->model("dealer_model");
		$this->load->model("admin_model");
		$data['dealer'] = $this->dealer_model->getDealer($this->session->userdata('username'));
		$this->load->view("dealer_notifikasi", $data);
	}
	public function dealerPO(){
	$this->load->model("dealer_model");
		$data['purchaseOrder'] = $this->dealer_model->getPurchaseOrder($this->session->userdata('username'));
		//print_r($data['purchaseOrder']);
		if($data['purchaseOrder'] != null){
		$data['dealer']=$this->dealer_model->getDealerName($data['purchaseOrder'][0]['dealer']);
		$PO = $data['purchaseOrder'];
		$i=0;
		while($i<count($PO)){
		$data['tipeDariPO'] = $this->dealer_model->getTipeDariPO($PO[$i]['id_PO']);
		$i++;
		}
		}
		$this->load->view("dealerPO",$data);
	}
	public function dealerPO_detail(){
		$id_PO=$_GET['id_PO'];
		//$id_tipe=$_GET['id_tipe'];
		//echo $id_PO;
		$this->load->model("dealer_model");
		$data['PO1']=$this->dealer_model->getPoId($id_PO);
		$data['pesanan']=$this->dealer_model->getPesanan($data['PO1'][0]['id_PO']);
		$data['stok_warna']=$this->dealer_model->getIdStok($data['pesanan'][0]['id_stok_warna']);
		$data['katalog_pesan']=$this->dealer_model->getKatalogPesan($data['stok_warna'][0]['id_katalog']);
		$data['tipe_pesan']=$this->dealer_model->getTipePesan($data['katalog_pesan'][0]['id_tipe']);
		$data['warna']=$this->dealer_model->getWarnaDariPO($data['PO1'][0]['id_PO']);
		$warna=$data['warna'];
		//print_r($data['warna']);
		//$dealer = $data['PO1'];
		$data['stok']=$this->dealer_model->getStok($data['PO1'][0]['dealer']);
		$data['anggaran']=$this->dealer_model->getAnggaran($data['PO1'][0]['nomor_ang']);
		$data['daerah']=$this->dealer_model->getDaerah($data['PO1'][0]['daerah']);
		//print_r($data['stok_warna']);
		$this->load->view("dealerPO_detail",$data);
	}
	
	public function dealer_invoice_detail(){
		$id_PO=$_GET['id_PO'];
		$status_dealer=$_GET['status_dealer'];
		//$dealer=$_GET['dealer'];
		//$warna=$_GET['warna'];
		//echo $status_dealer;
		$this->load->model("dealer_model");
		$data['PO2']=$this->dealer_model->getPOId($id_PO);
		$data['pesanan']=$this->dealer_model->getPesanan($data['PO2'][0]['id_PO']);
		/*for ($i=0;$i<count($data['pesanan']);$i++){
			
			$data['stok_warna']=$this->dealer_model->getIdStok($data['pesanan'][$i]['id_stok_warna']);
			$hasil=$data['stok_warna'][$i]['stok']-$data['pesanan'][$i]['jumlah_pesan'];
			$data1=array(
						"stok"=>$hasil				
			);
			
			$this->db->where('id_stok_warna',$data['pesanan'][$i]['id_stok_warna']);
			$this->db->update('warna_stok',$data1);
		}*/
		
		$data['stok']=$this->dealer_model->getStokInvoice($data['pesanan'][0]['id_stok_warna']);
		$data['katalog_pesan']=$this->dealer_model->getKatalogPesan($data['stok'][0]['id_katalog']);
		$data['tipe_pesan']=$this->dealer_model->getTipePesan($data['katalog_pesan'][0]['id_tipe']);
		$data['warna']=$this->dealer_model->getWarnaDariPO($data['PO2'][0]['id_PO']);
		
		$data['dealer']=$this->dealer_model->getDealerName($data['PO2'][0]['dealer']);
		$data['anggaran1']=$this->dealer_model->getAnggaran($data['PO2'][0]['nomor_ang']);
		$data['daerah1']=$this->dealer_model->getDaerah($data['PO2'][0]['daerah']);
		$data['status_dealer']=$status_dealer;
		//print_r($data['warna']);
		//echo $id_PO;
		//echo $status_dealer;
		
		
	//print_r($data['anggaran1']);
	$data1=array(
					"status_invoice"=>"Menunggu Admin"
		);
	$this->db->where('id_PO',$id_PO);
	$this->db->update('purchase_order',$data1);
	$this->load->view("dealer_invoice_detail",$data);
	}
	public function dealer_invoice(){
		$this->load->model("dealer_model");
		$data['purchaseOrder'] = $this->dealer_model->getPOInvoice($this->session->userdata('username'));
		$purchaseOrder=$data['purchaseOrder'];
		//$data['pesanan']=$this->dealer_model->getPesananInvoice($data['purchaseOrder'][0]['id_PO']);
		//$data['stok']=$this->dealer_model->getStokInvoice($data['pesanan'][0]['id_stok_warna']);
		//$data['katalog']=$this->dealer_model->getKatalogInvoice($data['stok'][0]['id_katalog']);
		//$data['tipe']=$this->ulp_model->getTipeInvoice($data['katalog'][0]['id_tipe']);
		$i=0;
		while($i<count($purchaseOrder)){
		$data['tipe']=$this->dealer_model->getTipeDariPOIn($data['purchaseOrder'][$i]['id_PO']);
		$i++;
		}
		//print_r($data['purchaseOrder']);
		$this->load->view("dealer_invoice",$data);
	}
	public function dealer_invoice_detail1(){
		$id_PO=$_GET['id_PO'];
		//echo $id_PO;
		$this->load->model("dealer_model");
		$data['purchaseOrder'] = $this->dealer_model->getIdPOInvoice($id_PO);
		$data['pesanan']=$this->dealer_model->getPesananInvoice($data['purchaseOrder'][0]['id_PO']);
		$data['stok']=$this->dealer_model->getStokInvoice($data['pesanan'][0]['id_stok_warna']);
		$data['katalog']=$this->dealer_model->getKatalogInvoice($data['stok'][0]['id_katalog']);
		$data['tipe']=$this->dealer_model->getTipeInvoice($data['katalog'][0]['id_tipe']);
		$data['anggaran']=$this->dealer_model->getAnggPOInvoice($data['purchaseOrder'][0]['nomor_ang']);
		$data['daerah']=$this->dealer_model->getDaerahInvoice($data['purchaseOrder'][0]['daerah']);
		$data['dealer']=$this->dealer_model->getDealerInvoice($data['purchaseOrder'][0]['dealer']);
		$data['warna']=$this->dealer_model->getWarnaDariPO($data['purchaseOrder'][0]['id_PO']);
		//print_r($data['warna']);
		$this->load->view("dealer_invoice_detail1",$data);
		
	}
	public function dealer_surat(){
		$id_PO=$_GET['id_PO'];
		//echo $id_PO;
		$this->load->model("dealer_model");
		$data['purchaseOrder']=$this->dealer_model->getIdPOInvoice($id_PO);
		$data['dealer']=$this->dealer_model->getDealerName($data['purchaseOrder'][0]['dealer']);
		$data['pesanan']=$this->dealer_model->getPesanan($data['purchaseOrder'][0]['id_PO']);
		$data['stok1']=$this->dealer_model->getIdStok($data['pesanan'][0]['id_stok_warna']);
		$data['katalog']=$this->dealer_model->getKatalogPesan($data['stok1'][0]['id_katalog']);
		$data['tipe']=$this->dealer_model->getTipePesan($data['katalog'][0]['id_tipe']);
		$data['warna']=$this->dealer_model->getWarnaDariPO($data['purchaseOrder'][0]['id_PO']);
		$data['anggaran']=$this->dealer_model->getAnggPOInvoice($data['purchaseOrder'][0]['nomor_ang']);
		$data['daerah']=$this->dealer_model->getDaerahInvoice($data['purchaseOrder'][0]['daerah']);
		$data['stok']=$this->dealer_model->getStok($data['purchaseOrder'][0]['dealer']);
		$data['ulp']=$this->dealer_model->getNamaUlp($data['purchaseOrder'][0]['username']);
		//print_r($data['ulp']);
		$data1=array(
					"status_dealer"=>"Dalam proses",
					"status_invoice"=>"belum ada"
		);
	$this->db->where('id_PO',$id_PO);
	$this->db->update('purchase_order',$data1);
	
		$this->load->view("dealer_surat",$data);
	}
	public function dealer_lihat_surat(){
		$id_PO=$_GET['id_PO'];
		//echo $id_PO;
		$this->load->model("dealer_model");
		$data['purchaseOrder']=$this->dealer_model->getIdPOInvoice($id_PO);
		$data['dealer']=$this->dealer_model->getDealerName($data['purchaseOrder'][0]['dealer']);
		$data['pesanan']=$this->dealer_model->getPesanan($data['purchaseOrder'][0]['id_PO']);
		$data['stok1']=$this->dealer_model->getIdStok($data['pesanan'][0]['id_stok_warna']);
		$data['katalog']=$this->dealer_model->getKatalogPesan($data['stok1'][0]['id_katalog']);
		$data['tipe']=$this->dealer_model->getTipePesan($data['katalog'][0]['id_tipe']);
		$data['warna']=$this->dealer_model->getWarnaDariPO($data['purchaseOrder'][0]['id_PO']);
		$data['anggaran']=$this->dealer_model->getAnggPOInvoice($data['purchaseOrder'][0]['nomor_ang']);
		$data['daerah']=$this->dealer_model->getDaerahInvoice($data['purchaseOrder'][0]['daerah']);
		$data['stok']=$this->dealer_model->getStok($data['purchaseOrder'][0]['dealer']);
		$data['ulp']=$this->dealer_model->getNamaUlp($data['purchaseOrder'][0]['username']);
		//print_r($data['katalog']);
		$this->load->view("dealer_lihat_surat",$data);
	}
	
	public function dealerPR(){
		$this->load->model("dealer_model");
		$username = $this->session->userdata('username');
		$data['tawaran']=$this->dealer_model->getTawaran($username);
		 for($i=0;$i<count($data['tawaran']);$i++){
		$data['PO'] = $this->dealer_model->getPORequest($data['tawaran'][$i]['id_po']);
		}
		//print_r($data['tawaran']);
		//die; 
		$iii=0;
		while($iii<count($data['PO'])){
		$data['pesanan'] = $this->dealer_model->getPesananPR($data['PO'][0]['id_PO']);
		$data['warna_stok'] = $this->dealer_model->getWarnaKatalog($data['pesanan'][0]['id_warna']);
		$iii++;
		}
		$i=0;
		while($i<count($data['PO'])){
		$data['tipe']=$this->dealer_model->getJenisKatalog($data['PO'][$i]['id_PO']);
		$data['katalog']=$this->dealer_model->getJenisKatalog($data['PO'][$i]['id_PO']);
		$i++;
		}
		$ii=0;
		while($ii<count($data['PO'])){
		$data['penawaran'] = $this->dealer_model->getPenawaran($data['PO'][0]['id_PO']);
		$ii++;
		}
		/*$id_tipe = $data['tawaran'][0]['ID_tipe'];
		$data['katalog1']= $this->dealer_model->getKatalogPesan($id_tipe);
		$data['tipe'] = $this->dealer_model->getTipePesan($id_tipe);*/
		
		$this->load->view("dealerPR", $data);
	}
	
	public function dealer_ajuan(){
		$id_tipe = $_GET['id_tipe'];
		$id_PO = $_GET['id'];
		$username = $this->session->userdata('username');
		$this->load->model("dealer_model");
		$data['purchaseOrder']=$this->dealer_model->getIdPOInvoice($id_PO);
		$data['dealer']=$this->dealer_model->getDealerName($data['purchaseOrder'][0]['dealer']);
		$data['pesanan']=$this->dealer_model->getPesananPR($data['purchaseOrder'][0]['id_PO']);
		$data['warna_stok']=$this->dealer_model->getWarnaKatalog($data['pesanan'][0]['id_warna']);
		//$data['katalog']=$this->dealer_model->getKatalogPesanDesi($data['warna_stok'][0]['id_katalog']);
		$data['tipe']=$this->dealer_model->getTipePesan($id_tipe);
		//$data['ambilwarna']=$this->dealer_model->getWarnaPesanan($data['pesanan'][0]['id_PO']);
		//$data['warna'] = $this->dealer_model->getWarnaPR($data['ambilwarna'][0]['id_warna']);
		$i=0;
		while($i<count($data['purchaseOrder'])){
			$data['ambilwarna']=$this->dealer_model->getWarnaAsli($data['pesanan'][0]['id_PO']);
		$i++;
		}
		//print_r($data['ambilwarna']);
		//die;
		$data['anggaran']=$this->dealer_model->getAnggPOInvoice($data['purchaseOrder'][0]['nomor_ang']);
		$data['daerah']=$this->dealer_model->getDaerahInvoice($data['purchaseOrder'][0]['daerah']);
		$data['stok']=$this->dealer_model->getStok($data['purchaseOrder'][0]['dealer']);
		$data['ulp']=$this->dealer_model->getNamaUlp($data['purchaseOrder'][0]['username']);
		$data['penawaran']=$this->dealer_model->getTawaranDealer($data['purchaseOrder'][0]['id_PO'], $username);
		$this->load->view("dealer_ajuan", $data);
		/*$this->load->model("dealer_model");
		$id_tipe=$_GET['id_tipe'];
		$id_PO=$_GET['id'];
		//echo $id_PO;
		$this->load->model("dealer_model");
		$data['purchaseOrder']=$this->dealer_model->getIdPOInvoice($id_PO);
		$data['dealer']=$this->dealer_model->getDealerName($data['purchaseOrder'][0]['dealer']);
		$data['pesanan']=$this->dealer_model->getPesananPR($data['purchaseOrder'][0]['id_PO']);
		$data['warna_stok']=$this->dealer_model->getWarnaKatalog($data['pesanan'][0]['id_warna']);
		$data['katalog']=$this->dealer_model->getKatalogPesan($data['warna_stok'][0]['id_katalog']);
		$data['tipe']=$this->dealer_model->getTipePesan($id_tipe);
		$data['warna']=$this->dealer_model->getWarnaPR($data['pesanan'][0]['id_warna']);
		$data['anggaran']=$this->dealer_model->getAnggPOInvoice($data['purchaseOrder'][0]['nomor_ang']);
		$data['daerah']=$this->dealer_model->getDaerahInvoice($data['purchaseOrder'][0]['daerah']);
		$data['stok']=$this->dealer_model->getStok($data['purchaseOrder'][0]['dealer']);
		$data['ulp']=$this->dealer_model->getNamaUlp($data['purchaseOrder'][0]['username']);
		$this->load->view("dealer_ajuan", $data);*/
	}
	
	public function ajuanPenawaran(){
		$username = $this->session->userdata('username');
		$id_po = $_POST['id_po'];
		$data = array (
						'id_po' => $id_po,
						'username_dealer' => $username,
						'harga_penawaran' => $_POST['ontr'],
						'pesan' => $_POST['pesan'],
						'dealer_ajuan' => 'Telah Mengajukan',
						'tgl_penawaran' => $_POST['tgl_penawaran']);
		$this->db->where('id_po', $id_po);
		$this->db->where('username_dealer', $username);
		$this->db->update("penawaran", $data);
		//$this->db->insert("penawaran", $data);
		//proses penambahan jumlah penawaran purchase order
		$this->db->where('id_PO',$id_po);
		$data2 = array(
						'jumlah_penawaran' => $_POST['jumlah_penawaran']);
		$this->db->update("purchase_order", $data2);
		redirect(base_url()."index.php/dealer/dealerPR");
	}
	
	public function detail_ajuan(){
		$id_tipe = $_GET['id_tipe'];
		$id_PO = $_GET['id'];
		$username = $this->session->userdata('username');
		$this->load->model("dealer_model");
		$data['purchaseOrder']=$this->dealer_model->getIdPOInvoice($id_PO);
		$data['dealer']=$this->dealer_model->getDealerName($data['purchaseOrder'][0]['dealer']);
		$data['pesanan']=$this->dealer_model->getPesananPR($data['purchaseOrder'][0]['id_PO']);
		$data['warna_stok']=$this->dealer_model->getWarnaKatalog($data['pesanan'][0]['id_warna']);
		$data['katalog']=$this->dealer_model->getKatalogPesanDesi($data['warna_stok'][0]['id_katalog']);
		$data['tipe']=$this->dealer_model->getTipePesan($id_tipe);
		//$data['ambilwarna']=$this->dealer_model->getWarnaPesanan($data['pesanan'][0]['id_PO']);
		//$data['warna'] = $this->dealer_model->getWarnaPR($data['ambilwarna'][0]['id_warna']);
		$i=0;
		while($i<count($data['purchaseOrder'])){
			$data['ambilwarna']=$this->dealer_model->getWarnaAsli($data['pesanan'][0]['id_PO']);
		$i++;
		}
		//print_r($data['ambilwarna']);
		//die;
		$data['anggaran']=$this->dealer_model->getAnggPOInvoice($data['purchaseOrder'][0]['nomor_ang']);
		$data['daerah']=$this->dealer_model->getDaerahInvoice($data['purchaseOrder'][0]['daerah']);
		$data['stok']=$this->dealer_model->getStok($data['purchaseOrder'][0]['dealer']);
		$data['ulp']=$this->dealer_model->getNamaUlp($data['purchaseOrder'][0]['username']);
		$data['penawaran']=$this->dealer_model->getTawaranDealer($data['purchaseOrder'][0]['id_PO'], $username);
		$this->load->view("dealer_detail_ajuan", $data);
	}
	
}
?>