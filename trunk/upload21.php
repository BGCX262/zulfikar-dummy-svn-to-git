<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>tes ajax upload</title>
        <link href="uploadify/uploadify.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="uploadify/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="uploadify/swfobject.js"></script>
        <script type="text/javascript" src="uploadify/jquery.uploadify.v2.1.4.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#file_upload').uploadify({
                    'uploader'  : 'uploadify/uploadify.swf',
                    'script'    : 'uploadify/uploadify.php',
                    'cancelImg' : 'uploadify/cancel.png',
                    'folder'    : 'uploads',
                    'auto'      : true
                });
            });
        </script>
    </head>
    <body>
        Syalala
        <input id="file_upload" name="file_upload" type="file" />
    </body>
</html>
