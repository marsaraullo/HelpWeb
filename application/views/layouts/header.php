<?php
if (session_status()==PHP_SESSION_NONE) { session_start(); }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Help! | Hackathon 2017</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>resources/css/bootstrap/dist/css/bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>resources/css/font-awesome/css/font-awesome.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>resources/css/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>resources/dist/css/AdminLTE.css">
  <!-- Custom style -->
  <link rel="stylesheet" href="<?php echo base_url();?>resources/css/style.css">  
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>resources/dist/css/skins/skin-blue-light.css">
  <!-- jQuery 3 -->
  <script src="<?php echo base_url(); ?>resources/js/jquery/dist/jquery.min.js"></script>
</head>

<body class="hold-transition skin-blue-light fixed sidebar-mini">

