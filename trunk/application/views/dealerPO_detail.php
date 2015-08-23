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
	color: #000099;
	font-family: Georgia, "Times New Roman", Times, serif;
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
                    }else if ($this->session->userdata('role')==4) {
                        $this->load->view('menuadminulp.php');
                    }else if ($this->session->userdata('role')==5) {
                        $this->load->view('menuatpm.php');
                    }else if ($this->session->userdata('role')==6) {
                        $this->load->view('menuppkd.php');
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
                    <center><h1>Purchase Order</h1></center>
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
                                <center>
                                <form action="<?php echo base_url();?>index.php/dealer/dealer_surat" method="get">
                                <table width="531">
                                <tr>
                                <td width="148" align="left"><p class="style2">Tanggal </p>
                                  <p class="style2">&nbsp;</p></td>
                                <td width="345" align="left"><p class="style2">: <?php echo $PO1[0]['tanggal']; ?></p>
                                  <p class="style2">&nbsp;</p></td>
                                </tr>
                                <tr>
                                <td align="left"><p class="style2">Kepada Dealer </p>
                                  <p class="style2">&nbsp;</p></td>
                                <td align="left"><p class="style2">: <?php echo $PO1[0]['dealer'];?>
                                  <input type="hidden" name="dealer" value="<?php echo $PO1[0]['dealer'];?>">
                                </p>
                                  <p class="style2">&nbsp;</p></td>
                                </tr>
                                <tr>
                                <td align="left"><p class="style2">Pesanan </p>
                                  <p class="style2">&nbsp;</p></td>
                                <td align="left"><p class="style2">: <?php echo $tipe_pesan[0]['merek'];?>-<?php echo $tipe_pesan[0]['jenis'];?>-<?php echo $tipe_pesan[0]['model'];?>-<?php echo $katalog_pesan[0]['tipe'];?>-<?php echo $katalog_pesan[0]['transmisi'];?>-<?php echo $katalog_pesan[0]['cc'];?></p>
                                  <p class="style2">&nbsp;</p></td>
                                </tr>
                                <tr>
                                <td align="left"><p class="style2">Tahun Anggaran </p>
                                  <p class="style2">&nbsp;</p></td>
                                <td align="left"><p class="style2">: <?php echo $anggaran[0]['tahun'];?></p>
                                  <p class="style2">&nbsp;</p></td>
                                </tr>
                                <tr>
                                <td align="left"><p class="style2">Nomor Mata Anggaran</p>
                                  <p class="style2">&nbsp;</p></td>
                                <td align="left"><p class="style2">: <?php echo $anggaran[0]['nomor_ang'];?></p>
                                  <p class="style2">&nbsp;</p></td>
                                </tr>
                                <tr>
                                <td align="left"><p class="style2">Nilai Anggaran </p>
                                  <p class="style2">&nbsp;</p></td>
                                <td align="left"><p class="style2">: <?php echo $anggaran[0]['nilai_ang'];?></p>
                                  <p class="style2">&nbsp;</p></td>
                                </tr>
                                <tr>
                                <td align="left"><p class="style2">Daerah Terkait </p>
                                  <p class="style2">&nbsp;</p></td>
                                <td align="left"><p class="style2">: <?php echo $daerah[0]['daerah'];?></p>
                                  <p class="style2">&nbsp;</p></td>
                                </tr>
                                <tr>
                                <td align="left"><p class="style2">Alamat Pengiriman</p>
                                  <p class="style2">&nbsp; </p></td>
                                <td align="left"><p class="style2">: <?php echo $PO1[0]['alamat'];?></p>
                                  <p class="style2">&nbsp;</p></td>
                                </tr>
                                <tr>
                                <td><span class="style2"></span></td>
                                <td>
                                		<table border="1" width="300">
                                		<tr>
                                		<td class="style2"><div align="center"><strong>Warna</strong></div></td>
                                		<td><div align="center"><strong><span class="style2">Stok</span></strong></div></td>
                                		<td><div align="center"><strong><span class="style2">Pesan</span></strong></div></td>
                                		</tr>
                                		<?php $a=0;
                                		while($a<count($warna)){
                                			//$jumlahKarakterWarna = strlen($pesanan[$a]['warna']);
                                		?>
                                		<tr>
                                		<td><span class="style2"><?php echo $warna[$a]['warna'];?></span>
                                		<td><div align="center"><span class="style2"><?php echo $stok [$a]['stok'];?></span></div></td>
                                		<td><div align="center"><span class="style2"><?php echo $pesanan[$a]['jumlah_pesan'];?></span></div></td>
                                		</tr>
                                		
                                		<?php 
                                		$a++;
                                		}
                                		?>
                                		
                                		<tr>
                                		<td colspan="2"><span class="style2">Jumlah Pesanan </span></td>
                                		<td><div align="center"><span class="style2"><?php echo $PO1[0]['jumlah_pesanan'];?></span></div></td>
                                		</tr>
                                		</table>                                
                                		<p>&nbsp;</p></td>
                                </tr>
                                <tr>
                                <td align="left"><p class="style2">Harga satuan on the road </p>
                                  <p class="style2">&nbsp;</p></td>
                                <td align="left"><p class="style2">: <?php echo $PO1[0]['OnTR'];?></p>
                                  <p class="style2">&nbsp;</p></td>
                                </tr>
                                <tr>
                                <td align="left"><p class="style2">Total Harga : </p>
                                  <p class="style2">&nbsp;</p></td>
                                <td align="left"><p class="style2">: <?php echo $PO1[0]['total_harga'];?></p>
                                  <p class="style2">&nbsp;</p></td>
                                </tr>
                                <tr>
                                <td align="left"><p class="style2">Tanggal maksimal Pemenuhan : </p>
                                  <p class="style2">&nbsp;</p></td>
                                <td align="left"><p class="style2">: <?php echo $PO1[0]['tgl_pemenuhan'];?></p>
                                  <p class="style2">&nbsp;</p></td>
                                </tr>
                               
                                <tr>
                                <td colspan="2" align="center">
                            	<p class="style2">&nbsp;</p>
                            	<p align="left" class="style1"><em>Untuk menandakan kesediaan memnuhi pesanan di atas, silakan tekan tombol kirim surat kesediaan pemenuhan pesanan.</em></p>
                            	<p align="left" class="style1"><em> Surat anda anda akan dikirimkan ke bagian LPSE untuk dikontrol lebih lanjut.</em></p>
                            	<p align="left" class="style1">&nbsp;</p></td>
                                </tr>
                                <tr>
                                <td></td>
                                <td align="center"><input type="submit" value="kirim surat kesediaan pemenuhan pesanan">
                                	<input type="hidden" name="id_PO" value="<?php echo $PO1[0]['id_PO'] ?>">                               	  </td>
                                </tr>
                                <tr>
                                <td></td>
                                <td></td>
                                <td width="10"></td>
                                <td width="0"></td>
                                <td width="0"></td>
                                <td width="4"></td>
                                <td width="2"></td>
                                </tr>
                                </table>
                                </form>
                                </center>
                                </div>
                                <!--  end table-content  -->

                                <div class="clear"></div>

                            </div>
                            <!--  end content-table-inner ............................................END  -->
                        </td>
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