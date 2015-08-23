<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>E-PURCHASING SYSTEM</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!--BEGIN FROM TEMPALTE-->
        <link rel="shortcut icon" href="<?php echo base_url();?>images/shared/icon.png" type="image/png" />
        <link rel="stylesheet" href="<?php echo base_url();?>css/screen.css" type="text/css" media="screen" title="default" />
        <!--  jquery core -->
        <script src="<?php echo base_url();?>js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

        <!-- Custom jquery scripts -->
        <script src="<?php echo base_url();?>js/jquery/custom_jquery.js" type="text/javascript"></script>

        <!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
        <script src="<?php echo base_url();?>js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(document).pngFix( );
            });
        </script>
        <!--END FROM TEMPALTE-->


    </head>
    <body id="login-bg">
        <div id="page-top-outer">
            <!-- Start: page-top -->
            <div id="page-top">
                <!-- start logo -->
                <div id="logo-top">
                    <img src="<?php echo base_url();?>images/shared/logo.png" alt="" />
                </div>
                <div id="page-top-title">
                    <h1 align="center">E-Purchasing Mobil &#13;&#10 Pemerintah Jawa Barat</h1>
                </div>
                <!-- end logo -->
                <div class="clear"></div>
            </div>
            <!-- End: page-top -->
        </div>

        <!-- Start: login-holder -->
        <div id="login-holder">
            <!-- start logo -->
            <!-- end logo -->
            <div id="errorfiled">

            </div>

            <div class="clear"></div>

            <!--  start loginbox ................................................................................. -->
            <div id="loginbox">
                <!--  start login-inner -->
                <div id="login-inner">
                  <form method="POST" action="<?php echo base_url(); ?>index.php/common/authenticate">
                        <table border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <th>Username </th>
                                <td><input type="text" name="email" class="login-inp" /></td>
                            </tr>
                            <tr>
                                <th>Password</th>
                                <td><input type="password" name="password" class="login-inp" /></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td><input type="submit" class="submit-login"  value="Login"/></td>
                            </tr>
                        </table>
                        <div align="left"><br>
                              <span style="margin-left: 5px"><a href="<?php echo base_url()."index.php/daftar/index"?>">Daftar Sebagai Calon Dealer </a>  ||   <a href="<?php echo base_url()."index.php/login/browse_katalog?awal=y"?>">Browse Katalog Mobil</a></span>
                            <br>
                            <br>
                            <span style="text-align: center;"></span>
                            <span style="text-align: center;"></span>
                                </div>
                  </form>
                </div>
                <!--  end login-inner -->
                <div id="login-error">

                </div>
                <div class="clear"></div>
            </div>
            <!--  end loginbox -->


        </div>
        <!-- End: login-holder -->
        <div id="footer">

        </div>
    </body>
</html>
