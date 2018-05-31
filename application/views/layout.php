<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Dewantoro</title>
		<meta name="description" content="Free Bootstrap 4 Admin Theme | Pike Admin">
		<meta name="author" content="Pike Web Development - https://www.pikephp.com">
		<!-- Favicon -->
		<link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico">
		<!-- Switchery css -->
		<link href="<?= base_url() ?>assets/plugins/switchery/switchery.min.css" rel="stylesheet" />
		<!-- Bootstrap CSS -->
		<link href="<?= base_url() ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
		<!-- Font Awesome CSS -->
		<link href="<?= base_url() ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<!-- Custom CSS -->
		<link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet" type="text/css" />	
		<!-- BEGIN CSS for this page -->
		<!-- datatables -->
			<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>	 -->
			<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/datatables/dataTables.bootstrap4.min.css">

		<!-- END CSS for this page -->
		<style>
			td.details-control {
			background: url('assets/plugins/datatables/img/details_open.png') no-repeat center center;
			cursor: pointer;
			}
			tr.shown td.details-control {
			background: url('assets/plugins/datatables/img/details_close.png') no-repeat center center;
			}
            
            .dataTables_processing {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 100%;
                margin-left: -50%;
                margin-top: -25px;
                padding-top: 20px;
                text-align: center;
                font-size: 1.2em;
                color:grey;
            }
            
        </style>


	<script src="<?= base_url() ?>assets/js/modernizr.min.js"></script>
	<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/js/moment.min.js"></script>

	<script src="<?= base_url() ?>assets/js/popper.min.js"></script>
	<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>

	<script src="<?= base_url() ?>assets/js/detect.js"></script>
	<script src="<?= base_url() ?>assets/js/fastclick.js"></script>
	<script src="<?= base_url() ?>assets/js/jquery.blockUI.js"></script>
	<script src="<?= base_url() ?>assets/js/jquery.nicescroll.js"></script>

	<script src="<?= base_url() ?>assets/js/jquery.scrollTo.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/switchery/switchery.min.js"></script>

<!-- BEGIN Java Script for this page -->
	<script type="text/javascript" src="<?= base_url()?>assets/datatables/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?= base_url()?>assets/datatables/dataTables.bootstrap4.min.js"></script>
		<script src="<?= base_url() ?>assets/js/custum.js"></script>

</head>

<body class="adminbody">

<div id="main">

	<!-- top bar navigation -->
    <?php $this->load->view('headerbar');?>
	<!-- End Navigation -->
	
 
	<!-- Left Sidebar -->
	<?php $this->load->view('sidebar');?>
	<!-- End Sidebar -->


    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
                <?= $contents ?>
            </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->

	<footer class="footer">
		<span class="text-right">
		Copyright <a target="_blank" href="#">Dewantoro</a>
		</span>
		<span class="float-right">
		Powered by <a target="_blank" href="https://www.pikeadmin.com"><b>Pike Admin</b></a>
		</span>
	</footer>

</div>
<!-- END main -->


<!-- App js -->
<script src="<?= base_url() ?>assets/js/pikeadmin.js"></script>

</body>
</html>