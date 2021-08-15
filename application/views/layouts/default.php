<!DOCTYPE html>
<html lang="en">

<head>
	<title><?= $title; ?> - Monitoring Aglaonema</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="<?= base_url('able/dist/'); ?>assets/images/favicon.ico" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="<?= base_url('able/dist/'); ?>assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
	<!-- Font Awesome -->



</head>

<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->
	<nav class="pcoded-navbar menu-light ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div ">

				<div class="">
					<div class="main-menu-header">
						<img class="img-radius" src="<?= base_url('able/dist/'); ?>assets/images/user.png" alt="User-Profile-Image">
						<div class="user-details">
							<div id="more-details"><?= $user; ?> <i class="fa fa-caret-down"></i></div>
						</div>
					</div>
					<div class="collapse" id="nav-user-link">
						<ul class="list-unstyled">
							<li class="list-group-item"><a href="<?= site_url('Auth/logout') ?>"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
						</ul>
					</div>
				</div>

				<ul class="nav pcoded-inner-navbar ">
					<?php $this->load->view('includes/navbar'); ?>
				</ul>
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">


		<div class="m-header">
			<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
			<a href="<?= site_url(); ?>" class="b-brand">
				<!-- ========   change your logo hear   ============ -->
				<h4 class="text-uppercase text-light">Aglaonema</h4>
			</a>
			<a href="#!" class="mob-toggler">
				<i class="feather icon-more-vertical"></i>
			</a>
		</div>
		<div class="collapse navbar-collapse">

			<ul class="navbar-nav ml-auto">
				<li>
					<div class="dropdown drp-user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="feather icon-user"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right profile-notification">
							<div class="pro-head">
								<img src="<?= base_url('able/dist/'); ?>assets/images/user.png" class="img-radius" alt="User-Profile-Image">
								<span><?= $user; ?></span>
							</div>
							<ul class="pro-body">
								<li><a href="<?= site_url('Auth/logout') ?>" class="dropdown-item"><i class="feather icon-log-out"></i>
										Logout</a></li>
							</ul>
						</div>
					</div>
				</li>
			</ul>
		</div>


	</header>
	<!-- [ Header ] end -->
	<!-- [ Main Content ] start -->
	<div class="pcoded-main-container">
		<div class="pcoded-content">
			<!-- [ breadcrumb ] start -->
			<div class="page-header">
				<div class="page-block">
					<div class="row align-items-center">
						<div class="col-md-12">
							<div class="page-header-title">
								<h5 class="m-b-10"><?= $title; ?> Analytics</h5>
							</div>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?= site_url(); ?>"><i class="feather icon-home"></i></a>
								</li>
								<li class="breadcrumb-item"><a href="#!"><?= $title; ?> Analytics</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- [ breadcrumb ] end -->
			<!-- [ Main Content ] start -->
			<div class="row">
				<div class="col-md-12" id="nilaiSensor">

				</div>
				<!-- page statustic card start -->

				<div class="col-md-12">
					<?php $this->load->view($pages); ?>
				</div>
			</div>
			<!-- [ Main Content ] end -->
		</div>
	</div>

	<!-- Required Js -->
	<script src="<?= base_url('able/dist/'); ?>assets/js/vendor-all.min.js"></script>
	<script src="<?= base_url('able/dist/'); ?>assets/js/plugins/bootstrap.min.js"></script>
	<script src="<?= base_url('able/dist/'); ?>assets/js/ripple.js"></script>
	<script src="<?= base_url('able/dist/'); ?>assets/js/pcoded.min.js"></script>
	<script src="<?= base_url('able/dist/'); ?>assets/js/chart.min.js"></script>

	<!-- Apex Chart -->
	<script src="<?= base_url('able/dist/'); ?>assets/js/plugins/apexcharts.min.js"></script>


	<!-- custom-chart js -->
	<script src="<?= base_url('able/dist/'); ?>assets/js/pages/dashboard-main.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js">
	</script>
	<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
	<script>
		$(document).ready(function() {
			let base_url = "<?= base_url(); ?>";
			let statusPage = "<?= $statusPage; ?>";

			if (statusPage == "Dashboard") {
				function reloadInterval() {

					$.ajax({
						type: "GET",
						url: base_url + "Monitoring/getAjax",
						dataType: "JSON",
						success: function(response) {
							// console.log(response);
							let data = response.data;
							let label = [];
							let value = [];
							let value1 = [];
							let value2 = [];
							let value3 = [];
							let value4 = [];
							data.forEach(element => {
								value.push(element[1]);
								value1.push(element[2]);
								value2.push(element[3]);
								value3.push(element[4]);
								value4.push(element[5]);
								label.push(element[6]);
							});
							var ctx = document.getElementById('humidity');
							var chart = new Chart(ctx, {
								type: 'line',
								data: {
									labels: label,
									datasets: [{
										label: 'Nilai Kelembaban Udara',
										backgroundColor: 'transparent',
										borderColor: 'orange',
										pointRadius: 0,
										data: value
									}]
								},
								options: {
									bazierCurve: false,
									responsive: true,
									animation: {
										duration: 0,
										easing: 'linear'
									}
								}
							});
							var ctx1 = document.getElementById('temperature');
							var chart = new Chart(ctx1, {
								type: 'line',
								data: {
									labels: label,
									datasets: [{
										label: 'Nilai Temperature Udara',
										backgroundColor: 'transparent',
										borderColor: 'green',
										pointRadius: 0,
										data: value1
									}]
								},
								options: {
									bazierCurve: false,
									responsive: true,
									animation: {
										duration: 0,
										easing: 'linear'
									}
								}
							});
							var ctx2 = document.getElementById('lux');
							var chart = new Chart(ctx2, {
								type: 'line',
								data: {
									labels: label,
									datasets: [{
										label: 'Nilai Intensitas Cahaya',
										backgroundColor: 'transparent',
										borderColor: 'red',
										pointRadius: 0,
										data: value2
									}]
								},
								options: {
									bazierCurve: false,
									responsive: true,
									animation: {
										duration: 0,
										easing: 'linear'
									}
								}
							});
							var ctx3 = document.getElementById('ph');
							var chart = new Chart(ctx3, {
								type: 'line',
								data: {
									labels: label,
									datasets: [{
										label: 'Nilai Ph Tanah',
										backgroundColor: 'transparent',
										borderColor: 'blue',
										pointRadius: 0,
										data: value3
									}]
								},
								options: {
									bazierCurve: false,
									responsive: true,
									animation: {
										duration: 0,
										easing: 'linear'
									}
								}
							});
							var ctx4 = document.getElementById('soilMoisture');
							var chart = new Chart(ctx4, {
								type: 'line',
								data: {
									labels: label,
									datasets: [{
										label: 'Nilai Kelembaban Tanah',
										backgroundColor: 'transparent',
										borderColor: 'blue',
										pointRadius: 0,
										data: value4
									}]
								},
								options: {
									bazierCurve: false,
									responsive: true,
									animation: {
										duration: 0,
										easing: 'linear'
									}
								}
							});
						}
					});
				}
			} else {

			}

			let table = $('#table').DataTable({

				processing: false,
				serverSide: true,
				lengthMenu: [
					[10, 25, 50, 100, 999999999999],
					[10, 25, 50, 100, "All"]
				],
				pagingType: "full_numbers",
				pageLength: 25,
				ajax: {
					url: "<?= $statusPage === 'Monitoring' ?  site_url('Monitoring/getAjax') : ($statusPage === 'lokasiTanaman' ? site_url('Lokasi/getAjaxTanaman') : ($statusPage === "lokasiAlat" ? site_url('Lokasi/getAjaxAlat') : "kosong")); ?>",
					type: 'POST'
				},
				columnDefs: [{
					targets: [-1],
					className: 'text-center'
				}]
			});



			setInterval(() => {
				$('#nilaiSensor').load('<?= $statusPage === "Monitoring" ?  site_url('dashboard/status') : ($statusPage === "lokasiTanaman" ? site_url('dashboard/gpsTanaman') : ($statusPage === "lokasiAlat" ? site_url('dashboard/gpsAlat') : site_url('dashboard/status'))); ?>');
				if (statusPage == "Dashboard") {
					reloadInterval();
				}
			}, 1000);
			setInterval(() => {
				table.ajax.reload();
			}, 30000);

		});
	</script>

</body>

</html>
