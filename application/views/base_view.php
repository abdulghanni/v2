<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title; ?></title>
        <meta name="description" content="<?php echo $description; ?>">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <!-- Extra metadata -->
        <?php echo $metadata; ?>
        <!-- / -->
        <!-- favicon.ico and apple-touch-icon.png -->
        <link rel="shortcut icon" href="<?php echo assets_url('img/index.ico'); ?>" />
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="<?php echo assets_url('css/bootstrap.min.css'); ?>">
        <!-- Font Awesome -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"> -->
        <link rel="stylesheet" href="<?php echo assets_url('plugins/font-awesome/css/font-awesome.min.css'); ?>">
        <!-- Custom styles -->
        <link rel="stylesheet" href="<?php echo assets_url('css/custom.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo assets_url('css/style.css'); ?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->

        <?php echo $css; ?>
        <?php echo $plugin_css; ?>
        <!-- / -->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="<?php echo assets_url('js/html5shiv.min.js'); ?>"></script>
            <script src="<?php echo assets_url('js/respond.min.js'); ?>"></script>
        <![endif]-->
    </head>
      <body class="nav-md">
        <input type="hidden" value="<?=base_url()?>" id="base_url">
            <?php echo $body; ?>
            <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
        <!-- / -->

        <script src="<?php echo assets_url('js/jquery.min.js'); ?>"></script>
        <script src="<?php echo assets_url('js/bootstrap.min.js'); ?>"></script>
        <!-- FastClick -->
        <script src="<?php echo assets_url('plugins/fastclick/fastclick.js'); ?>"></script>
        <!-- NProgress -->
        <script src="<?php echo assets_url('plugins/nprogress/nprogress.js'); ?>"></script>
        <script src="<?php echo assets_url('plugins/bootstrap-progressbar/bootstrap-progressbar.min.js'); ?>"></script>
        <script src="<?php echo assets_url('plugins/iCheck/icheck.min.js'); ?>"></script>
        <script src="<?php echo assets_url('js/custom.js'); ?>"></script>
        <!-- Extra javascript -->
        <script type="text/javascript">
            var base_url = $("#base_url").val();
        </script>
        <?php echo $plugin_js; ?>
        <?php echo $js; ?>
        <!-- / -->
    </body>
</html>