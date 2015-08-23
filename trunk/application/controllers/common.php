<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
		$this->load->view('login');
	}

	public function viewprofil(){
		$this->load->model("dealer");
		$data=$this->dealer->getAllDocument($this->session->userdata('username'));
		if($data['status']==0){
			$data['text_status']="Anda belum submit dokumen kualifikasi";
		}else if($data['status']==1){
			$data['text_status']="Anda menunggu hasil kualifikasi";
		}else if($data['status']==2){
			$data['text_status']="Dealer, pengajuan/perubahan dokumen Anda diterima";
		}else if($data['status']==3){
			$data['text_status']="Perubahan dokumen kualifikasi Anda menunggu hasil kualifikasi";
		}else if($data['status']==4){
			$data['text_status']="Perubahan dokumen kualifikasi Anda ditolak";
		}else if($data['status']==5){
			$data['text_status']="Telah diperiksa, perlu melakukan revisi";
		}
		$this->load->model("kualifikasi");
		$data['komentar']=$this->kualifikasi->getKomentar($this->session->userdata('username'));
		$this->load->view("editprofile", $data);
	}

	public function submitperubahan(){
		$update['nama']=$_POST['nama'];
		$update['time_formed']=$_POST['time_formed'];
		$update['website']=$_POST['website'];
		$update['merekmobil']=$_POST['merekmobil'];
			
		$this->load->model("dealer");
		$this->dealer->updateInfo($this->session->userdata("username"), $update);
		$this->session->set_userdata("system_message", "Profil Anda telah berhasil dimutakhirkan ");
		redirect(base_url()."index.php/common/home");
	}

	public function authenticate() {
		$this->load->model('user');
		if($this->user->checkUsernamePassword($_POST['email'], $_POST['password'])) {
			//login berhasil
			$role=$this->user->getRole($_POST['email']);
			$this->session->set_userdata(array("role"=>$role, "username"=>$_POST['email'], "system_message" =>"Selamat Datang di Sistem E-Purchasing Pemerintah Daerah Jawa Barat"));
			redirect(base_url()."index.php/common/home");
		}else {
			//login gagal
			$this->session->set_userdata(array("loginfailed" => true));
			redirect(base_url());
		}
	}

	public function home() {
		$this->load->view("homeview");
	}

	public function template(){
		$this->load->view("template");
	}

	public function input_stok($id_katalog){
		$this->load->model("katalog");
		$username = $this->session->userdata("username");
		$data['katalog'] = $this->katalog->getKatalogByID($id_katalog);
		$data['tipe']=$this->katalog->getData($data['katalog']['id_tipe']);
		$data['warna']=$this->katalog->getWarnaByIdTipe($data['tipe']['id']);
		$data['stok'] = $this->katalog->getStokWarnaByIdKatalogUsername($data['katalog']['id'], $username);
		if($data['stok'] == null){
			for($i=0; $i<count($data['warna']); $i++){
				$stok = array(
				"ID_warna" => $data['warna'][$i]['ID'],
				"id_katalog" => $data['katalog']['id'],
				"username_dealer" => $this->session->userdata("username"),
				"stok" => 0
				);
				$this->katalog->inp_stok($stok);
			}
		}
		$data['stok'] = $this->katalog->getStokWarnaByIdKatalogUsername($data['katalog']['id'], $username);
		//print_r($data['stok']);
		
		//echo count($data['warna']);
		$this->load->view("input_stok", $data);
	}

	public function inputStok(){
		$username=$this->session->userdata("username");
		$this->load->model("katalog");
		foreach($_GET['stok'] as $key => $stok){
			foreach($_GET['id_warna'] as $id_warna => $id){
				if($key == $id_warna){
					$where = array(
					"ID_warna" => $id,
					"id_katalog" => $_GET['id_katalog'],
					"username_dealer" => $username
					);
					$data = array(
					"stok" => $stok
					);
					$this->katalog->updateStok($where, $data);
					break;
				}
			}
		}
		redirect(base_url()."index.php/common/input_stok/".$_GET['id_katalog']);
	}
	
	public function atpm_pajak(){
		$this->load->model("admin_model");
		$this->load->model("atpm_model");
		$this->load->model("katalog");
		$data['tipe'] = $this->katalog->getTipe($this->session->userdata("username"));
		$data['atpm'] = $this->atpm_model->getAtpm($this->session->userdata("username"));
		//print_r($data['tipe']);
		$data['daerah'] = $this->admin_model->getDaerah();
		$data['pajak'] = $this->atpm_model->getPajak($data['atpm']['id']);
		
		$id_atpm = $this->atpm_model->getAtpm($this->session->userdata("username"));
		if($data['pajak'] == null){
			for($a=1; $a<=count($data['daerah']); $a++){
				$pkb[$a] = 0;
				$bbn[$a] = 0;
				$ongkir[$a] = 0;
				$asuransi[$a] = 0;
			};
			$this->atpm_model->inputPajak($id_atpm['id'], $pkb, $bbn, $ongkir, $data['daerah']);
		};
		$data['pajak'] = $this->atpm_model->getPajak($data['atpm']['id']);
		$this->load->view("atpm_pajak", $data);
	}
	
	public function atpm_browse(){
		$this->load->view("atpm_browse");
	}
public function atpm_ubahkatalog(){
		$this->load->model('atpm_model');
		$data['merek']=$this->atpm_model->getMerekKat($this->session->userdata('username'));
		$data['tipe']=$this->atpm_model->getTipeKat($data['merek']['merek']);
		$id_tipe=array();
		for($i=0;$i<count($data['tipe']);$i++){
			array_push($id_tipe,$data['tipe'][$i]['id']);
		}
		
		$data['katalog']=$this->atpm_model->getKatalogKat($id_tipe);
	
	$id_tipe=array();
		for($i=0;$i<count($data['tipe']);$i++){
			array_push($id_tipe,$data['tipe'][$i]['id']);
		}
		
		$data['katalog']=$this->atpm_model->getKatalogKat($id_tipe);
		if($_GET['interior'] != null){
			$data['interior']=$this->atpm_model->getInterior($_GET['interior']);
		}else{
			$data['interior'] = null;
		}

		if($_GET['eksterior'] != null){
			$data['eksterior']=$this->atpm_model->getEksterior($_GET['eksterior']);
		}else{
			$data['eksterior'] = null;
		}
		$this->load->view("atpm_ubahkatalog", $data);
	}
	public function atpm_editkatalog(){
		$this->load->model('atpm_model');
		$data['merek']=$this->atpm_model->getMerekKat($this->session->userdata('username'));
		$data['tipe']=$this->atpm_model->getTipeID($_GET['id_tipe']);
		$data['katalog']=$this->atpm_model->getKatalogTipe($_GET['id']);
		$data['tipe']=$this->atpm_model->getTipeID($_GET['id_tipe']);
	
	$data['katalog']=$this->atpm_model->getKatalogTipe($_GET['id']);
		$this->load->view("atpm_editkatalog", $data);
	}

	public function atpm_editinterior(){
		$this->load->model('atpm_model');
	
	$id_tipe=$_GET['id'];
		$int=$_GET['int'];
		$data['int'] = $int;
		$data['int_doc'] = $_GET['int_doc'];
		$data['int_desc'] = $_GET['int_desc'];
		$data['merek']=$this->atpm_model->getMerekKat($this->session->userdata('username'));
		$data['tipe']=$this->atpm_model->getTipeKat($data['merek']['merek']);
		$data['katalog']=$this->atpm_model->getKatalogKat($data['tipe'][0]['id']);
		$data['interior']=$this->atpm_model->getInterior($id_tipe);
		$this->load->view("atpm_editinterior",$data);
	}

	public function atpm_editeksterior(){
		$this->load->model('atpm_model');
		$id_tipe=$_GET['id'];
		$data['eks'] = $_GET['eks'];
	
	$data['eks_desc'] = $_GET['eks_desc'];
		$data['merek']=$this->atpm_model->getMerekKat($this->session->userdata('username'));
		$data['tipe']=$this->atpm_model->getTipeKat($data['merek']['merek']);
		$data['katalog']=$this->atpm_model->getKatalogKat($data['tipe'][0]['id']);
		$data['eksterior']=$this->atpm_model->getEksterior($id_tipe);
		$this->load->view("atpm_editeksterior",$data);
	}

	/*public function editKatalog(){
		$this->load->model('atpm_model');
		$atpm=$this->session->userdata('username');
		$id_tipe=$_POST['id'];
		$tipe=$this->atpm_model->getTipe($atpm);
		$this->db->where('id',$id_tipe);
		$this->db->where('atpm_name',$atpm);
		$tipe=array(
			'jenis'=>$_POST['jenis'],
			'model'=>$_POST['model'],
			'spec'=>$_POST['spec']);
		$this->db->update('tipe',$tipe);

		$tipe_mob=$this->atpm_model->getKatalogKat($id_tipe);
		$this->db->where('id_tipe',$id_tipe);
		$tipe_mob=array('tipe'=>$_POST['tipe']);
		$this->db->update('katalog',$tipe_mob);
		redirect(base_url()."index.php/common/atpm_editkatalog");
	}*/
	
	public function editKatalog(){
		$this->load->model('atpm_model');
		$atpm=$this->session->userdata('username');
		$id_tipe=$_POST['id_tipe'];
		$tipe=$this->atpm_model->getTipe($atpm);
		$data['tipe']=$this->atpm_model->getTipeID($id_tipe);
		//proses upload spec
		$config['upload_path'] = 'uploads';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload',$config);
		$this->db->where('id',$id_tipe);
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}
		else
		{
			$upload_data = $this->upload->data();
			//Update database
			$this->load->model('atpm_model');
			$this->atpm_model->updateTipeSpecImage($_POST['id_tipe'], $upload_data['file_name']);
			$tipe=array(
				'jenis'=>$_POST['jenis'],
				'model'=>$_POST['model']);
			$this->db->where('id',$_POST['id']);
			$this->db->update('tipe',$tipe);
			$tipe=$this->atpm_model->getKatalogTipe($_POST['id']);
			$this->db->where('id',$_POST['id']);
			$tipe=array('tipe'=>$_POST['tipe']);
			$data=$this->db->update('katalog',$tipe);
		}
		redirect(base_url()."index.php/common/atpm_ubahkatalog?interior=&eksterior=");
	}
	
	
	
	
	/*public function atpm_ubahkatalog(){
		$this->load->model('atpm_model');
		$data['merek']=$this->atpm_model->getMerekKat($this->session->userdata('username'));
		$data['tipe']=$this->atpm_model->getTipeKat($data['merek']['merek']);
		$id_tipe=array();
		for ($i=0;$i<count($data['tipe']);$i++){
		array_push($id_tipe,$data['tipe'][$i]['id']);
		}
		
		$data['katalog']=$this->atpm_model->getKatalogKat($id_tipe);
		if($_GET['interior'] != null){
			$data['interior']=$this->atpm_model->getInterior($_GET['interior']);
		}else{
			$data['interior'] = null;
		}

		if($_GET['eksterior'] != null){
			$data['eksterior']=$this->atpm_model->getEksterior($_GET['eksterior']);
		}else{
			$data['eksterior'] = null;
		}
		$this->load->view("atpm_ubahkatalog", $data);
	}
	public function atpm_editkatalog(){
		$this->load->model('atpm_model');
		$data['merek']=$this->atpm_model->getMerekKat($this->session->userdata('username'));
		$data['tipe']=$this->atpm_model->getTipeKat($data['merek']['merek']);
		$data['katalog']=$this->atpm_model->getKatalogKat($data['tipe'][0]['id']);
		$this->load->view("atpm_editkatalog", $data);
	}

	public function atpm_editinterior(){
		$this->load->model('atpm_model');
		$id_tipe=$_GET['id'];
		$int=$_GET['int'];
		$data['int'] = $int;
		$data['int_doc'] = $_GET['int_doc'];
		$data['int_desc'] = $_GET['int_desc'];
		$data['merek']=$this->atpm_model->getMerekKat($this->session->userdata('username'));
		$data['tipe']=$this->atpm_model->getTipeKat($data['merek']['merek']);
		$data['katalog']=$this->atpm_model->getKatalogKat($data['tipe'][0]['id']);
		$data['interior']=$this->atpm_model->getInterior($id_tipe);
		$this->load->view("atpm_editinterior",$data);
	}

	public function atpm_editeksterior(){
		$this->load->model('atpm_model');
		$id_tipe=$_GET['id'];
		$data['eks'] = $_GET['eks'];
		$data['eks_doc'] = $_GET['eks_doc'];
		$data['eks_desc'] = $_GET['eks_desc'];
		$data['merek']=$this->atpm_model->getMerekKat($this->session->userdata('username'));
		$data['tipe']=$this->atpm_model->getTipeKat($data['merek']['merek']);
		$data['katalog']=$this->atpm_model->getKatalogKat($data['tipe'][0]['id']);
		$data['eksterior']=$this->atpm_model->getEksterior($id_tipe);
		$this->load->view("atpm_editeksterior",$data);
	}
	
	public function editKatalog(){
		$this->load->model('atpm_model');
		$atpm=$this->session->userdata('username');
		$id_tipe=$_POST['id_tipe'];
		$tipe=$this->atpm_model->getTipe($atpm);
		$data['tipe']=$this->atpm_model->getTipeID($id_tipe);
		//proses upload spec
		$config['upload_path']='uploads';
		$config['allowed_types']='jpg|png|gif';
		$this->load->library('upload',$config);
		$this->db->where('id',$id_tipe);
		if(!$this->upload->do_upload())
		{
			$error = array('error'=>$this->upload->display->errors());
			print_r($error);
		}
		else{
			$upload_data=$this->upload->data();
			//update database
			$this->load->model('atpm_model');
			$this->atpm_model->updateTipeSpecImage($_POST['id_tipe'], $upload_data['file_name']);
			$tipe=array(
				'jenis'=>$_POST['jenis'],
				'model'=>$_POST['model']);
			$this->db->update('tipe',$tipe);

			$tipe=$this->atpm_model->getKatalogKat($_POST['id']);
			$this->db->where('id',$_POST['id']);
			$tipe=array('tipe'=>$_POST['tipe']);
			$data=$this->db->update('katalog',$tipe);
			}
			
		redirect(base_url()."index.php/common/atpm_editkatalog");
	} */

	public function editInterior(){
		$this->load->model('atpm_model');
		$atpm=$this->session->userdata('username');
		$id_tipe=$_POST['id'];
		$int = $_POST['int'];
		$int_desc = $_POST['int_desc'];
		$data['interior']=$this->atpm_model->getInterior($id_tipe);
		//proses upload foto
		$config['upload_path'] = 'uploads';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload',$config);
		$this->db->where('id_tipe',$id_tipe);
		$this->db->where('int',$int);
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}
		else
		{
			$upload_data = $this->upload->data();
			//Update database
			$this->load->model('atpm_model');
			$this->atpm_model->updateSpekintext_intImage($_POST['int_prev'], $upload_data['file_name']);
			$this->db->where('id_tipe',$id_tipe);
			$this->db->where('int',$int);
			$interior=array(
								'int'=>$_POST['int'],
								'int_desc'=>$_POST['int_desc']);
			$this->db->update('spekintext_int',$interior);
		}
		redirect(base_url()."index.php/common/atpm_ubahkatalog?interior=&eksterior=");
	}

	public function editEksterior(){
		$this->load->model('atpm_model');
		$atpm=$this->session->userdata('username');
		$id_tipe=$_POST['id'];
		$eks= $_POST['eks'];
		$eks_desc = $_POST['eks_desc'];
		$data['eksterior'] = $this->atpm_model->getEksterior($id_tipe);
		//proses upload foto
		$config['upload_path'] = 'uploads';
		$config['allowed_types'] = 'gif|jpg|png|';
		$this->load->library('upload',$config);
		$this->db->where('id_tipe',$id_tipe);
		$this->db->where('eks',$eks);
		if( ! $this->upload->do_upload()){
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}else{
			$upload_data = $this->upload->data();
			$this->atpm_model->updateSpekintext_eksImage($_POST['eks_prev'], $upload_data['file_name']);
			$this->db->where('id_tipe',$id_tipe);
			$this->db->where('eks',$eks);
			$eksterior=array(
								'eks'=>$_POST['eks'],
								'eks_desc'=>$_POST['eks_desc']);
			$this->db->update('spekintext_eks',$eksterior);
		}
		redirect(base_url()."index.php/common/atpm_ubahkatalog?interior=&eksterior=");
	}
	
	public function deleteKatalog(){
		$this->load->model('atpm_model');
		$this->atpm_model->deleteKatalog($_GET['id']);
		redirect(base_url()."index.php/common/atpm_ubahkatalog?interior=&eksterior=");
	}
	
	/*public function deleteKatalog(){
		$this->load->model('atpm_model');
		$data['merek']=$this->atpm_model->getMerekKat($this->session->userdata('username'));
		$data['tipe']=$this->atpm_model->getTipeKat($data['merek']['merek']);
		$data['katalog']=$this->atpm_model->getKatalogKat($data['tipe'][0]['id']);
		$id_tipe=$_GET['id'];
		$this->db->where('id',$id_tipe);
		$this->db->delete('tipe');
		$this->db->where('id_tipe', $id_tipe);
		$this->db->delete('katalog');
	}*/

	public function atpm_evaldealer($username){
		$this->load->model("atpm_model");
		$tipe = $this->atpm_model->getTipe($this->session->userdata['username']);
		$data['lalai'] = $this->atpm_model->getLalai();
		$data['dealer'] = $this->atpm_model->getAtpmDealer($tipe[0]['merek']);
		if($username == "none"){
			$data['eval'] = $this->atpm_model->getEval($data['dealer'][0]['username']);
			if($data['eval']== null){
				$data['username']=$data['dealer'][0]['username'];
			}
			else{
				$data['username']=$data['eval'][0]['username'];
			}
		}else{
			$data['eval'] = $this->atpm_model->getEval($username);
			$data['username'] = $username;
		}
		$this->load->view("atpm_elval", $data);
	}
	public function ulp_browse(){
		$this->load->model("ulp_model");
		$username=$this->session->userdata('username');
		$awal = $_GET['awal'];
		$array = array(
		);
		$data['tipe']=$this->ulp_model->getTipeGroup($array, "merek");
		$data['katalog'] = $this->ulp_model->getKatalog();
		if($awal == "y"){
			$merek = null;
			$jenis = null;
			$model = null;
			$tipe = null;
			$transmisi = null;
			$cc = null;
		}else{
			$merek = $_GET['merek'];
			if($merek == null){
				$jenis = null;
				$model = null;
				$tipe = null;
				$transmisi = null;
				$cc = null;
			}else{
				if($merek == "*"){
					$data['tipe'] = $this->ulp_model->getTipeG("jenis");
				}else{
					$array = array(
						"merek" => $merek
					);
					$data['tipe'] = $this->ulp_model->getTipeGroup($array, "jenis");
				}
				$jenis = $_GET['jenis'];
				if($jenis == null){
					$model = null;
					$tipe = null;
					$transmisi = null;
					$cc = null;	
				}else{
					if($jenis == "*" && $merek == "*"){
						$data['tipe'] = $this->ulp_model->getTipeG("model");
					}else if($jenis == "*" && $merek != "*"){
						$array = array(
							"merek" => $merek
						);
						$data['tipe'] = $this->ulp_model->getTipeGroup($array, "model");
					}else if($jenis != "*" && $merek == "*"){
						$array = array(
							"jenis" => $jenis
						);
						$data['tipe'] = $this->ulp_model->getTipeGroup($array, "model");
					}else{
						$array = array(
							"merek" => $merek,
							"jenis" => $jenis
						);
						$data['tipe'] = $this->ulp_model->getTipeGroup($array, "model");
					}
					$model = $_GET['model'];
					if($model == null){
						$tipe = null;
						$transmisi = null;
						$cc = null;
					}else{
						if($model == "*" && $jenis == "*" && $merek == "*"){
							$data['tipe'] = $this->ulp_model->getTipe();
						}else if($model == "*" && $jenis == "*" && $merek != "*"){
							$array = array(
								"merek" => $merek
							);
							$data['tipe'] = $this->ulp_model->getTipeSelect($array);
						}else if($model == "*" && $jenis != "*" && $merek == "*"){
							$array = array(
								"jenis" => $jenis
							);
							$data['tipe'] = $this->ulp_model->getTipeSelect($array);
						}else if($model == "*" && $jenis != "*" && $merek != "*"){
							$array = array(
								"merek" => $merek,
								"jenis" => $jenis
							);
							$data['tipe'] = $this->ulp_model->getTipeSelect($array);
						}else if($model != "*" && $jenis == "*" && $merek == "*"){
							$array = array(
								"model" => $model
							);
							$data['tipe'] = $this->ulp_model->getTipeSelect($array);
						}else if($model != "*" && $jenis == "*" && $merek != "*"){
							$array = array(
								"merek" => $merek,
								"model" => $model
							);
							$data['tipe'] = $this->ulp_model->getTipeSelect($array);
						}else if($model != "*" && $jenis != "*" && $merek == "*"){
							$array = array(
								"model" => $model,
								"jenis" => $jenis
							);
							$data['tipe'] = $this->ulp_model->getTipeSelect($array);
						}else if($model != "*" && $jenis != "*" && $merek != "*"){
							$array = array(
								"merek" => $merek,
								"jenis" => $jenis,
								"model" => $model
							);
							$data['tipe'] = $this->ulp_model->getTipeSelect($array);
						}
					
						$data['katalog'] = null;
						for($i=0; $i<count($data['tipe']); $i++){
							$array = array(
							"id_tipe" => $data['tipe'][$i]['id']
							);
							if($i == 0){
								$data['katalog'] = $this->ulp_model->getKatalogGroup($array, "tipe");	
							}else{
								$data['katalog'][count($data['katalog'])] = $this->ulp_model->getKatalogGroupNol($array, "tipe");
							}	
						}
						$tipe = $_GET['tipe'];
						if($tipe == null){
							$transmisi = null;
							$cc = null;
						}else{
								if($tipe == "*"){
									for($i=0; $i<count($data['tipe']); $i++){
										$array = array(
										"id_tipe" => $data['tipe'][$i]['id']
										);
										if($i == 0){
											$data['katalog'] = $this->ulp_model->getKatalogGroup($array, "transmisi");	
										}else{
											$data['katalog'][count($data['katalog'])] = $this->ulp_model->getKatalogGroupNol($array, "transmisi");
										}	
									}
								}else{
									for($i=0; $i<count($data['tipe']); $i++){
										$array = array(
										"id_tipe" => $data['tipe'][$i]['id'],
										"tipe" => $tipe
										);
										if($i == 0){
											$data['katalog'] = $this->ulp_model->getKatalogGroup($array, "transmisi");	
										}else{
											$data['katalog'][count($data['katalog'])] = $this->ulp_model->getKatalogGroupNol($array, "transmisi");
										}
									}
								}
							$transmisi = $_GET['transmisi'];
							if($transmisi == null){
								$cc = null;
							}else{
								if($transmisi == "*" && $tipe == "*"){
										for($i=0; $i<count($data['tipe']); $i++){
											$array = array(
											"id_tipe" => $data['tipe'][$i]['id']
											);
											if($i == 0){
												$data['katalog'] = $this->ulp_model->getKatalogGroup($array, "cc");	
											}else{
												$data['katalog'][count($data['katalog'])] = $this->ulp_model->getKatalogGroupNol($array, "cc");
											}	
										}
									}else if($transmisi == "*" && $tipe != "*"){
										for($i=0; $i<count($data['tipe']); $i++){
											$array = array(
											"id_tipe" => $data['tipe'][$i]['id'],
											"tipe" => $tipe
											);
											if($i == 0){
												$data['katalog'] = $this->ulp_model->getKatalogGroup($array, "cc");	
											}else{
												$data['katalog'][count($data['katalog'])] = $this->ulp_model->getKatalogGroupNol($array, "cc");
											}
										}
									}else if($transmisi != "*" && $tipe != "*"){
										for($i=0; $i<count($data['tipe']); $i++){
											$array = array(
											"id_tipe" => $data['tipe'][$i]['id'],
											"tipe" => $tipe,
											"transmisi" => $transmisi
											);
											if($i == 0){
												$data['katalog'] = $this->ulp_model->getKatalogGroup($array, "cc");	
											}else{
												$data['katalog'][count($data['katalog'])] = $this->ulp_model->getKatalogGroupNol($array, "cc");
											}
										}
									}
								$cc = $_GET['cc'];
							}
						}
					}
				}
			}
		}
		$data['ajuan']=$this->ulp_model->getAjuan($username);
		$data['pencarian'] = array(
			"merek" => $merek,
			"jenis" => $jenis,
			"model" => $model,
			"tipe" => $tipe,
			"transmisi" => $transmisi,
			"cc" => $cc
		);
		$this->load->view("ulp_browse", $data);
	}
	
	function input1()
	{
		$this->load->model("ulp_model");
		$kt_mbl= array(
		);
	}
	
	public function ulp_rencana(){
		$this->load->model('ulp_model');
		$merek = $this->input->post('merek');
		if($merek == null){
			$data['hasil'] = $this->ulp_model->getTipe();
			$data['hasil1'] = $this->ulp_model->getKatalog();
		}else{
			$jenis = $this->input->post('jenis');
			if($jenis == null){
				if($merek == "*"){
				$data['hasil'] = $this->ulp_model->getTipe();
				for($i=0; $i<count($data['hasil']); $i++){
					$array = array(
					"id_tipe" => $data['hasil'][$i]['id']
					);
					if($i == 0){
						$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
					}else{
						$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
					}
				}	
				}else{
				$array = array(
				"merek" => $merek
				);
				$data['hasil'] = $this->ulp_model->getTipeSelect($array);
				for($i=0; $i<count($data['hasil']); $i++){
					$array = array(
					"id_tipe" => $data['hasil'][$i]['id']
					);
					if($i == 0){
						$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
					}else{
						$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
					}
				}
				}
				
			}else{
				$model = $this->input->post('model');
				if($model == null){
					if($jenis == "*" && $merek == "*"){
						$data['hasil'] = $this->ulp_model->getTipe();
					for($i=0; $i<count($data['hasil']); $i++){
						$array = array(
						"id_tipe" => $data['hasil'][$i]['id']
						);
						if($i == 0){
							$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
						}else{
							$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
						}
					}
					}else if($jenis == "*" && $merek != "*"){
					$array = array(
						"merek" => $merek
					);
					$data['hasil'] = $this->ulp_model->getTipeSelect($array);
					for($i=0; $i<count($data['hasil']); $i++){
						$array = array(
						"id_tipe" => $data['hasil'][$i]['id']
						);
						if($i == 0){
							$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
						}else{
							$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
						}
					}
					}else{
					$array = array(
						"merek" => $merek,
						"jenis" => $jenis
					);
					$data['hasil'] = $this->ulp_model->getTipeSelect($array);
					for($i=0; $i<count($data['hasil']); $i++){
						$array = array(
						"id_tipe" => $data['hasil'][$i]['id']
						);
						if($i == 0){
							$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
						}else{
							$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
						}
					}
					}
				}else{
					if($model == "*" && $jenis == "*" && $merek == "*"){
					$data['hasil'] = $this->ulp_model->getTipe();
					$tipe = $this->input->post('tipe');	
					}else if($model == "*" && $jenis == "*" && $merek != "*"){
						$array = array(
						"merek" => $merek
					);
					$data['hasil'] = $this->ulp_model->getTipeSelect($array);
					$tipe = $this->input->post('tipe');	
					}else if($model == "*" && $jenis != "*" && $merek == "*"){
						$array = array(
						"jenis" => $jenis
					);
					$data['hasil'] = $this->ulp_model->getTipeSelect($array);
					$tipe = $this->input->post('tipe');	
					}else if($model == "*" && $jenis != "*" && $merek != "*"){
						$array = array(
						"merek" => $merek,
						"jenis" => $jenis
					);
					$data['hasil'] = $this->ulp_model->getTipeSelect($array);
					$tipe = $this->input->post('tipe');	
					}else if($model != "*" && $jenis == "*" && $merek == "*"){
						$array = array(
						"model" => $model
					);
					$data['hasil'] = $this->ulp_model->getTipeSelect($array);
					$tipe = $this->input->post('tipe');	
					}else if($model != "*" && $jenis == "*" && $merek != "*"){
						$array = array(
						"merek" => $merek,
						"model" => $model
					);
					$data['hasil'] = $this->ulp_model->getTipeSelect($array);
					$tipe = $this->input->post('tipe');	
					}else if($model != "*" && $jenis != "*" && $merek == "*"){
						$array = array(
						"jenis" => $jenis,
						"model" => $model
					);
					$data['hasil'] = $this->ulp_model->getTipeSelect($array);
					$tipe = $this->input->post('tipe');	
					}else{
						$array = array(
						"merek" => $merek,
						"jenis" => $jenis,
						"model" => $model
					);
					$data['hasil'] = $this->ulp_model->getTipeSelect($array);
					$tipe = $this->input->post('tipe');	
					}
					
					if($tipe == null){
						for($i=0; $i<count($data['hasil']); $i++){
							$array = array(
							"id_tipe" => $data['hasil'][$i]['id']
							);
							if($i == 0){
								$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
							}else{
								$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
							}
						}
					}else{
						
						$transmisi = $this->input->post('transmisi');
						if($transmisi == null){
							if($tipe == "*"){
							for($i=0; $i<count($data['hasil']); $i++){
								$array = array(
								"id_tipe" => $data['hasil'][$i]['id']
								);
								if($i == 0){
									$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
								}else{
									$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
								}
							}
							}else{
							for($i=0; $i<count($data['hasil']); $i++){
								$array = array(
								"id_tipe" => $data['hasil'][$i]['id'],
								"tipe" => $tipe
								);
								if($i == 0){
									$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
								}else{
									$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
								}
							}
							}
							
						}else{
							$cc = $this->input->post('cc');
							if($cc == null){
								if($transmisi == "*" && $tipe == "*"){
									for($i=0; $i<count($data['hasil']); $i++){
									$array = array(
									"id_tipe" => $data['hasil'][$i]['id']
									);
									if($i == 0){
										$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
									}else{
										$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
									}
									}
								}else if($transmisi == "*" && $tipe != "*"){
								for($i=0; $i<count($data['hasil']); $i++){
									$array = array(
									"id_tipe" => $data['hasil'][$i]['id'],
									"tipe" => $tipe
									);
									if($i == 0){
										$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
									}else{
										$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
									}
									}
								}else if($transmisi != "*" && $tipe == "*"){
								for($i=0; $i<count($data['hasil']); $i++){
									$array = array(
									"id_tipe" => $data['hasil'][$i]['id'],
									"transmisi" => $transmisi
									);
									if($i == 0){
										$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
									}else{
										$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
									}
									}
								}else{
								for($i=0; $i<count($data['hasil']); $i++){
									$array = array(
									"id_tipe" => $data['hasil'][$i]['id'],
									"tipe" => $tipe,
									"transmisi" => $transmisi
									);
									if($i == 0){
										$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
									}else{
										$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
									}
									}
								}
							}else{
								if($cc == "*" && $transmisi == "*" && $tipe == "*"){
								for($i=0; $i<count($data['hasil']); $i++){
									$array = array(
									"id_tipe" => $data['hasil'][$i]['id']
									);
									if($i == 0){
										$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
									}else{
										$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
									}
									}
								}else if($cc == "*" && $transmisi == "*" && $tipe != "*"){
								for($i=0; $i<count($data['hasil']); $i++){
									$array = array(
									"id_tipe" => $data['hasil'][$i]['id'],
									"tipe" => $tipe
									);
									if($i == 0){
										$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
									}else{
										$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
									}
									}
								}else if($cc == "*" && $transmisi != "*" && $tipe == "*"){
								for($i=0; $i<count($data['hasil']); $i++){
									$array = array(
									"id_tipe" => $data['hasil'][$i]['id'],
									"transmisi" => $transmisi
									);
									if($i == 0){
										$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
									}else{
										$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
									}
									}
								}else if($cc == "*" && $transmisi != "*" && $tipe != "*"){
								for($i=0; $i<count($data['hasil']); $i++){
									$array = array(
									"id_tipe" => $data['hasil'][$i]['id'],
									"tipe" => $tipe,
									"transmisi" => $transmisi
									);
									if($i == 0){
										$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
									}else{
										$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
									}
									}
								}else if($cc != "*" && $transmisi == "*" && $tipe == "*"){
								for($i=0; $i<count($data['hasil']); $i++){
									$array = array(
									"id_tipe" => $data['hasil'][$i]['id'],
									"cc" => $cc
									);
									if($i == 0){
										$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
									}else{
										$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
									}
									}
								}else if($cc != "*" && $transmisi == "*" && $tipe != "*"){
								for($i=0; $i<count($data['hasil']); $i++){
									$array = array(
									"id_tipe" => $data['hasil'][$i]['id'],
									"tipe" => $tipe,
									"cc" => $cc
									);
									if($i == 0){
										$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
									}else{
										$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
									}
									}
								}else if($cc != "*" && $transmisi != "*" && $tipe == "*"){
								for($i=0; $i<count($data['hasil']); $i++){
									$array = array(
									"id_tipe" => $data['hasil'][$i]['id'],
									"transmisi" => $transmisi,
									"cc" => $cc
									);
									if($i == 0){
										$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
									}else{
										$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
									}
									}
								}else{
								for($i=0; $i<count($data['hasil']); $i++){
									$array = array(
									"id_tipe" => $data['hasil'][$i]['id'],
									"tipe" => $tipe,
									"transmisi" => $transmisi,
									"cc" => $cc
									);
									if($i == 0){
										$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
									}else{
										$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
									}
									}
								}
							}
						}
					}
					
				}
			}
		}
		$this->load->view('ulp_rencana', $data);
	}
	
public function ulp_hps(){
		$id_katalog= $_POST['id_katalog'];
		$id_tipe = $_POST['id_tipe'];
		$jum = $_POST['jumlah'];
		$keperluan=$_POST['keperluan'];
		$departemen=$_POST['departemen'];
		$id_daerah= $_POST['daerah'];
		$this->load->model ("ulp_model");
		$data['material_plan']=$this->ulp_model->getmaterial_plan();
		$data['ktlg']=$this->ulp_model->cari_kt($id_katalog);
		$data['tipe']=$this->ulp_model->cari_tp($id_tipe);
		$data['daerah']=$this->ulp_model->cari_daerah($id_daerah);
		$data['tes']=$this->ulp_model->tampil_hps();
		$data['hps']=$this->ulp_model->getHPS($id_daerah);
		$data['jum']=$jum;
		$data['keperluan']=$keperluan;
		$data['departemen']=$departemen;
		$this->load->view("ulp_hps", $data);
		//print_r($data['ktlg']);
	}
public function ulp_hps_edit(){
	$id_ajuan=$_POST['id_ajuan'];
	//echo $id_ajuan;
		$id_katalog= $_POST['id_katalog'];
		$id_tipe = $_POST['id_tipe'];
		$jum = $_POST['jumlah'];
		$keperluan=$_POST['keperluan'];
		$departemen=$_POST['departemen'];
		$id_daerah= $_POST['daerah'];
		$this->load->model ("ulp_model");
		$data['material_plan']=$this->ulp_model->getmaterial_plan();
		$data['ktlg']=$this->ulp_model->cari_kt($id_katalog);
		$data['tipe']=$this->ulp_model->cari_tp($id_tipe);
		$data['daerah']=$this->ulp_model->cari_daerah($id_daerah);
		$data['tes']=$this->ulp_model->tampil_hps();
		$data['hps']=$this->ulp_model->getHPS($id_daerah);
		$data['jum']=$jum;
		$data['keperluan']=$keperluan;
		$data['departemen']=$departemen;
		$data['material_plan']=$this->ulp_model->getMaterialPlan($id_ajuan);
		$this->load->view("ulp_hps_edit", $data);
		//print_r($data['ktlg']);
	}

	
	public function ulp_formulir(){
		$id_katalog = $_GET['id_katalog'];
		$id_tipe = $_GET['id_tipe'];
		//echo $id_katalog;
		//echo $id_tipe;
		$this->load->model("ulp_model");
		$data['kt']=$this->ulp_model->cari_kt($id_katalog);
		$data['tp']=$this->ulp_model->cari_tp($id_tipe);
		//print_r($data);

		$data['daerah']= $this->ulp_model->cmb_daerah();
		$this->load->view("ulp_formulir",$data);	
	}

	public function ulp_formulir_edit(){
		$id_ajuan=$_POST['id_ajuan'];
		$id_katalog = $_POST['id_katalog'];
		$id_tipe = $_POST['id_tipe'];
		//echo $id_ajuan;
		//echo $id_tipe;
		$this->load->model("ulp_model");
		$data['kt']=$this->ulp_model->cari_kt($id_katalog);
		$data['tp']=$this->ulp_model->cari_tp($id_tipe);
		//$data['data1']=$this->ulp_model->
		$data['material_plan']=$this->ulp_model->getMaterialPlan($id_ajuan);
		//print_r($data['material_plan']);
		
		$data['daerah']= $this->ulp_model->cmb_daerah();
		$this->load->view("ulp_formulir_edit",$data);
	}
	
	public function ulp_detail(){
			$this->load->model('ulp_model');
			$array = array(
			"id" => $_GET['id_tipe']
			);
			$data['hasil'] = $this->ulp_model->getTipeSelect($array);
			$array = array(
			"id" => $_GET['id_katalog'],
			"id_tipe" => $_GET['id_tipe']			
			);
			$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);
			$data['tipe']=$this->ulp_model->getTipeId($_GET['id_tipe']);
			$data['int']=$this->ulp_model->getInt($_GET['id_tipe']);
			$data['eks']=$this->ulp_model->getEks($_GET['id_tipe']);
			//print_r($data);
			$this->load->view('ulp_detail', $data);
	}
	public function ulp_detail1(){
			$this->load->model('ulp_model');
			$array = array(
			"id" => $_GET['id_tipe']
			);
			$data['hasil'] = $this->ulp_model->getTipeSelect($array);
			$array = array(
			"id" => $_GET['id_katalog'],
			"id_tipe" => $_GET['id_tipe']			
			);
			$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);
			$data['tipe']=$this->ulp_model->getTipeId($_GET['id_tipe']);
			$data['int']=$this->ulp_model->getInt($_GET['id_tipe']);
			$data['eks']=$this->ulp_model->getEks($_GET['id_tipe']);
			//print_r($data);
			$this->load->view('ulp_detail1', $data);
	}
	

/*public function ulp_detail(){
		$id_tipe=$_POST['id_tipe'];
		//echo $id_tipe;
		
		$merek = $this->input->post('merek');
		$jenis = $this->input->post('jenis');
		$tipe = $this->input->post('tipe');
		$model = $this->input->post('model');
		$transmisi = $this->input->post('transmisi');
		$cc = $this->input->post('cc');
		
		
		
		$this->load->model('ulp_model');
		$data['hasil'] = $this->ulp_model->cari_tipe($merek, $jenis,$model);
		$data['hasil1'] = $this->ulp_model->cari_katalog($tipe, $transmisi, $cc);
		$data['tipe']=$this->ulp_model->getTipeId($id_tipe);
		//print_r($data);
		$data['int']=$this->ulp_model->getInt($id_tipe);
		$data['eks']=$this->ulp_model->getEks($id_tipe);
		//print_r($data['int']);
		$this->load->view('ulp_detail', $data);
}*/
	public function ulp_respon_edit(){
		$id_ajuan=$_POST['id_ajuan'];
		//echo $id_ajuan;
		$this->load->model("ulp_model");
		$data=array(
				"id_ajuan"=>$id_ajuan,
				"id_katalog"=> $_POST['id_katalog'],
				"jumlah" => $_POST['jumlah'],
				"keperluan"=> $_POST['keperluan'],
				"departemen"=> $_POST['departemen'],
				"daerah"=> $_POST['daerah'],
				"total_hps"=>$_POST['total'],
				"status"=>"Menunggu"
				
		);
		$this->db->where('id_ajuan',$id_ajuan);
		$this->db->update('material_plan',$data);
		$this->load->view("ulp_respon_edit");
		
	
		
	}
	public function ulp_respon(){
		$this->load->model("ulp_model");
		$data= array (
				"id_ajuan"=>"",
				"id_katalog"=> $_POST['id_katalog'],
				"jumlah" => $_POST['jumlah'],
				"keperluan"=> $_POST['keperluan'],
				"departemen"=> $_POST['departemen'],
				"daerah"=> $_POST['daerah'],
				"total_hps"=> $_POST['total'],
				"username"=>$this->session->userdata('username')
		);
		$this->ulp_model->input_form($data);
		$this->load->view("ulp_respon");
	}

	public function formulir(){
		$this->load->model("ulp_model");
		$id = $_POST['id'];
		$data= array (
				"id_ajuan"=>"",
				"id_katalog"=> $id,
				"jumlah" => $_POST['jumlah'],
				"keperluan"=> $_POST['keperluan'],
				"departemen"=> $_POST['departemen'],
				"daerah"=> $_POST['daerah']			
		);
		$this->ulp_model->input_form($data);
		$data['material_plan']=$this->ulp_model->getmaterial_plan();
		$this->load->view("ulp_hps", $data);
	}
	public function ulp_browse1(){
		$this->load->model("ulp_model");
		$awal = $_GET['awal'];
		$array = array(
		);
		$data['tipe']=$this->ulp_model->getTipeGroup($array, "merek");
		if($awal == "y"){
			$merek = null;
			$jenis = null;
			$model = null;
			$tipe = null;
			$transmisi = null;
			$cc = null;
		}else{
			$merek = $_GET['merek'];
			if($merek == null){
				$jenis = null;
				$model = null;
				$tipe = null;
				$transmisi = null;
				$cc = null;
			}else{
				if($merek == "*"){
					$data['tipe'] = $this->ulp_model->getTipeG("jenis");
				}else{
					$array = array(
						"merek" => $merek
					);
					$data['tipe'] = $this->ulp_model->getTipeGroup($array, "jenis");
				}
				$jenis = $_GET['jenis'];
				if($jenis == null){
					$model = null;
					$tipe = null;
					$transmisi = null;
					$cc = null;	
				}else{
					if($jenis == "*" && $merek == "*"){
						$data['tipe'] = $this->ulp_model->getTipeG("model");
					}else if($jenis == "*" && $merek != "*"){
						$array = array(
							"merek" => $merek
						);
						$data['tipe'] = $this->ulp_model->getTipeGroup($array, "model");
					}else if($jenis != "*" && $merek == "*"){
						$array = array(
							"jenis" => $jenis
						);
						$data['tipe'] = $this->ulp_model->getTipeGroup($array, "model");
					}else{
						$array = array(
							"merek" => $merek,
							"jenis" => $jenis
						);
						$data['tipe'] = $this->ulp_model->getTipeGroup($array, "model");
					}
					$model = $_GET['model'];
					if($model == null){
						$tipe = null;
						$transmisi = null;
						$cc = null;
					}else{
						if($model == "*" && $jenis == "*" && $merek == "*"){
							$data['tipe'] = $this->ulp_model->getTipe();
						}else if($model == "*" && $jenis == "*" && $merek != "*"){
							$array = array(
								"merek" => $merek
							);
							$data['tipe'] = $this->ulp_model->getTipeSelect($array);
						}else if($model == "*" && $jenis != "*" && $merek == "*"){
							$array = array(
								"jenis" => $jenis
							);
							$data['tipe'] = $this->ulp_model->getTipeSelect($array);
						}else if($model == "*" && $jenis != "*" && $merek != "*"){
							$array = array(
								"merek" => $merek,
								"jenis" => $jenis
							);
							$data['tipe'] = $this->ulp_model->getTipeSelect($array);
						}else if($model != "*" && $jenis == "*" && $merek == "*"){
							$array = array(
								"model" => $model
							);
							$data['tipe'] = $this->ulp_model->getTipeSelect($array);
						}else if($model != "*" && $jenis == "*" && $merek != "*"){
							$array = array(
								"merek" => $merek,
								"model" => $model
							);
							$data['tipe'] = $this->ulp_model->getTipeSelect($array);
						}else if($model != "*" && $jenis != "*" && $merek == "*"){
							$array = array(
								"model" => $model,
								"jenis" => $jenis
							);
							$data['tipe'] = $this->ulp_model->getTipeSelect($array);
						}else if($model != "*" && $jenis != "*" && $merek != "*"){
							$array = array(
								"merek" => $merek,
								"jenis" => $jenis,
								"model" => $model
							);
							$data['tipe'] = $this->ulp_model->getTipeSelect($array);
						}
					
						$data['katalog'] = null;
						for($i=0; $i<count($data['tipe']); $i++){
							$array = array(
							"id_tipe" => $data['tipe'][$i]['id']
							);
							if($i == 0){
								$data['katalog'] = $this->ulp_model->getKatalogGroup($array, "tipe");	
							}else{
								$data['katalog'][count($data['katalog'])] = $this->ulp_model->getKatalogGroupNol($array, "tipe");
							}	
						}
						$tipe = $_GET['tipe'];
						if($tipe == null){
							$transmisi = null;
							$cc = null;
						}else{
								if($tipe == "*"){
									for($i=0; $i<count($data['tipe']); $i++){
										$array = array(
										"id_tipe" => $data['tipe'][$i]['id']
										);
										if($i == 0){
											$data['katalog'] = $this->ulp_model->getKatalogGroup($array, "transmisi");	
										}else{
											$data['katalog'][count($data['katalog'])] = $this->ulp_model->getKatalogGroupNol($array, "transmisi");
										}	
									}
								}else{
									for($i=0; $i<count($data['tipe']); $i++){
										$array = array(
										"id_tipe" => $data['tipe'][$i]['id'],
										"tipe" => $tipe
										);
										if($i == 0){
											$data['katalog'] = $this->ulp_model->getKatalogGroup($array, "transmisi");	
										}else{
											$data['katalog'][count($data['katalog'])] = $this->ulp_model->getKatalogGroupNol($array, "transmisi");
										}
									}
								}
							$transmisi = $_GET['transmisi'];
							if($transmisi == null){
								$cc = null;
							}else{
								if($transmisi == "*" && $tipe == "*"){
										for($i=0; $i<count($data['tipe']); $i++){
											$array = array(
											"id_tipe" => $data['tipe'][$i]['id']
											);
											if($i == 0){
												$data['katalog'] = $this->ulp_model->getKatalogGroup($array, "cc");	
											}else{
												$data['katalog'][count($data['katalog'])] = $this->ulp_model->getKatalogGroupNol($array, "cc");
											}	
										}
									}else if($transmisi == "*" && $tipe != "*"){
										for($i=0; $i<count($data['tipe']); $i++){
											$array = array(
											"id_tipe" => $data['tipe'][$i]['id'],
											"tipe" => $tipe
											);
											if($i == 0){
												$data['katalog'] = $this->ulp_model->getKatalogGroup($array, "cc");	
											}else{
												$data['katalog'][count($data['katalog'])] = $this->ulp_model->getKatalogGroupNol($array, "cc");
											}
										}
									}else if($transmisi != "*" && $tipe != "*"){
										for($i=0; $i<count($data['tipe']); $i++){
											$array = array(
											"id_tipe" => $data['tipe'][$i]['id'],
											"tipe" => $tipe,
											"transmisi" => $transmisi
											);
											if($i == 0){
												$data['katalog'] = $this->ulp_model->getKatalogGroup($array, "cc");	
											}else{
												$data['katalog'][count($data['katalog'])] = $this->ulp_model->getKatalogGroupNol($array, "cc");
											}
										}
									}
								$cc = $_GET['cc'];
							}
						}
					}
				}
			}
		}
		$username=$this->session->userdata('username');
		$data['ajuan']=$this->ulp_model->getAjuan($username);
		$data['pencarian'] = array(
			"merek" => $merek,
			"jenis" => $jenis,
			"model" => $model,
			"tipe" => $tipe,
			"transmisi" => $transmisi,
			"cc" => $cc
		);
		$this->load->view("ulp_browse1", $data);
	}
	public function ulp_hasilcari(){
		$this->load->model('ulp_model');
			$merek = $this->input->post('merek');
		if($merek == null){
			$data['hasil'] = $this->ulp_model->getTipe();
			$data['hasil1'] = $this->ulp_model->getKatalog();
		}else{
			$jenis = $this->input->post('jenis');
			if($jenis == null){
				if($merek == "*"){
				$data['hasil'] = $this->ulp_model->getTipe();
				for($i=0; $i<count($data['hasil']); $i++){
					$array = array(
					"id_tipe" => $data['hasil'][$i]['id']
					);
					if($i == 0){
						$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
					}else{
						$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
					}
				}	
				}else{
				$array = array(
				"merek" => $merek
				);
				$data['hasil'] = $this->ulp_model->getTipeSelect($array);
				for($i=0; $i<count($data['hasil']); $i++){
					$array = array(
					"id_tipe" => $data['hasil'][$i]['id']
					);
					if($i == 0){
						$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
					}else{
						$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
					}
				}
				}
				
			}else{
				$model = $this->input->post('model');
				if($model == null){
					if($jenis == "*" && $merek == "*"){
						$data['hasil'] = $this->ulp_model->getTipe();
					for($i=0; $i<count($data['hasil']); $i++){
						$array = array(
						"id_tipe" => $data['hasil'][$i]['id']
						);
						if($i == 0){
							$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
						}else{
							$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
						}
					}
					}else if($jenis == "*" && $merek != "*"){
					$array = array(
						"merek" => $merek
					);
					$data['hasil'] = $this->ulp_model->getTipeSelect($array);
					for($i=0; $i<count($data['hasil']); $i++){
						$array = array(
						"id_tipe" => $data['hasil'][$i]['id']
						);
						if($i == 0){
							$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
						}else{
							$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
						}
					}
					}else{
					$array = array(
						"merek" => $merek,
						"jenis" => $jenis
					);
					$data['hasil'] = $this->ulp_model->getTipeSelect($array);
					for($i=0; $i<count($data['hasil']); $i++){
						$array = array(
						"id_tipe" => $data['hasil'][$i]['id']
						);
						if($i == 0){
							$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
						}else{
							$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
						}
					}
					}
				}else{
					if($model == "*" && $jenis == "*" && $merek == "*"){
					$data['hasil'] = $this->ulp_model->getTipe();
					$tipe = $this->input->post('tipe');	
					}else if($model == "*" && $jenis == "*" && $merek != "*"){
						$array = array(
						"merek" => $merek
					);
					$data['hasil'] = $this->ulp_model->getTipeSelect($array);
					$tipe = $this->input->post('tipe');	
					}else if($model == "*" && $jenis != "*" && $merek == "*"){
						$array = array(
						"jenis" => $jenis
					);
					$data['hasil'] = $this->ulp_model->getTipeSelect($array);
					$tipe = $this->input->post('tipe');	
					}else if($model == "*" && $jenis != "*" && $merek != "*"){
						$array = array(
						"merek" => $merek,
						"jenis" => $jenis
					);
					$data['hasil'] = $this->ulp_model->getTipeSelect($array);
					$tipe = $this->input->post('tipe');	
					}else if($model != "*" && $jenis == "*" && $merek == "*"){
						$array = array(
						"model" => $model
					);
					$data['hasil'] = $this->ulp_model->getTipeSelect($array);
					$tipe = $this->input->post('tipe');	
					}else if($model != "*" && $jenis == "*" && $merek != "*"){
						$array = array(
						"merek" => $merek,
						"model" => $model
					);
					$data['hasil'] = $this->ulp_model->getTipeSelect($array);
					$tipe = $this->input->post('tipe');	
					}else if($model != "*" && $jenis != "*" && $merek == "*"){
						$array = array(
						"jenis" => $jenis,
						"model" => $model
					);
					$data['hasil'] = $this->ulp_model->getTipeSelect($array);
					$tipe = $this->input->post('tipe');	
					}else{
						$array = array(
						"merek" => $merek,
						"jenis" => $jenis,
						"model" => $model
					);
					$data['hasil'] = $this->ulp_model->getTipeSelect($array);
					$tipe = $this->input->post('tipe');	
					}
					
					if($tipe == null){
						for($i=0; $i<count($data['hasil']); $i++){
							$array = array(
							"id_tipe" => $data['hasil'][$i]['id']
							);
							if($i == 0){
								$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
							}else{
								$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
							}
						}
					}else{
						
						$transmisi = $this->input->post('transmisi');
						if($transmisi == null){
							if($tipe == "*"){
							for($i=0; $i<count($data['hasil']); $i++){
								$array = array(
								"id_tipe" => $data['hasil'][$i]['id']
								);
								if($i == 0){
									$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
								}else{
									$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
								}
							}
							}else{
							for($i=0; $i<count($data['hasil']); $i++){
								$array = array(
								"id_tipe" => $data['hasil'][$i]['id'],
								"tipe" => $tipe
								);
								if($i == 0){
									$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
								}else{
									$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
								}
							}
							}
							
						}else{
							$cc = $this->input->post('cc');
							if($cc == null){
								if($transmisi == "*" && $tipe == "*"){
									for($i=0; $i<count($data['hasil']); $i++){
									$array = array(
									"id_tipe" => $data['hasil'][$i]['id']
									);
									if($i == 0){
										$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
									}else{
										$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
									}
									}
								}else if($transmisi == "*" && $tipe != "*"){
								for($i=0; $i<count($data['hasil']); $i++){
									$array = array(
									"id_tipe" => $data['hasil'][$i]['id'],
									"tipe" => $tipe
									);
									if($i == 0){
										$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
									}else{
										$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
									}
									}
								}else if($transmisi != "*" && $tipe == "*"){
								for($i=0; $i<count($data['hasil']); $i++){
									$array = array(
									"id_tipe" => $data['hasil'][$i]['id'],
									"transmisi" => $transmisi
									);
									if($i == 0){
										$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
									}else{
										$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
									}
									}
								}else{
								for($i=0; $i<count($data['hasil']); $i++){
									$array = array(
									"id_tipe" => $data['hasil'][$i]['id'],
									"tipe" => $tipe,
									"transmisi" => $transmisi
									);
									if($i == 0){
										$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
									}else{
										$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
									}
									}
								}
							}else{
								if($cc == "*" && $transmisi == "*" && $tipe == "*"){
								for($i=0; $i<count($data['hasil']); $i++){
									$array = array(
									"id_tipe" => $data['hasil'][$i]['id']
									);
									if($i == 0){
										$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
									}else{
										$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
									}
									}
								}else if($cc == "*" && $transmisi == "*" && $tipe != "*"){
								for($i=0; $i<count($data['hasil']); $i++){
									$array = array(
									"id_tipe" => $data['hasil'][$i]['id'],
									"tipe" => $tipe
									);
									if($i == 0){
										$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
									}else{
										$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
									}
									}
								}else if($cc == "*" && $transmisi != "*" && $tipe == "*"){
								for($i=0; $i<count($data['hasil']); $i++){
									$array = array(
									"id_tipe" => $data['hasil'][$i]['id'],
									"transmisi" => $transmisi
									);
									if($i == 0){
										$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
									}else{
										$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
									}
									}
								}else if($cc == "*" && $transmisi != "*" && $tipe != "*"){
								for($i=0; $i<count($data['hasil']); $i++){
									$array = array(
									"id_tipe" => $data['hasil'][$i]['id'],
									"tipe" => $tipe,
									"transmisi" => $transmisi
									);
									if($i == 0){
										$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
									}else{
										$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
									}
									}
								}else if($cc != "*" && $transmisi == "*" && $tipe == "*"){
								for($i=0; $i<count($data['hasil']); $i++){
									$array = array(
									"id_tipe" => $data['hasil'][$i]['id'],
									"cc" => $cc
									);
									if($i == 0){
										$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
									}else{
										$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
									}
									}
								}else if($cc != "*" && $transmisi == "*" && $tipe != "*"){
								for($i=0; $i<count($data['hasil']); $i++){
									$array = array(
									"id_tipe" => $data['hasil'][$i]['id'],
									"tipe" => $tipe,
									"cc" => $cc
									);
									if($i == 0){
										$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
									}else{
										$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
									}
									}
								}else if($cc != "*" && $transmisi != "*" && $tipe == "*"){
								for($i=0; $i<count($data['hasil']); $i++){
									$array = array(
									"id_tipe" => $data['hasil'][$i]['id'],
									"transmisi" => $transmisi,
									"cc" => $cc
									);
									if($i == 0){
										$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
									}else{
										$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
									}
									}
								}else{
								for($i=0; $i<count($data['hasil']); $i++){
									$array = array(
									"id_tipe" => $data['hasil'][$i]['id'],
									"tipe" => $tipe,
									"transmisi" => $transmisi,
									"cc" => $cc
									);
									if($i == 0){
										$data['hasil1'] = $this->ulp_model->getKatalogSelect($array);	
									}else{
										$data['hasil1'][count($data['hasil1'])] = $this->ulp_model->getKatalogNol($array);
									}
									}
								}
							}
						}
					}
					
				}
			}
		}
		$this->load->view('ulp_hasilcari', $data);
	}

	public function ulp_pembelian(){
		$this->load->view("ulp_pembelian");
	}
	public function ulp_po(){
		$this->load->view("ulp_po");
	}
	public function ulp_invoice(){
		$this->load->model("ulp_model");
		$data['purchaseOrder'] = $this->ulp_model->getPOInvoice($this->session->userdata('username'));
		$purchaseOrder=$data['purchaseOrder'];
		$data['pesanan']=$this->ulp_model->getPesananInvoice($data['purchaseOrder'][0]['id_PO']);
		$data['stok']=$this->ulp_model->getStokInvoice($data['pesanan'][0]['id_stok_warna']);
		$data['katalog']=$this->ulp_model->getKatalogInvoice($data['stok'][0]['id_katalog']);
		//$data['tipe']=$this->ulp_model->getTipeInvoice($data['katalog'][0]['id_tipe']);
		$i=0;
		while($i<count($purchaseOrder)){
		$data['tipe']=$this->ulp_model->getTipeDariPOIn($data['purchaseOrder'][$i]['id_PO']);
		$i++;
		}
		//print_r($data['tipe']);
		$this->load->view("ulp_invoice",$data);
	}
	public function ulp_invoice_detail(){
		$id_PO=$_GET['id_PO'];
		//echo $id_PO;
		$this->load->model("ulp_model");
		$data['purchaseOrder'] = $this->ulp_model->getIdPOInvoice($id_PO);
		$data['pesanan']=$this->ulp_model->getPesananInvoice($data['purchaseOrder'][0]['id_PO']);
		$data['stok']=$this->ulp_model->getStokInvoice($data['pesanan'][0]['id_stok_warna']);
		$data['katalog']=$this->ulp_model->getKatalogInvoice($data['stok'][0]['id_katalog']);
		$data['tipe']=$this->ulp_model->getTipeInvoice($data['katalog'][0]['id_tipe']);
		$data['anggaran']=$this->ulp_model->getAnggPOInvoice($data['purchaseOrder'][0]['nomor_ang']);
		$data['daerah']=$this->ulp_model->getDaerahInvoice($data['purchaseOrder'][0]['daerah']);
		$data['dealer']=$this->ulp_model->getDealerInvoice($data['purchaseOrder'][0]['dealer']);
		$data['warna']=$this->ulp_model->getWarnaDariPO($data['purchaseOrder'][0]['id_PO']);
		//print_r($data['warna']);
		$this->load->view("ulp_invoice_detail",$data);
	}
	
	public function admin_browse(){
		$this->load->view("admin_browse");
	}
	public function admin_kualifikasi(){
		$this->load->view("admin_kualifikasi");
	}
	public function admin_evaluasi(){
		$this->load->view("admin_evaluasi");
	}
	public function admin_anggaran(){
		$this->load->model("admin_model");
		$data['anggaran'] = $this->admin_model->getAnggaran();
		$data['daerah'] = $this->admin_model->getDaerah();
		$this->load->view("admin_anggaran", $data);
	}
	public function ppkd_browse(){
		$this->load->view("ppkd_browse");
	}
public function ppkd_rencana(){
		$this->load->model("ppkd_model");
		$data['ar']=$this->ppkd_model->getajuanren();
		//print_r($data);
		$this->load->view("ppkd_rencana",$data);
	}
	public function ppkd_rencana_det(){
		$this->load->model("ppkd_model");
		$id_ajuan=$_POST['id_ajuan'];
		//$status=$_POST['status'];
		//echo $id_ajuan;
		
		//$this->ppkd_model->update($id_ajuan);
		
		$data['mp']=$this->ppkd_model->getmat($id_ajuan);
		$katalogg= $this->ppkd_model->getKatalogg($data['mp'][0]['id_katalog']);
		$data['tipe']= $this->ppkd_model->gettipe($katalogg['id_tipe']);
		//$data['tipe']=$this->ppkd_model->gettipe($data['mp'][0]['id_tipe']);
		$data['kat']=$this->ppkd_model->getKata($data['mp'][0]['id_katalog']);
		$data['daerah']=$this->ppkd_model->getDaerah($data['mp'][0]['daerah']);
		$data['atpm']=$this->ppkd_model->getAtpm($data['tipe'][0]['atpm_name']);
		$data['hps']=$this->ppkd_model->getHps($data['atpm'][0]['id']);
		
		
		$this->load->view("ppkd_rencana_det",$data);
		//echo $id_ajuan;
		//echo $status;
		//print_r($data['atpm']);
		//print_r($data['hps']);
		
		
	}
	public function update_status(){
	$id_ajuan=$_POST['id_ajuan'];
	$status=$_POST['status'];
	$pesan=$_POST['pesan'];
	//echo $id_ajuan;
		$this->load->model("ppkd_model");
		$data['ar']=$this->ppkd_model->getajuanren();
		$data= array (
				//"id_ajuan"=>"$id_ajuan",
				//"id_tipe"=> $_POST['id_tipe'],
				//"jumlah" => $_POST['jumlah'],
				//"keperluan"=> $_POST['keperluan'],
				//"departemen"=> $_POST['departemen'],
				//"daerah"=> $_POST['daerah'],
				//"total_hps"=>$_POST['total_hps'],
				"status"=>$status,
				"pesan"=>$pesan			
			);
			//print_r($data);
		$this->db->where('id_ajuan',$id_ajuan);
		$this->db->update('material_plan',$data);
		
		redirect (base_url()."index.php/common/ppkd_rencana");//$this->load->view("ppkd_rencana_det",$data);
	}
	public function dealer_browse(){
		$this->load->view("dealer_browse");
	}
	public function dealer_harga(){
		$this->load->view("dealer_harga");
	}

	public function inputPajak(){
		$this->load->model("admin_model");
		$this->load->model("atpm_model");
		$daerah = $this->admin_model->getDaerah();
		$pkb = array();
		$bbn = array();
		$ongkir = array();
		$asuransi = array();
		for($a=0; $a<count($daerah); $a++){
			$pkb[$daerah[$a]['id']] = $_POST['pkb'.$a];
			$bbn[$daerah[$a]['id']] = $_POST['bbn'.$a];
			$ongkir[$daerah[$a]['id']] = $_POST['ongkir'.$a];
			$asuransi[$daerah[$a]['id']] = $_POST['asuransi'.$a];
		}
		$cekStatus = $this->atpm_model->getPajak($_POST['id_atpm']);
		if($cekStatus == null){
			$this->atpm_model->inputPajak($_POST['id_atpm'], $pkb, $bbn, $ongkir, $asuransi, $daerah);
		}else{
				
			$this->atpm_model->editPajak($_POST['id_atpm'], $pkb, $bbn, $ongkir, $asuransi, $daerah);
		}
		redirect(base_url()."index.php/common/atpm_pajak");
	}
	
	public function menukeuangan(){
		$this->load->view("menukeuangan");
	}
	


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>