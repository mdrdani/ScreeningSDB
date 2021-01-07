<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="icon" href="img/LogoSDBBaru.png">

    <title>Form Covid-19 Sekolah Darma Bangsa</title>
</head>

<?php 
include 'config.php';

  $id = $_GET['id'];

  // buat query untuk ambil data dari database
  $sql = "SELECT * FROM data_user WHERE id=$id";
  $query = mysqli_query($db, $sql);
  $data = mysqli_fetch_assoc($query);

  // jika data yang di-edit tidak ditemukan
  if( mysqli_num_rows($query) < 1 ){
      die("data tidak ditemukan...");
  }
?>

<body>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-8 offset-md-2 border border-dark">
                <h3 style="text-align: left;">Hasil : Diizinkan </h3>

                <h3 class="text-center">HASIL SCREENING COVID-19</h3>
                <h3 class="text-center">SEKOLAH DARMA BANGSA</h3>
                <p style="text-align: right;">Di isi pada tanggal:
                    <?php echo date("d F Y",strtotime($data['tanggal_isi'])) ?>
                <p>Bapak/Ibu <?php echo $data['full_name']; ?>, Anda <b>DI IZINKAN</b> <?php echo $data['tujuan'] ?>
                    pada <?php echo date("d F Y",strtotime($data['tanggal'])) ?> </p>
                <p>Informasi yang saya berikan adalah benar dan sesuai dengan kondisi saya</p>
                <p class="text-center"><u>SCREENSHOOT HASIL TES INI & TUNJUKAN KE BAGIAN SECURITY KETIKA DATANG</u></p>
                <p>Terima Kasih Bapak/Ibu <?php echo $data['full_name']; ?> telah mengisi screening covid-19 ini
                    dengan jujur dan
                    bertanggung
                    jawab</p>
                <br>
                <p style="text-align: right;">Salam, semoga anda sehat selalu dan terhindar dari bahaya Covid-19</p>
                <br>
                <p style="text-align: right;">Ttd <br> Managemen Sekolah Darma Bangsa</p>
            </div>
        </div>

    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>