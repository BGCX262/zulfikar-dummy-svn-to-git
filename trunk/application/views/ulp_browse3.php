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
.style3 {font-family: Georgia, "Times New Roman", Times, serif}
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
                                    <span class="style3">
                            <!--  start content-table-inner ...................................................................... START -->
                            <div id="content-table-inner">

                                <!--  start table-content  -->
                                <div id="table-content">
                                    </span>
                                    <h1 align="center">Pembelian Mobil </h1>
                                    <p align="center" class="style1">&nbsp;</p>
                      				<form action="<?=base_url()."index.php/ulp/ulp_browse3"?>" method="get" name="pencarian" class="style3" id="form1">
                      				
                                      <p><strong>3. Browse Katalog Mobil</strong> </p>
                                      <p>&nbsp;</p>
                                      <p>Silakan lakukan pencarian berdasarkan karakteristik mobil yang dibutuhkan. </p>
                                      <p><br>
                                        <input type="hidden" name="NMA" value="<?=$pencarian['NMA']?>">
                                        </input>
                                        <br>
                                        <center>
                                        <table width="300">
                                        <input type="hidden" name="awal" value="n">
                                        </input>
                                      </p>
                                      <tr>
                                      <td align="left"></input>Merk</td>
                                      <td>:</td>
                                      <td>
                                      <select name="merek" onchange="pencarian.submit()">
                                      <?php
                                      if($pencarian['merek'] == null){ 
                                      ?>
                                      	<option value="<?=null?>" selected="selected">- Pilih merek mobil-</option>
                                      <?php
                                      }else{
                                      	?>
                                      	<option value="<?=null?>" >- Pilih merek mobil-</option>
                                      	<?php 
                                      }
                                      for($f=0; $f<count($tipe); $f++){
                                      	if($tipe[$f]['merek'] == $pencarian['merek']){
                                      		?>
                                      		<option value="<?php echo $tipe[$f]['merek'];?>" selected="selected"> <?php echo $tipe[$f]['merek'];?></option>
                                      		<?php 
                                      	}else{
                                      	?>
                                      		<option value="<?php echo $tipe[$f]['merek'];?>"> <?php echo $tipe[$f]['merek'];?></option>
                                      	<?php 
                                      	}
                                      	if($f == count($tipe)-1){
	                                      	if($pencarian['merek'] == "*"){
	                                      		?>
	                                      		<option value=* or 1=1 selected="selected">All</option>
	                                      		<?php 		
	                                      	}else{
	                                      		?>
	                                      		<option value=* or 1=1>All</option>
	                                      		<?php 
	                                      	}
                                      	}
                                      }
                                      ?>
                                      </select>                                      </td>
                                      </tr>     
                                      <tr>
                                      <td align="left">Jenis</td>
                                      <td>:</td>
                                      <td>
                                      <?php
                                      if($pencarian['merek'] == null){ 
                                      ?>
                                      	
                                      	<input type="hidden" name="jenis" value"<?=null?>"></input>
                                      	<select name="jenis" onchange="pencarian.submit()" disabled="disabled">
                                      <?php 
                                      }else{
                                      	?>
                                      	<select name="jenis" onchange="pencarian.submit()">
                                      	<?php 
                                      }
                                      ?>
                                      <option value="<?=null?>" selected="selected">- Pilih jenis mobil-</option>
                                      <?php
                                      for($f=0; $f<count($tipe); $f++){
                                      	if($tipe[$f]['jenis'] == $pencarian['jenis']){
                                      		?>
                                      		<option value="<?php echo $tipe[$f]['jenis'];?>" selected="selected"> <?php echo $tipe[$f]['jenis'];?></option>
                                      		<?php 
                                      	}else{
                                      	?>
                                      		<option value="<?php echo $tipe[$f]['jenis'];?>"> <?php echo $tipe[$f]['jenis'];?></option>
                                      	<?php 
                                      	}
	                                      if($f == count($tipe)-1){
		                                      	if($pencarian['jenis'] == "*"){
		                                      		?>
		                                      		<option value=* or 1=1 selected="selected">All</option>
		                                      		<?php 		
		                                      	}else{
		                                      		?>
		                                      		<option value=* or 1=1>All</option>
		                                      		<?php 
		                                      	}
	                                      	}
                                      }
                                      ?>
                                      </select></td>
                                      </tr>   
                                      <tr>
                                      <td align="left">Model</td>
                                      <td>:</td>
                                      <td>
                                      <?php
                                      if($pencarian['jenis'] == null){ 
                                      ?>
                                      	<input type="hidden" name="model" value"<?=null?>"></input>
                                      	<select name="model" onchange="pencarian.submit()" disabled="disabled">
                                      <?php 
                                      }else{
                                      	?>
                                      	<select name="model" onchange="pencarian.submit()">
                                      	<?php 
                                      }
                                      ?>
                                      <option value="<?=null?>" selected="selected">- Pilih model mobil-</option>
                                      <?php
                                      for($f=0; $f<count($tipe); $f++){
                                      	if($tipe[$f]['model'] == $pencarian['model']){
                                      		?>
                                      		<option value="<?php echo $tipe[$f]['model'];?>" selected="selected"> <?php echo $tipe[$f]['model'];?></option>
                                      		<?php 
                                      	}else{
                                      	?>
                                      		<option value="<?php echo $tipe[$f]['model'];?>"> <?php echo $tipe[$f]['model'];?></option>
                                      	<?php 
                                      	}
                                      if($f == count($tipe)-1){
	                                      	if($pencarian['model'] == "*"){
	                                      		?>
	                                      		<option value=* or 1=1 selected="selected">All</option>
	                                      		<?php 		
	                                      	}else{
	                                      		?>
	                                      		<option value=* or 1=1>All</option>
	                                      		<?php 
	                                      	}
                                      	}
                                      }
                                      ?></select></td>
                                      </tr>   
                                      <tr>
                                      <td align="left">Tipe</td>
                                      <td>:</td>
                                      <td>
                                      <?php
                                      if($pencarian['model'] == null || $pencarian['jenis'] == null){ 
                                      ?>
                                      	<input type="hidden" name="tipe" value"<?=null?>"></input>
                                      	<select name="tipe" onchange="pencarian.submit()" disabled="disabled">
                                      <?php 
                                      }else{
                                      	?>
                                      	<select name="tipe" onchange="pencarian.submit()">
                                      	<?php 
                                      }
                                      ?>
                                      <option value="<?=null?>" selected="selected">- Pilih tipe mobil-</option>
                                      <?php
                                      for($f=0; $f<count($katalog); $f++){
                                      	if($katalog[$f]['tipe'] == $pencarian['tipe']){
                                      		?>
                                      		<option value="<?php echo $katalog[$f]['tipe'];?>" selected="selected"> <?php echo $katalog[$f]['tipe'];?></option>
                                      		<?php 
                                      	}else{
                                      	?>
                                      		<option value="<?php echo $katalog[$f]['tipe'];?>"> <?php echo $katalog[$f]['tipe'];?></option>
                                      	<?php 
                                      	} 
                                      if($f == count($katalog)-1){
	                                      	if($pencarian['tipe'] == "*"){
	                                      		?>
	                                      		<option value=* or 1=1 selected="selected">All</option>
	                                      		<?php 		
	                                      	}else{
	                                      		?>
	                                      		<option value=* or 1=1>All</option>
	                                      		<?php 
	                                      	}
                                      	}
                                      }
                                      ?></select></td>
                                      </tr>   
                                      <tr>
                                      <td align="left">Transmisi</td>
                                      <td>:</td>
                                      <td>
                                      <?php
                                      if($pencarian['tipe'] == null || $pencarian['model'] == null || $pencarian['jenis'] == null){ 
                                      ?>
                                      	<input type="hidden" name="transmisi" value"<?=null?>"></input>
                                      	<select name="transmisi" onchange="pencarian.submit()" disabled="disabled">
                                      <?php 
                                      }else{
                                      	?>
                                      	<select name="transmisi" onchange="pencarian.submit()">
                                      	<?php 
                                      }
                                      ?>
                                      <option value="<?=null?>" selected="selected">- Pilih transmisi mobil-</option>
                                       <?php
                                      for($f=0; $f<count($katalog); $f++){
                                      	if($katalog[$f]['transmisi'] == $pencarian['transmisi']){
                                      		?>
                                      		<option value="<?php echo $katalog[$f]['transmisi'];?>" selected="selected"> <?php echo $katalog[$f]['transmisi'];?></option>
                                      		<?php 
                                      	}else{
                                      	?>
                                      		<option value="<?php echo $katalog[$f]['transmisi'];?>"> <?php echo $katalog[$f]['transmisi'];?></option>
                                      	<?php 
                                      	} 
                                      if($f == count($katalog)-1){
	                                      	if($pencarian['transmisi'] == "*"){
	                                      		?>
	                                      		<option value=* or 1=1 selected="selected">All</option>
	                                      		<?php 		
	                                      	}else{
	                                      		?>
	                                      		<option value=* or 1=1>All</option>
	                                      		<?php 
	                                      	}
                                      	}
                                      }
                                      ?></select></td>
                                      </tr>   
                                      <tr>
                                      <td align="left">cc</td>
                                      <td>:</td>
                                      <td>
                                      <?php
                                      if($pencarian['transmisi'] == null || $pencarian['tipe'] == null || $pencarian['model'] == null || $pencarian['jenis'] == null){ 
                                      ?>
                                      	<input type="hidden" name="cc" value"<?=null?>"></input>
                                      	<select name="cc" onchange="pencarian.submit()" disabled="disabled">
                                      <?php 
                                      }else{
                                      	?>
                                      	<select name="cc" onchange="pencarian.submit()">
                                      	<?php 
                                      }
                                      ?>
                                      <option value="<?=null?>" selected="selected">- Pilih cc mobil-</option>
                                       <?php
                                      for($f=0; $f<count($katalog); $f++){
                                      	if($katalog[$f]['cc'] == $pencarian['cc']){
                                      		?>
                                      		<option value="<?php echo $katalog[$f]['cc'];?>" selected="selected"> <?php echo $katalog[$f]['cc'];?></option>
                                      		<?php 
                                      	}else{
                                      	?>
                                      		<option value="<?php echo $katalog[$f]['cc'];?>"> <?php echo $katalog[$f]['cc'];?></option>
                                      	<?php 
                                      	} 
                                      if($f == count($katalog)-1){
	                                      	if($pencarian['cc'] == "*"){
	                                      		?>
	                                      		<option value=* or 1=1 selected="selected">All</option>
	                                      		<?php 		
	                                      	}else{
	                                      		?>
	                                      		<option value=* or 1=1>All</option>
	                                      		<?php 
	                                      	}
                                      	}
                                      }
                                      ?></select></td>
                                      </tr>
                          </form> 
                                      <tr>
                                      <td align="left" class="style3"></td>
                                      <td class="style3"></td>
                                      <td class="style3">
                                      <form method="post" action="<?php echo base_url()."index.php/ulp/ulp_hasilcari1"?>" name="hasilCari">
                                      	<input type="hidden" name="NMA" value="<?=$pencarian['NMA']?>"></input>
                                      	<input type="hidden" name="merek" value="<?=$pencarian['merek']?>"></input>
                                      	<input type="hidden" name="jenis" value="<?=$pencarian['jenis']?>"></input>
                                      	<input type="hidden" name="model" value="<?=$pencarian['model']?>"></input>
                                      	<input type="hidden" name="tipe" value="<?=$pencarian['tipe']?>"></input>
                                      	<input type="hidden" name="transmisi" value="<?=$pencarian['transmisi']?>"></input>
                                      	<input type="hidden" name="cc" value="<?=$pencarian['cc']?>"></input>
                                      	<input type="submit" name="submit" value="Submit">
                                      </form>                                      </td>
                                      </tr>                                       
              </table>
                                      </center>
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