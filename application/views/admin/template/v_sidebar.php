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
							<a href="<?php echo base_url() . 'admin'; ?>">
								<i class="fa fa-home" aria-hidden="true"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<li class="nav-parent">
							<a>
								<i class="fa fa-archive" aria-hidden="true"></i>
								<span>Master Data</span>
							</a>
							<ul class="nav nav-children">
								<li>
									<a href="<?php echo base_url() . 'admin/komisi' ?>">
										Komisi
									</a>
								</li>
								<li>
									<a href="<?php echo base_url() . 'admin/operator' ?>">
										Operator
									</a>
								</li>
								<li>
									<a href="<?php echo base_url() . 'admin/kata_kunci' ?>">
										Kata Kunci
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="<?php echo base_url() . 'admin/masyarakat'; ?>">
								<i class="fa fa-users" aria-hidden="true"></i>
								<span>Masyarakat</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url() . 'admin/laporan'; ?>">
								<i class="fa fa-list" aria-hidden="true"></i>
								<span>Laporan</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url() . 'admin/change_pass'; ?>">
								<i class="fa fa-key" aria-hidden="true"></i>
								<span>ubah Password</span>
							</a>
						</li>
						<li>
							<a href="<?php echo base_url() . 'admin/logout'; ?>">
								<i class="fa fa-sign-out" aria-hidden="true"></i>
								<span>Sign out</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>

		</div>

	</aside>
	<!-- end: sidebar -->