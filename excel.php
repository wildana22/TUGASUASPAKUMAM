<?php
/*	header('Content-Type: application/force-download');
	header('Content-Disposition: attachment;filename="BASIC_Data.xls"');
	header('Cache-Control: max-age=0');*/
?>
<H2>LAPORAN CALON SISWA SMK NEGERI 1 BANYUWANGI</H2>
<table border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td rowspan="2" align="center" valign="middle">No</td>
		<td rowspan="2" align="center" valign="middle">No. Pendaftar</td>
		<td rowspan="2" align="center" valign="middle">NISN</td>
		<td rowspan="2" align="center" valign="middle">Nama</td>
		<td rowspan="2" align="center" valign="middle">Jenis<br>
	    Kelamin</td>
		<td rowspan="2" align="center" valign="middle">Tempat <br>
	    Lahir</td>
		<td rowspan="2" align="center" valign="middle">Tanggal<br>
	    Lahir</td>
		<td rowspan="2" align="center" valign="middle">Agama</td>
		<td rowspan="2" align="center" valign="middle">Alamat</td>
		<td rowspan="2" align="center" valign="middle">No. Telp</td>
		<td rowspan="2" align="center" valign="middle">Sekolah Asal</td>
		<td colspan="4" align="center" valign="middle">NIlai</td>
		<td rowspan="2">Nilai</td>
		<td rowspan="2" align="center" valign="middle">Pil. Jurusan 1</td>
		<td rowspan="2" align="center" valign="middle">Pil. Jurusan 2</td>
	</tr>
  <tr>
    <td align="center" valign="middle">MTK</td>
    <td align="center" valign="middle">BIN</td>
    <td align="center" valign="middle">BIG</td>
    <td align="center" valign="middle">IPA</td>
  </tr>
	<?php
		$no = 1;
		$data = $database->tampil($key, $tbl, $con);
		foreach($data as $value)
		{
	?>
	<tr>
	  <td><?php echo $no; ?></td>
		<td><?php echo $value[0]; ?></td>
		<td><?php echo $value[1]; ?></td>
		<td><?php echo $value[2]; ?></td>
		<td><?php echo $value[3]; ?></td>
		<td><?php echo $value[4]; ?></td>
		<td><?php echo $value[5]; ?></td>
		<td><?php echo $value[6]; ?></td>
		<td><?php echo $value[7]; ?></td>
		<td><?php echo $value[8]; ?></td>
		<td><?php echo $value[9]; ?></td>
		<td><?php echo $value[14]; ?></td>
		<td><?php echo $value[15]; ?></td>
		<td><?php echo $value[16]; ?></td>
		<td><?php echo $value[17]; ?></td>
		<td><?php echo round($value[10]); ?></td>
		<td><?php echo $value[11]; ?></td>
		<td><?php echo $value[12]; ?></td>
	</tr>
	<?php
		}
	?>
</table>