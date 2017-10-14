<?php
    if(C('LAYOUT_ON')) {
        echo '{__NOLAYOUT__}';
    }
?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>Document</title>
    <script type="text/javascript" src="__PUBLIC__/Admin/lib/jquery/1.9.1/jquery.min.js"></script> 
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/Admin/alert/css/tipDialog.css"/>
    <script type="text/javascript" src="__PUBLIC__/Admin/alert/js/tipDialog.js"></script>
</head>
<body s>
    <?php if(isset($message)) {?>
        <script>
            $(function(){
                tipDialog('<?php echo $message ?>','ok','',1);
                setTimeout(function(){
                    window.location='<?php echo($jumpUrl); ?>';
                },1000);
            });    
        </script>
    <?php }else{ ?>
        <script>

            $(function(){
                tipDialog('<?php echo $error ?>','error','',1);
                setTimeout(function(){
                    window.location='<?php echo($jumpUrl); ?>';
                },1000);
            });    
        </script>
    <?php } ?>
</body>
</html>