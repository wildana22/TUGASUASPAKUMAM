<?php
//JALUR APLIKASI
if(!empty($_GET["page"]))
{
	$page = strtolower(mysql_escape_string($_GET["page"]));
	
	if($page == "login")
	{
		if($_POST['Login'])
		{
			if($_POST['Login'])
			{
				if((!empty($_POST['user'])) && (!empty($_POST['pass'])))
				{					
					$user = mysql_escape_string($_POST['user']);
					$pass = mysql_escape_string($_POST['pass']);
					$database->login($con, $pass, $user);
				}
			}
		}
		include("views/login.php");
	}
	elseif($page == "admin")
	{
		if(!empty($_POST["Update"]))
		{
			$no_pendaftaran = mysql_escape_string($_POST['no_pendaftaran']);
			$nisn		= mysql_escape_string($_POST['nisn']);
			$nama		= mysql_escape_string($_POST['nama']);
			$gender 	= mysql_escape_string($_POST['gender']);
			$tmp_lahir	= mysql_escape_string($_POST['tmp_lahir']);
			$tgl_lahir	= mysql_escape_string($_POST['tgl_lahir']);
			$agama		= mysql_escape_string($_POST['agama']);
			$alamat		= mysql_escape_string($_POST['alamat']);
			$hp			= mysql_escape_string($_POST['hp']);
			$smp		= mysql_escape_string($_POST['smp']);
			$mtk		= mysql_escape_string($_POST['mtk']);
			$bin		= mysql_escape_string($_POST['bin']);
			$big		= mysql_escape_string($_POST['big']);
			$ipa		= mysql_escape_string($_POST['ipa']);
			$jurusan1	= mysql_escape_string($_POST['jurusan1']);
			$jurusan2	= mysql_escape_string($_POST['jurusan2']);
			
			if(empty($nisn)) echo "<script>alert('NISN Kosong !');window.history.back();</script>";
			elseif(empty($nama)) echo "<script>alert('Nama Kosong !');window.history.back();</script>";
			elseif(empty($gender)) echo "<script>alert('Gender Kosong !');window.history.back();</script>";
			elseif(empty($tmp_lahir)) echo "<script>alert('Tempat Lahir Kosong !');window.history.back();</script>";
			elseif(empty($tgl_lahir)) echo "<script>alert('Tanggal Lahir Kosong !');window.history.back();</script>";
			elseif(empty($agama)) echo "<script>alert('Agama Kosong !');window.history.back();</script>";
			elseif(empty($alamat)) echo "<script>alert('Alamat Kosong !');window.history.back();</script>";
			elseif(empty($hp)) echo "<script>alert('No. Telpon Kosong !');window.history.back();</script>";
			elseif(empty($smp)) echo "<script>alert('SMP Asal Kosong !');window.history.back();</script>";
			elseif(empty($mtk)) echo "<script>alert('Nilai Matematika Kosong !');window.history.back();</script>";
			elseif(empty($bin)) echo "<script>alert('Nilai Bahasa Indonesia Kosong !');window.history.back();</script>";
			elseif(empty($big)) echo "<script>alert('Nilai Bahasa Inggris Kosong !');window.history.back();</script>";
			elseif(empty($ipa)) echo "<script>alert('Nilai IPA Kosong !');window.history.back();</script>";
			elseif(empty($jurusan1)) echo "<script>alert('Jurusan ke-1 Kosong !');window.history.back();</script>";
			elseif(empty($jurusan2)) echo "<script>alert('Jurusan ke-2 Kosong !');window.history.back();</script>";
			elseif($jurusan1==$jurusan2) echo "<script>alert('Jurusan 1 dan 2 tidak boleh sama !');window.history.back();</script>";
			else
			{
				$input = $database -> update($con, $no_pendaftaran, $nisn, $nama, $gender, $tmp_lahir, $tgl_lahir, $agama, $alamat, $hp, $smp, $mtk, $bin, $big, $ipa, $jurusan1, $jurusan2);
			}
		}
		elseif(!empty($_POST['cari']))
		{
			$keyword = $_POST['keyword'];
			$tbl = $_POST['tbl'];
		}
		elseif(!empty($_POST["update_pass"]))
		{
			session_start();
			$password_baru		= mysql_escape_string(md5($_POST['pb']));
			$confirm_pass		= mysql_escape_string(md5($_POST['cp']));
			$password_lama		= mysql_escape_string(md5($_POST['pl']));
			$database->update_password($con, $_SESSION['id'], $password_baru, $confirm_pass, $password_lama);
		}
		elseif(!empty($_GET['delete']))
		{
			$id = $_GET['delete'];
			$database -> delete($con, $id);
		}
		elseif((!empty($_GET['no'])) || (!empty($_GET['det'])))
		{
			if(!empty($_GET['no'])) $no_pendaftaran = $_GET['no'];
			else $no_pendaftaran = $_GET['det'];
			$dt = $database->edit($con, $no_pendaftaran);
			$nisn		= $dt[1];
			$nama		= $dt[2];
			$gender 	= $dt[3];
			$tmp_lahir	= $dt[4];
			$tgl_lahir	= $dt[5];
			$agama		= $dt[6];
			$alamat		= $dt[7];
			$hp			= $dt[8];
			$smp		= $dt[9];
			$mtk		= $dt[11];
			$bin		= $dt[12];
			$big		= $dt[13];
			$ipa		= $dt[14];
			$jurusan1	= $dt[15];
			$jurusan2	= $dt[16];
			$total		= round($dt[17],2);

			if($gender=="L") { $pi = "checked"; $pa = ""; }
			else { $pi = ""; $pa = "checked"; }
		}
		else
		{
			$keyword = 0;
			$tbl = 0;
		}
		include("views/admin.php");
	}
	elseif($page == "logout")
	{
		session_start();
		session_destroy();
		header("location:?page=login");
	}
	elseif($page == "print")
	{
		if((!empty($_GET['key'])) && (!empty($_GET['tbl'])))
		{
			$key = $_GET['key'];
			$tbl = $_GET['tbl'];
		}
		else
		{
			$key = "";
			$tbl = "";
		}
		
		include("views/print.php");
	}
	elseif($page == "excel")
	{
		if((!empty($_GET['key'])) && (!empty($_GET['tbl'])))
		{
			$key = $_GET['key'];
			$tbl = $_GET['tbl'];
		}
		else
		{
			$key = "";
			$tbl = "";
		}
		
		include("views/excel.php");
	}
	else
	{
		include("views/index.php");
	}
	
}
//DEFAULT
else
{
	//PROSES INPUT DATA PENDAFTAR
	if(!empty($_POST["daftar"]))
	{
		$nisn		= mysql_escape_string($_POST['nisn']);
		$nama		= mysql_escape_string($_POST['nama']);
		$gender 	= mysql_escape_string($_POST['gender']);
		$tmp_lahir	= mysql_escape_string($_POST['tmp_lahir']);
		$tgl_lahir	= mysql_escape_string($_POST['tgl_lahir']);
		$agama		= mysql_escape_string($_POST['agama']);
		$alamat		= mysql_escape_string($_POST['alamat']);
		$hp			= mysql_escape_string($_POST['hp']);
		$smp		= mysql_escape_string($_POST['smp']);
		$mtk		= mysql_escape_string($_POST['mtk']);
		$bin		= mysql_escape_string($_POST['bin']);
		$big		= mysql_escape_string($_POST['big']);
		$ipa		= mysql_escape_string($_POST['ipa']);
		$jurusan1	= mysql_escape_string($_POST['jurusan1']);
		$jurusan2	= mysql_escape_string($_POST['jurusan2']);
		
		if(empty($nisn)) echo "<script>alert('NISN Kosong !');window.history.back();</script>";
		elseif(empty($nama)) echo "<script>alert('Nama Kosong !');window.history.back();</script>";
		elseif(empty($gender)) echo "<script>alert('Gender Kosong !');window.history.back();</script>";
		elseif(empty($tmp_lahir)) echo "<script>alert('Tempat Lahir Kosong !');window.history.back();</script>";
		elseif(empty($tgl_lahir)) echo "<script>alert('Tanggal Lahir Kosong !');window.history.back();</script>";
		elseif(empty($agama)) echo "<script>alert('Agama Kosong !');window.history.back();</script>";
		elseif(empty($alamat)) echo "<script>alert('Alamat Kosong !');window.history.back();</script>";
		elseif(empty($hp)) echo "<script>alert('No. Telpon Kosong !');window.history.back();</script>";
		elseif(empty($smp)) echo "<script>alert('SMP Asal Kosong !');window.history.back();</script>";
		elseif(empty($mtk)) echo "<script>alert('Nilai Matematika Kosong !');window.history.back();</script>";
		elseif(empty($bin)) echo "<script>alert('Nilai Bahasa Indonesia Kosong !');window.history.back();</script>";
		elseif(empty($big)) echo "<script>alert('Nilai Bahasa Inggris Kosong !');window.history.back();</script>";
		elseif(empty($ipa)) echo "<script>alert('Nilai IPA Kosong !');window.history.back();</script>";
		elseif(empty($jurusan1)) echo "<script>alert('Jurusan ke-1 Kosong !');window.history.back();</script>";
		elseif(empty($jurusan2)) echo "<script>alert('Jurusan ke-2 Kosong !');window.history.back();</script>";
		elseif($jurusan1==$jurusan2) echo "<script>alert('Jurusan 1 dan 2 tidak boleh sama !');window.history.back();</script>";
		else
		{
			$input = $database -> daftarbaru($con, $nisn, $nama, $gender, $tmp_lahir, $tgl_lahir, $agama, $alamat, $hp, $smp, $mtk, $bin, $big, $ipa, $jurusan1, $jurusan2);
		}
	}
	include("views/form.php");
}

?>