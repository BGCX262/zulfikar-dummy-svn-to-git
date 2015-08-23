<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author Mujadid Muda
 */
class login extends CI_Controller {
    //put your code here
    public function logout(){
        $this->session->sess_destroy();
        ?>
        <script language="javascript" type="text/javascript">window.alert("Anda sudah Log Out")</script>
        <?php
        $this->load->view('login');
	}
	public function browse_katalog(){
	$this->load->model("ulp_model");
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
		$data['pencarian'] = array(
			"merek" => $merek,
			"jenis" => $jenis,
			"model" => $model,
			"tipe" => $tipe,
			"transmisi" => $transmisi,
			"cc" => $cc
		);
		$this->load->view("browse", $data);
	}
	public function hasilCari(){
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
		$this->load->view('hasilcari', $data);
	}
	public function detail_katalog(){
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
			$this->load->view('detail_katalog', $data);
	}
}
?>
