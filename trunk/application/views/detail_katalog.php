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
                        </div>
                    <div class="nav-divider">&nbsp;</div>
                   
                    <div class="clear">&nbsp;</div>

                    <!--  start account-content -->
                    <div class="account-content">
                        <div class="account-drop-inner">

                        </div>
                    </div>
                    <!--  end account-content -->

                </div>
                <!-- end nav-right -->


                <!--  start nav -->
                <div class="nav">
 				
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
                                    </tr>
                                     <?php 
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