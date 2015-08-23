<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class atpm extends CI_Controller {
	public function atpm_inputkatalog($page){
		if($page==1){
			$this->load->model('atpm_model');
			$data['merek']=$this->atpm_model->getMerek($this->session->userdata('username'));
			$this->load->view("atpm_inputkatalog", $data);
		} else if($page==2){
			$this->load->model("katalog");
			$data=$this->katalog->getData($this->session->userdata('tipe_id'));
			$this->load->view("atpm_inputkatalog2", $data);
		} else if($page==3){
			$this->load->model("katalog");
			$data=$this->katalog->getData($this->session->userdata('tipe_id'));
			$this->load->view("atpm_inputkatalog3", $data);
		}else if($page ==4){
			$this->load->model("katalog");
			$data=$this->katalog->getData($this->session->userdata('tipe_id'));
			$this->load->view("atpm_inputkatalog4", $data);
		}else if($page==5){
			$this->load->model("katalog");
			$data['tipe']=$this->katalog->getData($this->session->userdata('tipe_id'));
			$data['katalog']=$this->katalog->getDataTipe($this->session->userdata('tipe_id'));
			$this->load->view("atpm_inputkatalog5", $data);
		}
		else
		{
			redirect(base_url()."index.php/atpm/atpm_inputkatalog/1");
		}
	}

	public function atpm_browse(){
		$this->load->view("atpm_browse");
	}

	public function submit_katalogstandar($page){
		if($page==1){
			$this->load->helper(array('form', 'url'));
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				$error =  $this->upload->display_errors();
				$this->session->set_userdata("system_message", $error);
				$this->load->view("homeview");
			}
			else
			{
				//Cek dulu di katalognya nama atpm nya udah ada atau belum
				$this->load->model("katalog");
				$telahsubmit=$this->katalog->apakahTelahSubmit($_POST['merek'], $_POST['jenis'], $_POST['model']);

				$upload_data=$this->upload->data();

				$data=array(
				"atpm_name"=>$this->session->userdata('username'), 
				"merek"=>$_POST['merek'],
				"jenis"=>$_POST['jenis'], 
				"model"=>$_POST['model'],
				"PIC"=>$upload_data['file_name']
				);
				
				if($telahsubmit){
					$this->katalog->updateMerekJenisModel($_POST['merek'], $_POST['jenis'], $_POST['model'], $data);
				}else{
					$this->db->insert("tipe", $data);
				}
				
				//Dapatkan ID tipe nya terus masukkin ke session
				$this->load->model("atpm_model");
				$id=$this->atpm_model->getIDWhere($data);
				$this->session->set_userdata("tipe_id", $id);
				
				$data2=array();
				
				$this->db->where('id_tipe', $this->session->userdata('tipe_id'));
				$this->db->delete('warna');

				foreach($_POST['warna'] as $key=>$value){
					if(strlen($value)!=0){
						array_push($data2, array("id_tipe"=>$this->session->userdata('tipe_id'), "warna"=>$value));
					}
				}
				$this->db->insert_batch("warna", $data2);
				redirect(base_url()."index.php/atpm/atpm_inputkatalog/2");
			}
		}else if($page==2){
			$config['upload_path'] = 'uploads';
			$config['allowed_types'] = 'gif|jpg|png';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload("spec"))
			{
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
			}
			else
			{
				$upload_data = $this->upload->data();
				//Update database
				$this->load->model('atpm_model');
				$this->atpm_model->updateSpecImage($this->session->userdata('tipe_id'), $upload_data['file_name']);
				redirect(base_url()."index.php/atpm/atpm_inputkatalog/3");
			}
		}else if($page==3){
			// Image
			// Image
			$config="";
			$this->load->model('atpm_model');
			$this->atpm_model->kosongkanKatalogInt($this->session->userdata('tipe_id'));
			$config['upload_path'] = 'uploads';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);
			// RE-SERIALIZE $_FILES ARRAY
			foreach($_FILES['int_doc'] as $key => $file)
			{
				$i = 0;
				foreach ($file as $item)
				{
					$data[$i][$key] = $item;
					$i++;
				}
			}
			// END RE-SERIALIZE
			//print_r($_FILES);die; // see the real income data
			//print_r($data); die; // serialized data
			$file = ''; // reset
			$_FILES = $data; // re-declarate
			for($j=0;$j<count($data);$j++)
			{
				$config['file_name'] = 'int_'.$this->session->userdata('username').$j;
				$this->upload->initialize($config);
				if($this->upload->do_upload($j)){
					$file = $this->upload->data();
					$this->atpm_model->tambahkanKatalogInt($_POST['int'][$j],$_POST['int_desc'][$j],$file['file_name']);
				}
				else{
					echo "Error di interior<br />";
					$error = array('error' => $this->upload->display_errors());
					print_r($error);
				}
			}
			redirect(base_url()."index.php/atpm/atpm_inputkatalog/4");
		}
		else if($page==4){
			// Image
			// Image
			$config="";
			$this->load->model('atpm_model');
			$this->atpm_model->kosongkanKatalogEks($this->session->userdata('tipe_id'));
			$config['upload_path'] = 'uploads';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);
			// RE-SERIALIZE $_FILES ARRAY
			foreach($_FILES['ext_doc'] as $key => $file)
			{
				$i = 0;
				foreach ($file as $item)
				{
					$data[$i][$key] = $item;
					$i++;
				}
			}
			// END RE-SERIALIZE
			//print_r($_FILES);die; // see the real income data
			//print_r($data); die; // serialized data
			$file = ''; // reset
			$_FILES = $data; // re-declarate
			for($j=0;$j<count($data);$j++)
			{
				$config['file_name'] = 'ext_'.$this->session->userdata('username').$j;
				$this->upload->initialize($config);
				if($this->upload->do_upload($j)){
					$file = $this->upload->data();
					$this->atpm_model->tambahkanKatalogEks($_POST['ext'][$j],$_POST['ext_desc'][$j],$file['file_name']);
				}
				else{
					echo "Error di ksterior<br />";
					$error = array('error' => $this->upload->display_errors());
					print_r($error);
				}
			}
			redirect(base_url()."index.php/atpm/atpm_inputkatalog/5");
		
		/*}else if($page==4){
			// Image
			// RE-SERIALIZE $_FILES ARRAY
			$config="";
			$i = 0;
			$this->load->model("atpm_model");
			$this->atpm_model->kosongkanKatalogEks($this->session->userdata('tipe_id'));
			$config['upload_path'] = 'uploads';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);
			// RE-SERIALIZE $_FILES ARRAY
			foreach($_FILES['ext_doc'] as $key => $file)
			{
				$i = 0;
				foreach ($file as $item)
				{
					$data[$i][$key] = $item;
					$i++;
				}
			}
			// END RE-SERIALIZE
			//print_r($_FILES);die; // see the real income data
			//print_r($data); die; // serialized data
			$file = ''; // reset
			$_FILES = $data; // re-declarate
			for($j=0;$j<count($data);$j++)
			{
				$config['file_name'] = 'ext_'.$this->session->userdata('username').$j;
				$this->upload->initialize($config);
				if($this->upload->do_upload($j)){
					$file = $this->upload->data();
					$this->atpm_model->tambahkanKatalogEks($_POST['ext'][$j],$_POST['ext_desc'][$j],$file['file_name']);
					$this->session->set_userdata("system_message", "Selamat! Input katalog telah berhasil");
					redirect(base_url()."index.php/atpm/atpm_inputkatalog/5");
				}
				else{
					echo "error";
				}
			}
		*/
		}else if($page==5){
			$config="";
			$this->load->model("atpm_model");
			$data=array(
				"tipe"=>$_POST['tipe'], 
				"transmisi"=>$_POST['transmisi'], 
				"cc"=>$_POST['cc'], 
				"OfTR"=>$_POST['OfTR'],
				"id_tipe"=>$_POST['id_tipe']
			);
			
			$this->db->insert("katalog", $data);
			
			redirect(base_url()."index.php/atpm/atpm_inputkatalog/5");
		}

	}

	public function atpm_inputkatalog2(){
		$this->load->view("atpm_inputkatalog2");
	}
	
	public function selesaiinput(){
		$this->session->set_userdata("system_message", "Katalog Anda telah berhasil diperbaharui");
		redirect(base_url()."index.php/common/home");
	}



}

?>