<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <!-- <link href="<?= base_url('assets/'); ?>css/bootstrap.min.css" rel="stylesheet"> -->
     <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- table -->
    <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"/>

    <style>
        #map-canvas { width: 100%; height: 500px; padding: 0; }
        #map-canvas1 { width: 100%; height: 500px; padding: 0; }
    </style>



<style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;

    }
     #map{ /* la carte DOIT avoir une hauteur sinon elle n'apparaît pas */
            height:1000px;
            width: 100%;
        }
      /* Optional: Makes the sample page fill the window. */
     #map-canvas { width: 100%; height: 300px; padding: 0; }
     #map-canvas1 { width: 100%; height: 300px; padding: 0; }
  </style>
  
  <script src="https://maps.googleapis.com/maps/api/js?key=&callback=Initialize" async defer></script>

</head>

<!-- <body id="page-top" oncontextmenu="return false;" onkeydown="return false;" onmousedown="return false;"> -->
    <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper"> 