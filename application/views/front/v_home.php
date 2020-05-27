<section role="main" class="content-body">
	<header class="page-header">
		<h2>Dashboard</h2>
	</header>

	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<p align="center"><img src="<?php echo base_url() ?>assets/images/LOGO-KOTA-LHOKSEUMAWE.png" alt="Logo Kota" width="200px"></p>
					<p align="center" style="font-size: 36px" class="panel-subtitle">Selamat Datang Di Sistem Pelaporan Terpadu Kota Lhokseumawe</p>
				</header>
			</section>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<section class="panel">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="fa fa-caret-down"></a>
						<a href="#" class="fa fa-times"></a>
					</div>

					<h2 class="panel-title">Komisi I Bidang Pemerintahan</h2>
					<p class="panel-subtitle">Grafik Data Laporan</p>
				</header>
				<div class="panel-body">
					<canvas id="myChart"></canvas>
					<script>
						var ctx = document.getElementById('myChart').getContext('2d');
						var myChart = new Chart(ctx, {
							type: 'bar',
							data: {
								labels: [
									'Diterima', 'Belum'
								],
								datasets: [{
									label: 'Jumlah Laporan',
									data: [
										<?php
										$terima = $this->db->query("SELECT COUNT(laporan_status) AS jumlah FROM tbl_laporan WHERE laporan_komisi=1")->row();
										$proses = $this->db->query("SELECT COUNT(laporan_status) AS jumlah FROM tbl_laporan WHERE laporan_komisi=1 AND laporan_status=1")->row();
										echo $terima->jumlah . ',' . $proses->jumlah;
										?>
									],
									backgroundColor: [
										'rgba(255, 99, 132, 0.2)',
										'rgba(54, 162, 235, 0.2)',
										'rgba(255, 206, 86, 0.2)',
										'rgba(75, 192, 192, 0.2)',
										'rgba(153, 102, 255, 0.2)',
										'rgba(255, 159, 64, 0.2)'
									],
									borderColor: [
										'rgba(255, 99, 132, 1)',
										'rgba(54, 162, 235, 1)',
										'rgba(255, 206, 86, 1)',
										'rgba(75, 192, 192, 1)',
										'rgba(153, 102, 255, 1)',
										'rgba(255, 159, 64, 1)'
									],
									borderWidth: 1
								}]
							},
							options: {
								scales: {
									yAxes: [{
										ticks: {
											beginAtZero: true
										}
									}]
								}
							}
						});
					</script>
				</div>
			</section>
		</div>
		<div class="col-md-6">
			<section class="panel">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="fa fa-caret-down"></a>
						<a href="#" class="fa fa-times"></a>
					</div>

					<h2 class="panel-title">Komisi II Bidang Perekonomian</h2>
					<p class="panel-subtitle">Grafik Data Laporan</p>
				</header>
				<div class="panel-body">
					<canvas id="myChart2"></canvas>
					<script>
						var ctx = document.getElementById('myChart2').getContext('2d');
						var myChart = new Chart(ctx, {
							type: 'bar',
							data: {
								labels: [
									'Diterima', 'Belum'
								],
								datasets: [{
									label: 'Jumlah Laporan',
									data: [
										<?php
										$terima = $this->db->query("SELECT COUNT(laporan_status) AS jumlah FROM tbl_laporan WHERE laporan_komisi=2")->row();
										$proses = $this->db->query("SELECT COUNT(laporan_status) AS jumlah FROM tbl_laporan WHERE laporan_komisi=2 AND laporan_status=1")->row();
										echo $terima->jumlah . ',' . $proses->jumlah;
										?>
									],
									backgroundColor: [
										'rgba(255, 99, 132, 0.2)',
										'rgba(54, 162, 235, 0.2)',
										'rgba(255, 206, 86, 0.2)',
										'rgba(75, 192, 192, 0.2)',
										'rgba(153, 102, 255, 0.2)',
										'rgba(255, 159, 64, 0.2)'
									],
									borderColor: [
										'rgba(255, 99, 132, 1)',
										'rgba(54, 162, 235, 1)',
										'rgba(255, 206, 86, 1)',
										'rgba(75, 192, 192, 1)',
										'rgba(153, 102, 255, 1)',
										'rgba(255, 159, 64, 1)'
									],
									borderWidth: 1
								}]
							},
							options: {
								scales: {
									yAxes: [{
										ticks: {
											beginAtZero: true
										}
									}]
								}
							}
						});
					</script>
				</div>
			</section>
		</div>
		<div class="col-md-6">
			<section class="panel">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="fa fa-caret-down"></a>
						<a href="#" class="fa fa-times"></a>
					</div>

					<h2 class="panel-title">Komisi III Bidang Keuangan/Anggaran</h2>
					<p class="panel-subtitle">Grafik Data Laporan</p>
				</header>
				<div class="panel-body">
					<canvas id="myChart3"></canvas>
					<script>
						var ctx = document.getElementById('myChart3').getContext('2d');
						var myChart = new Chart(ctx, {
							type: 'bar',
							data: {
								labels: [
									'Diterima', 'Belum'
								],
								datasets: [{
									label: 'Jumlah Laporan',
									data: [
										<?php
										$terima = $this->db->query("SELECT COUNT(laporan_status) AS jumlah FROM tbl_laporan WHERE laporan_komisi=3")->row();
										$proses = $this->db->query("SELECT COUNT(laporan_status) AS jumlah FROM tbl_laporan WHERE laporan_komisi=3 AND laporan_status=1")->row();
										echo $terima->jumlah . ',' . $proses->jumlah;
										?>
									],
									backgroundColor: [
										'rgba(255, 99, 132, 0.2)',
										'rgba(54, 162, 235, 0.2)',
										'rgba(255, 206, 86, 0.2)',
										'rgba(75, 192, 192, 0.2)',
										'rgba(153, 102, 255, 0.2)',
										'rgba(255, 159, 64, 0.2)'
									],
									borderColor: [
										'rgba(255, 99, 132, 1)',
										'rgba(54, 162, 235, 1)',
										'rgba(255, 206, 86, 1)',
										'rgba(75, 192, 192, 1)',
										'rgba(153, 102, 255, 1)',
										'rgba(255, 159, 64, 1)'
									],
									borderWidth: 1
								}]
							},
							options: {
								scales: {
									yAxes: [{
										ticks: {
											beginAtZero: true
										}
									}]
								}
							}
						});
					</script>
				</div>
			</section>
		</div>
		<div class="col-md-6">
			<section class="panel">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="fa fa-caret-down"></a>
						<a href="#" class="fa fa-times"></a>
					</div>

					<h2 class="panel-title">Komisi IV Bidang Pembangunan</h2>
					<p class="panel-subtitle">Grafik Data Laporan</p>
				</header>
				<div class="panel-body">
					<canvas id="myChart4"></canvas>
					<script>
						var ctx = document.getElementById('myChart4').getContext('2d');
						var myChart = new Chart(ctx, {
							type: 'bar',
							data: {
								labels: [
									'Diterima', 'Belum'
								],
								datasets: [{
									label: 'Jumlah Laporan',
									data: [
										<?php
										$terima = $this->db->query("SELECT COUNT(laporan_status) AS jumlah FROM tbl_laporan WHERE laporan_komisi=4")->row();
										$proses = $this->db->query("SELECT COUNT(laporan_status) AS jumlah FROM tbl_laporan WHERE laporan_komisi=4 AND laporan_status=1")->row();
										echo $terima->jumlah . ',' . $proses->jumlah;
										?>
									],
									backgroundColor: [
										'rgba(255, 99, 132, 0.2)',
										'rgba(54, 162, 235, 0.2)',
										'rgba(255, 206, 86, 0.2)',
										'rgba(75, 192, 192, 0.2)',
										'rgba(153, 102, 255, 0.2)',
										'rgba(255, 159, 64, 0.2)'
									],
									borderColor: [
										'rgba(255, 99, 132, 1)',
										'rgba(54, 162, 235, 1)',
										'rgba(255, 206, 86, 1)',
										'rgba(75, 192, 192, 1)',
										'rgba(153, 102, 255, 1)',
										'rgba(255, 159, 64, 1)'
									],
									borderWidth: 1
								}]
							},
							options: {
								scales: {
									yAxes: [{
										ticks: {
											beginAtZero: true
										}
									}]
								}
							}
						});
					</script>
				</div>
			</section>
		</div>
		<div class="col-md-6">
			<section class="panel">
				<header class="panel-heading">
					<div class="panel-actions">
						<a href="#" class="fa fa-caret-down"></a>
						<a href="#" class="fa fa-times"></a>
					</div>

					<h2 class="panel-title">Komisi V Bidang Keistimewaan Aceh Syariat Islam dan Kesejahteraan Rakyat</h2>
					<p class="panel-subtitle">Grafik Data Laporan</p>
				</header>
				<div class="panel-body">
					<canvas id="myChart5"></canvas>
					<script>
						var ctx = document.getElementById('myChart5').getContext('2d');
						var myChart = new Chart(ctx, {
							type: 'bar',
							data: {
								labels: [
									'Diterima', 'Belum'
								],
								datasets: [{
									label: 'Jumlah Laporan',
									data: [
										<?php
										$terima = $this->db->query("SELECT COUNT(laporan_status) AS jumlah FROM tbl_laporan WHERE laporan_komisi=5")->row();
										$proses = $this->db->query("SELECT COUNT(laporan_status) AS jumlah FROM tbl_laporan WHERE laporan_komisi=5 AND laporan_status=1")->row();
										echo $terima->jumlah . ',' . $proses->jumlah;
										?>
									],
									backgroundColor: [
										'rgba(255, 99, 132, 0.2)',
										'rgba(54, 162, 235, 0.2)',
										'rgba(255, 206, 86, 0.2)',
										'rgba(75, 192, 192, 0.2)',
										'rgba(153, 102, 255, 0.2)',
										'rgba(255, 159, 64, 0.2)'
									],
									borderColor: [
										'rgba(255, 99, 132, 1)',
										'rgba(54, 162, 235, 1)',
										'rgba(255, 206, 86, 1)',
										'rgba(75, 192, 192, 1)',
										'rgba(153, 102, 255, 1)',
										'rgba(255, 159, 64, 1)'
									],
									borderWidth: 1
								}]
							},
							options: {
								scales: {
									yAxes: [{
										ticks: {
											beginAtZero: true
										}
									}]
								}
							}
						});
					</script>
				</div>
			</section>
		</div>
	</div>
	<!-- end: page -->
</section>