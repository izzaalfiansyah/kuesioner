<?= $this->extend('template/responden') ?>

<?php $this->setVar('title', 'Dashboard') ?>

<?= $this->section('content') ?>
<div class="m-portlet ">
	<div class="m-portlet__body  m-portlet__body--no-padding">
		<div class="row m-row--no-padding m-row--col-separator-xl">
			<div class="col-md-12 col-xl-6">

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
			<div class="col-md-12 col-xl-6">

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
<div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Grafik Kuisioner
				</h3>
			</div>
		</div>
	</div>
	<div class="m-portlet__body">
		<canvas id="kuisioner" style="min-height: 250px;"></canvas>
	</div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<link rel="stylesheet" href="<?= base_url('/cdn/vendors/custom/chartjs/Chart.min.css') ?>">
<script src="<?= base_url('/cdn/vendors/custom/chartjs/Chart.min.js') ?>"></script>
<script>
	$(document).ready(function() {

		$.get(base_url + '/api/responden').done(res => {
			$('.total-responden').html(res.data.length)
		})

		$.get(base_url + '/api/soal').done(res => {
			$('.total-soal').html(res.data.length)
		})

		$.get(base_url + '/api/jawaban/grafik').done(res => {
			var data = {
		      labels  : ['Sudah Mengisi', 'Belum Mengisi'],
		      datasets: [
		        {
		          label               : 'Responden',
		          backgroundColor     : 'rgba(60,141,188,0.9)',
		          borderColor         : 'rgba(60,141,188,0.8)',
		          pointRadius          : false,
		          pointColor          : '#3b8bba',
		          pointStrokeColor    : 'rgba(60,141,188,1)',
		          pointHighlightFill  : '#fff',
		          pointHighlightStroke: 'rgba(60,141,188,1)',
		          data                : [res.data.sudah_mengisi, res.data.belum_mengisi, 0]
		        }
		      ]
		    }
			var kuisioner = $('#kuisioner').get(0).getContext('2d')
		    var kuisionerData = jQuery.extend(true, {}, data)
		    var template = data.datasets[0]
		    kuisionerData.datasets[0] = template

		    var barChartOptions = {
		      responsive              : true,
		      maintainAspectRatio     : false,
		      datasetFill             : false
		    }

		    var barChart = new Chart(kuisioner, {
		      type: 'bar', 
		      data: kuisionerData,
		      options: barChartOptions
		    })
		})

	})
</script>
<?= $this->endSection() ?>