<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokumenkualifikasi extends CI_Controller {
	
	public function insertNewKualifikasi($username){
		$this->db->insert("kualifikasi", array("username", $username));	
	}
	
    public function submit($page) {
        if($page==1) {
            $this->load->view("submission1");
        }else if($page==2) {
            $this->load->view("submission2");
        }else if($page==3) {
            $this->load->view("submission3");
        }else if($page==4) {
            $this->load->view("submission4");
        }else if($page==5) {
            $this->load->view("submission5");
        }else {
            die("Halaman ".$page." tidak ada");
        }
    }

    public function process($page) {
        if($page==1) {
            $data=array(
                    'nama'=>$_POST['nama'],
                    'time_formed'=>$_POST['y']."/".$_POST['m']."/".$_POST['d'],
                    'website'=>$_POST['website'],
                    'merekmobil'=>$_POST['merekmobil'],
                    'bank'=>$_POST['bank'],
                    'acc_number'=>$_POST['acc_number'],
                    'acc_name'=>$_POST['acc_name'],
                    'of_addres'=>$_POST['of_addres'],
                    'of_poskode'=>$_POST['of_poskode'],
                    'of_city'=>$_POST['of_city'],
                    'of_prov'=>$_POST['of_prov'],
                    'of_phone'=>$_POST['of_phone'],
                    'of_phone2'=>$_POST['of_phone2'],
                    'of_fax'=>$_POST['of_fax'],
                    'of_fax2'=>$_POST['of_fax2'],
                    'of2_addres'=>$_POST['of2_addres'],
                    'of2_poskode'=>$_POST['of2_poskode'],
                    'of2_city'=>$_POST['of2_city'],
                    'of2_prov'=>$_POST['of2_prov'],
                    'of2_phone'=>$_POST['of2_phone'],
                    'of2_phone2'=>$_POST['of2_phone2'],
                    'of2_fax'=>$_POST['of2_fax'],
                    'of2_fax2'=>$_POST['of2_fax2']
            );
            $this->db->where("username",$this->session->userdata('username'));
            $this->db->update('dealer',$data);
            redirect(base_url()."index.php/dokumenkualifikasi/submit/2");
        }else if($page==2) {
            $data=array(
                    'dir_nama'=>$_POST['dir_nama'],
                    'dir_noktp'=>$_POST['dir_noktp'],
                    'dir_hp'=>$_POST['dir_hp'],
                    'dir_email'=>$_POST['dir_email'],
                    'cp_nama'=>$_POST['cp_nama'],
                    'cp_noktp'=>$_POST['cp_noktp'],
                    'cp_hp'=>$_POST['cp_hp'],
                    'cp_email'=>$_POST['cp_email'],
                    'auth_atpm'=>$_POST['auth_atpm'],
                    'auth_date'=>$_POST['y']."/".$_POST['m']."/".$_POST['d']
            );
            $this->db->where('username', $this->session->userdata('username'));
            $this->db->update('dealer',$data);
            redirect(base_url()."index.php/dokumenkualifikasi/submit/3");
        }else if($page==3) {
            $data=array(
                    'ap_notaris'=>$_POST['ap_notaris'],
                    'ap_number'=>$_POST['ap_number'],
                    'ap_date'=>$_POST['y_ap_date']."/".$_POST['m_ap_date']."/".$_POST['d_ap_date'],
                    'ap_menhukam_no'=>$_POST['ap_menhukam_no'],
                    'ap_menhukam_date'=>$_POST['y_ap_menhukam_date']."/".$_POST['m_ap_menhukam_date']."/".$_POST['d_ap_menhukam_date'],
                    'an_notaris'=>$_POST['an_notaris'],
                    'an_nomor'=>$_POST['an_nomor'],
                    'an_date'=>$_POST['y_an_date']."/".$_POST['m_an_date']."/".$_POST['d_an_date'],
                    'an_menhukam_no'=>$_POST['an_menhukam_no'],
                    'an_menhukam_date'=>$_POST['y_an_menhukam_date']."/".$_POST['m_an_menhukam_date']."/".$_POST['d_an_menhukam_date'],
                    'siup_nomor'=>$_POST['siup_nomor'],
                    'siup_date'=>$_POST['y_siup_date']."/".$_POST['m_siup_date']."/".$_POST['d_siup_date'],
                    'tdp_nomor'=>$_POST['tdp_nomor'],
                    'tdp_date'=>$_POST['y_tdp_date']."/".$_POST['m_tdp_date']."/".$_POST['d_tdp_date'],
                    'situ_nomor'=>$_POST['situ_nomor'],
                    'situ_date'=>$_POST['y_situ_date']."/".$_POST['m_situ_date']."/".$_POST['d_situ_date']
            );
            $this->db->where('username', $this->session->userdata('username'));
            $this->db->update('dealer',$data);
            redirect(base_url()."index.php/dokumenkualifikasi/submit/4");
        }else if($page==4) {
            $data=array(
                    'npwp_no'=>$_POST['npwp_no'],
                    'npwp_date'=>$_POST['y_npwp_date']."/".$_POST['m_npwp_date']."/".$_POST['d_npwp_date'],
                    'pkp_no'=>$_POST['pkp_no'],
                    'pkp_date'=>$_POST['y_pkp_date']."/".$_POST['m_pkp_date']."/".$_POST['d_pkp_date'],
                    'spt_date'=>$_POST['y_spt_date']."/".$_POST['m_spt_date']."/".$_POST['d_spt_date'],
                    'spt_datesetoran'=>$_POST['y_spt_datesetoran']."/".$_POST['m_spt_datesetoran']."/".$_POST['d_spt_datesetoran'],
                    'spt_nosetoran'=>$_POST['spt_nosetoran'],

                    'exp_nama1'=>$_POST['exp_nama1'],
                    'exp_own1'=>$_POST['exp_own1'],
                    'exp_value1'=>$_POST['exp_value1'],
                    'exp_date1'=>$_POST['y_exp_date1']."/".$_POST['m_exp_date1']."/".$_POST['d_exp_date1'],

                    'exp_nama2'=>$_POST['exp_nama2'],
                    'exp_own2'=>$_POST['exp_own2'],
                    'exp_value2'=>$_POST['exp_value2'],
                    'exp_date2'=>$_POST['y_exp_date2']."/".$_POST['m_exp_date2']."/".$_POST['d_exp_date2'],

                    'exp_nama3'=>$_POST['exp_nama3'],
                    'exp_own3'=>$_POST['exp_own3'],
                    'exp_value3'=>$_POST['exp_value3'],
                    'exp_date3'=>$_POST['y_exp_date3']."/".$_POST['m_exp_date3']."/".$_POST['d_exp_date3'],

                    'exp_nama4'=>$_POST['exp_nama4'],
                    'exp_own4'=>$_POST['exp_own4'],
                    'exp_value4'=>$_POST['exp_value4'],
                    'exp_date4'=>$_POST['y_exp_date4']."/".$_POST['m_exp_date4']."/".$_POST['d_exp_date4'],

                    'exp_nama5'=>$_POST['exp_nama5'],
                    'exp_own5'=>$_POST['exp_own5'],
                    'exp_value5'=>$_POST['exp_value5'],
                    'exp_date5'=>$_POST['y_exp_date5']."/".$_POST['m_exp_date5']."/".$_POST['d_exp_date5'],

                    'status' => 1
            );
            $this->db->where('username', $this->session->userdata('username'));
            $this->db->update('dealer',$data);
            redirect(base_url()."index.php/dokumenkualifikasi/submit/5");
        }else if($page==5){
            $this->session->set_userdata("system_message", "Terima kasih telah submit dokumen kualifikasi. Kami akan segera melakukan evaluasi");
            redirect(base_url()."index.php/common/home");
        }
        else {
            die("Halaman ".$page." tidak ada");
        }
    }
    
    public function edit_submit($page){
        $this->load->model("dealer");
        $data=$this->dealer->getAllDocument($this->session->userdata('username'));
    	if($page==1) {
            $this->load->view("edit1", $data);
        }else if($page==2) {
            $this->load->view("edit2", $data);
        }else if($page==3) {
            $this->load->view("edit3", $data);
        }else if($page==4) {
            $this->load->view("edit4", $data);
        }else if($page==5) {
            $this->load->view("edit5", $data);
        }else {
            die("Halaman ".$page." tidak ada");
        }
    }
    
    public function edit_process($page){
            if($page==1) {
            $data=array(
                    'nama'=>$_POST['nama'],
                    'time_formed'=>$_POST['y']."/".$_POST['m']."/".$_POST['d'],
                    'website'=>$_POST['website'],
                    'merekmobil'=>$_POST['merekmobil'],
                    'bank'=>$_POST['bank'],
                    'acc_number'=>$_POST['acc_number'],
                    'acc_name'=>$_POST['acc_name'],
                    'of_addres'=>$_POST['of_addres'],
                    'of_poskode'=>$_POST['of_poskode'],
                    'of_city'=>$_POST['of_city'],
                    'of_prov'=>$_POST['of_prov'],
                    'of_phone'=>$_POST['of_phone'],
                    'of_phone2'=>$_POST['of_phone2'],
                    'of_fax'=>$_POST['of_fax'],
                    'of_fax2'=>$_POST['of_fax2'],
                    'of2_addres'=>$_POST['of2_addres'],
                    'of2_poskode'=>$_POST['of2_poskode'],
                    'of2_city'=>$_POST['of2_city'],
                    'of2_prov'=>$_POST['of2_prov'],
                    'of2_phone'=>$_POST['of2_phone'],
                    'of2_phone2'=>$_POST['of2_phone2'],
                    'of2_fax'=>$_POST['of2_fax'],
                    'of2_fax2'=>$_POST['of2_fax2']
            );
            $this->db->where("username",$this->session->userdata('username'));
            $this->db->update('dealer',$data);
            redirect(base_url()."index.php/dokumenkualifikasi/edit_submit/2");
        }else if($page==2) {
            $data=array(
                    'dir_nama'=>$_POST['dir_nama'],
                    'dir_noktp'=>$_POST['dir_noktp'],
                    'dir_hp'=>$_POST['dir_hp'],
                    'dir_email'=>$_POST['dir_email'],
                    'cp_nama'=>$_POST['cp_nama'],
                    'cp_noktp'=>$_POST['cp_noktp'],
                    'cp_hp'=>$_POST['cp_hp'],
                    'cp_email'=>$_POST['cp_email'],
                    'auth_atpm'=>$_POST['auth_atpm'],
                    'auth_date'=>$_POST['y']."/".$_POST['m']."/".$_POST['d']
            );
            $this->db->where('username', $this->session->userdata('username'));
            $this->db->update('dealer',$data);
            redirect(base_url()."index.php/dokumenkualifikasi/edit_submit/3");
        }else if($page==3) {
            $data=array(
                    'ap_notaris'=>$_POST['ap_notaris'],
                    'ap_number'=>$_POST['ap_number'],
                    'ap_date'=>$_POST['y_ap_date']."/".$_POST['m_ap_date']."/".$_POST['d_ap_date'],
                    'ap_menhukam_no'=>$_POST['ap_menhukam_no'],
                    'ap_menhukam_date'=>$_POST['y_ap_menhukam_date']."/".$_POST['m_ap_menhukam_date']."/".$_POST['d_ap_menhukam_date'],
                    'an_notaris'=>$_POST['an_notaris'],
                    'an_nomor'=>$_POST['an_nomor'],
                    'an_date'=>$_POST['y_an_date']."/".$_POST['m_an_date']."/".$_POST['d_an_date'],
                    'an_menhukam_no'=>$_POST['an_menhukam_no'],
                    'an_menhukam_date'=>$_POST['y_an_menhukam_date']."/".$_POST['m_an_menhukam_date']."/".$_POST['d_an_menhukam_date'],
                    'siup_nomor'=>$_POST['siup_nomor'],
                    'siup_date'=>$_POST['y_siup_date']."/".$_POST['m_siup_date']."/".$_POST['d_siup_date'],
                    'tdp_nomor'=>$_POST['tdp_nomor'],
                    'tdp_date'=>$_POST['y_tdp_date']."/".$_POST['m_tdp_date']."/".$_POST['d_tdp_date'],
                    'situ_nomor'=>$_POST['situ_nomor'],
                    'situ_date'=>$_POST['y_situ_date']."/".$_POST['m_situ_date']."/".$_POST['d_situ_date']
            );
            $this->db->where('username', $this->session->userdata('username'));
            $this->db->update('dealer',$data);
            redirect(base_url()."index.php/dokumenkualifikasi/edit_submit/4");
        }else if($page==4) {
            $data=array(
                    'npwp_no'=>$_POST['npwp_no'],
                    'npwp_date'=>$_POST['y_npwp_date']."/".$_POST['m_npwp_date']."/".$_POST['d_npwp_date'],
                    'pkp_no'=>$_POST['pkp_no'],
                    'pkp_date'=>$_POST['y_pkp_date']."/".$_POST['m_pkp_date']."/".$_POST['d_pkp_date'],
                    'spt_date'=>$_POST['y_spt_date']."/".$_POST['m_spt_date']."/".$_POST['d_spt_date'],
                    'spt_datesetoran'=>$_POST['y_spt_datesetoran']."/".$_POST['m_spt_datesetoran']."/".$_POST['d_spt_datesetoran'],
                    'spt_nosetoran'=>$_POST['spt_nosetoran'],

                    'exp_nama1'=>$_POST['exp_nama1'],
                    'exp_own1'=>$_POST['exp_own1'],
                    'exp_value1'=>$_POST['exp_value1'],
                    'exp_date1'=>$_POST['y_exp_date1']."/".$_POST['m_exp_date1']."/".$_POST['d_exp_date1'],

                    'exp_nama2'=>$_POST['exp_nama2'],
                    'exp_own2'=>$_POST['exp_own2'],
                    'exp_value2'=>$_POST['exp_value2'],
                    'exp_date2'=>$_POST['y_exp_date2']."/".$_POST['m_exp_date2']."/".$_POST['d_exp_date2'],

                    'exp_nama3'=>$_POST['exp_nama3'],
                    'exp_own3'=>$_POST['exp_own3'],
                    'exp_value3'=>$_POST['exp_value3'],
                    'exp_date3'=>$_POST['y_exp_date3']."/".$_POST['m_exp_date3']."/".$_POST['d_exp_date3'],

                    'exp_nama4'=>$_POST['exp_nama4'],
                    'exp_own4'=>$_POST['exp_own4'],
                    'exp_value4'=>$_POST['exp_value4'],
                    'exp_date4'=>$_POST['y_exp_date4']."/".$_POST['m_exp_date4']."/".$_POST['d_exp_date4'],

                    'exp_nama5'=>$_POST['exp_nama5'],
                    'exp_own5'=>$_POST['exp_own5'],
                    'exp_value5'=>$_POST['exp_value5'],
                    'exp_date5'=>$_POST['y_exp_date5']."/".$_POST['m_exp_date5']."/".$_POST['d_exp_date5'],

                    'status' => 3
            );
            $this->db->where('username', $this->session->userdata('username'));
            $this->db->update('dealer',$data);
            redirect(base_url()."index.php/dokumenkualifikasi/edit_submit/5");
        }else if($page==5){
            $this->session->set_userdata("system_message", "Terima kasih telah mengubah dokumen kualifikasi. Kami akan segera melakukan evaluasi");
            redirect(base_url()."index.php/common/home");
        }
        else {
            die("Halaman ".$page." tidak ada");
        }
    }

}
