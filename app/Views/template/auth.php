
<!DOCTYPE html>
<html lang="en">

	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>E-Kuisioner | <?= $title ?></title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

		<?= $this->include('template/_main/css') ?>
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--ver-desktop m-grid--hor-tablet-and-mobile m-login m-login--6" id="m_login">
				<div class="m-grid__item   m-grid__item--order-tablet-and-mobile-2  m-grid m-grid--hor m-login__aside " style="background: linear-gradient(to left top, gray, #282828); background-size: 100%;">
					<div class="m-grid__item">
						<div class="m-login__logo">
							<a href="javascript:;">
								<img alt="" src="<?= base_url() ?>/cdn/img/favicon.png" style="height: 100px;"/>
							</a>
						</div>
					</div>
					<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver">
						<div class="m-grid__item m-grid__item--middle">
							<span class="m-login__title">E-Kuisioner</span>
							<span class="m-login__subtitle">Website ini merupakan sebuah website pengumpulan data kuesioner yang hadir sebagai alat bantu bagi para peneliti/surveyor dalam mendapatkan data dari responden</span>
						</div>
					</div>
					<div class="m-grid__item">
						<div class="m-login__info">
							<div class="m-login__section">
								<a href="javascript:;" class="m-link">2020 &copy; Pusat Survey Atakana</a>
							</div>
							<div class="m-login__section">
								<a href="<?= base_url('/site-map') ?>" class="m-link">Site Map</a>
								<a href="<?= base_url('/help') ?>" class="m-link">Help</a>
								<a href="<?= base_url('/contact') ?>" class="m-link">Contact</a>
								<a href="<?= base_url('/about-us') ?>" class="m-link">About Us</a>
							</div>
						</div>
					</div>
				</div>
				<div class="m-grid__item m-grid__item--fluid  m-grid__item--order-tablet-and-mobile-1  m-login__wrapper">
					<?= $this->renderSection('content') ?>
				</div>
			</div>
		</div>

		<?= $this->include('template/_main/js') ?>
		<?= $this->renderSection('script') ?>
	</body>

	<!-- end::Body -->
</html>