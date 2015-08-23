<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>E-Purchasing Pemerintah Jabar </title>
        <link rel="stylesheet" href="<?php echo base_url()?>css/screen.css" type="text/css" media="screen" title="default" />
        <!--[if IE]>
        <link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
        <![endif]-->

        <!--  jquery core -->
        <script src="<?php echo base_url()?>js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

        <!--  checkbox styling script -->
        <script src="<?php echo base_url()?>js/jquery/ui.core.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>js/jquery/ui.checkbox.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>js/jquery/jquery.bind.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function(){
                $('input').checkBox();
                $('#toggle-all').click(function(){
                    $('#toggle-all').toggleClass('toggle-checked');
                    $('#mainform input[type=checkbox]').checkBox('toggle');
                    return false;
                });
            });
        </script>

        <![if !IE 7]>

        <!--  styled select box script version 1 -->
        <script src="js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.styledselect').selectbox({ inputClass: "selectbox_styled" });
            });
        </script>


        <![endif]>

        <!--  styled select box script version 2 -->
        <script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
                $('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
            });
        </script>

        <!--  styled select box script version 3 -->
        <script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
            });
        </script>

        <!--  styled file upload script -->
        <script src="js/jquery/jquery.filestyle.js" type="text/javascript"></script>
        <script type="text/javascript" charset="utf-8">
            $(function() {
                $("input.file_1").filestyle({
                    image: "images/forms/choose-file.gif",
                    imageheight : 21,
                    imagewidth : 78,
                    width : 310
                });
            });
        </script>

        <!-- Custom jquery scripts -->
        <script src="js/jquery/custom_jquery.js" type="text/javascript"></script>

        <!-- Tooltips -->
        <script src="js/jquery/jquery.tooltip.js" type="text/javascript"></script>
        <script src="js/jquery/jquery.dimensions.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function() {
                $('a.info-tooltip ').tooltip({
                    track: true,
                    delay: 0,
                    fixPNG: true,
                    showURL: false,
                    showBody: " - ",
                    top: -35,
                    left: 5
                });
            });
        </script>


        <!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
        <script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(document).pngFix( );
            });
        </script>
        <style type="text/css">
<!--
.style2 {color: #000000}
.style3 {font-family: Georgia, "Times New Roman", Times, serif}
.style4 {color: #000000; font-family: Georgia, "Times New Roman", Times, serif; }
.style5 {font-weight: bold}
-->
        </style>
</head>
    <body>
        <div class="clear">&nbsp;</div>

        <!--  start nav-outer-repeat................................................................................................. START -->
        <div class="nav-outer-repeat">
            <!--  start nav-outer -->
            <div class="nav-outer">

                <!-- start nav-right -->
                <div id="nav-right">

                    <div class="nav-divider">&nbsp;</div>
                    <div class="showhide-account">
                        <a href="#"><img src="<?php echo base_url();?>images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></a></div>
                    <div class="nav-divider">&nbsp;</div>
                    <a href="<?php echo base_url()?>index.php/login/logout" id="logout"><img src="<?php echo base_url();?>images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
                    <div class="clear">&nbsp;</div>

                    <!--  start account-content -->
                    <div class="account-content">
                        <div class="account-drop-inner">
                            <a href="" id="acc-settings">Settings</a>
                            <div class="clear">&nbsp;</div>
                            <div class="acc-line">&nbsp;</div>
                            <a href="" id="acc-details">Personal details </a>
                            <div class="clear">&nbsp;</div>
                            <div class="acc-line">&nbsp;</div>
                            <a href="" id="acc-project">Project details</a>
                            <div class="clear">&nbsp;</div>
                            <div class="acc-line">&nbsp;</div>
                            <a href="" id="acc-inbox">Inbox</a>
                            <div class="clear">&nbsp;</div>
                            <div class="acc-line">&nbsp;</div>
                            <a href="" id="acc-stats">Statistics</a>                        </div>
                    </div>
                    <!--  end account-content -->
                </div>
                <!-- end nav-right -->


                <!--  start nav -->
                <div class="nav">

                    <?php 
					if($this->session->userdata('role')==1) {
                        $this->load->view('menuadmin.php');
                    }
					else if($this->session->userdata('role')==2) {
                        $this->load->view('menucalondealer.php');
                    }else if ($this->session->userdata('role')==3) {
                        $this->load->view('menudealer.php');
                    }else if($this->session->userdata('role')==4) {
                        $this->load->view('menuadminulp.php');
                    }else if($this->session->userdata('role')==5) {
                        $this->load->view('menuatpm.php');
                    }else if($this->session->userdata('role')==6) {
                        $this->load->view('menuppkd.php');
                    }else {
                        redirect(base_url());
                    }

                    ?>
                    <div class="clear"></div>
                </div>
                <!--  start nav -->
            </div>
            <div class="clear"></div>
            <!--  start nav-outer -->
        </div>
        <!--  start nav-outer-repeat................................................... END -->

        <div class="clear"></div>

        <!-- start content-outer ........................................................................................................................START -->
        <div id="content-outer">
            <!-- start content -->
          <div id="content">

                <div id="content-header">                </div>
                <!--  start page-heading -->
                <div id="page-heading">
                    <h1>Selamat Datang, <?php echo $this->session->userdata("username");?></h1>
                </div>
                <!-- end page-heading -->

        <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
                    <tr>
                        <th rowspan="3" class="sized"><img src="<?php echo base_url();?>images/shared/side_shadowleft.jpg" alt="" width="20" height="300" /></th>
                        <th class="style2 topleft"></th>
                        <td id="tbl-border-top">&nbsp;</td>
                        <th class="topright"></th>
                        <th rowspan="3" class="sized"><img src="<?php echo base_url();?>images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
                    </tr>
                    <tr>
                        <td id="tbl-border-left"></td>
                        <td>
                            <!--  start content-table-inner ...................................................................... START -->
                            <div id="content-table-inner">

                                <!--  start table-content  -->
								<div id="table-content">
                                  <div align="center"></div>
                                  <div align="center"></div>
                                  <div align="center"></div>
                                  <div align="center"></div>
                                  <form action="<?php echo base_url()."index.php/common/inputStok"?>" method="get" class="style1">
                                    <center>
                                      <table width="365" border="0">
                                        
                                        <tr>
                                          <td><div align="left" class="style2"><strong>Merek Mobil </strong></div></td>
                                          <td><div align="left" class="style5"><span class="style2">: 
                                              <?php echo $hasil[0]['merek'];?>
                                          </span></div></td>
                                        </tr>
                                        <tr>
                                          <td><div align="left" class="style3 style2"><strong>Jenis Mobil </strong></div></td>
                                          <td><div align="left" class="style2"><strong>:
                                            <?php echo $hasil [0] ['jenis'];?>
                                          </strong></div></td>
                                        </tr>
                                        <tr>
                                          <td><div align="left" class="style3 style2"><strong>Model Mobil</strong></div></td>
                                          <td><div align="left" class="style2"><strong>: 
                                            <?php echo $hasil [0] ['model'];?>
                                          </strong></div></td>
                                        </tr>
                                        <tr>
                                          <td><div align="left" class="style3 style2"><strong>Tipe Mobil </strong></div></td>
                                          <td><div align="left" class="style2"><strong>: 
                                            <?php echo $hasil1 [0] ['tipe'];?>
                                          </strong></div></td>
                                        </tr>
                                        <tr>
                                          <td><div align="left" class="style3 style2"><strong>Transmisi</strong></div></td>
                                          <td><div align="left" class="style2"><strong>: 
                                            <?php echo $hasil1 [0] ['transmisi'];?>
                                          </strong></div></td>
                                        </tr>
                                        <tr>
                                          <td><div align="left" class="style3 style2"><strong>Isi Silinder (cc)</strong></div></td>
                                          <td><div align="left" class="style2"><strong>: 
                                            <?php echo $hasil1 [0] ['cc'];?>
                                          </strong></div></td>
                                        </tr>
                                        <tr>
                                          <td><div align="left" class="style3 style2"><strong>Harga Off the Road Jakarta </strong></div></td>
                                          <td><div align="left" class="style2"><strong>:Rp
                                            <?php echo $hasil1 [0] ['OfTR'];?>
                                          ,- </strong></div></td>
                                        </tr>
										<td align="center"><p class="style3">&nbsp;</p>
										  <p align="right" class="style3"><a href="<?=base_url()."index.php/common/ulp_formulir?id_tipe=".$hasil1[0]['id_tipe']."&id_katalog=".$hasil1[0]['id']?>"><strong>Pilih mobil ini</strong></a></p></td>
										
										<form action="<?php echo base_url();?>index.php/common/ulp_formulir" method="post">
                                    	</td>
                                    	<input type="hidden" name="id_tipe" value="<?php echo $hasil [0] ['id'];?>"></input>
                                    	<input type="hidden" name="id_katalog" value="<?php echo $hasil1 [0] ['id'];?>"></input>
                                    	</td>
              </table>
                                      <p>-------------------------------------------------------------------------------------------</p>
									  <p>-------------------------------------------------------------------------------------------</p>
									  <h1><strong>Spesifikasi mobil</strong></h1><br></br>
									  <img src="<?php echo base_url();?>uploads/<?=$hasil[0]['spec'];?>" width="400" height="1000"></img>
									  <p class="style3">-------------------------------------------------------------------------------------------</p>
									  <br></br>
									  <h1><strong>Interior mobil</strong></h1><br>
									  <span class="style3"></br>
									  <?php $i=0;
										while ($i<count($int)){
										?>
                                    	<img src="<?php echo base_url();?>uploads/<?=$int[$i]['int_doc'];?>" width="150" height="100"></img><br>
                                    	</br>
                                    	<?php echo $int[$i]['int']."<br>";?> <br>
                                    	</br>
                                    	<?php $i++;
                                   		}
										?>
									  </span>
									  <p class="style4">-------------------------------------------------------------------------------------------</p>
										<span class="style2"><br>
										</br>
									    </span>
									<h1 class="style2">Eksterior mobil</h1>
										<span class="style2"><br>
									    <span class="style3"></br>
									    <?php $e=0;
										while ($e<count($eks)){
										?>
										<img src="<?php echo base_url();?>uploads/<?=$eks[$e]['eks_doc'];?>" width="150" height="100" ><br>
										</br> 
										,
                                   		<?php echo $eks[$e]['eks']."<br>";?><br>
                                   		</br>
										<?php 
                                    $e++;
                                    }
                                    ?>
								      </span></span>
							  <div class="clear style2"></div>
          </div>
                            <span class="style2">
                            <!--  end content-table-inner ............................................END  -->                        
                            </td>
                            </span>
                            <td class="style2" id="tbl-border-right"></td>
                            <span class="style2">
                            </tr>
                            </span>
                            <tr>
                        <th class="sized bottomleft style2"></th>
                        <td class="style2" id="tbl-border-bottom">&nbsp;</td>
                        <th class="sized bottomright style2"></th>
                    </tr>
                            <span class="style2">
                            </table>
                            </span>
                            <div class="clear style2">&nbsp;</div>
            </div>
            <span class="style2">
            <!--  end content -->
            </span>
            <div class="clear style2">&nbsp;</div>
        </div>
        <span class="style2">
        <!--  end content-outer........................................................END -->
        </span>
        <div class="clear style2">&nbsp;</div>

        <span class="style2">
        <!-- start footer -->
        </span>
        <div id="footer">
            <span class="style2">
            <!-- <div id="footer-pad">&nbsp;</div> -->
            <!--  start footer-left -->
            </span>
            <div class="style2" id="footer-left">            </div>
            <span class="style2">
            <!--  end footer-left -->
            </span>
            <div class="clear style2">&nbsp;</div>
        </div>
        <!-- end footer -->
    </body>
</html>
								
								
								
								
								
								
								
                              <!--  <div id="table-content">
                                    <h1 align="center">Perencanaan Pengadaan Mobil </h1>
                                    <p align="center" class="style1">&nbsp;</p>
                                    <p align="center">
                                    <b>Detail Mobil</b><br></br>
                                    <center>
                                    <table border="1">
                                    <tr>
                                    	<th width="50px">No</th>
                                    	<th width="100px">Merek</th>
                                    	<th width="100px">Jenis</th>
                                    	<th width="100px">Model</th>
                                    	<th width="100px">Tipe</th>
                                    	<th width="100px">Transmisi</th>
                                    	<th width="100px">Isi silinder (CC)</th>
                                    	<th width="100px">Harga OfTR JKT</th>
                                    	<th width="100px" colspan="2">Aksi</th>
                                    </tr> -->
                                     <?php /*
                                    $no=1;
                                    
                                    ?>
                                    <tr>
                                   
                                    	<td><?php echo $no;?></td>
                                    	<td><?php echo $hasil[0]['merek'];?></td>
                                    	<td><?php echo $hasil [0] ['jenis'];?></td>
                                    	<td><?php echo $hasil [0] ['model'];?></td>
                                    	<td><?php echo $hasil1 [0] ['tipe'];?></td>
                                    	<td><?php echo $hasil1 [0] ['transmisi'];?></td>
                                    	<td><?php echo $hasil1 [0] ['cc'];?></td>
                                    	<td><?php echo $hasil1 [0] ['OfTR'];?></td>
                                    	<form action="<?php echo base_url();?>index.php/common/ulp_formulir" method="post">
                                    	</td>
                                    	<td align="center"><a href="<?=base_url()."index.php/common/ulp_formulir?id_tipe=".$hasil1[0]['id_tipe']."&id_katalog=".$hasil1[0]['id']?>">Pilih</a></td>
                                    	<input type="hidden" name="id_tipe" value="<?php echo $hasil [0] ['id'];?>"></input>
                                    	<input type="hidden" name="id_katalog" value="<?php echo $hasil1 [0] ['id'];?>"></input>
                                    	</td>
                                    </tr>
                                    <tr>
                                    <td colspan="3" align="center">SPESIFIKASI DETAIL</td>
                                   	<td colspan="3" align="center">INTERIOR</td>
                                   	<td colspan="2" align="center">EKSTERIOR</td>
                                    </tr>
                                    
                                    <tr>
                                    <td colspan="3" rowspan="2"  align="center" ><img src="<?php echo base_url();?>uploads/<?=$hasil[0]['spec'];?>" width="150" height="150"></img></td>
                                    </tr>
                                   	
                                    <tr>
                                    <td colspan="3">
                                     <?php $i=0;
                                   	while ($i<count($int)){
                                    ?>
                                    	<img src="<?php echo base_url();?>uploads/<?=$int[$i]['int_doc'];?>" width="150" height="150"></img>
                                    				<?php echo $int[$i]['int']."<br>";?>
                                    	
                                     <?php 
                                   	$i++;
                                   		}
                                   	?>
                                    </td>
                                  	<td colspan="2">
                                    <?php $e=0;
                                   	while ($e<count($eks)){
                                    ?>
                                   	<img src="<?php echo base_url();?>uploads/<?=$eks[$e]['eks_doc'];?>" width="150" height="150" >,
                                   			 <?php echo $eks[$e]['eks']."<br>";?>
                                   	 <?php 
                                    $e++;
                                    }
                                    ?>
                                    </td>
                                    </tr>
                                  	</form>
                                     
                                    </table>
                                   
                                    </center>
                                    </p>
                                   
                                    <p>&nbsp;</p>
                                    <p>&nbsp; </p>
                                </div>                               
                                <!--  end table-content  --> */

                                