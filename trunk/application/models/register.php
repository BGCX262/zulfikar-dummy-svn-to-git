<?php

class register extends CI_Model{

	public function get_random_password($chars_min=15, $chars_max=20, $use_upper_case=false, $include_numbers=false, $include_special_chars=false) {
		$length = rand($chars_min, $chars_max);
		$selection = 'aeuoyibcdfghjklmnpqrstvwxz';
		if($include_numbers) {
			$selection .= "1234567890";
		}
		if($include_special_chars) {
			$selection .= "!@\"#$%&[]{}?|";
		}

		$token = "";
		for($i=0; $i<$length; $i++) {
			$current_letter = $use_upper_case ? (rand(0,1) ? strtoupper($selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))];
			$token .=  $current_letter;
		}
		return $token;
	}

	public function inputDaftar($data){
		$this->db->insert('daftar', $data);
	}

	public function kirimToken($mailto, $token) {
		$config['protocol']    = 'smtp';
		$config['smtp_host']    = 'ssl://smtp.gmail.com';
		$config['smtp_port']    = '465';
		$config['smtp_timeout'] = '50';
		$config['smtp_user']    = 'amaliadwiputri@gmail.com';
		$config['smtp_pass']    = 'ahmadfadil';
		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
		$config['mailtype'] = 'html'; // or html
		$config['validation'] = TRUE; // bool whether to validate email or not
		$this->load->library('email', $config);

		$this->email->from('amaliadwiputri@gmail.com','Admin Sistem E-Purchasing Mobil Jawa Barat');
		$this->email->to($mailto);
		$this->email->subject('Verifikasi User Sistem E-Purchasing Mobil LPSE Jawa Barat');
		$isipesan=" Terima kasih telah melakukan registrasi pada Sistem E-Purchasing Mobil LPSE Jawa Barat.\n
        Untuk dapat mengaktifkan akun anda, silahkan klik link <a href='".base_url().
        	"index.php/daftar/konfirmasi?token=".$token."'> ini </a> <br> <br>".
        "Dengan meng-klik link tersebut, anda akan terdaftar sebagai calon dealer dan dapat melakukan login dengan username dan password yang telah anda daftarkan.";
		$this->email->message($isipesan);
		$this->email->send();
		echo $this->email->print_debugger();
		//redirect(base_url());
	}

	public function getDaftar($token){
		$this->db->where('token', $token);
		$query = $this->db->get('daftar')->result_array();
		return $query[0];
	}

	public function inputCalonDealer($data){
		$this->db->insert('dealer', $data);
	}

	public function inputKualifikasi($data){
		$this->db->insert('kualifikasi', $data);
	}

	public function inputUser($data){
		$this->db->insert('user', $data);
	}

	public function deleteDaftar($token){
		$this->db->where('token', $token);
		$this->db->delete('daftar');
	}
}
?>