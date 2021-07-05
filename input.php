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
include "koneksi.php";
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
Cookie anda : <?=$uname?>
<BR>



<div class="container">
    <div class="jumbotron text-center">
    <h2>Input Data Dosen</h2>
    </div>

    <form class="form-horizontal" method="post" action="input.php">
        <div class="form-group">
            <label class="control-label col-sm-2" for="nidn">NIDN:</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="nidn" placeholder="Masukkan NIDN" name="nidn">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="nama">Nama:</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2"  for="tempat">Tempat Lahir:</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="tempat" placeholder="Masukkan Tempat Lahir" name="tempat">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="lahir">Tanggal Lahir:</label>
            <div class="col-sm-4">
            <input type="date" class="form-control" id="lahir" placeholder="Masukkan Tanggal Lahir" name="lahir">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="telepon">Nomor Telepon:</label>
            <div class="col-sm-4"> 
            <input type="tel" class="form-control" id="telepon" placeholder="Masukkan Nomor Telepon" name="telepon">
            </div>
        </div>
        
        <div class="form-group"> 
            <label class="control-label col-sm-2" for="pendidikan">Pendidikan Terakhir:</label>
            <div class="col-sm-10"> 
            <select class="form-control" id="pendidikan" name="pendidikan">
            <option value='-'>--Masukkan Pendidikan--</option>
                <option value='S1'>S1</option>
                <option value='S2'>S2</option>
                <option value='S3'>S3</option>
                <option value='lainnya'>Lainnya</option>
            </select>
            </div>
        </div>

        <div class="form-group"> 
            <label class="control-label col-sm-2" for="jk">Jenis Kelamin:</label>
            <div class="col-sm-10"> 
            <label class="radio-inline" ><input type="radio" id="jk" name="jk" value="Pria"> Pria</label>
            <label class="radio-inline"><input type="radio" id="jk" name="jk" value="Wanita"> Wanita</label>
            </div>
        </div>
        
        <div class="form-group"> 
            <label class="control-label col-sm-2" for="ahli">Spesialisasi:</label>
            <div class="col-sm-10"> 
            <label class="checkbox-inline" >
                <input type='checkbox' name='ahli[]' value='Programming' id="ahli"> Programming</label>
            <label class="checkbox-inline" >
                <input type='checkbox' name='ahli[]' value='Networking' id="ahli"> Networking</label>
            <label class="checkbox-inline" >
                <input type='checkbox' name='ahli[]' value='Database' id="ahli"> Database</label>
            <label class="checkbox-inline" >
                <input type='checkbox' name='ahli[]' value='Analysis' id="ahli"> Analysis</label>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="username">Username:</label>
            <div class="col-sm-4">
            <input type="email" class="form-control" name="username" placeholder="Input Username" name="username">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="password">Password:</label>
            <div class="col-sm-4"> 
            <input type="password" class="form-control" name="password" placeholder="Input Password" name="password">
            </div>
        </div>

        <div class="form-group"> 
            <label class="control-label col-sm-2" for="tg">Tunjangan Golongan:</label>
            <div class="col-sm-10"> 
            <label class="radio-inline"><input type="radio" id="tg" name="tg" value="3A"> 3A</label>
            <label class="radio-inline"><input type="radio" id="tg" name="tg" value="3B"> 3B</label>
            <label class="radio-inline"><input type="radio" id="tg" name="tg" value="3C"> 3C</label>
            <label class="radio-inline"><input type="radio" id="tg" name="tg" value="4A"> 4A</label>
            <label class="radio-inline"><input type="radio" id="tg" name="tg" value="4B"> 4B</label>
            <label class="radio-inline"><input type="radio" id="tg" name="tg" value="4C"> 4C</label>
            </div>
        </div>

        <div class="form-group"> 
            <label class="control-label col-sm-2" for="tp">Tunjangan Pangkat:</label>
            <div class="col-sm-10"> 
            <label class="radio-inline"><input type="radio" id="tp" name="tp" value="AA"> AA</label>
            <label class="radio-inline"><input type="radio" id="tp" name="tp" value="L"> L</label>
            <label class="radio-inline"><input type="radio" id="tp" name="tp" value="LK"> LK</label>
            <label class="radio-inline"><input type="radio" id="tp" name="tp" value="GB"> GB</label>
            </div>
        </div>

        <div class="form-group"> 
            <label class="control-label col-sm-2" for="pengalaman">Pengalaman Kerja:</label>
            <div class="col-sm-10"> 
            <textarea class="form-control" rows="5" style="resize: none" id="pengalaman" name="pengalaman"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="gp">Gaji Pokok:</label>
            <div class="col-sm-4">
            <input type="text" class="form-control" id="gp" name="gp">
            </div>
        </div>

        

        <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success" name="submit"><span class="glyphicon glyphicon-floppy-save"></span> Submit</button>
            <button type="reset" class="btn btn-warning"><span class="glyphicon glyphicon-repeat"></span> Reset</button>
            <a href="logout.php" class="btn btn-primary"><span class="glyphicon glyphicon-log-out"> Logout</a>
            </div>
        </div>
    </div>
    </form>

    <div class="col-sm-10 col-sm-offset-1">
        <?php
        if (isset($_POST['submit']))
        {
            $nidn = $_POST['nidn'];
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
            $queryedit1 = mysqli_query($connect, "INSERT INTO log (nidn,nama,username,waktu,gaji) VALUES ('$nidn','$nama','$uname','$waktu','$total')");

            $queryinsert = mysqli_query($connect, "INSERT INTO tabel_anggota VALUES ('$nidn','$nama','$tempat','$lahir','$telepon','$pendidikan','$jk','$keahlian','$username','$password','$tg','$tp','$pengalaman','$gp','$total')");
                if ($queryinsert)
                {
        ?>
    
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> Dosen Berhasil Diinput.
                </div>
        <?php
                }
                else
                {
        ?>
                <div class="alert alert-ddanger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Failed!</strong> Data Dosen Gagal Diinput.</div>
        <?php
                }
        }

        if (isset($_GET['hapus']))
        {
            $nidn = $_GET['nidn'];
            $querydelete = mysqli_query($connect, "DELETE FROM tabel_anggota WHERE nidn='$nidn'");
                if ($querydelete)
                {
        ?>
            <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> Data Dosen Berhasil Dihapus.
            </div>
        <?php
                }
                else
                {
        ?>
            <div class="alert alert-ddanger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Failed!</strong> Data Dosen Gagal Dihapus.
            </div>
        <?php
                }
        }
        ?>
    </div>

    <div class="table-responsive col-sm-10 col-sm-offset-1">
    <div class="jumbotron text-center">
    <h2>List Data Dosen</h2>
    </div>
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>NIDN</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Telepon</th>
                    <th>Pendidikan</th>
                    <th>Jenis Kelamin</th>
                    <th>Keahlian</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Tunjangan Golongan</th>
                    <th>Tunjangan Pangkat</th>
                    <th>Pengalaman</th>
                    <th>Gaji Pokok</th>
                    <th>Total Gaji</th>
                </tr>
            </thead>
        <tbody>
        
        <?php
            $queryanggota = mysqli_query($connect, "SELECT * FROM tabel_anggota ORDER BY nama");
            $jumanggota = mysqli_num_rows($queryanggota);
            if ($jumanggota == 0)
            {
        ?>
        <tr>
        <td colspan="12" class="danger">Data Dosen Masih Kosong</td>
                </tr>
        <?php
                }
                else
                {
                    while ($anggota = mysqli_fetch_array($queryanggota))
                    {
        ?>
                    <tr>
                        <td><?=$anggota['nidn']?></td>
                        <td><?=$anggota['nama']?></td>
                        <td><?=$anggota['tempat']?></td>
                        <td><?=$anggota['lahir']?></td>
                        <td><?=$anggota['telepon']?></td>
                        <td><?=$anggota['pendidikan']?></td>
                        <td><?=$anggota['jenis_kelamin']?></td>
                        <td><?=$anggota['keahlian']?></td>
                        <td><?=$anggota['username']?></td>
                        <td><?=$anggota['password']?></td>
                        <td><?=$anggota['tunjangan_golongan']?></td>
                        <td><?=$anggota['tunjangan_pangkat']?></td>
                        <td><?=$anggota['pengalaman']?></td>
                        <td><?=$anggota['gaji_pokok']?></td>
                        <td><?=$anggota['total']?></td>
                        <td><a href="edit.php?nidn=<?=$anggota['nidn']?>"><button type="button" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-edit"></span> Edit</button></a></td>
                        <td><a href="input.php?hapus=ok&nidn=<?=$anggota['nidn']?>"><button type="button" class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span> Hapus</button></a></td>
                        <td><a href="lihat.php?hapus=ok&nidn=<?=$anggota['nidn']?>"><button type="button" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-eye-open"></span> Lihat</button></a></td>
                    </tr>
        <?php
                    }
                }
        ?>
        </tbody>
        </table>
    </div>
    </div>
</body>
</html>