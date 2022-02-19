<?= $this->extend('template/responden') ?>

<?php $this->setVar('title', 'Login') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
	<div class="col-md-4">
		<div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
			<form id="login">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text">
								Login
							</h3>
						</div>
					</div>
				</div>
				<div class="m-portlet__body">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control" placeholder="Masukkan Nama" name="nama" autocomplete="off">
					</div>
					<div class="form-group">
						<label>Kode</label>
						<input type="text" class="form-control" placeholder="Masukkan Kode" name="kode" autocomplete="off">
					</div>
					<p class="text-center">Belum punya akun? <a href="<?= base_url('/auth/register') ?>" class="m-link">register</a></p>
				</div>
				<div class="m-portlet__foot text-right">
					<button type="submit" class="btn btn-success">Masuk</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
	$(document).ready(function() {
		
		$(document).on('submit', 'form#login', function(e) {
			e.preventDefault();
			$.post(base_url + '/api/auth/responden', $(this).serialize()).done(res => {
				if (res.error) {
					notif(res.message, 'error', true);
				} else {
					$('form#login [name]').val('');
					notif(res.message, 'success').then(() => {
						window.location = base_url + '/auth/cek/' + res.data.id + '/2';
					})
				}
			})
		});

	})
</script>
<?= $this->endSection() ?>