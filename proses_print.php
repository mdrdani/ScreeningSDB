<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hasil Screening</title>
    <link rel="icon" href="img/LogoSDBBaru.png">
</head>

<body>
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

    <?php
    if ($data['pertanyaan_1'] === 'Ya' || $data['pertanyaan_2'] === 'Ya' || $data['pertanyaan_3'] === 'Ya' || $data['pertanyaan_5'] === 'Ya') {
      include 'hasil_print_no.php';
    } else {
      include 'hasil_print_yes.php';
    }

  ?>
</body>

</html>