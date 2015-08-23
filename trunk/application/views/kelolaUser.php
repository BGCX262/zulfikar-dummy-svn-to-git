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
.style2 {font-family: Georgia, "Times New Roman", Times, serif; font-weight: bold; }
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
                    }else if ($this->session->userdata(role.php)==7) {
                        $this->load->view('menukeuangan.php');
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
                    <h1>Kelola User</h1>
                </div>
                <!-- end page-heading -->

                <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
                    <tr>
                        <th rowspan="3" class="sized"><img src="<?php echo base_url();?>images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
                        <th class="topleft"></th>
                        <td id="tbl-border-top"><p align="center" class="style1">&nbsp;</p>
                        <p align="center" class="style1">&nbsp;</p></td>
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
                                    <p><span class="style1">Berikut adalah daftar user yang terdaftar pada sistem e-purchasing mobil LPSE Jawa Barat. Untuk membuat user baru, anda dapat menuju formulir di bagian bawah. </span></p>
                                    <p>&nbsp;</p>
                                    <table width="641" border="1">
                                    <tr>
                                    	<td width="33" class="style2"><div align="center">No</div></td>
                                    	<td width="144" class="style2"><div align="center">Username</div></td>
                                    	<td width="136" class="style2"><div align="center">Password</div></td>
                                    	<td width="166" class="style2"><div align="center">Email</div></td>
                                    	<td width="37" class="style2"><div align="center">Role</div></td>
                                    	<td width="85" class="style2"><div align="center">Action</div></td>
                                    </tr>
                                    <?php
                                    	for($i=0; $i<count($user); $i++){
                                    		?>
                                    		<tr>
                                    		<td class="style1"><div align="center">
                                    		  <?=$i+1?>
                                  		  </div></td>
                                    		<td class="style1"><div align="center">
                                    		  <?=$user[$i]['username']?>
                                  		  </div></td>
                                    		<td class="style1"><div align="center">
                                    		  <?=$user[$i]['password']?>
                                  		  </div></td>
                                    		<td class="style1"><div align="center">
                                    		  <?=$user[$i]['email']?>
                                  		  </div></td>
                                    		<td class="style1"><div align="center">
                                    		  <?=$user[$i]['role']?>
                                  		  </div></td>
                                    		<td class="style1"><div align="center"><a href="<?=base_url()."index.php/admin/editUser/".$user[$i]['username']."/".$user[$i]['role']?>">edit</a> | <a href="<?=base_url()."index.php/admin/deleteUser/".$user[$i]['username']."/".$user[$i]['role']?>">delete</a></div></td>
                                    		</tr>
                                    		<?php                                    		
                                    	}
                                    ?>
                                    </table>
                                    <span class="style1"><br>
                                    ---------------------------------------------------------------------------------------------------------------------------------------------</span>------------------------------------------------------------
                                    <h1><span class="style1">PEMBUATAN USER BARU </br>
                                    </span></h1>
                                    <h1><br>
                                      </br>
                                    </h1>
                                    <form method="post" action="<?=base_url()."index.php/admin/daftarUser"?>">
                                    <table width="271">
                                    <tr>
                                    	<td width="91"><span class="style1">Username</span></td>
                                    	<td width="168"><span class="style1">:
                               	        <input type="text" name="username">
                                   	    </input>
                                    	</span></td>
                                    </tr>
                                    <tr>
                                    	<td><span class="style1">Password</span></td>
                                    	<td><span class="style1">: 
                                   	        <input type="text" name="password">
                                   	    </input>
                                    	</span></td>
                                    </tr>
                                    <tr>
                                    	<td><span class="style1">Email</span></td>
                                    	<td><span class="style1">: 
                                   	        <input type="text" name="email">
                                   	    </input>
                                    	</span></td>
                                    </tr>
                                    <tr>
                                    	<td><span class="style1">Role</span></td>
                                    	<td><span class="style1">: 
                                    	    <select name="role">
                                    	      <option value="1">Admin</option>
                                    	      <option value="4">Ulp</option>
                                    	      <option value="5">Atpm</option>
                                    	      <option value="6">Ppkd</option>
                                  	      </select>
                                    	</span></td>
                                    </tr>
                                    <tr>
                                    <td><span class="style1"></span></td>
                                    <td><span class="style1">
                                    <input type="submit" value="Daftarkan User">
                                    </input>
                                    </span></td>
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