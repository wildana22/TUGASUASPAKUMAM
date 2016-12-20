<!DOCTYPE html>
<html>
	<head>
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<link href="css/style_arr.css" rel='stylesheet' type='text/css' />


		<link rel="stylesheet" href="./js/jqueryui/jquery-ui.css">
		<script src="./js/jqueryui/jquery-3.1.1.min.js"></script>
		<script src="./js/jqueryui/jquery-ui.js"></script>

		<title>Pendaftaran Siswa Baru Smk Puspa Bangsa</title>
		<script type="text/Javascript">
		function checkDec(el){
		 var ex = /^[0-9]+\.?[0-9]*$/;
		 if(ex.test(el.value)==false){
		   el.value = el.value.substring(0,el.value.length - 1);
		  }
		}
		function sum() {
			  var nmtk = document.getElementById('mtk').value;
			  var nbin = document.getElementById('bin').value;
			  var nbig = document.getElementById('big').value;
			  var nipa = document.getElementById('ipa').value;
			  var result = (parseFloat(nmtk) + parseFloat(nbin) + parseFloat(nbig) + parseFloat(nipa)) / 4;
			  if (!isNaN(result)) {
				 document.getElementById('total').value = result;
			  }
		}
		function isNumberKey(evt){
			var charCode = (evt.which) ? evt.which : evt.keyCode
			return !(charCode > 31 && (charCode < 48 || charCode > 57));
		}
		$( function() {
			$( "#datepicker" ).datepicker({
				dateFormat : 'yy/mm/dd',
				changeMonth : true,
				changeYear : true,
				yearRange: '-20y:c+nn',
				maxDate: '-1d'
			});
		} );
		</script>
	</head>

<body>
    <div class="panel panel-widget forms-panel">
        <div class="login-heading">
            <img src="./images/log.jpg">
            <div class="ha">
                <h1>SMK PUSPA BANGSA CLURING</h1>
                <h2>BANYUWANGI</h2>
            </div>
            <p>PENDAFTARAN CALON SISWA BARU</p>
        </div>
	
        <div class="form-body">
		
            <hr>
            <br>
        	<form class="form-horizontal" action="" method="post">
            	<div class="form-group">
                	<label for="focusedinput" class="col-sm-2 control-label">NISN</label>
                    <div class="col-sm-8">
                    	<input name="nisn" type="text" class="form-control1" id="focusedinput" onkeypress="return isNumberKey(event);" size="15" maxlength="15" placeholder="NISN">
                    </div>
                </div>
            	<div class="form-group">
                	<label for="focusedinput" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-8">
                    	<input name="nama" type="text" class="form-control1" id="focusedinput" size="30" maxlength="30" placeholder="Nama">
                    </div>
                </div>
                <div class="form-group">
                	<label for="checkbox" class="col-sm-2 control-label">Jenis Kelamin</label>
                    <div class="col-sm-8">
                    	<div class="radio block"><input name="gender" type="radio" value="L" checked>Laki-Laki</div>
                    	<div class="radio block"><input name="gender" type="radio" value="P">Perempuan</div>
                    </div>
                </div>
            	<div class="form-group">
                	<label for="focusedinput" class="col-sm-2 control-label">Tempat Lahir</label>
                    <div class="col-sm-8">
                    	<input name="tmp_lahir" type="text" class="form-control1" id="focusedinput" size="30" maxlength="30" placeholder="Tmp. Lahir">
                    </div>
                </div>
            	<div class="form-group">
                	<label for="focusedinput" class="col-sm-2 control-label">Tanggal Lahir</label>
                    <div class="col-sm-8">
                    	<input name="tgl_lahir" type="text" id="datepicker" size="15" maxlength="10" placeholder="Tgl. Lahir">
                    </div>
                </div>
                <div class="form-group">
                	<label for="checkbox" class="col-sm-2 control-label">Agama</label>
                    <div class="col-sm-8">
                    	<div class="radio block"><input name="agama" type="radio" value="Islam" checked>Islam</div>
                    	<div class="radio block"><input name="agama" type="radio" value="Kristen">Kristen</div>
                    	<div class="radio block"><input name="agama" type="radio" value="Katolik">Katolik</div>
                    	<div class="radio block"><input name="agama" type="radio" value="Budha">Budha</div>
                    	<div class="radio block"><input name="agama" type="radio" value="Hindu">Hindu</div>
                    	<div class="radio block"><input name="agama" type="radio" value="Dll">Dll</div>
                    </div>
                </div>
            	<div class="form-group">
                	<label for="focusedinput" class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-8"><textarea name="alamat" cols="" rows="" class="form-control_2" id="alamat"></textarea>
                    </div>
                </div>
            	<div class="form-group">
                	<label for="focusedinput" class="col-sm-2 control-label">No. Telp</label>
                    <div class="col-sm-8">
                    	<input name="hp" type="text" class="form-control1" id="focusedinput" size="15" maxlength="15" placeholder="No. Telp/HP">
                    </div>
                </div>
            	<div class="form-group">
                	<label for="focusedinput" class="col-sm-2 control-label">SMP Asal</label>
                    <div class="col-sm-8">
                    	<input name="smp" type="text" class="form-control1" id="focusedinput" size="30" maxlength="30" placeholder="SMP Asal">
                    </div>
                </div>
            	<div class="form-group">
                	<label for="focusedinput" class="col-sm-2 control-label">Nilai UN</label>
                    <div class="col-sm-8">
						<table class="table table-bordered">
							<tr>
								<td><input name="mtk" type="text" class="form-control1_clone" id="mtk" onkeyup="checkDec(this);sum();" size=3 maxlength="4" placeholder = "MTK"></td>
								<td><input name="bin" type="text" class="form-control1_clone" id="bin" onkeyup="checkDec(this);sum();" size=3 maxlength="4" placeholder = "BIN"></td>
								<td><input name="big" type="text" class="form-control1_clone" id="big" onkeyup="checkDec(this);sum();" size=3 maxlength="4" placeholder = "BIG"></td>
								<td><input name="ipa" type="text" class="form-control1_clone" id="ipa" onkeyup="checkDec(this);sum();" size=3 maxlength="4" placeholder = "IPA"></td>
							  <td><input name="total" type="text" class="form-control1_clone1" disabled="disabled" id="total" size=3 maxlength="4" placeholder = "0.00"></td>
							<tr>
						</table>
                    </div>
                </div>
            	<div class="form-group">
                	<label for="focusedinput" class="col-sm-2 control-label">Pilihan Jurusan</label>
                    <div class="col-sm-8">
                    <?php
					$qry = $database->jurusan($con);
					$qry2 = $database->jurusan($con);
					?>
                    	<select name="jurusan1" id="jurusan1" class="form-control1">
							<option value="0">Jurusan 1</option>
							<?php
                            while($j1 = mysqli_fetch_array($qry))
                            {
                                echo "<option value=$j1[0]>$j1[1]</option>";
                            }
                            ?>
						</select>
                        <br><br>
                    	<select name="jurusan2" id="jurusan2" class="form-control1">
							<option value="0">Jurusan 2</option>
                            <?php
                            while($j2 = mysqli_fetch_array($qry2))
                            {
                                echo "<option value=$j2[0]>$j2[1]</option>";
                            }
                            ?>

						</select>
                    </div>
                </div>
                <div class="forms" align="center">
                	<br><br>
                	<button type="submit" name="daftar" value="daftar" class="btn btn-default">Daftar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>