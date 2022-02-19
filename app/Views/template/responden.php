
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
									<!-- BEGIN: Topbar Toggler -->
									<?php if (Session()->has('id') && Session()->get('level') !== '1'): ?>
									<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-left m-dropdown--align-push" m-dropdown-toggle="click" aria-expanded="true">
										<a href="#" class="dropdown-toggle m-dropdown__toggle btn btn-outline-metal m-btn  m-btn--icon m-btn--pill">
											<span><?= $title ?></span>
										</a>
										<div class="m-dropdown__wrapper">
											<span class="m-dropdown__arrow m-dropdown__arrow--left m-dropdown__arrow--adjust"></span>
											<div class="m-dropdown__inner">
												<div class="m-dropdown__body">
													<div class="m-dropdown__content">
														<ul class="m-nav">
															<li class="m-nav__item">
																<a href="<?= base_url('/responden/dashboard') ?>" class="m-nav__link">
																	<i class="m-nav__link-icon flaticon-share"></i>
																	<span class="m-nav__link-text">Dashboard</span>
																</a>
															</li>
															<li class="m-nav__item">
																<a href="<?= base_url('/responden/form-kuisioner') ?>" class="m-nav__link">
																	<i class="m-nav__link-icon flaticon-lifebuoy"></i>
																	<span class="m-nav__link-text">Form Kuisioner</span>
																</a>
															</li>
															<li class="m-nav__separator m-nav__separator--fit">
															</li>
															<li class="m-nav__item">
																<a href="#logout" class="m-nav__link" data-toggle="modal">
																	<i class="m-nav__link-icon flaticon-logout"></i>
																	<span class="m-nav__link-text">Keluar</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php endif ?>
									<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
										<i class="flaticon-more"></i>
									</a>
								</div>
							</div>
						</div>

						<!-- END: Brand -->
						<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">

							<!-- BEGIN: Topbar -->
							<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
								<div class="m-stack__item m-topbar__nav-wrapper">
									<ul class="m-topbar__nav m-nav m-nav--inline">
										<?php if (Session()->has('id') && Session()->get('level') !== '1'): ?>
										<li class="m-nav__item m-topbar__user-profile  m-dropdown m-dropdown--medium m-dropdown--arrow  m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
													<img src="<?= base_url() ?>/cdn/img/responden/default.png" class="m--img-rounded m--marginless m--img-centered profil-foto"/>
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center">
														<div class="m-card-user m-card-user--skin-light">
															<div class="m-card-user__pic">
																<img src="<?= base_url() ?>/cdn/img/responden/default.png" class="m--img-rounded m--marginless profil-foto"/>
															</div>
															<div class="m-card-user__details">
																<span class="m-card-user__name m--font-weight-500 profil-nama">Responden</span>
																<a href="javascript:;" class="m-card-user__email m--font-weight-300 m-link profil-kode">responden@gmail.com</a>
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
																	<a href="<?= base_url('/responden/profil') ?>" class="m-nav__link">
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
										<?php else: ?>
										<li id="m_quick_sidebar_toggle" class="m-nav__item m-topbar__quick-sidebar">
											<a href="<?= base_url('/auth') ?>" class="m-nav__link">
												<span class="m-nav__link-icon">
													<button class="btn btn-default">Login Sebagai Admin</button>
												</span>
											</a>
										</li>
										<?php endif ?>
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

				<div class="m-grid__item m-grid__item--fluid m-wrapper">

					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator"><?= $title ?></h3>
								<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
									<li class="m-nav__item m-nav__item--home">
										<a href="<?= base_url('/responden') ?>" class="m-nav__link m-nav__link--icon">
											<i class="m-nav__link-icon la la-home"></i>
										</a>
									</li>
									<?php 
										$url = explode('/', str_replace('responden', '', uri_string()));
										$link = '';
										for ($i=0; $i < count($url); $i++) { 
											$link .= $url[$i] . '/';
											if ($i > 0) {
												echo '
												<li class="m-nav__separator">-</li>
												<li class="m-nav__item">
													<a href="' . base_url('/responden/' . $link) . '" class="m-nav__link">
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
						<div class="container">
							<?= $this->renderSection('content') ?>
						</div>
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
				$.get(base_url + '/api/responden/details/<?= Session()->get('id') ?>').done(res => {
					if (res.data) {
						$('.profil-nama').html(res.data.nama);
						$('.profil-kode').html(res.data.kode);
						$('.profil-foto').attr('src', base_url + '/cdn/img/responden/' + (res.data.foto ? res.data.foto : 'default.png'));
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