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
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header text-center">
                        Form Covid-19 Sekolah Darma Bangsa
                    </div>
                    <div class="card-body">
                        <form action="proses-daftar.php" method="POST">
                            <div class="mb-3">
                                <label for="full_name" class="form-label">Nama Anda</label>
                                <input type="text" name="full_name" class="form-control" id="full_name"
                                    placeholder="Nama Lengkap" required>
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">Nomor Handphone</label>
                                <input type="number" name="no_hp" class="form-control" id="no_hp"
                                    placeholder="Ex : 081277548099" required>
                            </div>
                            <div class="mb-3">
                                <label for="status_tamu" class="form-label">Status Tamu</label>
                                <select class="form-select" name="status_tamu" aria-label="Default select example"
                                    required>
                                    <option label="Selain Karyawan/i Silahkan Pilih Tamu"></option>
                                    <option value="Tamu">Tamu</option>
                                    <optgroup label="Akademik">
                                        <option value="Dep NTK">Dep. NTK</option>
                                        <option value="Dep SD">Dep. SD</option>
                                        <option value="Dep SMP">Dep. SMP</option>
                                        <option value="Dep SMA">Dep. SMA</option>
                                    </optgroup>
                                    <optgroup label="Non-Akademik">
                                        <option value="Dep HM">Dep. Headmaster</option>
                                        <option value="Dep HR">Dep. HR</option>
                                        <option value="Dep Legal">Dep. Legal</option>
                                        <option value="Dep Acad Adviser">Dep. Acad. Adviser</option>
                                        <option value="Dep Finance">Dep. Finance & Acc</option>
                                        <option value="Dep Psychology">Dep. Psychology</option>
                                        <option value="Dep IT">Dep. IT</option>
                                        <option value="Dep Acadsa">Dep. Acadsa</option>
                                        <option value="Dep Maintenance">Dep. Maintenance</option>
                                        <option value="Dep Facility">Dep. Facility</option>
                                        <option value="Dep Usaha">Dep. Unit Usaha</option>
                                        <option value="Dep Marketing">Dep. Marketing</option>
                                        <option value="Dep SC">Dep. Student Center</option>
                                        <option value="Dep Library">Dep. Library</option>
                                        <option value="Security">Security</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tujuan" class="form-label">Tujuan</label>
                                <input type="text" name="tujuan" class="form-control" id="tujuan"
                                    placeholder="Isi dengan Bekerja Jika Karyawan SDB" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Kunjungan</label>
                                <input class="form-control" name="tanggal" type="date" id="tanggal" required>
                            </div>

                            <?php date_default_timezone_set('Asia/Jakarta'); ?>
                            <input value="<?php echo date("Y-m-d") ?>" name="tanggal_isi" type="hidden">
                            
                            <div class="mb-3">
                                <label for="pertanyaan_1" class="form-label">1. Apakah dalam waktu 14 hari terakhir Anda
                                    atau anggota keluarga di rumah pernah mengalami demam dengan suhu lebih dari 37.5
                                    C?</label>
                                <select class="form-select" name="pertanyaan_1" aria-label="Default select example"
                                    required>
                                    <option></option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="pertanyaan_2" class="form-label">2. Apakah dalam waktu 14 hari terakhir Anda
                                    atau anggota keluarga di rumah mengalami
                                    <ul>
                                        <li>Batuk</li>
                                        <li>Pilek</li>
                                        <li>Nyeri Tenggorokan</li>
                                        <li>Sesak Nafas</li>
                                        <li>Delirium</li>
                                        <li>Kelelahan</li>
                                        <li>Sakit Mata</li>
                                        <li>Masalah Pencernaan</li>
                                        <li>Nyeri Otot</li>
                                        <li>Ruam Kulit</li>
                                        <li>Masalah Penciuman</li>
                                        <li>Masalah Indera Perasa</li>
                                    </ul>
                                </label>
                                <select class="form-select" name="pertanyaan_2" aria-label="Default select example"
                                    required>
                                    <option></option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="pertanyaan_3" class="form-label">3. Apakah dalam waktu 14 hari terakhir Anda
                                    atau anggota keluarga di rumah pernah melakukan perjalanan ke luar negeri/ke kota
                                    lain? </label>
                                <select class="form-select" name="pertanyaan_3" aria-label="Default select example"
                                    required>
                                    <option></option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="pertanyaan_4" class="form-label">4. Jika Jawaban untuk pertanyaan No.3 "Ya",
                                    maka silahkan tuliskan nama kota/provinsi/negaranya! Jika tidak, maka abaikan
                                    pertanyaan ini.</label>
                                <input type="text" name="pertanyaan_4" class="form-control" id="pertanyaan_4"
                                    placeholder="Kosongkan Jika Tidak Ada">
                            </div>

                            <div class="mb-3">
                                <label for="pertanyaan_5" class="form-label">5. Apakah dalam waktu 14 hari terakhir Anda
                                    atau anggota keluarga di rumah pernah melakukan kontak dengan orang yang termasuk
                                    kasus konfirmasi positif Covid-19? </label>
                                <select class="form-select" name="pertanyaan_5" aria-label="Default select example"
                                    required>
                                    <option></option>
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <button type="submit" value="daftar" name="daftar"
                                class="mb-3 btn btn-success">Save</button>
                        </form>
                        <a href="index.php" class="btn btn-danger">Cancel</a>
                    </div>
                    <div class="card-footer text-muted">
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