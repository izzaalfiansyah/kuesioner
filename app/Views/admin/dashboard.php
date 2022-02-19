<?= $this->extend('template/admin') ?>

<?php $this->setVar('title', 'Dashboard') ?>

<?= $this->section('content') ?>
<div class="m-portlet ">
	<div class="m-portlet__body  m-portlet__body--no-padding">
		<div class="row m-row--no-padding m-row--col-separator-xl">
			<div class="col-md-12 col-xl-4">

				<!--begin::Total Profit-->
				<div class="m-widget24">
					<div class="m-widget24__item">
						<h4 class="m-widget24__title">
							Responden
						</h4>
						<br>
						<span class="m-widget24__desc">
							Total Semua Responden
						</span>
						<span class="m-widget24__stats m--font-brand total-responden">
							0
						</span>
						<div class="m--space-10"></div>
						<a class="m-widget24__change" href="<?= base_url('/admin/form-data/biodata-responden') ?>">
							Selengkapnya
						</a>
					</div>
				</div>

				<!--end::Total Profit-->
			</div>
			<div class="col-md-12 col-xl-4">

				<!--begin::New Feedbacks-->
				<div class="m-widget24">
					<div class="m-widget24__item">
						<h4 class="m-widget24__title">
							User
						</h4>
						<br>
						<span class="m-widget24__desc">
							Total List User
						</span>
						<span class="m-widget24__stats m--font-success total-user">
							0
						</span>
						<div class="m--space-10"></div>
						<a class="m-widget24__change" href="<?= base_url('/admin/form-data/list-user') ?>">
							Selengkapnya
						</a>
					</div>
				</div>

				<!--end::New Feedbacks-->
			</div>
			<div class="col-md-12 col-xl-4">

				<!--begin::New Orders-->
				<div class="m-widget24">
					<div class="m-widget24__item">
						<h4 class="m-widget24__title">
							Soal
						</h4>
						<br>
						<span class="m-widget24__desc">
							Total Semua Soal
						</span>
						<span class="m-widget24__stats m--font-danger total-soal">
							0
						</span>
						<div class="m--space-10"></div>
						<a class="m-widget24__change" href="<?= base_url('/admin/form-kuisioner/soal') ?>">
							Selengkapnya
						</a>
					</div>
				</div>

				<!--end::New Orders-->
			</div>
		</div>
	</div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
	$(document).ready(function() {
		
		$.get(base_url + '/api/user').done(res => {
			$('.total-user').html(res.data.length)
		})

		$.get(base_url + '/api/responden').done(res => {
			$('.total-responden').html(res.data.length)
		})

		$.get(base_url + '/api/soal').done(res => {
			$('.total-soal').html(res.data.length)
		})

	})
</script>
<?= $this->endSection() ?>