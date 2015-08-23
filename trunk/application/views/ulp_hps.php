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
.style1 {font-family: Georgia, "Times New Roman", Times, serif}
.style2 {
	color: #FF0000;
	font-family: Georgia, "Times New Roman", Times, serif;
}
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
                    <td><!--  start content-table-inner ...................................................................... START -->
                        <div id="content-table-inner">
                          <!--  start table-content  -->
                          <div id="table-content">
                            <h1 align="center" class="style1"> Perencanaan Pengadaan Mobil </h1>
                            <p align="center" class="style1">&nbsp;</p>
                            <p align="center" class="style2">
                              <center>
                              </center>
                            </p>
                            <span class="style1"><b>4. Perhitungan Harga Perkiraan Sendiri </b> <strong>(HPS)</strong><br />
                            <br />
                            </span><br />
                            <center>
                              <p></p>
                              <table>
                                <form action="<?php echo base_url();?>index.php/common/ulp_respon" method="post">
                                  <tr>
                                    <td colspan="3" align="center"><p class="style1">Mobil Pilihan Anda :</p>
                                      <p class="style1"> <?php echo $tipe[0]['merek'];?> - <?php echo $tipe[0]['jenis'];?> - <?php echo $tipe[0]['model'];?> -  <?php echo $ktlg[0]['tipe'];?> -  <?php echo $ktlg[0]['transmisi'];?> - <?php echo $ktlg[0]['cc'];?>cc</p>
                                    <p class="style1">&nbsp;</p></td>
                                  </tr>
                                  <tr height="20px"></tr>
                                  <tr>
                                    <td width="133"><p class="style1">Jumlah</p>
                                    <p class="style1">&nbsp;</p></td>
                                    <td width="10"><span class="style1">:</span></td>
                                    <td width="131"><span class="style1"><?php echo $jum;?>
                                    <input type="hidden" value="<?php echo $jum;?>" name="jumlah" />
                                    </span></td>
                                  </tr>
                                  <tr>
                                    <td width="133"><p class="style1">Keperluan</p>
                                    <p class="style1">&nbsp;</p></td>
                                    <td width="10"><span class="style1">:</span></td>
                                    <td><span class="style1"><?php echo $keperluan;?></span> </td>
                                    <input type="hidden" value="<?php echo $keperluan;?>" name="keperluan" />
                                  </tr>
                                  <tr>
                                    <td width="133"><p class="style1">Departemen terkait</p>
                                    <p class="style1">&nbsp;</p></td>
                                    <td width="10"><span class="style1">:</span></td>
                                    <td><span class="style1"><?php echo $departemen;?></span> </td>
                                    <input type="hidden" value="<?php echo $departemen;?>" name="departemen" />
                                  </tr>
                                  <tr>
                                    <td width="133"><p class="style1">Daerah Pengiriman</p>
                                    <p class="style1">&nbsp;</p></td>
                                    <td width="10"><span class="style1">:</span></td>
                                    <td><span class="style1"><?php echo $daerah [0]['daerah'];?></span></td>
                                    <input type="hidden" value="<?php echo $daerah [0]['id'];?>" name="daerah" />
                                  </tr>
                                  <tr>
                                    <td width="133"><p class="style1">Harga off the road Jkt</p>
                                    <p class="style1">&nbsp;</p></td>
                                    <td width="10"><span class="style1">:</span></td>
                                    <td><span class="style1">Rp. <?php echo $ktlg[0]['OfTR'];?></span></td>
                                  </tr>
                                  <tr>
                                    <td width="133"><p class="style1">Ongkos kirim</p>
                                    <p class="style1">&nbsp;</p></td>
                                    <td width="10"><span class="style1">:</span></td>
                                    <td><span class="style1">Rp. <?php echo $hps[0]['ongkir'];?></span></td>
                                  </tr>
                                  <tr>
                                    <td width="133"><p class="style1">BBN</p>
                                    <p class="style1">&nbsp;</p></td>
                                    <td width="10"><span class="style1">:</span></td>
                                    <td><span class="style1">Rp. <?php echo $hps[0]['bbn'];?></span></td>
                                  </tr>
                                  <tr>
                                    <td width="133"><p class="style1">PKB</p>
                                    <p class="style1">&nbsp;</p></td>
                                    <td width="10"><span class="style1">:</span></td>
                                    <td><span class="style1">Rp. <?php echo $hps[0]['pkb'];?></span></td>
                                  </tr>
                                  <tr>
                                    <td width="133"><p class="style1">Total HPS</p>
                                    <p class="style1">&nbsp;</p></td>
                                    <td width="10"><span class="style1">:</span></td>
                                    <td><span class="style1">Rp. <?php echo ($ktlg[0]['OfTR']+$hps[0]['ongkir']+ $hps[0]['bbn']+$hps[0]['pkb'])*$jum ;?></span></td>
                                    <input type="hidden" name="total" value="<?php echo ($ktlg[0]['OfTR']+$hps[0]['ongkir']+ $hps[0]['bbn']+$hps[0]['pkb'])*$jum ;?>" />
                                  </tr>
                                  <tr>
                                    <td colspan="3" align="right"><span class="style1">
                                    <input name="submit" type="submit" value="Ajukan" />
                                    <input type="hidden" value="<?php echo $tipe[0]['id'];?>" name="id_tipe" />
                                    <input type="hidden" value="<?php echo $ktlg[0]['id'];?>" name="id_katalog" />
                                    </span></td>
                                  </tr>
                                </form>
                              </table>
                            </center>
                          </div>
                        </div></td>
                  </tr>
                </table>
                <p>&nbsp;</p>
                <p>&nbsp; </p>
                <!--  end table-content  -->
                <div class="clear"></div>
                <!--  end content-table-inner ............................................END  -->
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