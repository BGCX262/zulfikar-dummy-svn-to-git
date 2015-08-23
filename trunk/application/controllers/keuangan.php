<?php
class keuangan extends CI_Controller{
	public function invoice_keuangan(){
		$this->load->model("keuangan_model");
		$data['purchaseOrder'] = $this->keuangan_model->getPOInvoice();
		$purchaseOrder=$data['purchaseOrder'];
		
		$i=0;
		while($i<count($purchaseOrder)){
		$data['tipe']=$this->keuangan_model->getTipeDariPOIn($data['purchaseOrder'][$i]['id_PO']);
		$i++;
		}
		//print_r($data['tipe']);
		
		$this->load->view("invoice_keuangan",$data);
	}
	public function invoice_keuangan_detail(){
		$id_PO=$_GET['id_PO'];
		//$status_invoice=$_GET['status_invoice'];
		
		$this->load->model("keuangan_model");
		$data['PO2']=$this->keuangan_model->getPOId($id_PO);
		$data['pesanan']=$this->keuangan_model->getPesanan($data['PO2'][0]['id_PO']);
		
		$data['stok']=$this->keuangan_model->getStokInvoice($data['pesanan'][0]['id_stok_warna']);
		$data['katalog_pesan']=$this->keuangan_model->getKatalogPesan($data['stok'][0]['id_katalog']);
		$data['tipe_pesan']=$this->keuangan_model->getTipePesan($data['katalog_pesan'][0]['id_tipe']);
		$data['warna']=$this->keuangan_model->getWarnaDariPO($data['PO2'][0]['id_PO']);
		
		$data['dealer']=$this->keuangan_model->getDealerName($data['PO2'][0]['dealer']);
		$data['anggaran1']=$this->keuangan_model->getAnggaran($data['PO2'][0]['nomor_ang']);
		$data['daerah1']=$this->keuangan_model->getDaerah($data['PO2'][0]['daerah']);
		//$data['status_invoice']=$status_invoice;
		//print_r($data['warna']);
		//echo $id_PO;
		//echo $status_dealer;
		$this->load->view("invoice_keuangan_detail",$data);
	}
}