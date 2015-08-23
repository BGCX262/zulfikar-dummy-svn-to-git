<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function persetujuan() {
		$this->load->model('kualifikasi');
		$data=$this->kualifikasi->getAllKualifikasi($this->session->userdata('username'));
		print_r($data);
		//$this->home->view("persetujuankualifikasi", $data);
	}

	public function pilih() {
		if(isset($_GET['user'])) {
			$user=$_GET['user'];

			if(strcmp($user, "dealer")==0) {
				//dealer yang mau ubah dlookumennya
				$data['apakahada']=true;
				$this->load->model("dealer");
				$query=$this->dealer->getUsernameWithStatus(3);
				$data['query']=$query;
			} else if(strcmp($user,"calondealer")==0) {
				//calondealer yang baru mau submit dokumennya
				$this->load->model("dealer");
				$data['apakahada']=true;
				$query=$this->dealer->getUsernameWithStatus(1);
				$data['query']=$query;
			} else {
				redirect(base_url()."index.php/common/home");
			}
		}else{
			redirect(base_url()."index.php/common/home");
		}

		$this->load->view('pilihkualifikasi', $data);
	}

	public function tampilkan() {
		if(isset($_GET['user'])) {
			$this->load->model("dealer");
			$bool=$this->dealer->isUsernameWaitingForApproval($_GET['user']);
			if($bool) {
				$this->load->model('dealer');
				$dokumen=$this->dealer->getAllDocument($_GET['user']);
				$this->load->view("persetujuankualifikasi",$dokumen);
			}
			else {
				$this->session->set_userdata("system_message", "User yang Anda pilih tidak terdaftar atau tidak menunggu persetujuan kualifikasi");
				redirect(base_url()."index.php/common/home");
			}
		}else {
			redirect(base_url()."index.php/common/home");
		}
	}

	public function submitevaluasi(){
		$update=array();
		if(isset($_POST['nama']))
		$update['nama']=$_POST['nama'];
		if(isset($_POST['website']))
		$update['website']=$_POST['website'];
		if(isset($_POST['merekmobil']))
		$update['merekmobil']=$_POST['merekmobil'];
		if(isset($_POST['bank']))
		$update['bank']=$_POST['bank'];
		if(isset($_POST['acc_number']))
		$update['acc_number']=$_POST['acc_number'];

		if(isset($_POST['time_formed']))
		$update['acc_number']=$_POST['time_formed'];

		if(isset($_POST['acc_name']))
		$update['acc_name']=$_POST['acc_name'];
		if(isset($_POST['of_addres']))
		$update['of_addres']=$_POST['of_addres'];
		if(isset($_POST['of_poskode']))
		$update['of_poskode']=$_POST['of_poskode'];
		if(isset($_POST['of_city']))
		$update['of_city']=$_POST['of_city'];
		if(isset($_POST['of_prov']))
		$update['of_prov']=$_POST['of_prov'];

		if(isset($_POST['of_phone']))
		$update['of_phone']=$_POST['of_phone'];
		if(isset($_POST['of_phone2']))
		$update['of_phone2']=$_POST['of_phone2'];
		if(isset($_POST['of_fax']))
		$update['of_fax']=$_POST['of_fax'];
		if(isset($_POST['of_fax2']))
		$update['of_fax2']=$_POST['of_fax2'];
		if(isset($_POST['of2_addres']))
		$update['of2_addres']=$_POST['of2_addres'];

		if(isset($_POST['of2_poskode']))
		$update['of2_poskode']=$_POST['of2_poskode'];
		if(isset($_POST['of2_city']))
		$update['of2_city']=$_POST['of2_city'];
		if(isset($_POST['of2_prov']))
		$update['of2_prov']=$_POST['of2_prov'];
		if(isset($_POST['of2_phone']))
		$update['of2_phone']=$_POST['of2_phone'];
		if(isset($_POST['of2_phone2']))
		$update['of2_phone2']=$_POST['of2_phone2'];

		if(isset($_POST['of2_fax']))
		$update['of2_fax']=$_POST['of2_fax'];
		if(isset($_POST['of2_fax2']))
		$update['of2_fax2']=$_POST['of2_fax2'];
		if(isset($_POST['dir_nama']))
		$update['dir_nama']=$_POST['dir_nama'];
		if(isset($_POST['dir_noktp']))
		$update['dir_noktp']=$_POST['dir_noktp'];
		if(isset($_POST['dir_hp']))
		$update['dir_hp']=$_POST['dir_hp'];

		if(isset($_POST['dir_email']))
		$update['dir_email']=$_POST['dir_email'];
		if(isset($_POST['dir_ktpdoc_tersedia']))
		$update['dir_ktpdoc_tersedia']=$_POST['dir_ktpdoc_tersedia'];
		if(isset($_POST['dir_ktpdoc_kop']))
		$update['dir_ktpdoc_kop']=$_POST['dir_ktpdoc_kop'];
		if(isset($_POST['dir_ktpdoc_cap']))
		$update['dir_ktpdoc_cap']=$_POST['dir_ktpdoc_cap'];
		if(isset($_POST['dir_ktpdoc_ttd']))
		$update['dir_ktpdoc_ttd']=$_POST['dir_ktpdoc_ttd'];

		if(isset($_POST['cp_nama']))
		$update['cp_nama']=$_POST['cp_nama'];
		if(isset($_POST['cp_noktp']))
		$update['cp_noktp']=$_POST['cp_noktp'];
		if(isset($_POST['cp_hp']))
		$update['cp_hp']=$_POST['cp_hp'];

		if(isset($_POST['cp_email']))
		$update['cp_email']=$_POST['cp_email'];
		if(isset($_POST['cp_ktpdoc_tersedia']))
		$update['cp_ktpdoc_tersedia']=$_POST['cp_ktpdoc_tersedia'];
		if(isset($_POST['cp_ktpdoc_kop']))
		$update['cp_ktpdoc_kop']=$_POST['cp_ktpdoc_kop'];
		if(isset($_POST['cp_ktpdoc_cap']))
		$update['cp_ktpdoc_cap']=$_POST['cp_ktpdoc_cap'];
		if(isset($_POST['cp_ktpdoc_ttd']))
		$update['cp_ktpdoc_ttd']=$_POST['cp_ktpdoc_ttd'];

		if(isset($_POST['cp_email']))
		$update['cp_email']=$_POST['cp_email'];
		if(isset($_POST['cp_ktpdoc_tersedia']))
		$update['cp_ktpdoc_tersedia']=$_POST['cp_ktpdoc_tersedia'];
		if(isset($_POST['cp_ktpdoc_kop']))
		$update['cp_ktpdoc_kop']=$_POST['cp_ktpdoc_kop'];
		if(isset($_POST['cp_ktpdoc_cap']))
		$update['cp_ktpdoc_cap']=$_POST['cp_ktpdoc_cap'];
		if(isset($_POST['cp_ktpdoc_ttd']))
		$update['cp_ktpdoc_ttd']=$_POST['cp_ktpdoc_ttd'];

		if(isset($_POST['dir_nama']))
		$update['dir_nama']=$_POST['dir_nama'];
		if(isset($_POST['dir_noktp']))
		$update['dir_noktp']=$_POST['dir_noktp'];
		if(isset($_POST['dir_hp']))
		$update['dir_hp']=$_POST['dir_hp'];

		if(isset($_POST['auth_atpm']))
		$update['auth_atpm']=$_POST['auth_atpm'];
		if(isset($_POST['auth_doc_tersedia']))
		$update['auth_doc_tersedia']=$_POST['auth_doc_tersedia'];
		if(isset($_POST['auth_doc_kop']))
		$update['auth_doc_kop']=$_POST['auth_doc_kop'];
		if(isset($_POST['auth_doc_cap']))
		$update['auth_doc_cap']=$_POST['auth_doc_cap'];
		if(isset($_POST['auth_doc_ttd']))
		$update['auth_doc_ttd']=$_POST['auth_doc_ttd'];

		if(isset($_POST['ap_notaris']))
		$update['ap_notaris']=$_POST['ap_notaris'];
		if(isset($_POST['ap_number']))
		$update['ap_number']=$_POST['ap_number'];
		if(isset($_POST['ap_date']))
		$update['ap_date']=$_POST['ap_date'];
		if(isset($_POST['ap_doc']))
		$update['ap_doc']=$_POST['ap_doc'];
		if(isset($_POST['ap_menhukam_no']))
		$update['ap_menhukam_no']=$_POST['ap_menhukam_no'];

		if(isset($_POST['ap_menhukam_date']))
		$update['ap_menhukam_date']=$_POST['ap_menhukam_date'];
		if(isset($_POST['ap_menhukam_doc_tersedia']))
		$update['ap_menhukam_doc_tersedia']=$_POST['ap_menhukam_doc_tersedia'];
		if(isset($_POST['ap_menhukam_doc_kop']))
		$update['ap_menhukam_doc_kop']=$_POST['ap_menhukam_doc_kop'];
		if(isset($_POST['ap_menhukam_doc_cap']))
		$update['ap_menhukam_doc_cap']=$_POST['ap_menhukam_doc_cap'];
		if(isset($_POST['ap_menhukam_doc_ttd']))
		$update['ap_menhukam_doc_ttd']=$_POST['ap_menhukam_doc_ttd'];
			
		if(isset($_POST['an_notaris']))
		$update['an_notaris']=$_POST['an_notaris'];
		if(isset($_POST['an_nomor']))
		$update['an_nomor']=$_POST['an_nomor'];
		if(isset($_POST['an_date']))
		$update['an_date']=$_POST['an_date'];
		if(isset($_POST['an_doc']))
		$update['an_doc']=$_POST['an_doc'];
		if(isset($_POST['an_menhukam_no']))
		$update['an_menhukam_no']=$_POST['an_menhukam_no'];

		if(isset($_POST['an_menhukam_date']))
		$update['an_menhukam_date']=$_POST['an_menhukam_date'];
		if(isset($_POST['an_menhukam_doc_tersedia']))
		$update['an_menhukam_doc_tersedia']=$_POST['an_menhukam_doc_tersedia'];
		if(isset($_POST['an_menhukam_doc_kop']))
		$update['an_menhukam_doc_kop']=$_POST['an_menhukam_doc_kop'];
		if(isset($_POST['an_menhukam_doc_cap']))
		$update['an_menhukam_doc_cap']=$_POST['an_menhukam_doc_cap'];
		if(isset($_POST['an_menhukam_doc_ttd']))
		$update['an_menhukam_doc_ttd']=$_POST['an_menhukam_doc_ttd'];
			
		if(isset($_POST['siup_nomor']))
		$update['siup_nomor']=$_POST['siup_nomor'];
		if(isset($_POST['siup_date']))
		$update['siup_date']=$_POST['siup_date'];
		if(isset($_POST['siup_doc_tersedia']))
		$update['siup_doc_tersedia']=$_POST['siup_doc_tersedia'];
		if(isset($_POST['siup_doc_kop']))
		$update['siup_doc_kop']=$_POST['siup_doc_kop'];
		if(isset($_POST['siup_doc_cap']))
		$update['siup_doc_cap']=$_POST['siup_doc_cap'];
		if(isset($_POST['siup_doc_ttd']))
		$update['siup_doc_ttd']=$_POST['siup_doc_ttd'];

		if(isset($_POST['tdp_nomor']))
		$update['tdp_nomor']=$_POST['tdp_nomor'];
		if(isset($_POST['tdp_date']))
		$update['tdp_date']=$_POST['tdp_date'];
		if(isset($_POST['tdp_doc_tersedia']))
		$update['tdp_doc_tersedia']=$_POST['tdp_doc_tersedia'];
		if(isset($_POST['tdp_doc_kop']))
		$update['tdp_doc_kop']=$_POST['tdp_doc_kop'];
		if(isset($_POST['tdp_doc_cap']))
		$update['tdp_doc_cap']=$_POST['tdp_doc_cap'];
		if(isset($_POST['tdp_doc_ttd']))
		$update['tdp_doc_ttd']=$_POST['tdp_doc_ttd'];

		if(isset($_POST['situ_nomor']))
		$update['situ_nomor']=$_POST['situ_nomor'];
		if(isset($_POST['situ_date']))
		$update['situ_date']=$_POST['situ_date'];
		if(isset($_POST['situ_doc_tersedia']))
		$update['situ_doc_tersedia']=$_POST['situ_doc_tersedia'];
		if(isset($_POST['situ_doc_kop']))
		$update['situ_doc_kop']=$_POST['situ_doc_kop'];
		if(isset($_POST['situ_doc_cap']))
		$update['situ_doc_cap']=$_POST['situ_doc_cap'];
		if(isset($_POST['situ_doc_ttd']))
		$update['situ_doc_ttd']=$_POST['situ_doc_ttd'];

		if(isset($_POST['npwp_nomor']))
		$update['npwp_nomor']=$_POST['npwp_nomor'];
		if(isset($_POST['npwp_date']))
		$update['npwp_date']=$_POST['npwp_date'];
		if(isset($_POST['npwp_doc_tersedia']))
		$update['npwp_doc_tersedia']=$_POST['npwp_doc_tersedia'];
		if(isset($_POST['npwp_doc_kop']))
		$update['npwp_doc_kop']=$_POST['npwp_doc_kop'];
		if(isset($_POST['npwp_doc_cap']))
		$update['npwp_doc_cap']=$_POST['npwp_doc_cap'];
		if(isset($_POST['npwp_doc_ttd']))
		$update['npwp_doc_ttd']=$_POST['npwp_doc_ttd'];
			
		if(isset($_POST['pkp_nomor']))
		$update['pkp_nomor']=$_POST['pkp_nomor'];
		if(isset($_POST['pkp_date']))
		$update['pkp_date']=$_POST['pkp_date'];
		if(isset($_POST['pkp_doc_tersedia']))
		$update['pkp_doc_tersedia']=$_POST['pkp_doc_tersedia'];
		if(isset($_POST['pkp_doc_kop']))
		$update['pkp_doc_kop']=$_POST['pkp_doc_kop'];
		if(isset($_POST['pkp_doc_cap']))
		$update['pkp_doc_cap']=$_POST['pkp_doc_cap'];
		if(isset($_POST['pkp_doc_ttd']))
		$update['pkp_doc_ttd']=$_POST['pkp_doc_ttd'];

		if(isset($_POST['spt_date']))
		$update['spt_date']=$_POST['spt_date'];
		if(isset($_POST['spt_datesetoran']))
		$update['spt_datesetoran']=$_POST['spt_datesetoran'];
		if(isset($_POST['spt_nosetoran']))
		$update['spt_nosetoran']=$_POST['spt_nosetoran'];
		if(isset($_POST['spt_doc_tersedia']))
		$update['spt_doc_tersedia']=$_POST['spt_doc_tersedia'];
		if(isset($_POST['spt_doc_kop']))
		$update['spt_doc_kop']=$_POST['spt_doc_kop'];
		if(isset($_POST['spt_doc_cap']))
		$update['spt_doc_cap']=$_POST['spt_doc_cap'];
		if(isset($_POST['spt_doc_ttd']))
		$update['spt_doc_ttd']=$_POST['spt_doc_ttd'];

		if(isset($_POST['tax_monthlydoc_tersedia']))
		$update['tax_monthlydoc_tersedia']=$_POST['tax_monthlydoc_tersedia'];
		if(isset($_POST['tax_monthlydoc_kop']))
		$update['tax_monthlydoc_kop']=$_POST['tax_monthlydoc_kop'];
		if(isset($_POST['tax_monthlydoc_cap']))
		$update['tax_monthlydoc_cap']=$_POST['tax_monthlydoc_cap'];
		if(isset($_POST['tax_monthlydoc_ttd']))
		$update['tax_monthlydoc_ttd']=$_POST['tax_monthlydoc_ttd'];

		if(isset($_POST['exp_nama1']))
		$update['exp_nama1']=$_POST['exp_nama1'];
		if(isset($_POST['exp_own1']))
		$update['exp_own1']=$_POST['exp_own1'];
		if(isset($_POST['exp_value1']))
		$update['exp_value1']=$_POST['exp_value1'];
		if(isset($_POST['exp_date1']))
		$update['exp_date1']=$_POST['exp_date1'];
			
		if(isset($_POST['exp_doc1_tersedia']))
		$update['exp_doc1_tersedia']=$_POST['exp_doc1_tersedia'];
		if(isset($_POST['exp_doc1_kop']))
		$update['exp_doc1_kop']=$_POST['exp_doc1_kop'];
		if(isset($_POST['exp_doc1_cap']))
		$update['exp_doc1_cap']=$_POST['exp_doc1_cap'];
		if(isset($_POST['exp_doc1_ttd']))
		$update['exp_doc1_ttd']=$_POST['exp_doc1_ttd'];

		if(isset($_POST['exp_nama2']))
		$update['exp_nama2']=$_POST['exp_nama2'];
		if(isset($_POST['exp_own2']))
		$update['exp_own2']=$_POST['exp_own2'];
		if(isset($_POST['exp_value2']))
		$update['exp_value2']=$_POST['exp_value2'];
		if(isset($_POST['exp_date2']))
		$update['exp_date2']=$_POST['exp_date2'];
			
		if(isset($_POST['exp_doc2_tersedia']))
		$update['exp_doc2_tersedia']=$_POST['exp_doc2_tersedia'];
		if(isset($_POST['exp_doc2_kop']))
		$update['exp_doc2_kop']=$_POST['exp_doc2_kop'];
		if(isset($_POST['exp_doc2_cap']))
		$update['exp_doc2_cap']=$_POST['exp_doc2_cap'];
		if(isset($_POST['exp_doc2_ttd']))
		$update['exp_doc2_ttd']=$_POST['exp_doc2_ttd'];

		if(isset($_POST['exp_nama3']))
		$update['exp_nama3']=$_POST['exp_nama3'];
		if(isset($_POST['exp_own3']))
		$update['exp_own3']=$_POST['exp_own3'];
		if(isset($_POST['exp_value3']))
		$update['exp_value3']=$_POST['exp_value3'];
		if(isset($_POST['exp_date3']))
		$update['exp_date3']=$_POST['exp_date3'];
			
		if(isset($_POST['exp_doc3_tersedia']))
		$update['exp_doc3_tersedia']=$_POST['exp_doc3_tersedia'];
		if(isset($_POST['exp_doc3_kop']))
		$update['exp_doc3_kop']=$_POST['exp_doc3_kop'];
		if(isset($_POST['exp_doc3_cap']))
		$update['exp_doc3_cap']=$_POST['exp_doc3_cap'];
		if(isset($_POST['exp_doc3_ttd']))
		$update['exp_doc3_ttd']=$_POST['exp_doc3_ttd'];

			
		if(isset($_POST['exp_nama4']))
		$update['exp_nama4']=$_POST['exp_nama4'];
		if(isset($_POST['exp_own4']))
		$update['exp_own4']=$_POST['exp_own4'];
		if(isset($_POST['exp_value4']))
		$update['exp_value4']=$_POST['exp_value4'];
		if(isset($_POST['exp_date4']))
		$update['exp_date4']=$_POST['exp_date4'];
			
		if(isset($_POST['exp_doc4_tersedia']))
		$update['exp_doc4_tersedia']=$_POST['exp_doc4_tersedia'];
		if(isset($_POST['exp_doc4_kop']))
		$update['exp_doc4_kop']=$_POST['exp_doc4_kop'];
		if(isset($_POST['exp_doc4_cap']))
		$update['exp_doc4_cap']=$_POST['exp_doc4_cap'];
		if(isset($_POST['exp_doc4_ttd']))
		$update['exp_doc4_ttd']=$_POST['exp_doc4_ttd'];

			
			
		if(isset($_POST['exp_nama5']))
		$update['exp_nama5']=$_POST['exp_nama5'];
		if(isset($_POST['exp_own5']))
		$update['exp_own5']=$_POST['exp_own5'];
		if(isset($_POST['exp_value5']))
		$update['exp_value5']=$_POST['exp_value5'];
		if(isset($_POST['exp_date5']))
		$update['exp_date5']=$_POST['exp_date5'];
			
		if(isset($_POST['exp_doc5_tersedia']))
		$update['exp_doc5_tersedia']=$_POST['exp_doc5_tersedia'];
		if(isset($_POST['exp_doc5_kop']))
		$update['exp_doc5_kop']=$_POST['exp_doc5_kop'];
		if(isset($_POST['exp_doc5_cap']))
		$update['exp_doc5_cap']=$_POST['exp_doc5_cap'];
		if(isset($_POST['exp_doc5_ttd']))
		$update['exp_doc5_ttd']=$_POST['exp_doc5_ttd'];
			
		if(isset($_POST['bank_ref']))
		$update['bank_ref']=$_POST['bank_ref'];
		if(isset($_POST['surat1_tersedia']))
		$update['surat1_tersedia']=$_POST['surat1_tersedia'];
		if(isset($_POST['surat1_kop']))
		$update['surat1_kop']=$_POST['surat1_kop'];
		if(isset($_POST['surat1_cap']))
		$update['surat1_cap']=$_POST['surat1_cap'];
		if(isset($_POST['surat1_ttd']))
		$update['surat1_ttd']=$_POST['surat1_ttd'];

		if(isset($_POST['pailit_tersedia']))
		$update['pailit_tersedia']=$_POST['pailit_tersedia'];
		if(isset($_POST['pailit_kop']))
		$update['pailit_kop']=$_POST['pailit_kop'];
		if(isset($_POST['pailit_cap']))
		$update['pailit_cap']=$_POST['pailit_cap'];
		if(isset($_POST['pailit_ttd']))
		$update['pailit_ttd']=$_POST['pailit_ttd'];

		if(isset($_POST['surat2_tersedia']))
		$update['surat2_tersedia']=$_POST['surat2_tersedia'];
		if(isset($_POST['surat2_kop']))
		$update['surat2_kop']=$_POST['surat2_kop'];
		if(isset($_POST['surat2_cap']))
		$update['surat2_cap']=$_POST['surat2_cap'];
		if(isset($_POST['surat2_ttd']))
		$update['surat2_ttd']=$_POST['surat2_ttd'];

		if(isset($_POST['pakta_tersedia']))
		$update['pakta_tersedia']=$_POST['pakta_tersedia'];
		if(isset($_POST['pakta_kop']))
		$update['pakta_kop']=$_POST['pakta_kop'];
		if(isset($_POST['pakta_cap']))
		$update['pakta_cap']=$_POST['pakta_cap'];
		if(isset($_POST['pakta_ttd']))
		$update['pakta_ttd']=$_POST['pakta_ttd'];

		$update['komentar']=$_POST['komentar'];
			
		$this->load->model('kualifikasi');
		$this->kualifikasi->updateKualifikasi($update,$_GET['username']);
			
		//get current dealer status
		$this->load->model('dealer');
		$status=$this->dealer->getStatus($_GET['username']);
			
		$disetujui=$_POST['status'];
			
		if($disetujui==1){
			//diterima
			$this->dealer->updateStatus($_GET['username'], 2);
			$this->load->model("user");
			$this->user->setRole($_GET['username'], 3);
			
		}else if($disetujui==2){
			//revisi
			$this->dealer->updateStatus($_GET['username'], 5);
		}else if($disetujui==3){
			//ditolak
			if($status==1){
				//calon dealer
				$this->dealer->updateStatus($_GET['username'], 0);
			}else if($status==3){
				//dealer
				$this->dealer->updateStatus($_GET['username'], 2);
			}
		}
	}

	public function input_anggaran(){
		$this->load->model("admin_model");
		$data = array(
                "tahun" => $_POST['thn_ang'],
                "nomor_ang" => $_POST['no_ang'],
                "nilai_ang" => $_POST['nil_ang'],
                "daerah" => $_POST['daerah']
		);
		$this->admin_model->input_anggaran($data);
		$data['anggaran'] = $this->admin_model->getAnggaran();
		$data['daerah'] = $this->admin_model->getDaerah();
		$this->load->view("admin_anggaran", $data);
	}
        
        public function evaluasiDealer($user){
        	$this->load->model("admin_model");
        	$data['dealer'] = $this->admin_model->getAllDealer();
        	$data['lalai'] = $this->admin_model->getAllLalai();
        	if($user == "0"){
        		$data['eval'] = $this->admin_model->getEval($data['dealer'][0]['username']);	
        		if($data['eval'] == null){
        			$data['username'] = $data['dealer'][0]['username'];
        		}else{
        			$data['username'] = $data['eval'][0]['username'];
        		}
        	}else{
        		$data['eval'] = $this->admin_model->getEval($user);
        		if($data['eval'] == null){
        			$data['username'] = $user;
        		}else{
        			$data['username'] = $data['eval'][0]['username'];
        		}
        	}
        	$this->load->view("admin_evaluasi", $data);
        }
        
        public function inputLalai(){
        	$this->load->model("admin_model");
        	$this->admin_model->deleteEval($_GET["username"]);
        	for($i=1; $i<7; $i++){
        		if($_GET[$i] != null){
        			$data = array(
        				"id_lalai" => $_GET[$i],
        				"username" => $_GET["username"]
        			);
        			$this->admin_model->inputEval($data);	
        		}
        	}
        	redirect(base_url()."index.php/admin/evaluasiDealer/".$_GET["username"]);
        }
        
        public function kelolaUser(){
        	$this->load->model("admin_model");
        	$data['user'] = $this->admin_model->getAllUser();
        	$this->load->view("kelolaUser", $data);
        }
        
        public function daftarUser(){
        	$this->load->model("admin_model");
        	$data = array(
        		"username" => $_POST['username'],
        		"password" => $_POST['password'],
        		"email" => $_POST['email'],
        		"role" => $_POST['role']
        	);
        	$this->admin_model->daftarUser($data);
        	switch($data['role']){
        		case 4:
        			$this->admin_model->daftarUlp($data['username']);
        			break;
        		case 5:
        			$this->admin_model->daftarAtpm($data['username']);
        			break;
        	}
        	redirect(base_url()."index.php/admin/kelolaUser");
        }
        
        public function editUser($username){
        	$this->load->model("admin_model");
        	$data['user'] = $this->admin_model->getUser($username);
        	switch($data['user']['role']){
        		case 4:
        			$data['ulp'] = $this->admin_model->getUlp($username);
        			$data['atpm'] = null;
        			break;
        		case 5:
        			$data['atpm'] = $this->admin_model->getAtpm($username);
        			$data['ulp'] = null;
        			break;
        		default:
        			$data['ulp'] = null;
        			$data['atpm'] = null;
        			
        			break;
        	}
        	$this->load->view("editUser", $data);
        }
        
        public function deleteUser($username, $role){
        	$this->load->model("admin_model");
        	$this->admin_model->deleteUser($username);
        	switch($role){
        		case 4:
        			$this->admin_model->deleteUlp($username);
        			break;
        		case 5:
        			$this->admin_model->deleteAtpm($username);
        			break;
        	}
        	redirect(base_url()."index.php/admin/kelolaUser");
        }
        
        public function updateUser($role){
        	$this->load->model("admin_model");
        	$user = array(
        		"username" => $_POST['username'],
        		"password" => $_POST['password'],
        		"email" => $_POST['email']
        	);
        	$this->admin_model->updateUser($user, $_POST['user']);
        	switch($role){
        		case 4:
        			$ulp = array(
        			"ulp" => $_POST['username'],
        			"alamat" => $_POST['alamat'],
        			"id_daerah" => $_POST['id_daerah']
        			);
        			$this->admin_model->updateUlp($ulp, $_POST['user']);
        			break;
        		case 5:
        			$atpm = array(
        			"atpm" => $_POST['username'],
        			"merek" => $_POST['merek']
        			);
        			$this->admin_model->updateAtpm($atpm, $_POST['user']);
        			break;
        	}
        	redirect(base_url()."index.php/admin/kelolaUser");
        }
        
        public function suratPemenuhan(){
        	$this->load->model("admin_model");
        	$data['PO']=$this->admin_model->getPO();
        	$this->load->view("admin_surat",$data);
        }
        
        public function admin_lihat_surat(){
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
		//print_r($data['katalog']);
		$this->load->view("admin_lihat_surat",$data);
        }
        
        public function admin_lihat_PO(){
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
		$this->load->view("admin_lihat_PO",$data);
        }
        
        public function admin_invoice(){
        	$this->load->model("admin_model");
        	$data['invoice']=$this->admin_model->getInvoice();
        	$this->load->view("admin_invoice",$data);
        }
        
        public function admin_invoice_detail(){
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
		$this->load->view("admin_invoice_detail",$data);
		}
		
		public function updateInvoice(){
			$id_PO=$_GET['id_PO'];
			$status = 'Dikirim';
			$this->load->model("admin_model");
			$data['PO'] = $this->admin_model->getPO();
			$data = array('status_invoice' => $status);
			$this->db->where('id_PO',$id_PO);
			$this->db->update("purchase_order",$data);
			redirect(base_url()."index.php/admin/admin_invoice");
		}
    }
?>