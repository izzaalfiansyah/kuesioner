<?= $this->extend('template/admin') ?>

<?php $this->setVar('title', 'Laporan') ?>

<?= $this->section('content') ?>
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