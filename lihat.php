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
		</script>-->
		<?php
		exit;
	}
?>
Cookie anda : <?=$uname?>
<BR>

<div class="container">
    <div class="jumbotron text-center">
    <h2>Lihat Data Dosen</h2>
    </div>

    <form class="form-horizontal" method="post" action="input.php">  


        <div class="form-group">
            <label class="control-label col-sm-2" for="nidn">NIDN:</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="nidn" placeholder="Masukkan NIDN" name="nidn" value="<?=$info['nidn']?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="nama">Nama:</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama" value=" <?=$info['nama']?>"readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2"  for="tempat">Tempat Lahir:</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="tempat" placeholder="Masukkan Tempat Lahir" name="tempat" value="<?=$info['tempat']?>"readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="lahir">Tanggal Lahir:</label>
            <div class="col-sm-4">
            <input type="date" class="form-control" id="lahir" placeholder="Masukkan Tanggal Lahir" name="lahir" value="<?=$info['lahir']?>"readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="telepon">Nomor Telepon:</label>
            <div class="col-sm-4"> 
            <input type="tel" class="form-control" id="telepon" placeholder="Masukkan Nomor Telepon" name="telepon" value="<?=$info['telepon']?>"readonly>
            </div>
        </div>

        
        <div class="form-group"> 
            <label class="control-label col-sm-2" for="pendidikan">Pendidikan:</label>
            <div class="col-sm-10">  <select class="form-control" id="pendidikan" name="pendidikan" readonly>
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
            <label class="radio-inline" ><input type="radio" id="jk"  disabled name="jk" value="Pria" <?php if 
                ($info['jenis_kelamin'] == "Pria") echo "checked"; ?>> Pria</label>
            <label class="radio-inline"><input type="radio" id="jk" disabled name="jk" value="Wanita" <?php if 
                ($info['jenis_kelamin'] == "Wanita") echo "checked"; ?>> Wanita</label>
            </div>
        </div>

        <div class="form-group"> 
            <label class="control-label col-sm-2" for="ahli">Spesialisasi:</label>
            <div class="col-sm-10"> 
                <label class="checkbox-inline" ><input type='checkbox' disabled name='ahli[]' value='Programming' id="ahli" 
                    <?php if (preg_match("/Programming/", $info['keahlian'])) echo "checked"; ?>> Programming</label>
                <label class="checkbox-inline" ><input type='checkbox' disabled name='ahli[]' value='Networking' id="ahli" 
                    <?php if (preg_match("/Networking/", $info['keahlian'])) echo "checked"; ?>> Networking</label>
                <label class="checkbox-inline" ><input type='checkbox' disabled name='ahli[]' value='Database' id="ahli" 
                    <?php if (preg_match("/Database/", $info['keahlian'])) echo "checked"; ?>> Database</label>
                <label class="checkbox-inline" ><input type='checkbox' disabled name='ahli[]' value='Analysis' id="ahli" 
                <?php if (preg_match("/System/", $info['keahlian'])) echo "checked"; ?>> Analysis</label>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="username">Username:</label>
            <div class="col-sm-4">
            <input type="email" class="form-control" name="username" placeholder="Input Username" name="username" readonly value="<?=$info['username']?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="password">Password:</label>
            <div class="col-sm-4"> 
            <input type="password" class="form-control" name="password" placeholder="Input Password" name="password" readonly value="<?=$info['password']?>">
            </div>
        </div>

        <div class="form-group"> 
            <label class="control-label col-sm-2" for="tg">Tunjangan Golongan:</label>
            <div class="col-sm-10"> 
            <label class="radio-inline" ><input type="radio" id="tg" disabled name="tg" value="3A" <?php if 
                ($info['tunjangan_golongan'] == "3A") echo "checked"; ?>> 3A</label>
            <label class="radio-inline"><input type="radio" id="tg" disabled name="tg" value="3B" <?php if 
                ($info['tunjangan_golongan'] == "3B") echo "checked"; ?>> 3B</label>
            <label class="radio-inline"><input type="radio" id="tg" disabled name="tg" value="3C" <?php if 
                ($info['tunjangan_golongan'] == "3C") echo "checked"; ?>> 3C</label>
            <label class="radio-inline" ><input type="radio" id="tg" disabled name="tg" value="4A" <?php if 
                ($info['tunjangan_golongan'] == "4A") echo "checked"; ?>> 4A</label>
            <label class="radio-inline"><input type="radio" id="tg" disabled name="tg" value="4B" <?php if 
                ($info['tunjangan_golongan'] == "4B") echo "checked"; ?>> 4B</label>
            <label class="radio-inline"><input type="radio" id="tg" disabled name="tg" value="4C" <?php if 
                ($info['tunjangan_golongan'] == "4C") echo "checked"; ?>> 4C</label>
            </div>
        </div>

        <div class="form-group"> 
            <label class="control-label col-sm-2" for="tp">Tunjangan Pangkat:</label>
            <div class="col-sm-10"> 
            <label class="radio-inline" ><input type="radio" id="tp" disabled name="tp" value="AA" <?php if 
                ($info['tunjangan_pangkat'] == "AA") echo "checked"; ?>> AA</label>
            <label class="radio-inline" ><input type="radio" id="tp" disabled name="tp" value="L" <?php if 
                ($info['tunjangan_pangkat'] == "L") echo "checked"; ?>> L</label>
            <label class="radio-inline" ><input type="radio" id="tp" disabled name="tp" value="LK" <?php if 
                ($info['tunjangan_pangkat'] == "LK") echo "checked"; ?>> LK</label>
            <label class="radio-inline" ><input type="radio" id="tp" disabled name="tp" value="GB" <?php if 
                ($info['tunjangan_pangkat'] == "GB") echo "checked"; ?>> GB</label>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="gp">Gaji Pokok:</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="gp" name="gp" value="<?=$info['gaji_pokok']?>"readonly >
            </div>
        </div>
        
        <div class="form-group"> 
            <label class="control-label col-sm-2" for="pengalaman">Pengalaman:</label>
            <div class="col-sm-10"> 
            <textarea class="form-control" rows="5" style="resize: none" id="pengalaman" readonly name="pengalaman"><?=$info['pengalaman']?></textarea>
            </div>
        </div>

        <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
            <a href="input.php" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"> Kembali</a>
            <button type="reset" class="btn btn-warning"><span class="glyphicon glyphicon-repeat"></span> Reset</button>
            <a href="logout.php" class="btn btn-primary"><span class="glyphicon glyphicon-log-out"> Logout</a>
            </div>
        </div>
    </div>
    </form>

    <div class="table-responsive col-sm-10 col-sm-offset-1">
    <div class="jumbotron text-center">
    <h2>List Data Log</h2>
    </div>
        <table class="table table-striped ">
        <thead>
            <tr>
                <th>ID</th>
                <th>NIDN</th>
                <th>Nama</th>
                <th>Username Pengedit</th>
                <th>Waktu</th>
                <th>Gaji</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $queryanggota = mysqli_query($connect, "SELECT * FROM log ORDER BY id");
        $jumanggota = mysqli_num_rows($queryanggota);
        if ($jumanggota == 0)
        {
        ?>
        <tr>
        <td colspan="12" class="danger">Data Anggota Masih Kosong</td>
        </tr>
    <?php
        }
        else
        {
            while ($anggota = mysqli_fetch_array($queryanggota))
            {
    ?>
        <tr>
            <td><?=$anggota['id']?></td>
            <td><?=$anggota['nidn']?></td>
            <td><?=$anggota['nama']?></td>
            <td><?=$anggota['username']?></td>
            <td><?=$anggota['waktu']?></td>
            <td><?=$anggota['gaji']?></td>
        </tr>
    <?php
            }
        }
    ?>

    </div>
</div>
</body>
</html>