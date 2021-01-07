<?php 
include("config.php");

// cek apakah tombol simpan sudah di klik atau belum
if(isset($_POST['daftar'])){

    // ambil data dari form
    $full_name = $_POST['full_name'];
    $no_hp = $_POST['no_hp'];
    $status_tamu = $_POST['status_tamu'];
    $tujuan = $_POST['tujuan'];
    $tanggal = $_POST['tanggal'];
    $tanggal_isi = $_POST['tanggal_isi'];
    $pertanyaan_1 = $_POST['pertanyaan_1'];
    $pertanyaan_2 = $_POST['pertanyaan_2'];
    $pertanyaan_3 = $_POST['pertanyaan_3'];
    $pertanyaan_4 = $_POST['pertanyaan_4'];
    $pertanyaan_5 = $_POST['pertanyaan_5'];

    // buat query
    $sql = "INSERT INTO data_user (full_name, no_hp, status_tamu, tujuan, tanggal,tanggal_isi, pertanyaan_1, pertanyaan_2, pertanyaan_3,pertanyaan_4, pertanyaan_5) VALUE ('$full_name','$no_hp','$status_tamu','$tujuan','$tanggal','$tanggal_isi','$pertanyaan_1','$pertanyaan_2','$pertanyaan_3','$pertanyaan_4','$pertanyaan_5')";
    // $query = mysqli_query($db,$sql);

    if($db->query($sql) === TRUE){
        $last_id = $db->insert_id;
            header('Location: proses_print.php?id='. $last_id);
    }else{
        echo "Error: " . $sql . "<br>" . $db-error;
    }

    $db->close();
    
   // //apakah query berhasil di simpan
    // if($query) {
    //     // header('Location: proses_print.php?id='. $last_id);
    //     // header('Location: list-user.php');
    // }
}else{
    die("Akses Dilarang");
}
?>