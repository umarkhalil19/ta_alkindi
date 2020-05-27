<div class="inner-wrapper">
	<!-- start: sidebar -->
	<aside id="sidebar-left" class="sidebar-left">

		<div class="sidebar-header">
			<div class="sidebar-title">
				Navigation
			</div>
			<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
				<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
			</div>
		</div>

		<div class="nano">
			<div class="nano-content">
				<nav id="menu" class="nav-main" role="navigation">
					<ul class="nav nav-main">
						<li>
							<a href="<?php echo base_url() . 'masyarakat'; ?>">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<!-- <li>
										<a href="mailbox-folder.html">
											<span class="pull-right label label-primary">182</span>
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<span>Mailbox</span>
										</a>
									</li> -->
						<li class="nav-parent">
							<a>
								<i class="fa fa-file" aria-hidden="true"></i>
								<span>Pelaporan</span>
							</a>
							<ul class="nav nav-children">
								<li>
									<a href="<?php echo base_url() . 'masyarakat/laporan' ?>">
										Semua Laporan
									</a>
								</li>
								<li>
									<a href="<?php echo base_url() . 'masyarakat/laporan_proses' ?>">
										Proses
									</a>
								</li>
								<li>
									<a href="<?php echo base_url() . 'masyarakat/laporan_belum_proses' ?>">
										Belum Proses
									</a>
								</li>
								<li>
									<a href="<?php echo base_url() . 'masyarakat/laporan_pending' ?>">
										Lewat Tenggat Waktu
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="<?php echo base_url() . 'masyarakat/change_pass'; ?>">
								<i class="fa fa-key" aria-hidden="true"></i>
								<span>Ubah Password</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url() . 'masyarakat/logout'; ?>">
								<i class="fa fa-sign-out" aria-hidden="true"></i>
								<span>Sign Out</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>

		</div>

	</aside>
	<!-- end: sidebar -->