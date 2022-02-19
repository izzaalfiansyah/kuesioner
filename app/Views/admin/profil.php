<?= $this->extend('template/admin') ?>

<?php $this->setVar('title', 'Profil') ?>

<?= $this->section('content') ?>
<div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
	<form id="ubah">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Profil
					</h3>
				</div>
			</div>
		</div>
		<div class="m-portlet__body">
			<input type="hidden" class="id" value="<?= Session()->get('id') ?>">
			<div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control" placeholder="Masukkan Username" name="username" autocomplete="off">
			</div>
			<div class="form-group">
				<label>Nama</label>
				<input type="text" class="form-control" placeholder="Masukkan Nama" name="nama" autocomplete="off">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" placeholder="Masukkan Email" name="email" autocomplete="off">
			</div>
			<div class="form-group">
				<label>Nomor Telepon</label>
				<input type="text" class="form-control" placeholder="Masukkan Nomor Telepon" name="nomor_telepon" autocomplete="off">
			</div>
		</div>
		<div class="m-portlet__foot text-right">
			<button class="btn btn-success" type="submit">Simpan</button>
		</div>
	</form>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
	$(document).ready(function() {

		show = () => {
			$.get(base_url + '/api/user/details/<?= Session()->get('id') ?>').done(res => {
				if (res.data) {
					$('[name=username]').val(res.data.username);
					$('[name=nama]').val(res.data.nama);
					$('[name=email]').val(res.data.email);
					$('[name=nomor_telepon]').val(res.data.nomor_telepon);
				}
			})
		}

		show();
		
		$(document).on('submit', 'form#ubah', function(e) {
			e.preventDefault();
			const id = $('form#ubah .id').val();
			$.post(base_url + '/api/user/edit/' + id, $(this).serialize()).done(res => {
				if (res.error) {
					notif(res.message, 'error', true);
				} else {
					notif(res.message, 'success');
					$('form#ubah [name]').val('');
					show();
					showProfil();
				}
			})
		});

	})
</script>
<?= $this->endSection() ?>