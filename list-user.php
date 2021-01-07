<?php include('config.php');?>
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
    <link rel="stylesheet" href="style.css">

    <title>Form Covid-19 Sekolah Darma Bangsa</title>
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header text-center">
                        Form Covid-19 Sekolah Darma Bangsa
                    </div>
                    <div class="card-body pb-2">
                        <form method="get">
                            <label class="form-label">Filter Data Screening</label>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <input type="date" class="form-control" name="tanggal">
                                </div>
                                <div class="col-md-4 mb-2">
                                    <select name="status_tamu" id="" class="form-control">
                                        <option value="">Pilih Status</option>
                                        <option value="Tamu" <?php if ($status_tamu=="Tamu"){ echo "selected"; } ?>>Tamu</option>
                                        <option value="Dep NTK">Dep. NTK</option>
                                        <option value="Dep SD">Dep. SD</option>
                                        <option value="Dep SMP">Dep. SMP</option>
                                        <option value="Dep SMA">Dep. SMA</option>
                                        <option value="Dep HR">Dep. HR</option>
                                        <option value="Dep IT">Dep. IT</option>
                                        <option value="Dep Legal">Dep. Legal</option>
                                        <option value="Dep HM">Dep. HM</option>
                                        <option value="Dep Finance">Dep. Finance & Acc</option>
                                        <option value="Dep Acadsa">Dep. Acadsa</option>
                                        <option value="Dep Maintenance">Dep. Maintenance</option>
                                        <option value="Dep Facility">Dep. Facility</option>
                                        <option value="Dep Usaha">Dep. Unit Usaha</option>
                                        <option value="Dep Marketing">Dep. Marketing</option>
                                        <option value="Dep SC">Dep. Student Center</option>
                                        <option value="Dep Library">Dep. Library</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input class="form-control bg-success text-white" type="submit" value="FILTER">
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Tanggal Kunjungan</th>
                                        <th scope="col">Status Tamu</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $batas = 10;
                                        $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                                        $halaman_awal = ($halaman > 1)? ($halaman * $batas) - $batas :0;

                                        $previous = $halaman - 1;
                                        $next = $halaman + 1;

                                        $sql = "SELECT * FROM data_user";
                                        $query = mysqli_query($db, $sql);
                                        $jumlah_data = mysqli_num_rows($query);
                                        $total_halaman = ceil($jumlah_data / $batas);

                                        if(isset($_GET['tanggal'])){
                                            $tgl = $_GET['tanggal'];
                                            $data_user = mysqli_query($db, "SELECT * FROM data_user WHERE tanggal='$tgl' ORDER BY id DESC");
                                        }else{
                                            $data_user = mysqli_query($db, "SELECT * FROM data_user ORDER BY id DESC LIMIT $halaman_awal, $batas");
                                        }
                                        $nomor = $halaman_awal + 1 ;
                                        while($user = mysqli_fetch_array($data_user)){
                                            echo "<tr>";
                                                echo "<td>".$nomor++."</td>";
                                                echo "<td>". ucwords($user['full_name']) ."</td>";
                                                echo "<td>". date("d F Y",strtotime($user['tanggal']))."</td>";
                                                echo "<td>".$user['status_tamu']."</td>";
                                                echo "<td>"."<a href='proses_print.php?id=$user[id]' class='btn btn-primary btn-sm' target='blank_'>Show</a>"."</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link"
                                            <?php if($halaman > 1){ echo "href='?halaman=$Previous'"; } ?>>Previous</a>
                                    </li>
                                    <?php 
                                    for($x=1; $x<=$total_halaman; $x++){
                                        ?>
                                    <li class="page-item"><a class="page-link"
                                            href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                    <?php
                                    }
                                    ?>
                                    <li class="page-item"><a class="page-link"
                                            <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <a href="index.php" class="btn btn-primary">Back</a>
                    </div>
                    <div class="card-footer text-muted text-center">
                        Support by IT Sekolah Darma Bangsa
                    </div>
                </div>
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