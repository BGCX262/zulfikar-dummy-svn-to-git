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
.style1 {
	font-family: Georgia, "Times New Roman", Times, serif;
	color: #FF0000;
}
.style2 {font-family: Georgia, "Times New Roman", Times, serif}
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
                            <a href="" id="acc-stats">Statistics</a>
                        </div>
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

                <div id="content-header">

                </div>
                <!--  start page-heading -->
                <div id="page-heading">
                    <h1>Selamat Datang, <?php echo $this->session->userdata("username");?></h1>
                </div>
                <!-- end page-heading -->

                <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
                    <tr>
                        <th rowspan="3" class="sized"><img src="<?php echo base_url();?>images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
                        <th class="topleft"></th>
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
                                    <h1 align="center">Pembelian Mobil </h1>
                                    <p align="center" class="style1">&nbsp;</p>
                                    <p align="center">
                                    <b>Penawaran Dealer</b><br></br>
                                    <p align="center">
                                    <center>
                                   	<table border="1">
                                   	<tr>
                                   	<th width="150px">No</th>
                                   	<th width="150px">Tanggal Menawarkan</th>
                                   	<th width="150px">Nama Dealer</th>
                                   	<th width="150px">Harga OnTR yang Tercantum</th>
                                   	<th width="150px">Harga OnTR Penawaran</th>
                                   	<th width="150px">Pesan Penawaran</th>
                                   	<th widht="150px"></th>
                                   	</tr>
                                   	<?php $no=1; $i=0; while($i<count($penawaran)){?>
                					<tr>
                					<td align="center"><?php echo $no;?></td>
                					<td align="center"><?php echo $penawaran[$i]['tgl_penawaran'];?></td>
                					<td align="center"><?php echo $penawaran[$i]['username_dealer'];?></td>
                					<td align="center"><?php echo $penawaran[$i]['OnTR'];?></td>
                					<td align="center"><?php echo $penawaran[$i]['harga_penawaran'];?></td>
                					<td align="center"><?php echo $penawaran[$i]['pesan'];?></td>
                					<td align="center"><?php echo $penawaran[$i]['dealer_ajuan'];?></td>
                					<td align="center"><a href="<?php echo base_url()."index.php/ulp/ulp_formulirPO?id_PO=".$id_PO."&NMA=".$NMA."&id_tipe=".$tipe_mobil[0]['id']."&id_katalog=".$id_katalog."&dealer=".$penawaran[$i]['username_dealer'];?>">Pilih Sebagai Pemenang</a>
                					</tr>
                					<?php $i++; $no++;}?>
                                   	</table>
                                    <form action="" method="post" enctype="multipart/form-data" id="form1">
                                      <p>&nbsp; </p>
                                  </form>
                                  </center>
                                    <center>
                                    <table border="0">
                                    <form action="<?php echo base_url()."index.php/ulp/ulp_pr?NMA=".$NMA."&id_tipe=".$tipe_mobil [0] ['id']."&id_katalog=".$katalog_mobil [0] ['id'];?>" method="post"></form>
                                    <tr>
                                    	<th align="left">
                                   	    <span class="style2">Tanggal</span></th>
                                    	<td width="10px"><span class="style2">:</span></td>
                                    	<td>
                                    	  <span class="style2"><?php echo $PR[0]['tanggal'];?></span>
                                   	    </td>
                                    </tr>
                                    <tr>
                                    	<th align="left">
                                   	    <span class="style2">Nama Pemesan</span></th>
                                    	<td width="10px"><span class="style2">:</span></td>
                                    	<td>
                                    	  <span class="style2"><?php echo $username;?></span>
                                   	    </td>
                                    </tr>
                                    <tr>
                                    	<th align="left">
                                   	    <span class="style2">Tanggal Maksimal Penawaran</span></th>
                                    	<td width="10px"><span class="style2">:</span></td>
                                    	<td>
                                    	  <span class="style2">
                                    	 <?php echo $PR[0]['tgl_PR'];?>
                                    	  </span>
                                   	    </td>
                                    </tr>
                                    <tr height="10"></tr>
                                    <tr>
                                    <th align="left"><span class="style2">Pesanan</span></th>
                                    <td width="10"><span class="style2">:</span></td>
                                    <td><span class="style2">
                                    <tr><td>Merek</td><td width="5">:</td><td><?php echo $tipe_mobil[0]['merek'];?></td></tr>
                                    <tr><td>Jenis</td><td width="5">:</td><td><?php echo $tipe_mobil[0]['jenis'];?></td></tr>
                                    <tr><td>Model</td><td width="5">:</td><td><?php echo $tipe_mobil[0]['model'];?></td></tr>
                                    <tr><td>Tipe</td><td width="5">:</td><td><?php echo $katalog_mobil[0]['tipe'];?></td></tr>
                                    <tr><td>Transmisi</td><td width="5">:</td><td><?php echo $katalog_mobil[0]['transmisi'];?></td></tr>
                                    <tr><td>Cc</td><td width="5">:</td><td><?php echo $katalog_mobil[0]['cc'];?></td></tr></span></td>
                                    <td></td>
                                    </tr>
                                    <tr height="10"></tr>
                                    <tr> 
                                    <th align="left"><span class="style2">Tahun Anggaran</span></th>
                                    <td width="10px"><span class="style2">:</span></td>
                                    <td><span class="style2"><?php echo $anggaran[0]['tahun'];?></span></td>
                                    </tr>
                                    <tr> 
                                    <th align="left"><span class="style2">Nomor Mata Anggaran</span></th>
                                    <td width="10px"><span class="style2">:</span></td>
                                    <td><span class="style2"><?php echo $anggaran[0]['nomor_ang'];?></span></td>
                                    </tr>
                                    <tr>
                                    <th align="left"><span class="style2">Nilai Anggaran</span></th>
                                    <td width="10px"><span class="style2">:</span></td>
                                    <td><span class="style2"><?php echo $anggaran[0]['nilai_ang'];?></span></td>
                                    </tr>
                                    <tr>
                                    <th align="left"><span class="style2">Daerah Terkait</span></th>
                                    <td width="10px"><span class="style2">:</span></td>
                                    <td><span class="style2"><?php echo $anggaran[0]['daerah'];?></span></td>
                                    </tr>
                                    <tr>
                                    <th align="left"><span class="style2">Alamat Pengiriman</span></th>
                                    <td width="10px"><span class="style2">:</span></td>
                                    <td><span class="style2">
                                      <?php echo $PR[0]['alamat'];?>
                                    </span></td>
                                    </tr>  
                                     <tr>
                                    	<th align="left">
                                   	    <span class="style2">Tanggal Maksimal Pemenuhan Pesanan</span></th>
                                    	<td width="10px"><span class="style2">:</span></td>
                                    	<td>
                                    	  <span class="style2">
                                    	 <?php echo $PR[0]['tgl_pemenuhan'];?>
                                    	  </span>
                                   	    </td>
                                    </tr>   
                                    <tr height="10"></tr>
                                    <tr>
                                    <td align="center" colspan="3"><table border="1">
                                    				<tr><th width="100px" class="style2">Warna</th><th class="style2">Pesanan</th></tr>
                                    				<?php $i=0;
                                    				while($i<count($pesanan))
                                    				{
                                    				?>
                                    				<tr>
                                    				<td align="center" class="style2"><?php echo $pesanan[$i]['warna'];?></td>
                                    				<td class="style2"><?php echo $pesanan [$i]['jumlah_pesan'];?></input>
                                             		</td>
                                    				</tr>
                                    				<?php $i++;
                                    				} ?>
                                    			
                                    				</table>                                    </td>
                                    </tr>
                                    <tr height="10"></tr>
                                    	</form>
                                    </table>
                                   
                                    </center>
                                    </p>
                                   
                                    <p>&nbsp;</p>
                                    <p>&nbsp; </p>
                                </div>                                
                                <!--  end table-content  -->

                                <div class="clear"></div>
                            </div>
                            <!--  end content-table-inner ............................................END  -->                        </td>
                        <td id="tbl-border-right"></td>
                    </tr>
                    <tr>
                        <th class="sized bottomleft"></th>
                        <td id="tbl-border-bottom">&nbsp;</td>
                        <th class="sized bottomright"></th>
                    </tr>
                </table>
                <div class="clear">&nbsp;</div>

            </div>
            <!--  end content -->
            <div class="clear">&nbsp;</div>
        </div>
        <!--  end content-outer........................................................END -->

        <div class="clear">&nbsp;</div>

        <!-- start footer -->
        <div id="footer">
            <!-- <div id="footer-pad">&nbsp;</div> -->
            <!--  start footer-left -->
            <div id="footer-left">
            </div>
            <!--  end footer-left -->
            <div class="clear">&nbsp;</div>
        </div>
        <!-- end footer -->

    </body>
</html>