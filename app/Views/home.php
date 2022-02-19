<?= $this->extend('template/responden') ?>

<?php $this->setVar('title', 'Home') ?>

<?= $this->section('content') ?>
<div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					E-KUISIONER
				</h3>
			</div>
		</div>
	</div>
	<div class="m-portlet__body">
		<p>Selamat datang di E-Kuisioner Pusat Survey Atakana. Gunakan hak anda dengan baik dan bijaksana!</p>
	</div>
</div>
<div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					PERATURAN
				</h3>
			</div>
		</div>
	</div>
	<div class="m-portlet__body">
		<ul>
			<li>
				Pengunjung/responden melakukan isi survey di website dengan mengeklik isi survey
			</li>
			<li>
				Pengunjung bisa mengakses dan melihat soal dan hal lain
			</li>
			<li>
				Pengunjung / Responden mengisi soal yang telah di tentukan oleh para peneliti/ Surveyor (yang telah dibuat oleh admin)
			</li>
			<li>
				Pengunjung / responden wajib membaca ketentuan sebelum mengisis kuesioner
			</li>
			<li>
				Pengunjung/responden mengisi pertanyaan kuesioner dan bisa melakukan pengisian kuesioner apabila dalam pengisian mengalami kesalahan
			</li>
		</ul>
	</div>
</div>
<?= $this->endSection() ?>