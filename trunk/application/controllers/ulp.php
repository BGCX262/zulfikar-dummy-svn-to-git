<?php
class ulp extends CI_Controller{
	public function ulp_keterangan(){
		$NMA = $_POST['NMA'];
		$thn = $_POST['thn'];
		//echo $status;
		$this->load->model('ulp_model');
		$data['keterangan'] = $this->ulp_model->cari_NMA($NMA, $thn);
		$this->load->view("ulp_keterangan", $data);
		//print_r($data['keterangan']);
	}
	
	public function ulp_browse3(){
		$this->load->model("ulp_model");
		$NMA = $_GET['NMA'];
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
		$username = $this->session->userdata('username');
		$data['ajuan']=$this->ulp_model->getAjuan($username);
		$data['pencarian'] = array(
			"NMA" => $NMA,
			"merek" => $merek,
			"jenis" => $jenis,
			"model" => $model,
			"tipe" => $tipe,
			"transmisi" => $transmisi,
			"cc" => $cc
		);
		$this->load->view("ulp_browse3", $data);
	}
public function ulp_hasilcari1(){
		$NMA = $_POST['NMA'];
		$this->load->model('ulp_model');
		$data['NMA']=$NMA;
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
		$this->load->view('ulp_hasilcari1', $data);
	}
public function ulp_formulirPR(){
		$id_tipe = $_GET['id_tipe'];
		$id_katalog = $_GET['id_katalog'];
		$NMA = $_GET['NMA'];
		$this->load->model('ulp_model');
		$data['NMA']=$NMA;
		$data['katalog_mobil'] = $this->ulp_model->cari_kt($id_katalog);
		$data['tipe_mobil'] = $this->ulp_model->cari_tp($id_tipe);
		$data['anggaran'] = $this->ulp_model->getNMA($NMA);
		$data['stokWarna'] = $this->ulp_model->getStokWarna($id_katalog);
		$data['warna'] = $this->ulp_model->getWarna($id_tipe);
		$data['daerah'] = $this->ulp_model->getIdDaerah($NMA);
		//print_r($data['warna']." ".$data['stokWarna']."<br>");
		$daerah = $data['daerah'];
		//print_r($daerah)
		$data['username'] = $this->session->userdata('username');
		$this->load->view("ulp_formulirPR", $data);
	}
	public function ulp_pr(){
		$pesanan=array();
		$jumlahPesanan=0;
		$i=0;
		foreach($_POST['banyakPesanan'] as $key=>$isi){
		$jumlahPesanan = $isi+$jumlahPesanan;
		$pesanan[$key] = $isi;
		$order [$i]['pesanan'] = $isi;
		$i++;
		}
		$i=0;
		foreach($_POST['warna'] as $key=>$value){
		$order [$i]['idWarna'] = $value;
		//print_r($order [$i]['id_stokWarna']);
		$i++;
		} 
		$tgl_maks_penawaran = $_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];
		$tgl_maks_pemenuhan = $_POST['thn1']."-".$_POST['bln1']."-".$_POST['tgl1'];
		$id_tipe = $_GET['id_tipe'];
		$id_katalog = $_GET['id_katalog'];
		$NMA = $_GET['NMA'];
		$tanggal = date("Y-m-d");
		$this->load->model("ulp_model");
		$data['katalog_mobil'] = $this->ulp_model->cari_kt($id_katalog);
		$data['anggaran'] = $this->ulp_model->getNMA($NMA);
		$anggaran = $data['anggaran'];
		$nilaiAnggaran = $anggaran[0]['nilai_ang'];
		$data['daerah'] = $this->ulp_model->getIdDaerah($NMA);
		$daerah = $data['daerah'];
		$idDaerah = ($daerah[0]['daerah']);
		$username = $this->session->userdata('username');
			$data= array (
				"id_PO"=>"",
				"tanggal"=> $tanggal,
				"dealer" => "",
				"nomor_ang"=> $NMA,
				"daerah"=> $idDaerah,
				"alamat"=> $_POST['alamat'],
				"OnTR"=> "",
				"jumlah_pesanan"=> $jumlahPesanan,
				"total_harga"=> "",
				"status_pesanan"=> "",
				"tgl_pemenuhan"=> $tgl_maks_pemenuhan,
				"username"=> $username,
				"tgl_terima_po"=>"",
				"tgl_PR"=>$tgl_maks_penawaran,
				"jumlah_penawaran"=>0
			);
		$this->ulp_model->inputPO($data);
		$data['getPO'] = $this->ulp_model->getPO($NMA);
		$idPO = $data['getPO'];
		$id_PO = ($idPO[0]['id_PO']);
		$i=0;
		while($i<count($order)){
		$jumlahKarakter = strlen($order[$i]['pesanan']);
		if ($jumlahKarakter>0){
		$data=array(
			"id_PO"=> $id_PO,
			"id_warna"=> $order[$i]['idWarna'],
			"jumlah_pesan"=> $order[$i]['pesanan']
		);
		$this->ulp_model->inputPesananPR($data);	
		}
		$i++;
		}
		$statusAnggaran = array(
               'status_ang' => 1
            );
        $data['id_katalog']= $id_katalog;
        $data['NMA']=$NMA;
        $data['tipe_mobil'] = $this->ulp_model->cari_tp($id_tipe);
       $merek = $data['tipe_mobil'][0]['merek'];
        $data['dealer']  = $this->ulp_model->cariDealer($merek);
        $dealer =  $data['dealer'];
        $i=0; while($i<count($dealer)){
		$data1=array(
			"id_po" => $id_PO,
			"username_dealer"=> $dealer[$i]['username'],
			"harga_penawaran"=>"",
			"pesan"=>""			
		);
		$this->ulp_model->inputPenawaran($data1);
        $i++;}
        $data['PR'] = $this->ulp_model->getPR($username);
		$this->ulp_model->updateAnggaran($statusAnggaran, $NMA);
		$this->load->view("ulp_pr", $data);
	}
	public function ulp_penawaran_dealer(){
		$id_tipe = $_GET['id_tipe'];
		$id_katalog = $_GET['id_katalog'];
		$data['id_katalog']=$id_katalog;
		$NMA = $_GET['NMA'];
		$this->load->model('ulp_model');
		$data['NMA']=$NMA;
		$data['katalog_mobil'] = $this->ulp_model->cari_kt($id_katalog);
		$data['tipe_mobil'] = $this->ulp_model->cari_tp($id_tipe);
		$data['anggaran'] = $this->ulp_model->getNMA($NMA);
		$data['stokWarna'] = $this->ulp_model->getStokWarna($id_katalog);
		$data['daerah'] = $this->ulp_model->getIdDaerah($NMA);
		$daerah = $data['daerah'][0]['daerah'];
		$data['username'] = $this->session->userdata('username');
		$id_PO = $_GET['id_PO'];
		$data['id_PO']=$id_PO;
		$data['penawaran'] = $this->ulp_model->getPenawaran($id_PO, $daerah, $id_katalog);
		$data['PR'] = $this->ulp_model->getPRdariPO($id_PO);
		$data['pesanan'] = $this->ulp_model->getWarnaDariPR($id_PO);
		$this->load->view("ulp_penawaran_dealer", $data);
	}

	public function ulp_formulirPO(){
		$id_tipe = $_GET['id_tipe'];
		$id_katalog = $_GET['id_katalog'];
		$NMA = $_GET['NMA'];
		$dealer = $_GET['dealer'];
		$id_PO= $_GET['id_PO'];
		//echo $id_PO;
		//die;
		$this->load->model('ulp_model');
		$data['dealer']= $dealer;
		$data['NMA']=$NMA;
		$data['id_PO']=$id_PO;
		$data['katalog_mobil'] = $this->ulp_model->cari_kt($id_katalog);
		$data['tipe_mobil'] = $this->ulp_model->cari_tp($id_tipe);
		$data['anggaran'] = $this->ulp_model->getNMA($NMA);
		$data['stokWarna'] = $this->ulp_model->getStokWarna($id_katalog);
		$data['warna'] = $this->ulp_model->getWarna($id_tipe);
		$data['daerah'] = $this->ulp_model->getIdDaerah($NMA);
		//print_r($data['warna']." ".$data['stokWarna']."<br>");
		$daerah = $data['daerah'][0]['daerah'];
		//print_r($daerah);
		$data['PR'] = $this->ulp_model->getPRdariPO($id_PO);
		$data['penawaran'] = $this->ulp_model->getPenawaran2($id_PO, $daerah, $id_katalog, $dealer);
		$data['ONTR'] = $this->ulp_model->getONTR($id_katalog, $daerah, $dealer);
		$this->load->view("ulp_formulirPO", $data);
	}
	public function ulp_formulirPO2(){
		$pesanan=array();
		$jumlahPesanan=0;
		$i=0;
		foreach($_POST['banyakPesanan'] as $key=>$isi){
		$jumlahPesanan = $isi+$jumlahPesanan;
		$pesanan[$key] = $isi;
		$order [$i]['pesanan'] = $isi;
		$i++;
		}
		$i=0;
		foreach($_POST['id_stokWarna'] as $key=>$value){
		$order [$i]['id_stokWarna'] = $value;
		//print_r($order [$i]['id_stokWarna']);
		$i++;
		}
		
		foreach($_POST['stok'] as $key=>$value){
			if($pesanan[$key]>$value){
				$status = "Pre Order";
				break;
			}else{
				$status= "Non Pre Order";
			}
		}
             //echo($order[0]['warna']." ".$order[0]['pesanan'].'<br/>');
		 
		/*if ($status=="Pre Order"){
			$tanggalPemenuhan = date ("Y-m-d", strtotime('+97 day'));
		}else{
			$tanggalPemenuhan = date ("Y-m-d", strtotime('+17 day'));
		}*/
		$tgl_maks_pemenuhan = $_POST['thn']."-".$_POST['bln']."-".$_POST['tgl'];
		$id_tipe = $_GET['id_tipe'];
		$id_katalog = $_GET['id_katalog'];
		$dealer = $_GET ['dealer'];
		//echo $dealer;
		$NMA = $_GET['NMA'];
		$id_PO=$_GET['id_PO'];
		$data['id_PO']=$id_PO;
		$id_katalog = $_GET['id_katalog'];
		$this->load->model('ulp_model');
		$data['katalog_mobil'] = $this->ulp_model->cari_kt($id_katalog);
		$data['tipe_mobil'] = $this->ulp_model->cari_tp($id_tipe);
		$data['jumlahPesanan']= $jumlahPesanan;
		$data['order'] = $order;
		//print_r($data['order']);
		$data['dealer'] = $dealer;
		$data['NMA'] = $NMA;
		$data['status'] = $status;
		$data['tanggalPemenuhan'] = $tgl_maks_pemenuhan;
		$data['daerah'] = $this->ulp_model->getIdDaerah($NMA);
		$daerah = $data['daerah'][0]['daerah'];
		$data['PR'] = $this->ulp_model->getPRdariPO($id_PO);
		/*$data= array (
				"tgl_pemenuhan" => $tgl_maks_pemenuhan
			);
		$this->ulp_model->updatePO($data, $id_PO);*/
		$data['penawaran'] = $this->ulp_model->getPenawaran2($id_PO, $daerah, $id_katalog, $dealer);
		//print_r ($data['ONTR']);
		$this->load->view("ulp_formulirPO2", $data);
	}
	public function ulp_responPO(){
		$i=0;
		foreach($_POST['id_stokWarna'] as $key=>$value){
		$order [$i]['id_stokWarna'] = $value;
		//echo $order[$i]['id_stokWarna']."<br>";
		$i++;
		}
		$i=0;
		foreach($_POST['pesanan'] as $key=>$value){
		$order [$i]['pesanan'] = $value;
		//echo $order[$i]['pesanan']."<br>";
		$i++;
		}
		$id_tipe = $_GET['id_tipe'];
		$id_katalog = $_GET['id_katalog'];
		$NMA = $_GET['NMA'];
		$dealer = $_GET ['dealer'];
		$id_PO=$_GET['id_PO'];
		$totalHarga = $_POST['totalHarga'];
		$tgl_pemenuhan = $_POST['tgl_pemenuhan'];
		$this->load->model("ulp_model");
		$data['katalog_mobil'] = $this->ulp_model->cari_kt($id_katalog);
		$data['tipe_mobil'] = $this->ulp_model->cari_tp($id_tipe);
		$data['anggaran'] = $this->ulp_model->getNMA($NMA);
		$anggaran = $data['anggaran'];
		$nilaiAnggaran = $anggaran[0]['nilai_ang'];
		$data['daerah'] = $this->ulp_model->getIdDaerah($NMA);
		$daerah = $data['daerah'];
		$daerah = $daerah[0]['daerah'];
		$data['PR'] = $this->ulp_model->getPRdariPO($id_PO);
		$data['penawaran'] = $this->ulp_model->getPenawaran2($id_PO, $daerah, $id_katalog, $dealer);
		$harga_penawaran = $data['penawaran'][0]['harga_penawaran'];
		$username = $this->session->userdata('username');
		if ($nilaiAnggaran<$totalHarga){
			$id_tipe = $_GET['id_tipe'];
		$id_katalog = $_GET['id_katalog'];
			$NMA = $_GET['NMA'];
			$this->load->model("ulp_model");
		$data['katalog_mobil'] = $this->ulp_model->cari_kt($id_katalog);
		$data['tipe_mobil'] = $this->ulp_model->cari_tp($id_tipe);
		$data['anggaran'] = $this->ulp_model->getNMA($NMA);
		$this->load->view("ulp_responGagal", $data);
		}else{
			$data= array (
				"dealer" => $dealer,
				"daerah"=> $daerah,
				"OnTR"=> $harga_penawaran,
				"jumlah_pesanan"=> $_POST['jumlahPesanan'],
				"total_harga"=> $_POST['totalHarga'],
				"status_pesanan"=> $_POST['statusPesanan'],
				"tgl_pemenuhan"=> $tgl_pemenuhan
			);
		$this->ulp_model->updatePO($data, $id_PO);
		$i=0;
		while($i<count($order)){
		$jumlahKarakter = strlen($order[$i]['pesanan']);
		if ($jumlahKarakter>0){
		$data=array(
			"id_PO"=> $id_PO,
			"id_stok_warna"=> $order[$i]['id_stokWarna'],
			"jumlah_pesan"=> $order[$i]['pesanan']
		);
		$this->ulp_model->inputPesanan($data);	
		}
		$i++;
		}
		$statusAnggaran = array(
               'status_ang' => 1
            );
		$this->ulp_model->updateAnggaran($statusAnggaran, $NMA);
		$this->load->view("ulp_responPO", $data);
		}
	}
	public function ulp_po(){
	$this->load->model("ulp_model");
		$data['purchaseOrder'] = $this->ulp_model->getPurchaseOrder($this->session->userdata('username'));
		//print_r($data['purchaseOrder']);
		//die;
		$i=0;
		while($i<count($data['purchaseOrder'])){
			$coba= $this->ulp_model->getTipeDariPOInUlp($data['purchaseOrder'][$i]['id_PO']);
			if($coba != null){
				$merek[$i]['merek1'] = $coba[$i]['merek'];
			}
		$i++;
		}
		$data['tipeDariPOIn'] = $merek;
		$this->load->view("ulp_po",$data, $merek);
	}
	
	public function ulpPO_detail(){
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
		
		
		//$dealer = $data['PO1'];
		$data['stok']=$this->dealer_model->getStokKat($data['PO1'][0]['dealer']);
		$data['anggaran']=$this->dealer_model->getAnggaran($data['PO1'][0]['nomor_ang']);
		$data['daerah']=$this->dealer_model->getDaerah($data['PO1'][0]['daerah']);
		//print_r($data['stok_warna']);
		
		$this->load->view("ulpPO_detail",$data);
	}
	
	public function ulp_penerimaan(){
		$this->load->model("ulp_model");
		$this->load->model("dealer_model");
		$i=0;
		foreach($_POST['stok_akhir'] as $key=>$value){
		$stok [$i]['stok_akhir'] = $value;
		$i++;
		}
		$i=0;
		foreach($_POST['warna'] as $key=>$value){
		$stok [$i]['id_warna'] = $value;
		$i++;
		}
		$id_PO=$_POST['id_PO'];
		$data['stok_akhir'] = $stok;
		$data['id_PO']  = $id_PO;
		$data['PO1']=$this->dealer_model->getPoId($id_PO);
		$data['pesanan']=$this->dealer_model->getPesanan($data['PO1'][0]['id_PO']);
		$data['stok_warna']=$this->dealer_model->getIdStok($data['pesanan'][0]['id_stok_warna']);
		$data['katalog_pesan']=$this->dealer_model->getKatalogPesan($data['stok_warna'][0]['id_katalog']);
		$data['purchaseOrder']=$this->ulp_model->getPurchaseOrder($this->session->userdata('username'));
		$this->load->view("ulp_penerimaan",$data);
	}
	
	public function updateStatus(){
		$this->load->model("ulp_model");
		$this->load->model("dealer_model");
		$id_PO=$_POST['id_PO'];
		$data1=array("status_dealer"=>"Telah diterima",
					 "tgl_terima_po"=>$_POST['tgl_terima_po']);
		$this->db->where('id_PO',$id_PO);
		$this->db->update('purchase_order',$data1);
		$data['PO2']=$this->ulp_model->getPOId($id_PO);
		$data['PO1']=$this->dealer_model->getPoId($id_PO);
		$data['pesanan']=$this->dealer_model->getPesanan($data['PO1'][0]['id_PO']);
		$data['stok_warna']=$this->dealer_model->getIdStok($data['pesanan'][0]['id_stok_warna']);
		$data['stok']=$this->dealer_model->getStok($data['PO1'][0]['dealer']);
		//mengurangi stok
		$i=0;
		foreach($_POST['stok_akhir'] as $key=>$value){
		$stok [$key]['stok_akhir'] = $value;
		$i++;
		}
		$i=0;
		foreach($_POST['id_warna'] as $key=>$value){
		$stok [$key]['id_warna'] = $value;
		$i++;
		}
		$i=0;
		while($i<count($stok)){
			$data[$i]=array(
						"stok"=>$stok[$i]['stok_akhir']				
			);
			for($a=0; $a<count($data['stok']);$a++){
				if($data['stok'][$a]['ID_warna']==$stok[$i]['id_warna']){
				$this->db->where('id_katalog', $data['stok'][$a]['id_katalog']);
				$this->db->where('id_warna', $stok[$i]['id_warna']);
				$this->db->update('warna_stok',$data[$i]);
				break;
				}
			}
		$i++;
		}
		redirect(base_url()."index.php/ulp/ulp_po");
	}
	public function ulp_tampilPR(){
		$this->load->model("ulp_model");
		$data['purchaseOrder'] = $this->ulp_model->getPurchaseOrder($this->session->userdata('username'));
		//print_r($data['purchaseOrder']);
		$PO = $data['purchaseOrder'];
		$i=0;
		while($i<count($PO)){
		$data['tipeDariPO'] = $this->ulp_model->getTipeDariPO2($PO[$i]['id_PO']);
		$i++;
		}
		$katalog = $data['tipeDariPO'];
		$i=0;
		while($i<count($katalog)){
		$data['katalogDariPO'] = $this->ulp_model->getKatalogDariPesanan($katalog[$i]['ID_tipe']);
		$i++;
		}
		$this->load->view("ulp_tampilPR",$data);
	}
	
}
?>