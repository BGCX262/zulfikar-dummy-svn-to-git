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
	font-size: larger;
	font-weight: bold;
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
                    }else if ($this->session->userdata(role.php)==4) {
                        $this->load->view('menuadminulp.php');
                    }else if ($this->session->userdata(role.php)==5) {
                        $this->load->view('menuatpm.php');
                    }else if ($this->session->userdata(role.php)==6) {
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
                    <h1>Input Nomor Mata Anggaran APBD Jawa Barat</h1>
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
                                <div class="style1" id="table-content">
                                    <p align="center">Berikut adalah nomor mata anggaran yang tersimpan saat ini. </p>
                                    <p align="center">&nbsp;</p>
                                    <div align="center">
                                      <table border="2" align="center">
                                        <tr>
                                          <td width="25"><div align="center">No</div></td>
                                            <td width="96"><div align="center">Tahun Anggaran</div></td>
                                            <td width="119"><div align="center">Nomor Mata Anggaran</div></td>
                                            <td width="149"><div align="center">Nilai Anggaran</div></td>
                                            <td width="122"><div align="center">Daerah Terkait</div></td>
                                            <td width="129"><div align="center">Status Anggaran * </div></td>
                                          </tr>
                                        <?php
                                        $b=1;
                                        for($a=0; $a<count($anggaran); $a++){
                                        ?>
                                        <tr>
                                          <td><div align="center">
                                            <?=$b?>
                                          </div></td>
                                            <td><div align="center">
                                              <?=$anggaran[$a]['tahun']?>
                                            </div></td>
                                            <td><div align="center">
                                              <?=$anggaran[$a]['nomor_ang']?>
                                            </div></td>
                                            <td><div align="center">
                                              <?=$anggaran[$a]['nilai_ang']?>
                                            </div></td>
                                            <td><div align="center">
                                              <?=$daerah[$anggaran[$a]['daerah']-1]['daerah']?>
                                            </div></td>
                                            <td><div align="center">
                                              <?=$anggaran[$a]['status_ang']?>
                                            </div></td>
                                          </tr>
                                        <?php
                                        $b++;
                                        };
                                        ?>
                                        </table>
                                    </div>
                                    <div align="center"></div>
                                    <p>&nbsp;</p>
                                    <p>* Status anggaran 0 = belum digunakan, 1 = sudah digunakan </p>
                                    <div align="center"><br />
                                        <br />
                                        <br />
                                    </div>
                                    <form method="post" action="<?php echo base_url()."index.php/admin/input_anggaran"?>">
                                        <p align="center">----------------------------------------------------------------------------------------------------------------------------------------</p>
                                        <p align="center" class="style2">INPUT NOMOR MATA ANGGARAN BARU </p>
                                        <p align="center">&nbsp;</p>
                                        <p align="center">Untuk melakukan input nomor mata anggaran APBD Jawa Barat yang dapat digunakan untuk pengadaan mobil, silakan isi formulir di bawah ini. </p>
                                        <p align="center">&nbsp;</p>
                                        <div align="center">
                                          <table>
                                            <tr>
                                              <td width="175">Tahun Anggaran</td>
                                                <td width="10">:</td>
                                                <td width="121"><input type="text" size="20" maxlength="20" name="thn_ang"/></td>
                                              </tr>
                                            <tr>
                                              <td>Nomor Mata Anggaran</td>
                                                <td>:</td>
                                                <td><input type="text" size="20" maxlength="100" name="no_ang"/></td>
                                              </tr>
                                            <tr>
                                              <td>Nilai Anggaran</td>
                                                <td>:</td>
                                                <td><input type="text" size="20" maxlength="10" name="nil_ang"/></td>
                                              </tr>
                                            <tr>
                                              <td>Daerah Terkait</td>
                                                <td>:</td>
                                                <td>
                                                    <select name="daerah">
                                                      <?php
                                                        for($a=0; $a<count($daerah); $a++){
                                                        ?>
                                                      <option value="<?=$daerah[$a]['id']?>"><?=$daerah[$a]['daerah']?></option>
                                                      <?php
                                                        }
                                                        ?>
                                                    </select>                                                </td>
                                              </tr>
                                            <tr>
                                              <td></td>
                                                <td></td>
                                                <td><input type="submit" value="Submit"></input></td>
                                              </tr>
                                            </table>
                                        </div>
                                        <div align="center"></div>
                                    </form>
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