<!DOCTYPE html>
<html lang="en">
<head>
  <title>Perancangan Sistem IV</title>
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initialscale=1">
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
 
<?php
error_reporting(E_ALL ^ E_NOTICE);
 include "koneksi.php";
 $nidn = $_GET['nidn'];
 $queryinfo = mysqli_query($connect, "SELECT * FROM tabel_anggota WHERE nidn='$nidn'");
 $info = mysqli_fetch_array($queryinfo);
 $uname = $_COOKIE['username'];
 $pass = $_COOKIE['password'];
	
	if (!isset($uname))
	{
		?>
		<script>
			alert('Cookie Habis');
			document.location='login.php';
		</script>
		<?php
		exit;
	}
?>
Cookie Anda : <?=$uname?>
<BR>

<div class="container">
    <div class="jumbotron text-center">
    <h2>Edit Data Dosen</h2>
    </div>

    <form class="form-horizontal" method="post" action="edit.php">  

    <input type="hidden" class="form-control" id="nidn" placeholder="Masukkan NIDN" name="nidn" value="<?=$info['nidn']?>">
        <div class="form-group">
            <label class="control-label col-sm-2" for="nidn">NIDN:</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="nidnbaru" placeholder="Masukkan NIDN Baru" name="nidnbaru" value="<?=$info['nidnbaru']?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="nama">Nama:</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama" value="<?=$info['nama']?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2"  for="tempat">Tempat Lahir:</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="tempat" placeholder="Masukkan Tempat Lahir" name="tempat" value="<?=$info['tempat']?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="lahir">Tanggal Lahir:</label>
            <div class="col-sm-4">
            <input type="date" class="form-control" id="lahir" placeholder="Masukkan Tanggal Lahir" name="lahir" value="<?=$info['lahir']?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="telepon">Nomor Telepon:</label>
            <div class="col-sm-4"> 
            <input type="tel" class="form-control" id="telepon" placeholder="Masukkan Nomor Telepon" name="telepon" value="<?=$info['telepon']?>">
            </div>
        </div>

        
        <div class="form-group"> 
            <label class="control-label col-sm-2" for="pendidikan">Pendidikan:</label>
            <div class="col-sm-10">  <select class="form-control" id="pendidikan" name="pendidikan">
                <option value='-' <?php if 
                   ($info['pendidikan'] == "-") echo "selected"; ?>>--Masukkan Pendidikan--</option>
                <option value='S1' <?php if 
                    ($info['pendidikan'] == "S1") echo "selected"; ?>>S1</option>
                <option value='S2' <?php if 
                    ($info['pendidikan'] == "S2") echo "selected"; ?>>S2</option>
                <option value='S3' <?php if 
                    ($info['pendidikan'] == "S3") echo "selected"; ?>>S3</option>
                <option value='lainnya' <?php if 
                    ($info['pendidikan'] == "lainnya") echo "selected"; 
                ?>>Lainnya</option>
                </select>
            </div>
        </div>
        
        <div class="form-group"> 
            <label class="control-label col-sm-2" for="jk">Jenis Kelamin:</label>
            <div class="col-sm-10"> 
            <label class="radio-inline" ><input type="radio" id="jk" name="jk" value="Pria" <?php if 
                ($info['jenis_kelamin'] == "Pria") echo "checked"; ?>> Pria</label>
            <label class="radio-inline"><input type="radio" id="jk" name="jk" value="Wanita" <?php if 
                ($info['jenis_kelamin'] == "Wanita") echo "checked"; ?>> Wanita</label>
            </div>
        </div>

        <div class="form-group"> 
            <label class="control-label col-sm-2" for="ahli">Spesialisasi:</label>
            <div class="col-sm-10"> 
                <label class="checkbox-inline" ><input type='checkbox' name='ahli[]' value='Programming' id="ahli" 
                    <?php if (preg_match("/Programming/", $info['keahlian'])) echo "checked"; ?>> Programming</label>
                <label class="checkbox-inline" ><input type='checkbox' name='ahli[]' value='Networking' id="ahli" 
                    <?php if (preg_match("/Networking/", $info['keahlian'])) echo "checked"; ?>> Networking</label>
                <label class="checkbox-inline" ><input type='checkbox' name='ahli[]' value='Database' id="ahli" 
                    <?php if (preg_match("/Database/", $info['keahlian'])) echo "checked"; ?>> Database</label>
                <label class="checkbox-inline" ><input type='checkbox' name='ahli[]' value='Analysis' id="ahli" 
                <?php if (preg_match("/System/", $info['keahlian'])) echo "checked"; ?>> Analysis</label>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="username">Username:</label>
            <div class="col-sm-4">
            <input type="email" class="form-control" name="username" placeholder="Input Username" name="username" value="<?=$info['username']?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="password">Password:</label>
            <div class="col-sm-4"> 
            <input type="password" class="form-control" name="password" placeholder="Input Password" name="password" value="<?=$info['password']?>">
            </div>
        </div>

        <div class="form-group"> 
            <label class="control-label col-sm-2" for="tg">Tunjangan Golongan:</label>
            <div class="col-sm-10"> 
            <label class="radio-inline" ><input type="radio" id="tg" name="tg" value="3A" <?php if 
                ($info['tunjangan_golongan'] == "3A") echo "checked"; ?>> 3A</label>
            <label class="radio-inline"><input type="radio" id="tg" name="tg" value="3B" <?php if 
                ($info['tunjangan_golongan'] == "3B") echo "checked"; ?>> 3B</label>
            <label class="radio-inline"><input type="radio" id="tg" name="tg" value="3C" <?php if 
                ($info['tunjangan_golongan'] == "3C") echo "checked"; ?>> 3C</label>
            <label class="radio-inline" ><input type="radio" id="tg" name="tg" value="4A" <?php if 
                ($info['tunjangan_golongan'] == "4A") echo "checked"; ?>> 4A</label>
            <label class="radio-inline"><input type="radio" id="tg" name="tg" value="4B" <?php if 
                ($info['tunjangan_golongan'] == "4B") echo "checked"; ?>> 4B</label>
            <label class="radio-inline"><input type="radio" id="tg" name="tg" value="4C" <?php if 
                ($info['tunjangan_golongan'] == "4C") echo "checked"; ?>> 4C</label>
            </div>
        </div>

        <div class="form-group"> 
            <label class="control-label col-sm-2" for="tp">Tunjangan Pangkat:</label>
            <div class="col-sm-10"> 
            <label class="radio-inline" ><input type="radio" id="tp" name="tp" value="AA" <?php if 
                ($info['tunjangan_pangkat'] == "AA") echo "checked"; ?>> AA</label>
            <label class="radio-inline" ><input type="radio" id="tp" name="tp" value="L" <?php if 
                ($info['tunjangan_pangkat'] == "L") echo "checked"; ?>> L</label>
            <label class="radio-inline" ><input type="radio" id="tp" name="tp" value="LK" <?php if 
                ($info['tunjangan_pangkat'] == "LK") echo "checked"; ?>> LK</label>
            <label class="radio-inline" ><input type="radio" id="tp" name="tp" value="GB" <?php if 
                ($info['tunjangan_pangkat'] == "GB") echo "checked"; ?>> GB</label>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="gp">Gaji Pokok:</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="gp" name="gp" value="<?=$info['gaji_pokok']?>">
            </div>
        </div>
        
        <div class="form-group"> 
            <label class="control-label col-sm-2" for="pengalaman">Pengalaman:</label>
            <div class="col-sm-10"> 
            <textarea class="form-control" rows="5" style="resize: none" id="pengalaman" name="pengalaman"><?=$info['pengalaman']?></textarea>
            </div>
        </div>

        <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
            <a href="input.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"> Kembali</a>
            <button type="submit" class="btn btn-success" name="edit"><span class="glyphicon glyphicon-edit"></span> Edit</button>
            <button type="reset" class="btn btn-warning"><span class="glyphicon glyphicon-repeat"></span> Reset</button>
            
            </div>
        </div>
    </div>
    </form>

    <div class="col-sm-10 col-sm-offset-1">
    <?php
        if (isset($_POST['edit']))
        {
            $nidn = $_POST['nidn'];
            $nidnbaru = $_POST['nidnbaru'];
            $nama = $_POST['nama'];
            $tempat = $_POST['tempat'];
            $lahir = $_POST['lahir'];
            $telepon = $_POST['telepon'];
            $pendidikan = $_POST['pendidikan'];
            $jk = $_POST['jk'];
            $keahlian = "";
            if(!empty($_POST['ahli'])){
                foreach($_POST['ahli'] as $pilih){
                $keahlian .= $pilih.", ";}}
            $username = $_POST['username'];
            $password = $_POST['password'];
            $tg = $_POST['tg'];
            if ($tg == '3A' || $tg == '3B'){
                $tugol = 500000;
            }
            elseif($tg == '3C'){
                $tugol = 750000;
            }
            elseif($tg == '4A' || $tg == '4B'){
                $tugol = 1000000;
            }
            else{
                $tugol = 1500000;
            }
           
            $tp = $_POST['tp'];
            if ($tp == 'AA'){
                $tupang = 375000;
            }
            elseif($tp == 'L'){
                $tupang = 750000;
            }
            elseif($tp == 'LK'){
                $tupang = 1500000;
            }
            else{
                $tupang = 7500000;
            }

            $pengalaman = $_POST['pengalaman'];
            $gp = $_POST['gp'];
            $total = $tugol + $tupang + $gp;
            date_default_timezone_set('Asia/Kuala_Lumpur');
            $waktu = date("Y-m-d H:i:s");
            $queryedit1 = mysqli_query($connect, "INSERT INTO log (nidn,nama,username,waktu,gaji) VALUES ('$nidnbaru','$nama','$uname','$waktu','$total')");

            $queryedit = mysqli_query($connect, "UPDATE tabel_anggota SET nidn='$nidnbaru', nama='$nama', tempat='$tempat', lahir='$lahir',telepon='$telepon', pendidikan='$pendidikan', jenis_kelamin='$jk',keahlian='$keahlian',username='$username',password='$password',tunjangan_golongan='$tg',tunjangan_pangkat='$tp',gaji_pokok='$gp',total='$total',pengalaman='$pengalaman' WHERE nidn='$nidn'");

       
                if ($queryedit)
                {
    ?>
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> Data Dosen Berhasil Diedit. Klik <a href="input.php">disini</a> untuk Input Data Baru.
                </div>
    <?php
                }
                else
                {
    ?>
                <div class="alert alert-ddanger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Failed!</strong> Data Dosen Gagal Diedit.
                </div>
    <?php
                }
        }
    ?>
    </div>
</div>
</body>
</html>