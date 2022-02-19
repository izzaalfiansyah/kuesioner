<?= $this->extend('template/responden') ?>

<?php $this->setVar('title', 'Contact') ?>

<?= $this->section('content') ?>
<div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Contact
				</h3>
			</div>
		</div>
	</div>
	<div class="m-portlet__body">
		<div class="row text-center">
			<div class="col-md mt-5 mb-5">
				<big>Telp/WA</big>
				<h2><a href="tel:085262915987" class="m-link">085262915987</a></h2>
			</div>
			<div class="col-md mt-5 mb-5">
				<big>Email</big>
				<h2><a href="mailto:imadulauwalin@gmail.com" class="m-link">imadulauwalin@gmail.com</a></h2>
			</div>
		</div>
	</div>
</div>
<?= $this->endSection() ?>