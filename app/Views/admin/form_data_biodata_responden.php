<?= $this->extend('template/admin') ?>

<?php $this->setVar('title', 'Biodata Responden') ?>

<?= $this->section('content') ?>
<div class="m-portlet m-portlet--mobile m-portlet--body-progress-">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Data Biodata Responden
				</h3>
			</div>
		</div>
		<div class="m-portlet__head-tools">
			<button class="btn btn-primary mr-2" type="button" data-toggle="modal" data-target="#import">
				<i class="fa fa-file"></i>
				Import
			</button>
			<a class="btn btn-success" href="<?= base_url('/admin/form-data/biodata-responden/create') ?>">
				<i class="fa fa-plus"></i>
				Tambah
			</a>
		</div>
	</div>
	<div class="m-portlet__body">
		<div class="table-responsive">
			<table class="table table-hover" id="responden">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Tanggal Lahir</th>
						<th>Pendidikan</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>
<div class="modal fade" id="hapus">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="hapus">
				<div class="modal-header">
					<div class="modal-title">Hapus Responden</div>
				</div>
				<div class="modal-body">
					<input type="hidden" class="id">
					<p>Anda yakin menghapus responden <strong class="nama">nama</strong> ?</p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" type="button" data-dismiss="modal">Batal</button>
					<button class="btn btn-danger" type="submit">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="import">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="import">
				<div class="modal-header">
					<div class="modal-title">Import Data</div>
				</div>
				<div class="modal-body">
					<p>silahkan unduh format file excel <a href="<?= base_url('/cdn/file/responden.xlsx') ?>" target="_blank">disini</a></p>
					<input type="file" name="pilih-excel" class="form-control">
					<input type="hidden" name="excel">
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" type="button" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Import</button>
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
			$('#responden').DataTable().destroy();
			$('#responden').DataTable({
				"deferRender": true,
				"serverSide": true,
				"processing": true,
				"ajax": {
					"url": base_url + "/api/responden",
					"method": "POST",
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
						data: "nama"
					},
					{
						data: "alamat"
					},
					{
						data: "tanggal_lahir"
					},
					{
						data: "pendidikan_terakhir"
					},
					{
						data: "status_pernikahan",
						render: (data) => {
							if (data == '1') {
								return 'belum menikah';
							} else {
								return 'sudah menikah';
							}
						}
					},
					{
						data: null,
						render: (data) => {
							return `
							<div class="text-center">
								<a class="btn btn-ubah btn-sm btn-info" href="` + base_url + `/admin/form-data/biodata-responden/` + data.nama.replace(/ /gi, '-').toLowerCase() + `/` + data.id + `">
									<i class="fa fa-pen"></i>
								</a>
								<button class="btn btn-hapus btn-sm btn-danger" type="button" data-toggle="modal" data-target="#hapus" data-id="` + data.id + `" data-nama="` + data.nama + `">
									<i class="fa fa-trash"></i>
								</button>
							</div>
							`;
						}
					}
				],
				"language": {
					"zeroRecords": "data responden tidak tersedia"
				}
			})
		}

		show();

		$(document).on('click', 'button.btn-hapus', function() {
			$('form#hapus .id').val($(this).data('id'));
			$('form#hapus .nama').html($(this).data('nama'));
		});

		$(document).on('submit', 'form#hapus', function(e) {
			e.preventDefault();
			const id = $('form#hapus .id').val();
			$.get(base_url + '/api/responden/remove/' + id).done(res => {
				if (res.error) {
					notif(res.message, 'error', true);
				} else {
					notif(res.message, 'success');
					show();
					$('div#hapus').modal('hide');
				}
			})
		});

		$(document).on('change', '[name=pilih-excel]', function() {
			read('[name=pilih-excel]', function(data) {
				$('[name=excel]').val(data);
			});
		});

		$(document).on('submit', 'form#import', function(event) {
			event.preventDefault();
			$.post(base_url + '/api/responden/import', $(this).serialize()).done(res => {
				if (res.error) {
					notif(res.message, 'error', true);
				} else {
					notif(res.message, 'success');
					$('form#import [name]').val('');
					$('div#import').modal('hide');
					show();
				}
			})
		});

	})
</script>
<?= $this->endSection() ?>