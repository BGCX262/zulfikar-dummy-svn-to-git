<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class daftar extends CI_Controller {

	public function index(){
		$this->load->view("view_register.php");
	}

	public function proses(){
		$this->load->model("register");
		$token = $this->register->get_random_password();
		$data = array(
		"username" => $_POST['username'],
		"password" => $_POST['password1'],
		"email" => $_POST['email'],
		"token" => $token
		);
		$this->register->inputDaftar($data);
		$this->register->kirimToken($_POST['email'], $token);
		redirect(base_url()."index.php/daftar/berhasil");
	}

	public function berhasil(){
		echo "<script language='javascript' type='text/javascript'>window.alert('Pranala konfirmasi akan dikirim ke email Anda')</script>";
		$this->load->view("login");
	}

	public function sendEmail(){
		$this->load->model("user");
		$this->user->insertNewUser($_POST['username'], $_POST['password1'], $_POST['email'], 2);

		//Masukkan ke daftar kualifikasinya
		$this->load->model("dokumenkualifikasi");
		$this->dokumenkualifikasi->insertNewKualifikasi($_POST['username']);

		//Masukkan ke daftar dealernya
		$this->load->model("dealer");
		$this->dealer->insertNewDealer($_POST['username']);
	}

	public function konfirmasi(){
		$this->load->model("register");
		$data['user'] = $this->register->getDaftar($_GET['token']);
		if(count($data['user'])==0){
			?>
<script language="javascript" type="text/javascript">window.alert("Anda mungkin belum mendaftar. Silahkan mendaftar dan klik link dari email Anda")</script>
			<?php
		}else{
			$data1 = array(
		"username" => $data['user']['username'],
		"status" => 0
			);



			$data2 = array(
		"username" => $data['user']['username']
			);


			$data3 = array(
		"username" => $data['user']['username'],
		"password" => $data['user']['password'],
		"email" => $data['user']['email'],
		"role" => 2
			);
				
			print_r($data1);print_r($data2);print_r($data3);
			$this->register->inputCalonDealer($data1);
			$this->register->inputKualifikasi($data2);
			$this->register->inputUser($data3);
			$this->register->deleteDaftar($data['user']['token']);
			?>
<script language="javascript" type="text/javascript">window.alert("Silahkan login dengan username dan password Anda")</script>
			<?php
			$this->load->view('login');

		}
	}


}
?>