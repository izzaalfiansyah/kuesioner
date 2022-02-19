<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kuisioner Detail</title>
	<style>
		* {
			box-sizing: border-box;
			font-family: Arial, Verdana, sans-serif;
		}

		body {
			padding: 20px 70px;
		}

		.table {
			border-collapse: collapse;
			width: 100%;
		}

		.table td, th {
			padding: 7px;
		}
	</style>
</head>
<body>
	<div align="center">
		<img src="<?= base_url('/cdn/img/responden/' . ($responden['foto'] ? $responden['foto'] : 'default.png')) ?>" style="width: 100px">
	</div>
	<br>
	<div style="display: flex; flex-wrap: wrap;">
		<div style="flex: 0 0 50%; max-width: 50%;">
			<table>
				<tr>
					<td>Nama</td>
					<td>: <?= $responden['nama'] ?></td>
				</tr>
				<tr>
					<td>Usia</td>
					<td>: <?= $responden['usia'] ?></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>: <?= $responden['jenis_kelamin'] == '1' ? "Laki-laki" : "Perempuan" ?></td>
				</tr>
				<tr>
					<td>Pendidikan/Sekolah</td>
					<td>: <?= $responden['pendidikan_terakhir'] ?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>: <?= $responden['alamat'] ?></td>
				</tr>
			</table>
		</div>
		<div style="flex: 0 0 50%; max-width: 50%;">
			<table>
				<tr>
					<td>Tanggal Lahir</td>
					<td>: <?= $responden['tanggal_lahir'] ?></td>
				</tr>
				<tr>
					<td>Status Pendidikan</td>
					<td>: <?= $responden['status_pendidikan'] ?></td>
				</tr>
				<tr>
					<td>Status Pernikahan</td>
					<td>: <?= $responden['status_pernikahan'] == '1' ? "Belum" : "Sudah" ?> Menikah</td>
				</tr>
				<tr>
					<td>Nomor Telepon</td>
					<td>: <?= $responden['nomor_telepon'] ?></td>
				</tr>
			</table>
		</div>
	</div>
	<br><br>
	<table border="1" class="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Soal</th>
				<th>Jawaban</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($soal as $key => $item): ?>
			<tr>
				<td><?= $key + 1 ?></td>
				<td><?= $item['teks'] ?></td>
				<td align="center">
					<?php foreach ($jawaban['jawaban'] as $key => $value): ?>
						<?php if ($value['si'] == $item['id']): ?>
							<?= $value['j'] ?>
						<?php endif ?>
					<?php endforeach ?>
				</td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<br><br>
	<div align="right">
		Dibuat: <?= $jawaban['created_at'] ?><br>
		Diedit: <?= $jawaban['updated_at'] ?>
	</div>
</body>
</html>