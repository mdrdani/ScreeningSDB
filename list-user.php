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
                                        <option value="Tamu" <?php if ($status_tamu=="Tamu"){ echo "selected"; } ?>>Tamu
                                        </option>

                                        <optgroup label="Akademik">
                                            <option value="Dep NTK"
                                                <?php if ($status_tamu=="Dep NTK"){ echo "selected"; } ?>>Dep. NTK
                                            </option>
                                            <option value="Dep SD"
                                                <?php if ($status_tamu=="Dep SD"){ echo "selected"; } ?>>
                                                Dep. SD</option>
                                            <option value="Dep SMP"
                                                <?php if ($status_tamu=="Dep SMP"){ echo "selected"; } ?>>Dep. SMP
                                            </option>
                                            <option value="Dep SMA"
                                                <?php if ($status_tamu=="Dep SMA"){ echo "selected"; } ?>>Dep. SMA
                                            </option>
                                        </optgroup>

                                        <optgroup label="Non-Akademik">
                                            <option value="Dep HM"
                                                <?php if ($status_tamu=="Dep HM"){ echo "selected"; } ?>>
                                                Dep. Headmaster</option>
                                            <option value="Dep HR"
                                                <?php if ($status_tamu=="Dep HR"){ echo "selected"; } ?>>
                                                Dep. HR</option>
                                            <option value="Dep Legal"
                                                <?php if ($status_tamu=="Dep Legal"){ echo "selected"; } ?>>Dep. Legal
                                            </option>
                                            <option value="Dep Acad Adviser"
                                                <?php if ($status_tamu=="Dep Acad Adviser"){ echo "selected"; } ?>>Dep
                                                Acad Adviser
                                            </option>
                                            <option value="Dep IT"
                                                <?php if ($status_tamu=="Dep IT"){ echo "selected"; } ?>>
                                                Dep. IT</option>
                                            <option value="Dep Psychology"
                                                <?php if ($status_tamu=="Dep Psychology"){ echo "selected"; } ?>>Dep.
                                                Psychology
                                            </option>
                                            <option value="Dep Finance"
                                                <?php if ($status_tamu=="Dep Finance"){ echo "selected"; } ?>>Dep.
                                                Finance &
                                                Acc</option>
                                            <option value="Dep Acadsa"
                                                <?php if ($status_tamu=="Dep Acadsa"){ echo "selected"; } ?>>Dep. Acadsa
                                            </option>
                                            <option value="Dep Maintenance"
                                                <?php if ($status_tamu=="Dep Maintenance"){ echo "selected"; } ?>>Dep.
                                                Maintenance</option>
                                            <option value="Dep Facility"
                                                <?php if ($status_tamu=="Dep Facility"){ echo "selected"; } ?>>Dep.
                                                Facility
                                            </option>
                                            <option value="Dep Usaha"
                                                <?php if ($status_tamu=="Dep Usaha"){ echo "selected"; } ?>>Dep. Unit
                                                Usaha
                                            </option>
                                            <option value="Dep Marketing"
                                                <?php if ($status_tamu=="Dep Marketing"){ echo "selected"; } ?>>Dep.
                                                Marketing</option>
                                            <option value="Dep SC"
                                                <?php if ($status_tamu=="Dep SC"){ echo "selected"; } ?>>
                                                Dep. Student Center</option>
                                            <option value="Dep Library"
                                                <?php if ($status_tamu=="Dep Library"){ echo "selected"; } ?>>Dep.
                                                Library
                                            </option>
                                            <option value="Security"
                                                <?php if ($status_tamu=="Security"){ echo "selected"; } ?>>Security
                                            </option>
                                        </optgroup>
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
                                        $batas = 15;
                                        $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                                        $halaman_awal = ($halaman > 1)? ($halaman * $batas) - $batas :0;

                                        $previous = $halaman - 1;
                                        $next = $halaman + 1;

                                        $sql = "SELECT * FROM data_user";
                                        $query = mysqli_query($db, $sql);
                                        $jumlah_data = mysqli_num_rows($query);
                                        $total_halaman = ceil($jumlah_data / $batas);

                                        if(isset($_GET['tanggal']) and isset($_GET['status_tamu'])){
                                                $tgl = $_GET['tanggal'];
                                                $status = $_GET['status_tamu'];
                                                $data_user_filter = mysqli_query($db, "SELECT * FROM data_user WHERE tanggal='$tgl' AND status_tamu='$status' ORDER BY id DESC");

                                                $nomor = $halaman_awal + 1 ;
                                                while($user = mysqli_fetch_array($data_user_filter)){
                                                    echo "<tr>";
                                                        echo "<td>".$nomor++."</td>";
                                                        echo "<td>". ucwords($user['full_name']) ."</td>";
                                                        echo "<td>". date("d F Y",strtotime($user['tanggal']))."</td>";
                                                        echo "<td>".$user['status_tamu']."</td>";
                                                        echo "<td>"."<a href='proses_print.php?id=$user[id]' class='btn btn-primary btn-sm' target='blank_'>Show</a>"."</td>";
                                                    echo "</tr>";
                                                }
                                            
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
                            <?php if(isset($_GET['tanggal'])){
                                if(isset($_GET['status_tamu'])){ ?>

                            <?php  } ?>
                            <?php }else{?>
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
                            <?php } ?>
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