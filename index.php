<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Import Data Excel dengan PhpSpreadsheet</title>

    <!-- Load File bootstrap.min.css yang ada difolder css -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>

<body>
    <div style="padding: 10px 20px;">
        <h3 style="margin-top: 5px;">Data Siswa Hasil Import</h3>
        <hr style="margin-top: 5px;margin-bottom: 15px;">

        <a href="form.php" class="btn btn-success">IMPORT DATA</a> <a href="tampilbank.php" class="btn btn-success">TAMPIL BANK</a>
        <br><br>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Load file koneksi.php
                    include "koneksi.php";

                    // Buat query untuk menampilkan semua data siswa
                    $sql = mysqli_query($connect, "SELECT * FROM siswa");

                    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
                    while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                        echo "<tr>";
                        echo "<td>" . $no . "</td>";
                        echo "<td>" . $data['nis'] . "</td>";
                        echo "<td>" . $data['nama'] . "</td>";
                        echo "<td>" . $data['jenis_kelamin'] . "</td>";
                        echo "<td>" . $data['telp'] . "</td>";
                        echo "<td>" . $data['alamat'] . "</td>";
                        echo "</tr>";

                        $no++; // Tambah 1 setiap kali looping
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Include File JS Bootstrap -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>