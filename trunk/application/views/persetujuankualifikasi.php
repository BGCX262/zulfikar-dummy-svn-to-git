<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.
org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.
org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; 
charset=UTF-8" />
<title>E-Purchasing Pemerintah Jabar</title>
<link rel="stylesheet" href="<?php echo base_url()?>css/screen.css"
	type="text/css" media="screen" title="default" />
<!--[if IE]> <link rel="stylesheet" media="all" 
type="text/css" href="css/pro_dropline_ie.css" /> <![endif]-->

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
<h1>Persetujuan Kualifikasi</h1>
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
		<form method="post" action="<?=base_url()."index.php/admin/submitevaluasi?username=".$_GET['user']?>">
		<table>
			<tr>
				<td>
				<h3>A. Profil Perusahaan</h3>
				</td>
			</tr>
			<tr>
				<th>Nama Dealer</th>
				<td><?=$nama?></td>
				<td><input type="checkbox" value="1" name="nama" />Approve</td>
			</tr>
			<tr>
				<th>Tanggal Berdiri</th>
				<td><?=$time_formed?></td>
				<td><input type="checkbox" value="1" name="time_formed" />Approve</td>
			</tr>
			<tr>
				<th>Website</th>
				<td><?=$website?></td>
				<td><input type="checkbox" value="1" name="website" />Approve</td>
			</tr>
			<tr>
				<th>Merek yang disediakan</th>
				<td><?=$merekmobil?></td>
				<td><input type="checkbox" value="1" name="merekmobil" />Approve</td>
			</tr>
			<tr>
				<td>
				<h3>b. Rekening Perusahaan</h3>
				</td>
			</tr>
			<tr>
				<th>Nama Bank/cabang</th>
				<td><?=$bank?></td>
				<td><input type="checkbox" value="1" name="bank" />Approve</td>
			</tr>
			<tr>
				<th>Nomor Rekening</th>
				<td><?=$acc_number?></td>
				<td><input type="checkbox" value="1" name="acc_number" />Approve</td>
			</tr>
			<tr>
				<th>Atas Nama :</th>
				<td><?=$acc_name?></td>
				<td><input type="checkbox" value="1" name="acc_name" />Approve</td>
			</tr>
			<tr>
				<td>
				<h3>C. Kantor Utama</h3>
				</td>
			</tr>
			<tr>
				<th>Alamat</th>
				<td><?=$of_addres?></td>
				<td><input type="checkbox" value="1" name="of_addres" />Approve</td>
			</tr>
			<tr>
				<th>Kota Pos</th>
				<td><?=$of_poskode?></td>
				<td><input type="checkbox" value="1" name="of_poskode" />Approve</td>
			</tr>
			<tr>
				<th>Kota</th>
				<td><?=$of_city?></td>
				<td><input type="checkbox" value="1" name="of_city" />Approve</td>
			</tr>
			<tr>
				<th>Provinsi</th>
				<td><?=$of_prov?></td>
				<td><input type="checkbox" value="1" name="of_prov" />Approve</td>
			</tr>
			<tr>
				<th>No Telepon</th>
				<td><?=$of_phone?></td>
				<td><input type="checkbox" value="1" name="of_phone" />Approve</td>
			</tr>
			<tr>
				<th>No Fax</th>
				<td><?=$of_fax?></td>
				<td><input type="checkbox" value="1" name="of_fax" />Approve</td>
			</tr>
			<tr>
				<th>No Telepon Alternatif</th>
				<td><?=$of_phone2?></td>
				<td><input type="checkbox" value="1" name="of_phone2" />Approve</td>
			</tr>
			<tr>
				<th>No Fax Alternatif</th>
				<td><?=$of_fax2?></td>
				<td><input type="checkbox" value="1" name="of_fax2" />Approve</td>
			</tr>
			<tr>
				<td>
				<h3>D. Kantor Cabang</h3>
				</td>
			</tr>
			<tr>
				<th>Alamat</th>
				<td><?=$of2_addres?></td>
				<td><input type="checkbox" value="1" name="of2_addres" />Approve</td>
			</tr>
			<tr>
				<th>Kota Pos</th>
				<td><?=$of2_poskode?></td>
				<td><input type="checkbox" value="1" name="of2_poskode" />Approve</td>
			</tr>
			<tr>
				<th>Kota</th>
				<td><?=$of2_city?></td>
				<td><input type="checkbox" value="1" name="of2_city" />Approve</td>
			</tr>
			<tr>
				<th>Provinsi</th>
				<td><?=$of2_prov?></td>
				<td><input type="checkbox" value="1" name="of2_prov" />Approve</td>
			</tr>
			<tr>
				<th>No Telepon</th>
				<td><?=$of2_phone?></td>
				<td><input type="checkbox" value="1" name="of2_phone" />Approve</td>
			</tr>
			<tr>
				<th>No Fax</th>
				<td><?=$of2_fax?></td>
				<td><input type="checkbox" value="1" name="of2_fax" />Approve</td>
			</tr>
			<tr>
				<th>No Telepon Alternatif</th>
				<td><?=$of2_phone2?></td>
				<td><input type="checkbox" value="1" name="of2_phone2" />Approve</td>
			</tr>
			<tr>
				<th>No Fax Alternatif</th>
				<td><?=$of2_fax2?></td>
				<td><input type="checkbox" value="1" name="of2_fax2" />Approve</td>
			</tr>
			<tr>
				<td>
				<h3>E. Presiden Direktur</h3>
				</td>
			</tr>
			<tr>
				<th>Nama</th>
				<td><?=$dir_nama?></td>
				<td><input type="checkbox" value="1" name="dir_nama" />Approve</td>
			</tr>
			<tr>
				<th>Nomor Identitas (KTP)</th>
				<td><?=$dir_noktp?></td>
				<td><input type="checkbox" value="1" name="dir_noktp" />Approve</td>
			</tr>
			<tr>
				<th>Nomor Telepon Seluler</th>
				<td><?=$dir_hp?></td>
				<td><input type="checkbox" value="1" name="dir_hp" />Approve</td>
			</tr>
			<tr>
				<th>Email</th>
				<td><?=$dir_email?></td>
				<td><input type="checkbox" value="1" name="dir_email" />Approve</td>
			</tr>
			<tr>
				<th><a href="<?=base_url()."uploads/".$dir_ktpdoc?>">Dokumen KTP</a></th>
				<td>
				<table>
					<tr>
						<td>Dokumen Tersedia</td>
					</tr>
					<tr>
						<td>Kop Surat tersedia dengan benar</td>
					</tr>
					<tr>
						<td>Cap dan tanggal tersedia</td>
					</tr>
					<tr>
						<td>Terdapat cap dan tanda tangan asli</td>
					</tr>
				</table>
				</td>
				<td>
				<table>
					<tr>
						<td><input type="checkbox" value="1" name="dir_ktpdoc_tersedia" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="dir_ktpdoc_kop" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="dir_ktpdoc_cap" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="dir_ktpdoc_ttd" />Approve</td>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td>
				<h3>F. Penanggung Jawab</h3>
				</td>
			</tr>
			<tr>
				<th>Nama</th>
				<td><?=$cp_nama?></td>
				<td><input type="checkbox" value="1" name="cp_nama" />Approve</td>
			</tr>
			<tr>
				<th>Nomor Identitas (KTP)</th>
				<td><?=$cp_noktp?></td>
				<td><input type="checkbox" value="1" name="cp_noktp" />Approve</td>
			</tr>
			<tr>
				<th>Nomor Telepon Seluler</th>
				<td><?=$cp_hp?></td>
				<td><input type="checkbox" value="1" name="cp_hp" />Approve</td>
			</tr>
			<tr>
				<th>Email</th>
				<td><?=$cp_email?></td>
				<td><input type="checkbox" value="1" name="cp_email" />Approve</td>
			</tr>
			<tr>
				<th><a href="<?=base_url()."uploads/".$cp_ktpdoc?>">Dokumen KTP</a></th>
				<td>
				<table>
					<tr>
						<td>Dokumen Tersedia</td>
					</tr>
					<tr>
						<td>Kop Surat tersedia dengan benar</td>
					</tr>
					<tr>
						<td>Cap dan tanggal tersedia</td>
					</tr>
					<tr>
						<td>Terdapat cap dan tanda tangan asli</td>
					</tr>
				</table>
				</td>
				<td>
				<table>
					<tr>
						<td><input type="checkbox" value="1" name="cp_ktpdoc_tersedia" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="cp_ktpdoc_kop" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="cp_ktpdoc_cap" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="cp_ktpdoc_ttd" />Approve</td>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td>
				<h3>G. Surat Penunjukkan</h3>
				</td>
			</tr>
			<tr>
				<th>Surat Penunjukkan Sebagai Dealer Resmi</th>
				<td><?=$auth_atpm?></td>
				<td><input type="checkbox" value="1" name="auth_atpm" />Approve</td>
			</tr>
			<tr>
				<th>Tanggal Penunjukkan</th>
				<td><?= $auth_date?></td>
				<td><input type="checkbox" value="1" name="auth_date" />Approve</td>
			</tr>
			<tr>
				<th><a href="<?=base_url()."uploads/".$auth_doc?>">Dokumen Surat
				Penunjukkan</a></th>
				<td>
				<table>
					<tr>
						<td>Dokumen Tersedia</td>
					</tr>
					<tr>
						<td>Kop Surat tersedia dengan benar</td>
					</tr>
					<tr>
						<td>Cap dan tanggal tersedia</td>
					</tr>
					<tr>
						<td>Terdapat cap dan tanda tangan asli</td>
					</tr>
				</table>
				</td>
				<td>
				<table>
					<tr>
						<td><input type="checkbox" value="1" name="auth_doc_tersedia" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="auth_doc_kop" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="auth_doc_cap" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="auth_doc_ttd" />Approve</td>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td>
				<h3>H. Akta Pendirian Perusahaan</h3>
				</td>
			</tr>
			<tr>
				<th>Nama Notaris</th>
				<td><?=$ap_notaris?></td>
				<td><input type="checkbox" value="1" name="ap_notaris" />Approve</td>
			</tr>
			<tr>
				<th>Nomor Akta Notaris Pendirian Perusahaan</th>
				<td><?=$ap_number?></td>
				<td><input type="checkbox" value="1" name="ap_number" />Approve</td>
			</tr>
			<tr>
				<th>Tanggal Akta Notaris Perubahan Terakhir</th>
				<td><?=$ap_date?></td>
				<td><input type="checkbox" value="1" name="ap_date" />Approve</td>
			</tr>
			<tr>
				<th>Dokumen Akta Notaris Perubahan Terakhir</th>
				<td><a href='<?=base_url()."uploads/".$ap_doc?>'>Download</a></td>
				<td><input type="checkbox" value="1" name="ap_doc" />Approve</td>
			</tr>
			<tr>
				<th>Nomor Surat Keputusan Menkumham</th>
				<td><?=$ap_menhukam_no?></td>
				<td><input type="checkbox" value="1" name="ap_menhukam_no" />Approve</td>
			</tr>
			<tr>
				<th>Tanggal Surat Keputusan Menkumham</th>
				<td><?=$ap_menhukam_date?></td>
				<td><input type="checkbox" value="1" name="ap_menhukam_date" />Approve</td>
			</tr>
			<tr>
				<th><a href="<?=base_url()."uploads/".$ap_menhukam_doc?>">Dokumen
				Surat Keputusan Menkumham</a></th>
				<td>
				<table>
					<tr>
						<td>Dokumen Tersedia</td>
					</tr>
					<tr>
						<td>Kop Surat tersedia dengan benar</td>
					</tr>
					<tr>
						<td>Cap dan tanggal tersedia</td>
					</tr>
					<tr>
						<td>Terdapat cap dan tanda tangan asli</td>
					</tr>
				</table>
				</td>
				<td>
				<table>
					<tr>
						<td><input type="checkbox" value="1"
							name="an_menhukam_doc_tersedia" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="an_menhukam_doc_kop" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="an_menhukam_doc_cap" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="an_menhukam_doc_ttd" />Approve</td>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td>
				<h3>I. Akta Notaris Perubahan Terakhir</h3>
				</td>
			</tr>
			<tr>
				<th>Nama Notaris</th>
				<td><?=$an_notaris?></td>
				<td><input type="checkbox" value="1" name="an_notaris" />Approve</td>
			</tr>
			<tr>
				<th>Nomor Akta Notaris Pendirian Perusahaan</th>
				<td><?=$an_nomor?></td>
				<td><input type="checkbox" value="1" name="an_number" />Approve</td>
			</tr>
			<tr>
				<th>Tanggal Akta Notaris Perubahan Terakhir</th>
				<td><?=$an_date?></td>
				<td><input type="checkbox" value="1" name="an_date" />Approve</td>
			</tr>
			<tr>
				<th>Dokumen Akta Notaris Perubahan Terakhir</th>
				<td><a href='<?=base_url()."uploads/".$an_doc?>'>Download</a></td>
				<td><input type="checkbox" value="1" name="an_doc" />Approve</td>
			</tr>
			<tr>
				<th>Nomor Surat Keputusan Menkumham</th>
				<td><?=$an_menhukam_no?></td>
				<td><input type="checkbox" value="1" name="an_menhukam_no" />Approve</td>
			</tr>
			<tr>
				<th>Tanggal Surat Keputusan Menkumham</th>
				<td><?=$an_menhukam_date?></td>
				<td><input type="checkbox" value="1" name="an_menhukam_date" />Approve</td>
			</tr>
			<tr>
				<th><a href="<?=base_url()."uploads/".$an_menhukam_doc?>">Dokumen
				Surat Keputusan Menkumham</a></th>
				<td>
				<table>
					<tr>
						<td>Dokumen Tersedia</td>
					</tr>
					<tr>
						<td>Kop Surat tersedia dengan benar</td>
					</tr>
					<tr>
						<td>Cap dan tanggal tersedia</td>
					</tr>
					<tr>
						<td>Terdapat cap dan tanda tangan asli</td>
					</tr>
				</table>
				</td>
				<td>
				<table>
					<tr>
						<td><input type="checkbox" value="1"
							name="an_menhukam_doc_tersedia" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="an_menhukam_doc_kop" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="an_menhukam_doc_cap" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="an_menhukam_doc_ttd" />Approve</td>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td>
				<h3>J. Surat Izin Usaha Perdagangan (SIUP)</h3>
				</td>
			</tr>
			<tr>
				<th>Nomor SIUP</th>
				<td><?=$siup_nomor?></td>
				<td><input type="checkbox" value="1" name="siup_nomor" />Approve</td>
			</tr>
			<tr>
				<th>Tanggal Terdaftar</th>
				<td><?=$siup_date?></td>
				<td><input type="checkbox" value="1" name="siup_date" />Approve</td>
			</tr>
			<tr>
				<th><a href="<?=base_url()?>uploads/<?=$siup_doc?>">Salinan SIUP</a></th>
				<td>
				<table>
					<tr>
						<td>Dokumen Tersedia</td>
					</tr>
					<tr>
						<td>Kop Surat tersedia dengan benar</td>
					</tr>
					<tr>
						<td>Cap dan tanggal tersedia</td>
					</tr>
					<tr>
						<td>Terdapat cap dan tanda tangan asli</td>
					</tr>
				</table>
				</td>
				<td>
				<table>
					<tr>
						<td><input type="checkbox" value="1" name="siup_doc_tersedia" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="siup_doc_kop" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="siup_doc_cap" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="siup_doc_ttd" />Approve</td>
					</tr>
				</table>
				</td>
			</tr>

			<tr>
				<td>
				<h3>J. Tanda Daftar Perusahaan (TDP)</h3>
				</td>
			</tr>
			<tr>
				<th>Nomor TDP</th>
				<td><?=$tdp_nomor?></td>
				<td><input type="checkbox" value="1" name="tdp_date" />Approve</td>
			</tr>
			<tr>
				<th>Tanggal Terdaftar</th>
				<td><?=$tdp_date?></td>
				<td><input type="checkbox" value="1" name="tdp_date" />Approve</td>
			</tr>
			<tr>
				<th><a href="<?=base_url()."uploads/".$tdp_doc?>">"Salinan TDP</a></th>
				<td>
				<table>
					<tr>
						<td>Dokumen Tersedia</td>
					</tr>
					<tr>
						<td>Kop Surat tersedia dengan benar</td>
					</tr>
					<tr>
						<td>Cap dan tanggal tersedia</td>
					</tr>
					<tr>
						<td>Terdapat cap dan tanda tangan asli</td>
					</tr>
				</table>
				</td>
				<td>
				<table>
					<tr>
						<td><input type="checkbox" value="1" name="tdp_doc_tersedia" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="tdp_doc_kop" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="tdp_doc_cap" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="tdp_doc_ttd" />Approve</td>
					</tr>
				</table>
				</td>
			</tr>


			<tr>
				<td>
				<h3>J. Surat Izin Tempat Usaha (SITU)</h3>
				</td>
			</tr>
			<tr>
				<th>Nomor SITU</th>
				<td><?=$situ_nomor?></td>
				<td><input type="checkbox" value="1" name="situ_nomor" />Approve</td>
			</tr>
			<tr>
				<th>Tanggal Terdaftar</th>
				<td><?=$situ_date?></td>
				<td><input type="checkbox" value="1" name="situ_date" />Approve</td>
			</tr>
			<tr>
				<th><a href="<?=base_url()."uploads/".$situ_doc?>">Salinan</a></th>
				<td>
				<table>
					<tr>
						<td>Dokumen Tersedia</td>
					</tr>
					<tr>
						<td>Kop Surat tersedia dengan benar</td>
					</tr>
					<tr>
						<td>Cap dan tanggal tersedia</td>
					</tr>
					<tr>
						<td>Terdapat cap dan tanda tangan asli</td>
					</tr>
				</table>
				</td>
				<td>
				<table>
					<tr>
						<td><input type="checkbox" value="1" name="situ_doc_tersedia" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="situ_doc_kop" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="situ_doc_cap" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="situ_doc_ttd" />Approve</td>
					</tr>
				</table>
				</td>
			</tr>


			<tr>
				<td>
				<h3>J. Nomor Pokok Wajib Pajak (NPWP)</h3>
				</td>
			</tr>
			<tr>
				<th>Nomor NPWP</th>
				<td><?=$npwp_no?></td>
				<td><input type="checkbox" value="1" name="npwp_no" />Approve</td>
			</tr>
			<tr>
				<th>Tanggal Terdaftar</th>
				<td><?=$npwp_date?></td>
				<td><input type="checkbox" value="1" name="npwp_date" />Approve</td>
			</tr>
			<tr>
				<th><a href="<?=base_url()."uploads/".$npwp_doc?>">Salinan</a></th>
				<td>
				<table>
					<tr>
						<td>Dokumen Tersedia</td>
					</tr>
					<tr>
						<td>Kop Surat tersedia dengan benar</td>
					</tr>
					<tr>
						<td>Cap dan tanggal tersedia</td>
					</tr>
					<tr>
						<td>Terdapat cap dan tanda tangan asli</td>
					</tr>
				</table>
				</td>
				<td>
				<table>
					<tr>
						<td><input type="checkbox" value="1" name="npwp_doc_tersedia" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="npwp_doc_kop" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="npwp_doc_cap" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="npwp_doc_ttd" />Approve</td>
					</tr>
				</table>
				</td>
			</tr>

			<tr>
				<td>
				<h3>J. Surat Pengukuhan Pengusaha Kena Pajak (PKP)</h3>
				</td>
			</tr>
			<tr>
				<th>Nomor PKP</th>
				<td><?=$pkp_no?></td>
				<td><input type="checkbox" value="1" name="pkp_no" />Approve</td>
			</tr>
			<tr>
				<th>Tanggal Terdaftar</th>
				<td><?=$pkp_date?></td>
				<td><input type="checkbox" value="1" name="pkp_date" />Approve</td>
			</tr>
			<tr>
				<th><a href="<?=base_url()."uploads/".$pkp_doc?>">Salinan</a></th>
				<td>
				<table>
					<tr>
						<td>Dokumen Tersedia</td>
					</tr>
					<tr>
						<td>Kop Surat tersedia dengan benar</td>
					</tr>
					<tr>
						<td>Cap dan tanggal tersedia</td>
					</tr>
					<tr>
						<td>Terdapat cap dan tanda tangan asli</td>
					</tr>
				</table>
				</td>
				<td>
				<table>
					<tr>
						<td><input type="checkbox" value="1" name="pkp_doc_tersedia" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="pkp_doc_kop" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="pkp_doc_cap" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="pkp_doc_ttd" />Approve</td>
					</tr>
				</table>
				</td>
			</tr>

			<tr>
				<td>
				<h3>J. Surat Pemberitahuan Tahunan (SPT)</h3>
				</td>
			</tr>
			<tr>
				<th>Tanggal SPT</th>
				<td><?=$spt_date?></td>
				<td><input type="checkbox" value="1" name="spt_date" />Approve</td>
			</tr>
			<tr>
				<th>Tanggal Surat Setoran Pajak</th>
				<td><?=$spt_datesetoran?></td>
				<td><input type="checkbox" value="1" name="spt_datesetoran" />Approve</td>
			</tr>
			<tr>
				<th>Nomor Bukti Setoran Pajak</th>
				<td><?=$pkp_no?></td>
				<td><input type="checkbox" value="1" name="pkp_no" />Approve</td>

			</tr>
			<tr>
				<th><a href="<?=base_url()."uploads/".$spt_doc?>">Salinan SPT Tahun
				Terakhir</a></th>
				<td>
				<table>
					<tr>
						<td>Dokumen Tersedia</td>
					</tr>
					<tr>
						<td>Kop Surat tersedia dengan benar</td>
					</tr>
					<tr>
						<td>Cap dan tanggal tersedia</td>
					</tr>
					<tr>
						<td>Terdapat cap dan tanda tangan asli</td>
					</tr>
				</table>
				</td>
				<td>
				<table>
					<tr>
						<td><input type="checkbox" value="1" name="spt_doc_tersedia" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="spt_doc_kop" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="spt_doc_cap" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="spt_doc_ttd" />Approve</td>
					</tr>
				</table>
				</td>
			</tr>

			<tr>
				<td>
				<h3>P. Laporan Bulanan PPh (pasal 21/23/25/29) <br />
				atau PPN sekurang-kurangnya 3 bulan terakhir</h3>
				</td>
			</tr>

			<tr>
				<th><a href="<?=base_url()."uploads/".$tax_monthlydoc?>">Dokumen
				Laporan</a></th>
				<td>
				<table>
					<tr>
						<td>Dokumen Tersedia</td>
					</tr>
					<tr>
						<td>Kop Surat tersedia dengan benar</td>
					</tr>
					<tr>
						<td>Cap dan tanggal tersedia</td>
					</tr>
					<tr>
						<td>Terdapat cap dan tanda tangan asli</td>
					</tr>
				</table>
				</td>
				<td>
				<table>
					<tr>
						<td><input type="checkbox" value="1"
							name="tax_monthlydoc_tersedia" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="tax_monthlydoc_kop" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="tax_monthlydoc_cap" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="tax_monthlydoc_ttd" />Approve</td>
					</tr>
				</table>
				</td>
			</tr>

			<tr>
				<td>
				<h3>Q. Pengalaman Perusahaan Dalam Pengadaan Mobil</h3>
				</td>
			</tr>

			<tr>
				<th>Nama Paket 1</th>
				<td><?=$exp_nama1?></td>
				<td><input type="checkbox" value="1" name="exp_nama1" />Approve</td>
			</tr>
			<tr>
				<th>Pemilik Proyek 1</th>
				<td><?=$exp_own1?></td>
				<td><input type="checkbox" value="1" name="exp_own1" />Approve</td>
			</tr>
			<tr>
				<th>Nilai Paket</th>
				<td><?=$exp_value1?></td>
				<td><input type="checkbox" value="1" name="exp_value1" />Approve</td>
			</tr>
			<tr>
				<th>Tanggal pemenuhan paket</th>
				<td><?=$exp_date1?></td>
				<td><input type="checkbox" value="1" name="exp_date1" />Approve</td>
			</tr>
			<tr>
				<th><a href="<?=base_url()."uploads/".$exp_doc1?>">Salinan
				Kontrak/Invoice</a></th>
				<td>
				<table>
					<tr>
						<td>Dokumen Tersedia</td>
					</tr>
					<tr>
						<td>Kop Surat tersedia dengan benar</td>
					</tr>
					<tr>
						<td>Cap dan tanggal tersedia</td>
					</tr>
					<tr>
						<td>Terdapat cap dan tanda tangan asli</td>
					</tr>
				</table>
				</td>
				<td>
				<table>
					<tr>
						<td><input type="checkbox" value="1" name="exp_doc1_tersedia" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="exp_doc1_kop" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="exp_doc1_cap" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="exp_doc1_ttd" />Approve</td>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>

			<tr>
				<th>Nama Paket 2</th>
				<td><?=$exp_nama2?></td>
				<td><input type="checkbox" value="2" name="exp_nama2" />Approve</td>
			</tr>
			<tr>
				<th>Pemilik Proyek 2</th>
				<td><?=$exp_own2?></td>
				<td><input type="checkbox" value="2" name="exp_own2" />Approve</td>
			</tr>
			<tr>
				<th>Nilai Paket</th>
				<td><?=$exp_value2?></td>
				<td><input type="checkbox" value="2" name="exp_value2" />Approve</td>
			</tr>
			<tr>
				<th>Tanggal pemenuhan paket</th>
				<td><?=$exp_date2?></td>
				<td><input type="checkbox" value="2" name="exp_date2" />Approve</td>
			</tr>
			<tr>
				<th><a href="<?=base_url()."uploads/".$exp_doc2?>">Salinan
				Kontrak/Invoice</a></th>
				<td>
				<table>
					<tr>
						<td>Dokumen Tersedia</td>
					</tr>
					<tr>
						<td>Kop Surat tersedia dengan benar</td>
					</tr>
					<tr>
						<td>Cap dan tanggal tersedia</td>
					</tr>
					<tr>
						<td>Terdapat cap dan tanda tangan asli</td>
					</tr>
				</table>
				</td>
				<td>
				<table>
					<tr>
						<td><input type="checkbox" value="1" name="exp_doc2_tersedia" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="exp_doc2_kop" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="exp_doc2_cap" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="exp_doc2_ttd" />Approve</td>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>

			<tr>
				<th>Nama Paket 3</th>
				<td><?=$exp_nama3?></td>
				<td><input type="checkbox" value="1" name="exp_nama3" />Approve</td>
			</tr>
			<tr>
				<th>Pemilik Proyek 3</th>
				<td><?=$exp_own3?></td>
				<td><input type="checkbox" value="1" name="exp_own3" />Approve</td>
			</tr>
			<tr>
				<th>Nilai Paket</th>
				<td><?=$exp_value3?></td>
				<td><input type="checkbox" value="1" name="exp_value3" />Approve</td>
			</tr>
			<tr>
				<th>Tanggal pemenuhan paket</th>
				<td><?=$exp_date3?></td>
				<td><input type="checkbox" value="1" name="exp_date3" />Approve</td>
			</tr>
			<tr>
				<th><a href="<?=base_url()."uploads/".$exp_doc3?>">Salinan
				Kontrak/Invoice</a></th>
				<td>
				<table>
					<tr>
						<td>Dokumen Tersedia</td>
					</tr>
					<tr>
						<td>Kop Surat tersedia dengan benar</td>
					</tr>
					<tr>
						<td>Cap dan tanggal tersedia</td>
					</tr>
					<tr>
						<td>Terdapat cap dan tanda tangan asli</td>
					</tr>
				</table>
				</td>
				<td>
				<table>
					<tr>
						<td><input type="checkbox" value="1" name="exp_doc3_tersedia" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="exp_doc3_kop" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="exp_doc3_cap" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="exp_doc3_ttd" />Approve</td>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>

			<tr>
				<th>Nama Paket 4</th>
				<td><?=$exp_nama4?></td>
				<td><input type="checkbox" value="1" name="exp_nama4" />Approve</td>
			</tr>
			<tr>
				<th>Pemilik Proyek 4</th>
				<td><?=$exp_own4?></td>
				<td><input type="checkbox" value="1" name="exp_own4" />Approve</td>
			</tr>
			<tr>
				<th>Nilai Paket</th>
				<td><?=$exp_value4?></td>
				<td><input type="checkbox" value="1" name="exp_value4" />Approve</td>
			</tr>
			<tr>
				<th>Tanggal pemenuhan paket</th>
				<td><?=$exp_date4?></td>
				<td><input type="checkbox" value="1" name="exp_date4" />Approve</td>
			</tr>
			<tr>
				<th><a href="<?=base_url()."uploads/".$exp_doc4?>">Salinan
				Kontrak/Invoice</a></th>
				<td>
				<table>
					<tr>
						<td>Dokumen Tersedia</td>
					</tr>
					<tr>
						<td>Kop Surat tersedia dengan benar</td>
					</tr>
					<tr>
						<td>Cap dan tanggal tersedia</td>
					</tr>
					<tr>
						<td>Terdapat cap dan tanda tangan asli</td>
					</tr>
				</table>
				</td>
				<td>
				<table>
					<tr>
						<td><input type="checkbox" value="1" name="exp_doc4_tersedia" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="exp_doc4_kop" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="exp_doc4_cap" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="exp_doc4_ttd" />Approve</td>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>

			<tr>
				<th>Nama Paket 5</th>
				<td><?=$exp_nama5?></td>
				<td><input type="checkbox" value="1" name="exp_nama5" />Approve</td>
			</tr>
			<tr>
				<th>Pemilik Proyek 5</th>
				<td><?=$exp_own5?></td>
				<td><input type="checkbox" value="1" name="exp_own5" />Approve</td>
			</tr>
			<tr>
				<th>Nilai Paket</th>
				<td><?=$exp_value5?></td>
				<td><input type="checkbox" value="1" name="exp_value5" />Approve</td>
			</tr>
			<tr>
				<th>Tanggal pemenuhan paket</th>
				<td><?=$exp_date5?></td>
				<td><input type="checkbox" value="1" name="exp_date5" />Approve</td>
			</tr>
			<tr>
				<th><a href="<?=base_url()."uploads/".$exp_doc5?>">Salinan
				Kontrak/Invoice</a></th>
				<td>
				<table>
					<tr>
						<td>Dokumen Tersedia</td>
					</tr>
					<tr>
						<td>Kop Surat tersedia dengan benar</td>
					</tr>
					<tr>
						<td>Cap dan tanggal tersedia</td>
					</tr>
					<tr>
						<td>Terdapat cap dan tanda tangan asli</td>
					</tr>
				</table>
				</td>
				<td>
				<table>
					<tr>
						<td><input type="checkbox" value="1" name="exp_doc5_tersedia" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="exp_doc5_kop" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="exp_doc5_cap" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="exp_doc5_ttd" />Approve</td>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>

			<tr>
				<td>
				<h3>R. Referensi Bank</h3>
				</td>
			</tr>

			<tr>
				<th>Dokumen Referensi Bank</th>
				<td><a href="<?=base_url()."uploads/".$bank_ref?>">Download</a></td>
				<td><input type="checkbox" value="1" name="bank_ref" />Approve</td>
			</tr>

			<tr>
				<td>&nbsp;</td>
			</tr>

			<tr>
				<td>
				<h3>S. Surat Pernyataan</h3>
				</td>

			</tr>

			<tr>
				<th><a href="<?=base_url()."uploads/".$surat1?>">Surat Permohonan
				Menjadi Dealer Rekanan</a></th>
				<td>
				<table>
					<tr>
						<td>Dokumen Tersedia</td>
					</tr>
					<tr>
						<td>Kop Surat tersedia dengan benar</td>
					</tr>
					<tr>
						<td>Cap dan tanggal tersedia</td>
					</tr>
					<tr>
						<td>Terdapat cap dan tanda tangan asli</td>
					</tr>
				</table>
				</td>
				<td>
				<table>
					<tr>
						<td><input type="checkbox" value="1" name="surat2_tersedia" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="surat2_kop" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="surat2_cap" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="surat2_ttd" />Approve</td>
					</tr>
				</table>
				</td>
			</tr>


			<tr>
				<th><a href="<?=base_url()."uploads/".$pailit?>">Surat Pernyataan
				Tidak Pailit</a></th>
				<td>
				<table>
					<tr>
						<td>Dokumen Tersedia</td>
					</tr>
					<tr>
						<td>Kop Surat tersedia dengan benar</td>
					</tr>
					<tr>
						<td>Cap dan tanggal tersedia</td>
					</tr>
					<tr>
						<td>Terdapat cap dan tanda tangan asli</td>
					</tr>
				</table>
				</td>
				<td>
				<table>
					<tr>
						<td><input type="checkbox" value="1" name="pailit_tersedia" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="pailit_kop" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="pailit_cap" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="pailit_ttd" />Approve</td>
					</tr>
				</table>
				</td>
			</tr>

			<tr>
				<th><a href="<?=base_url()."uploads/".$surat2?>">Surat Pernyataan
				Kesanggupan Memenuhi Ketentuan E-Purchasing</a></th>
				<td>
				<table>
					<tr>
						<td>Dokumen Tersedia</td>
					</tr>
					<tr>
						<td>Kop Surat tersedia dengan benar</td>
					</tr>
					<tr>
						<td>Cap dan tanggal tersedia</td>
					</tr>
					<tr>
						<td>Terdapat cap dan tanda tangan asli</td>
					</tr>
				</table>
				</td>
				<td>
				<table>
					<tr>
						<td><input type="checkbox" value="1" name="surat2_tersedia" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="surat2_kop" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="surat2_cap" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="surat2_ttd" />Approve</td>
					</tr>
				</table>
				</td>
			</tr>

			<tr>
				<th><a href="<?=base_url()."uploads/".$pakta?>">Pakta Integritas</a></th>
				<td>
				<table>
					<tr>
						<td>Dokumen Tersedia</td>
					</tr>
					<tr>
						<td>Kop Surat tersedia dengan benar</td>
					</tr>
					<tr>
						<td>Cap dan tanggal tersedia</td>
					</tr>
					<tr>
						<td>Terdapat cap dan tanda tangan asli</td>
					</tr>
				</table>
				</td>
				<td>
				<table>
					<tr>
						<td><input type="checkbox" value="1" name="pakta_tersedia" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="pakta_kop" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="pakta_cap" />Approve</td>
					</tr>
					<tr>
						<td><input type="checkbox" value="1" name="pakta_ttd" />Approve</td>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			
			<tr>
				<td>Status Delaer :</td>
				<td>
					<select name="status">
						<option value="1">Diterima</option>	
						<option value="2">Revisi</option>
						<option value="3">Ditolak</option>
					</select>
				</td>
				<td> </td>
			</tr>
			<tr>
				<td>Alasan tambahan :</td>
				<td><textarea name="komentar" rows="5" cols="30"></textarea></td>
			</tr>
			<tr>
			<td></td>
			<td></td>
				<td><input type="submit"  value="save" class="form-submit"/></td>
			</tr>

		</table>
		</form>
		</div>
		<!-- end table-content -->

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
