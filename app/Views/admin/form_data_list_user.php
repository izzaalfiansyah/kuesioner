<?= $this->extend('template/admin') ?>

<?php $this->setVar('title', 'List User') ?>

<?= $this->section('content') ?>
<div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Data User
				</h3>
			</div>
		</div>
		<div class="m-portlet__head-tools">
			<button class="btn btn-success" type="button" data-toggle="modal" data-target="#tambah">
				<i class="fa fa-plus"></i>
				Tambah
			</button>
		</div>
	</div>
	<div class="m-portlet__body">
		<div class="table-responsive">
			<table class="table table-hover" id="user">
				<thead>
					<tr>
						<th>No</th>
						<th>Username</th>
						<th>Nama</th>
						<th>Aksi</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>
<div class="modal fade" id="tambah">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="tambah">
				<div class="modal-header">
					<div class="modal-title">Tambah User</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control" placeholder="Masukkan Username" name="username" autocomplete="off">
					</div>
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control" placeholder="Masukkan Nama" name="nama" autocomplete="off">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" placeholder="Masukkan Password" name="password" autocomplete="off">
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
				<div class="modal-footer">
					<button class="btn btn-default" type="button" data-dismiss="modal">Batal</button>
					<button class="btn btn-success" type="submit">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="ubah">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="ubah">
				<div class="modal-header">
					<div class="modal-title">Edit User</div>
				</div>
				<div class="modal-body">
					<input type="hidden" class="id">
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
				<div class="modal-footer">
					<button class="btn btn-default" type="button" data-dismiss="modal">Batal</button>
					<button class="btn btn-success" type="submit">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="hapus">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="hapus">
				<div class="modal-header">
					<div class="modal-title">Hapus User</div>
				</div>
				<div class="modal-body">
					<input type="hidden" class="id">
					<p>Anda yakin menghapus user <strong class="username">Username</strong> ?</p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" type="button" data-dismiss="modal">Batal</button>
					<button class="btn btn-danger" type="submit">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<link rel="stylesheet" href="<?= base_url('/cdn/vendors/custom/datatables/datatables.bundle.css') ?>">
<script src="<?= base_url('/cdn/vendors/custom/datatables/datatables.bundle.js') ?>"></script>
<script>
	$(document).ready(function() {
		
		const show = () => {
			$('#user').DataTable().destroy();
			$('#user').DataTable({
				"deferRender": true,
				"ajax": {
					"url": base_url + '/api/user',
					"method": "GET",
					"dataSrc": "data"
				},
				"columns": [
					{
						data: null,
						render: (data, type, row, meta) => {
							return meta.row + meta.settings._iDisplayStart + 1;
						}
					},
					{
						data: "username"
					},
					{
						data: "nama"
					},
					{
						data: null,
						render: (data) => {
							return `
								<div class="text-center">
									<button class="btn btn-ubah btn-sm btn-info" type="button" data-toggle="modal" data-target="#ubah" data-id="` + data.id + `" data-username="` + data.username + `" data-email="` + data.email + `" data-nama="` + data.nama + `" data-nomor_telepon="` + data.nomor_telepon + `">
										<i class="fa fa-pen"></i>
									</button>
									<button class="btn btn-hapus btn-sm btn-danger" type="button" data-toggle="modal" data-target="#hapus" data-id="` + data.id + `" data-username="` + data.username + `">
										<i class="fa fa-trash"></i>
									</button>
								</div>
							`;
						}
					}
				],
				"language": {
					"zeroRecords": "data user tidak tersedia"
				}
			});
		}

		show();

		$(document).on('submit', 'form#tambah', function(e) {
			e.preventDefault();
			$.post(base_url + '/api/user/add', $(this).serialize()).done(res => {
				if (res.error) {
					notif(res.message, 'error', true);
				} else {
					notif(res.message, 'success');
					show();
					$('form#tambah [name]').val('');
					$('div#tambah').modal('hide');
				}
			})
		});

		$(document).on('click', 'button.btn-ubah', function() {
			$('form#ubah .id').val($(this).data('id'));
			$('form#ubah [name=username]').val($(this).data('username'));
			$('form#ubah [name=nama]').val($(this).data('nama'));
			$('form#ubah [name=nomor_telepon]').val($(this).data('nomor_telepon'));
			$('form#ubah [name=email]').val($(this).data('email'));
		});

		$(document).on('submit', 'form#ubah', function(e) {
			e.preventDefault();
			const id = $('form#ubah .id').val();
			$.post(base_url + '/api/user/edit/' + id, $(this).serialize()).done(res => {
				if (res.error) {
					notif(res.message, 'error', true);
				} else {
					notif(res.message, 'success');
					show();
					showProfil();
					$('form#ubah [name]').val('');
					$('div#ubah').modal('hide');
				}
			})
		});

		$(document).on('click', 'button.btn-hapus', function() {
			$('form#hapus .id').val($(this).data('id'));
			$('form#hapus .username').html($(this).data('username'));
		});

		$(document).on('submit', 'form#hapus', function(e) {
			e.preventDefault();
			const id = $('form#hapus .id').val();
			$.get(base_url + '/api/user/remove/' + id).done(res => {
				if (res.error) {
					notif(res.message, 'error', true);
				} else {
					notif(res.message, 'success');
					show();
					$('div#hapus').modal('hide');
				}
			})
		});

	})
</script>
<?= $this->endSection() ?>