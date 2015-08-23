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
        <script src="<?php echo base_url()?>js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.styledselect').selectbox({ inputClass: "selectbox_styled" });
            });
        </script>


        <![endif]>

        <!--  styled select box script version 2 -->
        <script src="<?php echo base_url()?>js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
                $('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
            });
        </script>

        <!--  styled select box script version 3 -->
        <script src="<?php echo base_url()?>js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.styledselect_pages').selectbox({ inputClass: "styledselect_pages" });
            });
        </script>

        <!--  styled file upload script -->
        <script src="<?php echo base_url()?>js/jquery/jquery.filestyle.js" type="text/javascript"></script>
        <script type="text/javascript" charset="utf-8">
            $(function() {
                $("input.file_1").filestyle({
                    image: "<?php echo base_url()?>images/forms/choose-file.gif",
                    imageheight : 21,
                    imagewidth : 78,
                    width : 185
                });
            });
        </script>

        <!-- Custom jquery scripts -->
        <script src="<?php echo base_url()?>js/jquery/custom_jquery.js" type="text/javascript"></script>

        <!-- Tooltips -->
        <script src="<?php echo base_url()?>js/jquery/jquery.tooltip.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>js/jquery/jquery.dimensions.js" type="text/javascript"></script>
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


        <!--  date picker script -->
        <link rel="stylesheet" href="<?php echo base_url()?>css/datePicker.css" type="text/css" />
        <script src="<?php echo base_url()?>js/jquery/date.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>js/jquery/jquery.datePicker.js" type="text/javascript"></script>
        <script type="text/javascript" charset="utf-8">
            $(function()
            {

                // initialise the "Select date" link
                $('#date-pick2')
                .datePicker(
                // associate the link with a date picker
                {
                    createButton:false,
                    startDate:'01/01/2005',
                    endDate:'31/12/2020'
                }
            ).bind(
                // when the link is clicked display the date picker
                'click',
                function()
                {
                    updateSelects($(this).dpGetSelected()[0]);
                    $(this).dpDisplay();
                    return false;
                }
            ).bind(
                // when a date is selected update the SELECTs
                'dateSelected',
                function(e, selectedDate, $td, state)
                {
                    updateSelects(selectedDate);
                }
            ).bind(
                'dpClosed',
                function(e, selected)
                {
                    updateSelects(selected[0]);
                }
            );

                var updateSelects = function (selectedDate)
                {
                    var selectedDate = new Date(selectedDate);
                    $('#d2 option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
                    $('#m2 option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
                    $('#y2 option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
                }
                // listen for when the selects are changed and update the picker
                $('#d2, #m2, #y2')
                .bind(
                'change',
                function()
                {
                    var d = new Date(
                    $('#y2').val(),
                    $('#m2').val()-1,
                    $('#d2').val()
                );
                    $('#date-pick2').dpSetSelected(d.asString());
                }
            );

                // default the position of the selects to today
                var today = new Date();
                updateSelects(today.getTime());

                // and update the datePicker to reflect it...
                $('#d2').trigger('change');
            });

            $(function()
            {
                // initialise the "Select date" link
                $('#date-pick3')
                .datePicker(
                // associate the link with a date picker
                {
                    createButton:false,
                    startDate:'01/01/2005',
                    endDate:'31/12/2020'
                }
            ).bind(
                // when the link is clicked display the date picker
                'click',
                function()
                {
                    updateSelects($(this).dpGetSelected()[0]);
                    $(this).dpDisplay();
                    return false;
                }
            ).bind(
                // when a date is selected update the SELECTs
                'dateSelected',
                function(e, selectedDate, $td, state)
                {
                    updateSelects(selectedDate);
                }
            ).bind(
                'dpClosed',
                function(e, selected)
                {
                    updateSelects(selected[0]);
                }
            );

                var updateSelects = function (selectedDate)
                {
                    var selectedDate = new Date(selectedDate);
                    $('#d3 option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
                    $('#m3 option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
                    $('#y3 option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
                }
                // listen for when the selects are changed and update the picker
                $('#d3, #m3, #y3')
                .bind(
                'change',
                function()
                {
                    var d = new Date(
                    $('#y3').val(),
                    $('#m3').val()-1,
                    $('#d3').val()
                );
                    $('#date-pick3').dpSetSelected(d.asString());
                }
            );

                // default the position of the selects to today
                var today = new Date();
                updateSelects(today.getTime());

                // and update the datePicker to reflect it...
                $('#d3').trigger('change');
            });


            $(function()
            {
                // initialise the "Select date" link
                $('#date-pick4')
                .datePicker(
                // associate the link with a date picker
                {
                    createButton:false,
                    startDate:'01/01/2005',
                    endDate:'31/12/2020'
                }
            ).bind(
                // when the link is clicked display the date picker
                'click',
                function()
                {
                    updateSelects($(this).dpGetSelected()[0]);
                    $(this).dpDisplay();
                    return false;
                }
            ).bind(
                // when a date is selected update the SELECTs
                'dateSelected',
                function(e, selectedDate, $td, state)
                {
                    updateSelects(selectedDate);
                }
            ).bind(
                'dpClosed',
                function(e, selected)
                {
                    updateSelects(selected[0]);
                }
            );

                var updateSelects = function (selectedDate)
                {
                    var selectedDate = new Date(selectedDate);
                    $('#d4 option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
                    $('#m4 option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
                    $('#y4 option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
                }
                // listen for when the selects are changed and update the picker
                $('#d4, #m4, #y4')
                .bind(
                'change',
                function()
                {
                    var d = new Date(
                    $('#y4').val(),
                    $('#m4').val()-1,
                    $('#d4').val()
                );
                    $('#date-pick4').dpSetSelected(d.asString());
                }
            );

                // default the position of the selects to today
                var today = new Date();
                updateSelects(today.getTime());

                // and update the datePicker to reflect it...
                $('#d4').trigger('change');
            });

            $(function()
            {
                // initialise the "Select date" link
                $('#date-pick5')
                .datePicker(
                // associate the link with a date picker
                {
                    createButton:false,
                    startDate:'01/01/2005',
                    endDate:'31/12/2020'
                }
            ).bind(
                // when the link is clicked display the date picker
                'click',
                function()
                {
                    updateSelects($(this).dpGetSelected()[0]);
                    $(this).dpDisplay();
                    return false;
                }
            ).bind(
                // when a date is selected update the SELECTs
                'dateSelected',
                function(e, selectedDate, $td, state)
                {
                    updateSelects(selectedDate);
                }
            ).bind(
                'dpClosed',
                function(e, selected)
                {
                    updateSelects(selected[0]);
                }
            );

                var updateSelects = function (selectedDate)
                {
                    var selectedDate = new Date(selectedDate);
                    $('#d5 option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
                    $('#m5 option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
                    $('#y5 option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
                }
                // listen for when the selects are changed and update the picker
                $('#d5, #m5, #y5')
                .bind(
                'change',
                function()
                {
                    var d = new Date(
                    $('#y5').val(),
                    $('#m5').val()-1,
                    $('#d5').val()
                );
                    $('#date-pick5').dpSetSelected(d.asString());
                }
            );

                // default the position of the selects to today
                var today = new Date();
                updateSelects(today.getTime());

                // and update the datePicker to reflect it...
                $('#d5').trigger('change');
            });

            //yang keenam
            $(function()
            {
                // initialise the "Select date" link
                $('#date-pick6')
                .datePicker(
                // associate the link with a date picker
                {
                    createButton:false,
                    startDate:'01/01/2005',
                    endDate:'31/12/2020'
                }
            ).bind(
                // when the link is clicked display the date picker
                'click',
                function()
                {
                    updateSelects($(this).dpGetSelected()[0]);
                    $(this).dpDisplay();
                    return false;
                }
            ).bind(
                // when a date is selected update the SELECTs
                'dateSelected',
                function(e, selectedDate, $td, state)
                {
                    updateSelects(selectedDate);
                }
            ).bind(
                'dpClosed',
                function(e, selected)
                {
                    updateSelects(selected[0]);
                }
            );

                var updateSelects = function (selectedDate)
                {
                    var selectedDate = new Date(selectedDate);
                    $('#d6 option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
                    $('#m6 option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
                    $('#y6 option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
                }
                // listen for when the selects are changed and update the picker
                $('#d6, #m6, #y6')
                .bind(
                'change',
                function()
                {
                    var d = new Date(
                    $('#y6').val(),
                    $('#m6').val()-1,
                    $('#d6').val()
                );
                    $('#date-pick6').dpSetSelected(d.asString());
                }
            );

                // default the position of the selects to today
                var today = new Date();
                updateSelects(today.getTime());

                // and update the datePicker to reflect it...
                $('#d6').trigger('change');
            });

            //yang ketujuh
            $(function()
            {
                // initialise the "Select date" link
                $('#date-pick7')
                .datePicker(
                // associate the link with a date picker
                {
                    createButton:false,
                    startDate:'01/01/2005',
                    endDate:'31/12/2020'
                }
            ).bind(
                // when the link is clicked display the date picker
                'click',
                function()
                {
                    updateSelects($(this).dpGetSelected()[0]);
                    $(this).dpDisplay();
                    return false;
                }
            ).bind(
                // when a date is selected update the SELECTs
                'dateSelected',
                function(e, selectedDate, $td, state)
                {
                    updateSelects(selectedDate);
                }
            ).bind(
                'dpClosed',
                function(e, selected)
                {
                    updateSelects(selected[0]);
                }
            );

                var updateSelects = function (selectedDate)
                {
                    var selectedDate = new Date(selectedDate);
                    $('#d7 option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
                    $('#m7 option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
                    $('#y7 option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
                }
                // listen for when the selects are changed and update the picker
                $('#d7, #m7, #y7')
                .bind(
                'change',
                function()
                {
                    var d = new Date(
                    $('#y7').val(),
                    $('#m7').val()-1,
                    $('#d7').val()
                );
                    $('#date-pick7').dpSetSelected(d.asString());
                }
            );

                // default the position of the selects to today
                var today = new Date();
                updateSelects(today.getTime());

                // and update the datePicker to reflect it...
                $('#d7').trigger('change');
            });

            $(function()
            {
                // initialise the "Select date" link
                $('#date-pick8')
                .datePicker(
                // associate the link with a date picker
                {
                    createButton:false,
                    startDate:'01/01/2005',
                    endDate:'31/12/2020'
                }
            ).bind(
                // when the link is clicked display the date picker
                'click',
                function()
                {
                    updateSelects($(this).dpGetSelected()[0]);
                    $(this).dpDisplay();
                    return false;
                }
            ).bind(
                // when a date is selected update the SELECTs
                'dateSelected',
                function(e, selectedDate, $td, state)
                {
                    updateSelects(selectedDate);
                }
            ).bind(
                'dpClosed',
                function(e, selected)
                {
                    updateSelects(selected[0]);
                }
            );

                var updateSelects = function (selectedDate)
                {
                    var selectedDate = new Date(selectedDate);
                    $('#d8 option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
                    $('#m8 option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
                    $('#y8 option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
                }
                // listen for when the selects are changed and update the picker
                $('#d8, #m8, #y8')
                .bind(
                'change',
                function()
                {
                    var d = new Date(
                    $('#y8').val(),
                    $('#m8').val()-1,
                    $('#d8').val()
                );
                    $('#date-pick8').dpSetSelected(d.asString());
                }
            );

                // default the position of the selects to today
                var today = new Date();
                updateSelects(today.getTime());

                // and update the datePicker to reflect it...
                $('#d8').trigger('change');
            });
        </script>

        <script type="text/javascript" src="<?php echo base_url()?>uploadify/swfobject.js"></script>
        <script type="text/javascript" src="<?php echo base_url()?>uploadify/jquery.uploadify.v2.1.4.min.js"></script>
        
        <script type="text/javascript">
            $(document).ready(function() {
                $('#file_upload').uploadify({
                    'uploader'  : '<?php echo base_url()?>uploadify/uploadify.swf',
                    'script'    : '<?php echo base_url()?>uploadify/uploadify3.php?username=<?php echo $this->session->userdata('username')?>',
                    'cancelImg' : '<?php echo base_url()?>uploadify/cancel.png',
                    'folder'    : '/amel/uploads',
                    'auto'      : true
                });
            });

            $(document).ready(function() {
                $('#file_upload1').uploadify({
                    'uploader'  : '<?php echo base_url()?>uploadify/uploadify.swf',
                    'script'    : '<?php echo base_url()?>uploadify/uploadify31.php?username=<?php echo $this->session->userdata('username')?>',
                    'cancelImg' : '<?php echo base_url()?>uploadify/cancel.png',
                    'folder'    : '/amel/uploads',
                    'auto'      : true
                });
            });

            $(document).ready(function() {
                $('#file_upload2').uploadify({
                    'uploader'  : '<?php echo base_url()?>uploadify/uploadify.swf',
                    'script'    : '<?php echo base_url()?>uploadify/uploadify32.php?username=<?php echo $this->session->userdata('username')?>',
                    'cancelImg' : '<?php echo base_url()?>uploadify/cancel.png',
                    'folder'    : '/amel/uploads',
                    'auto'      : true
                });
            });

            $(document).ready(function() {
                $('#file_upload3').uploadify({
                    'uploader'  : '<?php echo base_url()?>uploadify/uploadify.swf',
                    'script'    : '<?php echo base_url()?>uploadify/uploadify33.php?username=<?php echo $this->session->userdata('username')?>',
                    'cancelImg' : '<?php echo base_url()?>uploadify/cancel.png',
                    'folder'    : '/amel/uploads',
                    'auto'      : true
                });
            });

            $(document).ready(function() {
                $('#file_upload4').uploadify({
                    'uploader'  : '<?php echo base_url()?>uploadify/uploadify.swf',
                    'script'    : '<?php echo base_url()?>uploadify/uploadify34.php?username=<?php echo $this->session->userdata('username')?>',
                    'cancelImg' : '<?php echo base_url()?>uploadify/cancel.png',
                    'folder'    : '/amel/uploads',
                    'auto'      : true
                });
            });

            $(document).ready(function() {
                $('#file_upload5').uploadify({
                    'uploader'  : '<?php echo base_url()?>uploadify/uploadify.swf',
                    'script'    : '<?php echo base_url()?>uploadify/uploadify35.php?username=<?php echo $this->session->userdata('username')?>',
                    'cancelImg' : '<?php echo base_url()?>uploadify/cancel.png',
                    'folder'    : '/amel/uploads',
                    'auto'      : true
                });
            });

            $(document).ready(function() {
                $('#file_upload6').uploadify({
                    'uploader'  : '<?php echo base_url()?>uploadify/uploadify.swf',
                    'script'    : '<?php echo base_url()?>uploadify/uploadify36.php?username=<?php echo $this->session->userdata('username')?>',
                    'cancelImg' : '<?php echo base_url()?>uploadify/cancel.png',
                    'folder'    : '/amel/uploads',
                    'auto'      : true
                });
            });


        </script>

        <!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
        <script src="<?php echo base_url()?>js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(document).pngFix( );
            });
        </script>
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

                    if($this->session->userdata('role')==1){
                        $this->load->view('menuadmin.php');
                    }
                    else if($this->session->userdata('role')==2) {
                        $this->load->view('menucalondealer.php');
                    }else if ($this->session->userdata('role')==3) {
                        $this->load->view('menudealer.php');
                    }else if ($this->session->userdata(role.php)==4){
                        $this->load->view('menuadminulp.php');
                    }else if ($this->session->userdata(role.php)==5){
                        $this->load->view('menuatpm.php');
                    }else if ($this->session->userdata(role.php)==6){
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
                    <h1>Formulir 3</h1>
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
                                <div id="table-content-regular">
                                    <br /> <br />

                                    <form method="post" action="<?php echo base_url()?>index.php/dokumenkualifikasi/edit_process/3">
                                        <h3>H. Akta Pendirian Perusahaan</h3>
                                        <div id="labelformulir">Nama Notaris</div>                              <input class="inp-form" type="text" value="<?php echo $ap_notaris?>" name="ap_notaris"/>       <br />
                                        <div id="labelformulir">Nomor Akta Notaris Pendirian Perusahaan</div>   <input class="inp-form" type="text" value="<?php echo $ap_number?>" name="ap_number"/><br />
                                        <div id="labelformulir">Tanggal Akta Notaris Pendirian Perusahaan</div> 
                                        <select id="d2" name="d_ap_date" class="styledselect-day">
                                            <option value="">dd</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                        </select>

                                        <select id="m2" name="m_ap_date" class="styledselect-month">
                                            <option value="">mm</option>
                                            <option value="1">Jan</option>
                                            <option value="2">Feb</option>
                                            <option value="3">Mar</option>
                                            <option value="4">Apr</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Jun</option>
                                            <option value="7">Jul</option>
                                            <option value="8">Agu</option>
                                            <option value="9">Sep</option>
                                            <option value="10">Okt</option>
                                            <option value="11">Nop</option>
                                            <option value="12">Des</option>
                                        </select>

                                        <select  id="y2" name="y_ap_date" class="styledselect-year">
                                            <option value="">yyyy</option>
                                            <option value="2005">2005</option>
                                            <option value="2006">2006</option>
                                            <option value="2007">2007</option>
                                            <option value="2008">2008</option>
                                            <option value="2009">2009</option>
                                            <option value="2010">2010</option>
                                            <option value="2011">2011</option>
                                            <option value="2012">2012</option>
                                        </select>

                                        <a href=""  id="date-pick2"><img src="<?php echo base_url()?>images/forms/icon_calendar.jpg"   alt="" /></a>                  <br />
                                        <div id="labelformulir">Dokumen Akta Notaris Pendirian Perusahaan</div>                 <input id="file_upload" name="file_upload" type="file" />                  <br />
                                        <div id="labelformulir">Nomor Surat Keputusan Menkumham</div>                           <input class="inp-form" value="<?php echo $ap_menhukam_no?>" type="text" name="ap_menhukam_no"/>                  <br />
                                        <div id="labelformulir">Tanggal Surat Keputusan Menkumham</div>           
                                        <select id="d3" name="d_ap_menhukam_date" class="styledselect-day">
                                            <option value="">dd</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                        </select>

                                        <select id="m3" name="m_ap_menhukam_date" class="styledselect-month">
                                            <option value="">mm</option>
                                            <option value="1">Jan</option>
                                            <option value="2">Feb</option>
                                            <option value="3">Mar</option>
                                            <option value="4">Apr</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Jun</option>
                                            <option value="7">Jul</option>
                                            <option value="8">Agu</option>
                                            <option value="9">Sep</option>
                                            <option value="10">Okt</option>
                                            <option value="11">Nop</option>
                                            <option value="12">Des</option>
                                        </select>

                                        <select  id="y3" name="y_ap_menhukam_date" class="styledselect-year">
                                            <option value="">yyyy</option>
                                            <option value="2005">2005</option>
                                            <option value="2006">2006</option>
                                            <option value="2007">2007</option>
                                            <option value="2008">2008</option>
                                            <option value="2009">2009</option>
                                            <option value="2010">2010</option>
                                            <option value="2011">2011</option>
                                            <option value="2012">2012</option>
                                        </select>

                                        <a href=""  id="date-pick3"><img src="<?php echo base_url()?>images/forms/icon_calendar.jpg"   alt="" /></a>                  <br />
                                        <div id="labelformulir">Dokumen Surat Keputusan Menkumham</div>           <input id="file_upload1" name="file_upload" type="file" />                  <br />
                                        <br /><br/>

                                        <h3>I. Akta Notaris Perubahan Terakhir</h3>
                                        <div id="labelformulir">Nama Notaris</div>                              <input class="inp-form" value="<?php echo $an_notaris?>" type="text" name="an_notaris"/>       <br />
                                        <div id="labelformulir">Nomor Akta Notaris Perubahan Terakhir</div>     <input class="inp-form" value="<?php echo $an_nomor?>" type="text" name="an_nomor"/><br />
                                        <div id="labelformulir">Tanggal Akta Notaris Perubahan Terakhir</div>
                                        <select id="d4" name="d_an_date" class="styledselect-day">
                                            <option value="">dd</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                        </select>

                                        <select id="m4" name="m_an_date" class="styledselect-month">
                                            <option value="">mm</option>
                                            <option value="1">Jan</option>
                                            <option value="2">Feb</option>
                                            <option value="3">Mar</option>
                                            <option value="4">Apr</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Jun</option>
                                            <option value="7">Jul</option>
                                            <option value="8">Agu</option>
                                            <option value="9">Sep</option>
                                            <option value="10">Okt</option>
                                            <option value="11">Nop</option>
                                            <option value="12">Des</option>
                                        </select>

                                        <select  id="y4" name="y_an_date" class="styledselect-year">
                                            <option value="">yyyy</option>
                                            <option value="2005">2005</option>
                                            <option value="2006">2006</option>
                                            <option value="2007">2007</option>
                                            <option value="2008">2008</option>
                                            <option value="2009">2009</option>
                                            <option value="2010">2010</option>
                                            <option value="2011">2011</option>
                                            <option value="2012">2012</option>
                                        </select>

                                        <a href=""  id="date-pick4"><img src="<?php echo base_url()?>images/forms/icon_calendar.jpg"   alt="" /></a>                  <br />
                                        <br />

                                        <div id="labelformulir">Dokumen Akta Notaris Perubahan Terakhir</div>   <input id="file_upload2" name="file_upload" type="file" />                  <br />
                                        <div id="labelformulir">Nomor Surat Keputusan Menkumham</div>           <input class="inp-form" value="<?php echo $an_menhukam_no?>" type="text" name="an_menhukam_no"/>                  <br />
                                        <div id="labelformulir">Tanggal Surat Keputusan Menkumham</div>         
                                        <select id="d5" name="d_an_menhukam_date" class="styledselect-day">
                                            <option value="">dd</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                        </select>

                                        <select id="m5" name="m_an_menhukam_date" class="styledselect-month">
                                            <option value="">mm</option>
                                            <option value="1">Jan</option>
                                            <option value="2">Feb</option>
                                            <option value="3">Mar</option>
                                            <option value="4">Apr</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Jun</option>
                                            <option value="7">Jul</option>
                                            <option value="8">Agu</option>
                                            <option value="9">Sep</option>
                                            <option value="10">Okt</option>
                                            <option value="11">Nop</option>
                                            <option value="12">Des</option>
                                        </select>

                                        <select  id="y5" name="y_an_menhukam_date" class="styledselect-year">
                                            <option value="">yyyy</option>
                                            <option value="2005">2005</option>
                                            <option value="2006">2006</option>
                                            <option value="2007">2007</option>
                                            <option value="2008">2008</option>
                                            <option value="2009">2009</option>
                                            <option value="2010">2010</option>
                                            <option value="2011">2011</option>
                                            <option value="2012">2012</option>
                                        </select>

                                        <a href=""  id="date-pick5"><img src="<?php echo base_url()?>images/forms/icon_calendar.jpg"   alt="" /></a>                  <br />

                                        <br />
                                        <div id="labelformulir">Dokumen Surat Keputusan Menkumham</div>         <input id="file_upload3" name="file_upload" type="file" />                  <br />
                                        <br /><br />

                                        <h3>J. Surat Izin Usaha Perdagangan (SIUP)</h3>
                                        <div id="labelformulir">Nomor SIUP</div>                                <input class="inp-form" value="<?php echo $siup_nomor?>" type="text" name="siup_nomor"/><br />
                                        <div id="labelformulir">Tanggal Terdaftar(yyyy/mm/dd)</div>
                                        <select id="d6" name="d_siup_date" class="styledselect-day">
                                            <option value="">dd</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                        </select>

                                        <select id="m6" name="m_siup_date" class="styledselect-month">
                                            <option value="">mm</option>
                                            <option value="1">Jan</option>
                                            <option value="2">Feb</option>
                                            <option value="3">Mar</option>
                                            <option value="4">Apr</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Jun</option>
                                            <option value="7">Jul</option>
                                            <option value="8">Agu</option>
                                            <option value="9">Sep</option>
                                            <option value="10">Okt</option>
                                            <option value="11">Nop</option>
                                            <option value="12">Des</option>
                                        </select>

                                        <select  id="y6" name="y_siup_date" class="styledselect-year">
                                            <option value="">yyyy</option>
                                            <option value="2005">2005</option>
                                            <option value="2006">2006</option>
                                            <option value="2007">2007</option>
                                            <option value="2008">2008</option>
                                            <option value="2009">2009</option>
                                            <option value="2010">2010</option>
                                            <option value="2011">2011</option>
                                            <option value="2012">2012</option>
                                        </select>
                                        <a href=""  id="date-pick6"><img src="<?php echo base_url()?>images/forms/icon_calendar.jpg"   alt="" /></a>                  <br />

                                        <br />
                                        <div id="labelformulir">Salinan SIUP</div><input id="file_upload4" name="file_upload" type="file" /><br />
                                        <br /><br />

                                        <h3>K. Tanda Daftar Perusahaan (TDP)</h3>
                                        <div id="labelformulir">Nomor TDP</div>                                 <input class="inp-form" value="<?php echo $tdp_nomor?>" type="text" name="tdp_nomor"/><br />
                                        <div id="labelformulir">Berlaku Hingga</div>
                                        <select id="d7" name="d_tdp_date" class="styledselect-day">
                                            <option value="">dd</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                        </select>

                                        <select id="m7" name="m_tdp_date" class="styledselect-month">
                                            <option value="">mm</option>
                                            <option value="1">Jan</option>
                                            <option value="2">Feb</option>
                                            <option value="3">Mar</option>
                                            <option value="4">Apr</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Jun</option>
                                            <option value="7">Jul</option>
                                            <option value="8">Agu</option>
                                            <option value="9">Sep</option>
                                            <option value="10">Okt</option>
                                            <option value="11">Nop</option>
                                            <option value="12">Des</option>
                                        </select>

                                        <select  id="y7" name="y_tdp_date" class="styledselect-year">
                                            <option value="">yyyy</option>
                                            <option value="2005">2005</option>
                                            <option value="2006">2006</option>
                                            <option value="2007">2007</option>
                                            <option value="2008">2008</option>
                                            <option value="2009">2009</option>
                                            <option value="2010">2010</option>
                                            <option value="2011">2011</option>
                                            <option value="2012">2012</option>
                                        </select>
                                        <a href=""  id="date-pick7"><img src="<?php echo base_url()?>images/forms/icon_calendar.jpg"   alt="" /></a>                  <br />


                                        <br />
                                        <div id="labelformulir">Salinan TDP</div>                               <input id="file_upload5" name="file_upload" type="file" /><br />
                                        <br /><br />

                                        <h3>Surat Izin Tempat Usaha (SITU)</h3>
                                        <div id="labelformulir">Nomor SITU</div>                                <input class="inp-form" value="<?php echo $situ_nomor?>" type="text" name="situ_nomor"/><br />
                                        <div id="labelformulir">Berlaku Hingga</div>
                                        <select id="d8" name="d_situ_date" class="styledselect-day">
                                            <option value="">dd</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                        </select>

                                        <select id="m8" name="m_situ_date" class="styledselect-month">
                                            <option value="">mm</option>
                                            <option value="1">Jan</option>
                                            <option value="2">Feb</option>
                                            <option value="3">Mar</option>
                                            <option value="4">Apr</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Jun</option>
                                            <option value="7">Jul</option>
                                            <option value="8">Agu</option>
                                            <option value="9">Sep</option>
                                            <option value="10">Okt</option>
                                            <option value="11">Nop</option>
                                            <option value="12">Des</option>
                                        </select>

                                        <select  id="y8" name="y_situ_date" class="styledselect-year">
                                            <option value="">yyyy</option>
                                            <option value="2005">2005</option>
                                            <option value="2006">2006</option>
                                            <option value="2007">2007</option>
                                            <option value="2008">2008</option>
                                            <option value="2009">2009</option>
                                            <option value="2010">2010</option>
                                            <option value="2011">2011</option>
                                            <option value="2012">2012</option>
                                        </select>
                                        <a href=""  id="date-pick8"><img src="<?php echo base_url()?>images/forms/icon_calendar.jpg"   alt="" /></a>                  <br />

                                        <div id="labelformulir">Salinan SITU</div><input id="file_upload6" name="file_upload" type="file" /><br />

                                        <a href="<?=base_url()?>index.php/dokumenkualifikasi/edit_submit/1" class="form-kembali" style="font-size: x-large">&nbsp;&nbsp;&nbsp;&nbsp;</a>&nbsp;<input type="submit" class="form-lanjut"/>
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