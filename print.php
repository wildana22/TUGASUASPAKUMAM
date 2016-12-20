<!DOCTYPE html>
<head>
<title>[CETAK]SMKN 1 BWI</title>
<script>
window.print() ;
</script>
</head>

<body>
<H2>LAPORAN CALON SISWA SMK NEGERI 1 BANYUWANGI</H2>
<table>
  <tr>
		<td>No. Pendaftar</td>
		<td>NISN</td>
		<td>Nama</td>
		<td>Jenis Kelamin</td>
		<td>Tempat Lahir</td>
		<td>Tanggal Lahir</td>
		<td>Pil. Jurusan 1</td>
		<td>Pil. Jurusan 2</td>
	</tr>
	<?php
		$no = 1;
		$data = $database->tampil($key, $tbl, $con);
		foreach($data as $value)
		{
	?>
	<tr>
		<td><?php echo $value[0]; ?></td>
		<td><?php echo $value[1]; ?></td>
		<td><?php echo $value[2]; ?></td>
		<td><?php echo $value[3]; ?></td>
		<td><?php echo $value[4]; ?></td>
		<td><?php echo $value[5]; ?></td>
		<td><?php echo $value[11]; ?></td>
		<td><?php echo $value[12]; ?></td>
	</tr>
	<?php
		}
	?>
</table>
</body>
</html>