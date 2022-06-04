<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="manifest" href="<?=base_url('assets/favicon/manifest.json')?>">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?=base_url('assets/favicon/ms-icon-144x144.png')?>">
	<meta name="theme-color" content="#ffffff">    
    <!-- Bootstrap 3.3.5 -->
	<?php echo link_tag('assets/new/bootstrap/css/bootstrap.min.css'); ?>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
	<?php echo link_tag('assets/new/plugins/jvectormap/jquery-jvectormap-1.2.2.css'); ?>    
    <!-- Theme style -->
	<?php echo link_tag('assets/new/dist/css/AdminLTE.min.css'); ?>
	<?php echo link_tag('assets/new/dist/css/custom.css'); ?>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <?php echo link_tag('assets/new/dist/css/skins/_all-skins.min.css'); ?>
	<!--datepicker css and js-->
	<link rel="stylesheet" href="<?=base_url('assets/new/datepicker/jquery-ui.css')?>" > 
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    

	<style>
		.nr { background:#eee; padding:3px 7px; border:1px solid #FF4081; } 
	</style>
    <script>
	  var base_url = '<?=base_url()?>';
	  var csrf_name = '<?=$this->security->get_csrf_token_name()?>';
	  var hash = '<?=$this->security->get_csrf_hash()?>';  
    </script>
    	

  </head>
  

  <body class="hold-transition skin-blue sidebar-mini " id="bodyClass">
