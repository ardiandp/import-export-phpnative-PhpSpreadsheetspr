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

        <a href="formbank.php" class="btn btn-success">IMPORT DATA</a>
        <br><br>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Saldo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Load file koneksi.php
                    include "koneksi.php";

                    // Buat query untuk menampilkan semua data siswa
                    $sql = mysqli_query($connect, "SELECT * FROM bca_cv ORDER BY id ASC limit 0,10");

                    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
                    while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                        echo "<tr>";
                        echo "<td>" . $no . "</td>";
                        echo "<td>" . $data['tanggal'] . "</td>";
                        echo "<td>" . $data['keterangan'] . "</td>";
                        echo "<td>" . $data['jumlah'] . "</td>";
                        echo "<td>" . $data['status'] . "</td>";
                        echo "<td>" . $data['saldo'] . "</td>";
                        echo "</tr>";
                        $no++;  
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.6.0.min.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
