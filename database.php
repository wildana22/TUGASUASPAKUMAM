<?php

class database{
	
	function daftarbaru($con, $nisn, $nama, $gender, $tmp_lahir, $tgl_lahir, $agama, $alamat, $hp, $smp, $mtk, $bin, $big, $ipa, $jurusan1, $jurusan2)
	{
		$qry_siswa = "
				INSERT INTO
					tbl_siswa
				VALUES
					(
						'',
						'$nisn',
						'$nama',
						'$gender',
						'$tmp_lahir',
						'$tgl_lahir',
						'$agama',
						'$alamat',
						'$hp',
						'$smp'
					)
				";
		$qry_nilai = "
				INSERT INTO
					tbl_siswa_nilaijurusan
				VALUES
					(
						'$id[0]',
						'$mtk',
						'$bin',
						'$big',
						'$ipa',
						'$jurusan1',
						'$jurusan2'
					)
				";
		$siswa = mysqli_query($con, $qry_siswa);
		$nilai = mysqli_query($con, $qry_nilai);
		if($siswa && $nilai)
		{
			echo "<script>window.alert('Pendaftaran Berhasil !');window.location.href='index.php';</script>";
		}		
	}
	
	function update($con, $no_pendaftaran, $nisn, $nama, $gender, $tmp_lahir, $tgl_lahir, $agama, $alamat, $hp, $smp, $mtk, $bin, $big, $ipa, $jurusan1, $jurusan2)
	{
		$qry = "
			  UPDATE
				tbl_siswa AS s
				JOIN tbl_siswa_nilaijurusan AS sn
					 ON s.no_pendaftaran = sn.no_pendaftaran
			  SET
				 s.nisn = '$nisn',
				 s.nama = '$nama',
				 s.jenis_kelamin = '$gender',
				 s.tempat_lahir = '$tmp_lahir',
				 s.tgl_lahir = '$tgl_lahir',
				 s.agama = '$agama',
				 s.alamat = '$alamat',
				 s.no_telp = '$hp',
				 s.asal_smp = '$smp',
				 sn.nilai_matematika = '$mtk',
				 sn.nilai_bhsIndonesia = '$bin',
				 sn.nilai_bhsInggris = '$big',
				 sn.nilai_ipa = '$ipa',
				 sn.jurusan_1 = '$jurusan1',
				 sn.jurusan_2 = '$jurusan2'
			  WHERE
				   s.no_pendaftaran = $no_pendaftaran
				
				";
		$siswa = mysqli_query($con, $qry);
		if($siswa)
		{
			echo "<script>window.alert('Data Berhasil Diperbarui !');window.location.href='index.php?page=admin';</script>";
		}		
	}
	
	function jurusan($con)
	{
		return mysqli_query($con, "SELECT * FROM tbl_jurusan");
	}
	
	function login($con, $pass, $user)
	{
		$q = "SELECT * FROM tbl_admin WHERE username = '$user' AND password = md5('$pass')";
		$qry = mysqli_query($con, $q);
		$cek = mysqli_fetch_array($qry);
		if(!empty($cek[0]))
		{
			session_start();
			$_SESSION['id'] = $cek[0];
			$_SESSION['username'] = $user;
			echo "
				<script>
					alert('Selamat datang ".$user." !');
					window.location.href='index.php?page=admin';
				</script>
				";
		}
		else
		{
			echo "
				<script>
					alert('Username dan Password tidak valid !');
					window.location.href='';
				</script>
				";
		}
	}
	
	function tampil($key, $tbl, $con)
	{
		if(empty($key))
		{
			$qry = "
					SELECT
						  s.*,
						  ((snj.nilai_matematika + snj.nilai_bhsIndonesia + snj.nilai_bhsInggris + snj.nilai_ipa)/4) AS nilai,
						  j1.nama_jurusan,
						  j2.nama_jurusan,
						  snj.*
					FROM
						tbl_siswa AS s
						JOIN tbl_siswa_nilaijurusan AS snj
							 ON s.no_pendaftaran = snj.no_pendaftaran
						JOIN tbl_jurusan AS j1
							 ON snj.jurusan_1 = j1.kode_jurusan
						JOIN tbl_jurusan AS j2
							 ON snj.jurusan_2 = j2.kode_jurusan
					ORDER BY s.no_pendaftaran
					";
		}
		else
		{
			$qry = "
					SELECT
						  s.*,
						  ((snj.nilai_matematika + snj.nilai_bhsIndonesia + snj.nilai_bhsInggris + snj.nilai_ipa)/4) AS nilai,
						  j1.nama_jurusan,
						  j2.nama_jurusan,
						  snj.*
					FROM
						tbl_siswa AS s
						JOIN tbl_siswa_nilaijurusan AS snj
							 ON s.no_pendaftaran = snj.no_pendaftaran
						JOIN tbl_jurusan AS j1
							 ON snj.jurusan_1 = j1.kode_jurusan
						JOIN tbl_jurusan AS j2
							 ON snj.jurusan_2 = j2.kode_jurusan
					WHERE
						$tbl LIKE '%$key%'
					ORDER BY s.no_pendaftaran
					";			
		}
		$q = mysqli_query($con, $qry);
		while($data = mysqli_fetch_array($q))
		{
			$list[] = $data;
		}
		return $list;
	}
	
	function edit($con, $no_pendaftaran)
	{
		$qry = "
				SELECT
					  s.*,
					  snj.*,
					  ((snj.nilai_matematika + snj.nilai_bhsIndonesia + snj.nilai_bhsInggris + snj.nilai_ipa)/4) AS nilai
				FROM
					tbl_siswa AS s
					JOIN tbl_siswa_nilaijurusan AS snj
						 ON s.no_pendaftaran = snj.no_pendaftaran
				WHERE
					s.no_pendaftaran = $no_pendaftaran
				";
		$q = mysqli_query($con, $qry);
		$data = mysqli_fetch_array($q);
		return $data;
	}
	
	function update_password($con, $id_admin, $pass_baru, $pass_confirm, $pass_lama)
	{
		$qry_passwordlama = "SELECT * FROM tbl_admin WHERE id_admin = $id_admin AND password = '$pass_lama'";
		$cek = mysqli_fetch_array(mysqli_query($con, $qry_passwordlama));
		if((empty($pass_baru)) || (empty($pass_confirm)) || (empty($pass_lama))) $err = 1;
		elseif(empty($cek[0])) $err = 1;
		elseif($pass_baru!=$pass_confirm) $err = 1;
		else $err = 0;
		
		if($err==0)
		{
			$qry = "UPDATE tbl_admin SET password = '$pass_baru' WHERE id_admin = $id_admin";
			if(mysqli_query($con, $qry))
			{
				
				echo "<script>window.alert('Password berhasil diperbarui !');
				window.location.href='index.php?page=admin&ganti=ganti';</script>";
			}
		}
		else
		{
			echo "<script>window.alert('Password gagal diperbarui !');
			window.location.href='index.php?page=admin&ganti=ganti';</script>";
			
		}
	}
	
	function delete($con, $id)
	{
		$qry1 = "DELETE FROM tbl_siswa WHERE no_pendaftaran = $id";
		$qry2 = "DELETE FROM tbl_siswa_nilaijurusan WHERE no_pendaftaran = $id";
		if((mysqli_query($con, $qry1)) && (mysqli_query($con, $qry2)))
		{
			echo "<script>window.alert('Data Berhasil Dihapus !');
				window.location.href='index.php?page=admin';</script>";
		}
		else
		{
			echo "<script>window.alert('Data Gagal Dihapus !');
				window.location.href='index.php?page=admin';</script>";
			
		}
	}
}

?>