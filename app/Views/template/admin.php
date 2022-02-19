
<!DOCTYPE html>
<html lang="en">

	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>E-Kuisioner | <?= $title ?></title>
		<meta name="description" content="Blank inner page examples">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

		<?= $this->include('template/_main/css') ?>
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="m-content--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-light m-aside--offcanvas-default">

		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">

			<!-- BEGIN: Header -->
			<header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
				<div class="m-container m-container--fluid m-container--full-height">
					<div class="m-stack m-stack--ver m-stack--desktop">

						<!-- BEGIN: Brand -->
						<div class="m-stack__item m-brand  m-brand--skin-light ">
							<div class="m-stack m-stack--ver m-stack--general m-stack--fluid">
								<div class="m-stack__item m-stack__item--middle m-brand__logo">
									<a href="javascript:;" class="m-brand__logo-wrapper">
										<img alt="" src="<?= base_url() ?>/cdn/img/favicon.png" style="height: 50px;"/>
									</a>
								</div>
								<div class="m-stack__item m-stack__item--middle m-brand__tools">

									<!-- BEGIN: Responsive Aside Left Menu Toggler -->
									<a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
										<span></span>
									</a>

									<!-- END -->

									<!-- BEGIN: Topbar Toggler -->
									<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
										<i class="flaticon-more"></i>
									</a>

									<!-- BEGIN: Topbar Toggler -->
								</div>
							</div>
						</div>

						<!-- END: Brand -->
						<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">

							<!-- BEGIN: Topbar -->
							<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-topbar__nav-wrapper">
									<ul class="m-topbar__nav m-nav m-nav--inline">
										<li class="m-nav__item m-topbar__user-profile  m-dropdown m-dropdown--medium m-dropdown--arrow  m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
													<img src="<?= base_url() ?>/cdn/img/responden/default.png" class="m--img-rounded m--marginless m--img-centered" alt="" />
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center">
														<div class="m-card-user m-card-user--skin-light">
															<div class="m-card-user__pic">
																<img src="<?= base_url() ?>/cdn/img/responden/default.png" class="m--img-rounded m--marginless" alt="" />
															</div>
															<div class="m-card-user__details">
																<span class="m-card-user__name m--font-weight-500 profil-nama">Superadmin</span>
																<a href="javascript:;" class="m-card-user__email m--font-weight-300 m-link profil-email">superadmin@gmail.com</a>
															</div>
														</div>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__content">
															<ul class="m-nav m-nav--skin-light">
																<li class="m-nav__section m--hide">
																	<span class="m-nav__section-text">Section</span>
																</li>
																<li class="m-nav__item">
																	<a href="<?= base_url('/admin/profil') ?>" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-profile-1"></i>
																		<span class="m-nav__link-title">
																			<span class="m-nav__link-wrap">
																				<span class="m-nav__link-text">Profil</span>
																			</span>
																		</span>
																	</a>
																</li>
																<li class="m-nav__separator m-nav__separator--fit">
																</li>
																<li class="m-nav__item">
																	<a href="#logout" data-toggle="modal" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">Keluar</a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>

							<!-- END: Topbar -->
						</div>
					</div>
				</div>
			</header>

			<!-- END: Header -->

			<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

				<!-- BEGIN: Left Aside -->
				<button class="m-aside-left-close  m-aside-left-close--skin-light " id="m_aside_left_close_btn">
					<i class="la la-close"></i>
				</button>
				<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-light ">

					<!-- BEGIN: Aside Menu -->
					<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-light " m-menu-vertical="1" m-menu-scrollable="0" m-menu-dropdown-timeout="500">
						<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
							<li class="m-menu__section m-menu__section--first">
								<h4 class="m-menu__section-text">Main Menu</h4>
								<i class="m-menu__section-icon flaticon-more-v2"></i>
							</li>
							<li class="m-menu__item <?php if (strtolower($title) == 'dashboard') echo 'm-menu__item--active'; ?>" aria-haspopup="true" m-menu-link-redirect="1">
								<a href="<?= base_url('/admin/dashboard') ?>" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-suitcase"></i>
									<span class="m-menu__link-text">Dashboard</span>
								</a>
							</li>
							<li class="m-menu__item  m-menu__item--submenu <?php if (strtolower($title) == 'biodata responden' || strtolower($title) == 'list user') echo 'm-menu__item--open m-menu__item--expanded'; ?>" aria-haspopup="true" m-menu-submenu-toggle="hover">
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-layers"></i>
									<span class="m-menu__link-text">Form Data</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?php if (strtolower($title) == 'biodata responden') echo 'm-menu__item--active'; ?>" aria-haspopup="true">
											<a href="<?= base_url('/admin/form-data/biodata-responden') ?>" class="m-menu__link ">
												<span class="m-menu__link-text">Biodata Responden</span>
											</a>
										</li>
										<li class="m-menu__item <?php if (strtolower($title) == 'list user') echo 'm-menu__item--active'; ?>" aria-haspopup="true">
											<a href="<?= base_url('/admin/form-data/list-user') ?>" class="m-menu__link ">
												<span class="m-menu__link-text">List User</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  m-menu__item--submenu <?php if (strtolower($title) == 'soal' || strtolower($title) == 'data') echo 'm-menu__item--open m-menu__item--expanded'; ?>" aria-haspopup="true" m-menu-submenu-toggle="hover" m-menu-link-redirect="1">
								<a href="javascript:;" class="m-menu__link m-menu__toggle">
									<i class="m-menu__link-icon flaticon-graphic-1"></i>
									<span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">Form Kuisioner</span>
										</span>
									</span>
									<i class="m-menu__ver-arrow la la-angle-right"></i>
								</a>
								<div class="m-menu__submenu ">
									<span class="m-menu__arrow"></span>
									<ul class="m-menu__subnav">
										<li class="m-menu__item <?php if (strtolower($title) == 'soal') echo 'm-menu__item--active'; ?>" aria-haspopup="true" m-menu-link-redirect="1">
											<a href="<?= base_url('/admin/form-kuisioner/soal') ?>" class="m-menu__link ">
												<span class="m-menu__link-text">Soal</span>
											</a>
										</li>
										<li class="m-menu__item <?php if (strtolower($title) == 'data') echo 'm-menu__item--active'; ?>" aria-haspopup="true" m-menu-link-redirect="1">
											<a href="<?= base_url('/admin/form-kuisioner/data') ?>" class="m-menu__link ">
												<span class="m-menu__link-text">Data</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="m-menu__item  <?php if (strtolower($title) == 'laporan') echo 'm-menu__item--active'; ?>" aria-haspopup="true" m-menu-link-redirect="1">
								<a href="<?= base_url('/admin/laporan') ?>" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-light"></i>
									<span class="m-menu__link-text">Laporan</span>
								</a>
							</li>
							<!-- <li class="m-menu__item  <?php if (strtolower($title) == 'pengaturan') echo 'm-menu__item--active'; ?>" aria-haspopup="true" m-menu-link-redirect="1">
								<a href="<?= base_url('/admin/pengaturan') ?>" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-share"></i>
									<span class="m-menu__link-text">Pengaturan</span>
								</a>
							</li> -->
							<li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
								<a href="#logout" data-toggle="modal" class="m-menu__link ">
									<i class="m-menu__link-icon flaticon-logout"></i>
									<span class="m-menu__link-text">Keluar</span>
								</a>
							</li>
						</ul>
					</div>

					<!-- END: Aside Menu -->
				</div>

				<!-- END: Left Aside -->
				<div class="m-grid__item m-grid__item--fluid m-wrapper">

					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator"><?= $title ?></h3>
								<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
									<li class="m-nav__item m-nav__item--home">
										<a href="<?= base_url('/admin') ?>" class="m-nav__link m-nav__link--icon">
											<i class="m-nav__link-icon la la-home"></i>
										</a>
									</li>
									<?php 
										$url = explode('/', str_replace('admin', '', uri_string()));
										$link = '';
										for ($i=0; $i < count($url); $i++) { 
											$link .= $url[$i] . '/';
											if ($i > 0) {
												echo '
												<li class="m-nav__separator">-</li>
												<li class="m-nav__item">
													<a href="' . base_url('/admin/' . $link) . '" class="m-nav__link">
														<span class="m-nav__link-text">' . ucwords(str_replace('-', ' ', $url[$i])) . '</span>
													</a>
												</li>';
											}
										}
									?>
								</ul>
							</div>
						</div>
					</div>

					<!-- END: Subheader -->
					<div class="m-content">
						<?= $this->renderSection('content') ?>
						<div class="modal fade" id="logout">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<div class="modal-title">Keluar</div>
									</div>
									<div class="modal-body">
										<p>Anda yakin akan keluar ?</p>
									</div>
									<div class="modal-footer">
										<button class="btn btn-default" type="button" data-dismiss="modal">Batal</button>
										<a href="<?= base_url() ?>/logout" class="btn btn-danger">Keluar</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- end:: Body -->

			<!-- begin::Footer -->
			<footer class="m-grid__item		m-footer ">
				<div class="m-container m-container--fluid m-container--full-height m-page__container">
					<div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
						<div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
							<span class="m-footer__copyright">
								2020 &copy; <a href="javascript:;" class="m-link">Pusat Survey Atakana</a>
							</span>
						</div>
						<div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
							<ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
								<li class="m-nav__item">
									<a href="<?= base_url('/site-map') ?>" class="m-nav__link">
										<span class="m-nav__link-text">Site Map</span>
									</a>
								</li>
								<li class="m-nav__item">
									<a href="<?= base_url('/help') ?>" class="m-nav__link">
										<span class="m-nav__link-text">Help</span>
									</a>
								</li>
								<li class="m-nav__item">
									<a href="<?= base_url('/contact') ?>" class="m-nav__link">
										<span class="m-nav__link-text">Contact</span>
									</a>
								</li>
								<li class="m-nav__item">
									<a href="<?= base_url('/about-us') ?>" class="m-nav__link">
										<span class="m-nav__link-text">About Us</span>
									</a>
								</li>
								<li class="m-nav__item m-nav__item--last">
									<a href="#" class="m-nav__link" data-toggle="m-tooltip" title="Support Center" data-placement="left">
										<i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>

			<!-- end::Footer -->
		</div>

		<!-- end:: Page -->

		<?= $this->include('template/_main/js.php') ?>
		<script>
			showProfil = () => {
				$.get(base_url + '/api/user/details/<?= Session()->get('id') ?>').done(res => {
					if (res.data) {
						$('.profil-nama').html(res.data.username);
						$('.profil-email').attr('href', 'mailto:' + res.data.email);
						$('.profil-email').html(res.data.email);
					}
				})
			}

			if ('<?= Session()->has('id') ?>') {
				showProfil();
			}
		</script>
		<?= $this->renderSection('script') ?>
	</body>

	<!-- end::Body -->
</html>