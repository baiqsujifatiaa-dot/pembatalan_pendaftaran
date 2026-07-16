<?php 
//set session
session_start();
require "../fungsi.php";

if(!isset($_SESSION['login'])){
    header("location: ../login.php");
}else if($_SESSION['login'] && $_SESSION['peran'] != 'pelamar'){
    echo "<script>
        alert('Anda tidak diijinkan mengakses halaman ini');
        document.location.href = '../panitia/index.php';
        </script>";
    }

?>
<!DOCTYPE html>
<html lang="id">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Sistem Penerimaan Siswa Baru</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    

    <?php 
    echo "Selamat Datang <strong>" . $_SESSION['username'] . "</strong>";
    ?>
    <body>
      <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
      <div class="container-fluid">
      <a class="navbar-brand" href="#">ASPMB</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="buat_akun.php">Buat Akun</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="login.php">Login</a>
          </li>
      </div>
    </div>
  </nav>
  <h1>Formulir Pendaftaran Siswa Baru</h1>

  <h2>Selamat Datang di Sistem Penerimaan Siswa Baru</h2>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
        <hr>
        <p>Silahkan isi biodata anda!!</p>
        <?php 
            $username = $_SESSION['username'];
            //var_dump(cekRegistrasi($username));
            if(cekRegistrasi($username) == 0):
            //jika hasil cek registrasi 0 maka tampilkan form registrasi
           
        ?>
        <form action="" method="POST">
            <input type="hidden" name="username" value="<?= $username; ?>">

            <fieldset>
                <legend>Biodata Calon Siswa</legend>

                <label for="nama_depan">Nama Depan</label>
                <input type="text" name="nama_depan" id="nama_depan">

                <label for="nama_belakang">Nama Belakang</label>
                <input type="text" name="nama_belakang" id="nama_belakang"> <br><br>

                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir"> <br><br>

                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir"> <br><br>

                <label for="jenis_kelamin">Jenis Kelamin</label>
                <input type="radio" name="jenis_kelamin" id="Laki-laki" value="Laki-laki">
                <label for="Laki-laki">Laki-laki</label>
                <input type="radio" name="jenis_kelamin" id="Perempuan" value="Perempuan">
                <label for="Perempuan">Perempuan</label> <br><br>

                <label for="nisn">NISN</label>
                <input type="text" name="nisn" id="nisn" maxlength="10"> <br><br>

                <label for="agama">Agama</label>
                <select name="agama" id="agama">
                    <option value="">Pilih salah Satu</option>
                    <option value="Islam">Islam</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Protestan">Protestan</option>
                    <option value="Katholik">Katholik</option>
                    <option value="Budha">Budha</option>
                </select> <br><br>

                <label for="sekolah_asal">Asal Sekolah</label>
                <input type="text" name="sekolah_asal" id="sekolah_asal"> <br><br>

                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat"></textarea> <br><br>

                <label for="telepon">Telpon/WA</label>
                <input type="text" name="telepon" id="telepon">
            </fieldset>

            <fieldset>
                <legend>Data Orang Tua</legend>

                <label for="nama_ayah">Nama Ayah </label>
                <input type="text" name="nama_ayah" id="nama_ayah"> <br><br>

                <label for="pekerjaan_ayah">Pekerjaan Ayah </label>
                <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah"> <br><br>

                <label for="penghasilan_ayah">Penghasilan Ayah </label>
                <input type="number" name="penghasilan_ayah" id="penghasilan_ayah"><br><br>

                <label for="nama_ibu">Nama Ibu </label>
                <input type="text" name="nama_ibu" id="nama_ibu"> <br><br>

                <label for="pekerjaan_ibu">Pekerjaan Ibu </label>
                <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu"> <br><br>

                <label for="penghasilan_ibu">Penghasilan Ibu </label>
                <input type="number" name="penghasilan_ibu" id="penghasilan-ibu"> <br><br>

            </fieldset>

            <input type="submit" name="tabel_registrasi" value="Registrasi">
            

        </form>
        
        <?php 
            else:
                //jika hasil cek registrasi 1 maka tampilkan pesan sudah mengisi formulir
                //selanjutnya pendaftar dapat mengedit formulir
                echo "Anda sudah mengisi formulir, Berikut data yang anda Kirim : <hr> ";             

                //tampilkan data pelamar yang diambil dari tbl_registrasi dan tbl_orangtua

                $dataPendaftar = tampilPendaftar($username);
                //var_dump($dataPendaftar);

                foreach($dataPendaftar as $pendaftar):
            ?>
                <ul>
                    <li>Nama Depan : <?= $pendaftar['nama_depan']; ?></li>
                    <li>Nama Belakang : <?= $pendaftar['nama_belakang']; ?></li>
                    <li>Tempat lahir: <?= $pendaftar['tempat_lahir']; ?></li>
                    <li>Tanggal Lahir : <?= date('d F Y', strtotime($pendaftar['tanggal_lahir'])); ?></li>
                    <li>Jenis Kelamin : <?= $pendaftar['jenis_kelamin']; ?></li>
                    <li>NISN : <?= $pendaftar['nisn']; ?></li>
                    <li>Agama : <?= $pendaftar['agama']; ?></li>
                    <li>Sekolah Asal : <?= $pendaftar['sekolah_asal']; ?></li>
                    <li>alamat : <?= $pendaftar['alamat']; ?></li>
                    <li>Nomor Telepon : <?= $pendaftar['telepon']; ?></li>

                </ul>
                <p> <strong>Data Orang Tua</strong></p>
                <ul>
                    <li>Nama Ayah: <?= $pendaftar['nama_ayah']; ?></li>
                    <li>Pekerjaan Ayah: <?= $pendaftar['pekerjaan_ayah']; ?></li>
                    <li>Penghasilan Ayah: Rp. <?= $pendaftar['penghasilan_ayah']; ?></li>
                    <li>Nama Ibu: <?= $pendaftar['nama_ibu']; ?></li>
                    <li>Pekerjaan Ibu: <?= $pendaftar['pekerjaan_ibu']; ?></li>
                    <li>Penghasilan Ibu: Rp. <?= $pendaftar['penghasilan_ibu']; ?></li>
                </ul>

                <p>Untuk melakukan perubahan klik <a href="editregistrasi.php"><strong>Edit</strong></a></p>
                <p>Jika ingin membatalkan Pendaftaran <a href="?username=<?= $username; ?>" onclick="return confirm('Apakah Anda yakin ingin membatalkan pendaftaran dan menghapus semua data?');"><strong>Hapus Pendaftaran</strong></a></p>


            <?php
                endforeach;
                endif;

            
            ?>

        <?php 
        //cek apakah tombol registrasi diklik
            if(isset($_POST['tabel_registrasi'])){
                //var_dump($_POST['username']);

                if(registrasi($_POST) == 1){
                    echo "<script>
                        alert('Anda Berhasil Mendaftar');
                        document.location.href = 'registrasi.php';
                        </script>";
                }else{
                    echo "<script>
                        alert('Error!!! Anda Gagal Mendaftar');
                        </script>";
                }
            }
        ?>

        <?php 
        //jika ingin membatalkan pendaftaran
        if(isset ($_GET['username'])){
            //var_dump($_GET['username'], $_GET['idRegistrasi']);
            //var_dump(hapusPendaftaran($_GET['username'], $_GET['idRegistrasi']));
            
           if(HapusPendaftaran($_GET['username'])){
                echo "<script>
                        alert('Anda Berhasil membatalkan pendaftaran');
                        document.location.href = 'registrasi.php';
                        </script>";
           }else{
                echo "<script>
                        alert('Error!!!Pendaftaran Gagal dihapus');
                        document.location.href = 'registrasi.php';
                        </script>";
           }
                        
        
        }
            
        
        ?>
            
    
    </div>
    
    
</body>
</html>