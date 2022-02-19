<?= $this->extend('template/responden') ?>

<?php $this->setVar('title', 'About Us') ?>

<?= $this->section('content') ?>
<div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					About Us
				</h3>
			</div>
		</div>
	</div>
	<div class="m-portlet__body">
		Website ini merupakan sebuah website pengumpulan data kuesioner yang hadir sebagai alat bantu bagi para peneliti/surveyor dalam mendapatkan data dari responden
	</div>
</div>
<?= $this->endSection() ?>