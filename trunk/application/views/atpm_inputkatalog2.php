<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>E-Purchasing Pemerintah Jabar</title>
<link rel="stylesheet" href="<?php echo base_url()?>css/screen.css"
	type="text/css" media="screen" title="default" />
<!--[if IE]>
        <link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
        <![endif]-->

<!--  jquery core -->
<script src="<?php echo base_url()?>js/jquery/jquery-1.4.1.min.js"
	type="text/javascript"></script>

<!--  checkbox styling script -->
<script src="<?php echo base_url()?>js/jquery/ui.core.js"
	type="text/javascript"></script>
<script src="<?php echo base_url()?>js/jquery/ui.checkbox.js"
	type="text/javascript"></script>
<script src="<?php echo base_url()?>js/jquery/jquery.bind.js"
	type="text/javascript"></script>
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
<script src="js/jquery/jquery.selectbox-0.5_style_2.js"
	type="text/javascript"></script>
<script type="text/javascript">
            $(document).ready(function() {
                $('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
                $('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
            });
        </script>

<!--  styled select box script version 3 -->
<script src="js/jquery/jquery.selectbox-0.5_style_2.js"
	type="text/javascript"></script>
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
	color: #FF0000
}
-->
</style>
</head>
<body>
<div class="clear">&nbsp;</div>

<!--  start nav-outer-repeat................................................................................................. START -->
<div class="nav-outer-repeat"><!--  start nav-outer -->
<div class="nav-outer"><!-- start nav-right -->
<div id="nav-right">

<div class="nav-divider">&nbsp;</div>
<div class="showhide-account"><a href="#"><img
	src="<?php echo base_url();?>images/shared/nav/nav_myaccount.gif"
	width="93" height="14" alt="" /></a></div>
<div class="nav-divider">&nbsp;</div>
<a href="<?php echo base_url()?>index.php/login/logout" id="logout"><img
	src="<?php echo base_url();?>images/shared/nav/nav_logout.gif"
	width="64" height="14" alt="" /></a>
<div class="clear">&nbsp;</div>

<!--  start account-content -->
<div class="account-content">
<div class="account-drop-inner"><a href="" id="acc-settings">Settings</a>
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
<a href="" id="acc-stats">Statistics</a></div>
</div>
<!--  end account-content --></div>
<!-- end nav-right --> <!--  start nav -->
<div class="nav"><?php 
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
<!--  start nav --></div>
<div class="clear"></div>
<!--  start nav-outer --></div>
<!--  start nav-outer-repeat................................................... END -->

<div class="clear"></div>

<!-- start content-outer ........................................................................................................................START -->
<div id="content-outer"><!-- start content -->
<div id="content">

<div id="content-header"></div>
<!--  start page-heading -->
<div id="page-heading">
<h1>Selamat Datang, <?php echo $this->session->userdata("username");?></h1>
</div>
<!-- end page-heading -->

<table border="0" width="100%" cellpadding="0" cellspacing="0"
	id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img
			src="<?php echo base_url();?>images/shared/side_shadowleft.jpg"
			width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img
			src="<?php echo base_url();?>images/shared/side_shadowright.jpg"
			width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td><!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner"><!--  start table-content  -->
		<div id="table-content">
		<h1 align="center">Input Katalog Standar Mobil</h1>
		<p align="center" class="style1"><br />
		Merek : <?php echo $merek?> <br />
		Jenis : <?php echo $jenis?><br />
		Model :<?php echo $model?><br />
		</p>
		<img src="<?php echo base_url()?>uploads/<?php echo $PIC?>"
			alt="gambarmobil" />
		<form
			action="<?php echo base_url();?>index.php/atpm/submit_katalogstandar/2"
			method="post" enctype="multipart/form-data" id="form1">
		<div align="center">
		<table width="359" border="0" id="interior_table">
			<tr>
				<td colspan="2">
				<div align="justify">
				<h2>Spesifikasi Mobil</h2>
				</div>
				</td>
			</tr>
			<tr>
				<td width="92">
				<div align="justify">Gambar</div>
				</td>
				<td width="251"><label>
				<div align="justify">: <input type="file" name="spec" /></div>
				</label></td>
			</tr>
			<tr>
				<td>
				<div align="justify"></div>
				</td>
				<td>
				<div align="justify"></div>
				</td>
			</tr>
			</table>
			<br />
			<input type="submit" name="Submit" value="Submit" />
		
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
<div id="footer"><!-- <div id="footer-pad">&nbsp;</div> --> <!--  start footer-left -->
<div id="footer-left"></div>
<!--  end footer-left -->
<div class="clear">&nbsp;</div>
</div>
<!-- end footer -->

</body>
</html>
