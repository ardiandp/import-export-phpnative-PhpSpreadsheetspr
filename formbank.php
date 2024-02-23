<?php
// Load file autoload.php
require 'vendor/autoload.php';

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
?>

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

    <!-- Load File jquery.min.js yang ada difolder js -->
    <script src="js/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            // Sembunyikan alert validasi kosong
            $("#kosong").hide();
        });
    </script>
</head>

<body>
    <div style="padding: 10px 20px;">
        <h3 style="margin-top: 5px;">Form Import Bank</h3>
        <hr style="margin-top: 5px;margin-bottom: 15px;">

        <form method="post" action="formbank.php" enctype="multipart/form-data">
            <a href="format_bank.xlsx">Download Format</a> &nbsp;|&nbsp;
            <a href="tampilbank.php">Kembali</a>
            <br><br>

            <div class="clearfix">
                <div class="float-left" style="margin-right: 5px;">
                    <input type="file" name="file" class="form-control">
                </div>
                <button type="submit" name="preview" class="btn btn-primary">PREVIEW</button>
            </div>
        </form>
        <hr>


        <?php
        // Jika user telah mengklik tombol Preview
        if (isset($_POST['preview'])) {
            $tgl_sekarang = date('YmdHis'); // Ini akan mengambil waktu sekarang dengan format yyyymmddHHiiss
            $nama_file_baru = 'data' . $tgl_sekarang . '.xlsx';

            // Cek apakah terdapat file data.xlsx pada folder tmp
            if (is_file('tmp/' . $nama_file_baru)) // Jika file tersebut ada
                unlink('tmp/' . $nama_file_baru); // Hapus file tersebut

            $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); // Ambil ekstensi filenya apa
            $tmp_file = $_FILES['file']['tmp_name'];

            // Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
            if ($ext == "xlsx") {
                // Upload file yang dipilih ke folder tmp
                // dan rename file tersebut menjadi data{tglsekarang}.xlsx
                // {tglsekarang} diganti jadi tanggal sekarang dengan format yyyymmddHHiiss
                // Contoh nama file setelah di rename : data20210814192500.xlsx
                move_uploaded_file($tmp_file, 'tmp/' . $nama_file_baru);

                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                $spreadsheet = $reader->load('tmp/' . $nama_file_baru); // Load file yang tadi diupload ke folder tmp
                $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

                // Buat sebuah tag form untuk proses import data ke database
                echo "<form method='post' action='import_bank.php'>";

                // Disini kita buat input type hidden yg isinya adalah nama file excel yg diupload
                // ini tujuannya agar ketika import, kita memilih file yang tepat (sesuai yg diupload)
                echo "<input type='hidden' name='namafile' value='" . $nama_file_baru . "'>";

                // Buat sebuah div untuk alert validasi kosong
                echo "<div id='kosong' class='alert alert-danger'>
					Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
                </div>";

                echo "<div class='table-responsive'>
                    <table class='table table-bordered'>
                        <tr>
                            <th colspan='6' class='text-left'>Preview Data</th>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Cabang </th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Saldo</th>
                        </tr>";

                        $numrow = 1;
                        $kosong = 0;
                        foreach ($sheet as $row) { // Lakukan perulangan dari data yang ada di excel
                            // Ambil data pada excel sesuai Kolom
                            $tanggal = $row['A']; // Ambil data NIS
                            $keterangan = $row['B']; // Ambil data nama
                            $cabang = $row['C']; // Ambil data jenis kelamin
                            $jumlah = $row['D']; // Ambil data telepon
                            $status = $row['E']; // Ambil data alamat
                            $saldo = $row['F']; // Ambil data alamat


                            // Cek jika semua data tidak diisi
                            if ($tanggal == "" && $keterangan == "" && $cabang == "" && $jumlah == "" && $status == "" && $saldo == "")
                                continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

                            // Cek $numrow apakah lebih dari 1
                            // Artinya karena baris pertama adalah nama-nama kolom
                            // Jadi dilewat saja, tidak usah diimport
                            if ($numrow > 1) {
                                // Validasi apakah semua data telah diisi
                                $tanggal_td = (!empty($tanggal)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                                $keterangan_td = (!empty($keterangan)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                                $cabang_td = (!empty($cabang)) ? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                                $jumlah_td = (!empty($jumlah)) ? "" : " style='background: #E07171;'"; // Jika Telepon kosong, beri warna merah
                                $status_td = (!empty($status)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                                $saldo_td = (!empty($saldo)) ? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                                // Jika salah satu data ada yang kosong
                                if ($tanggal == "" or $keterangan == "" or $cabang == "" or $jumlah == "" or $status == "" or $saldo == "") {
                                    $kosong++; // Tambah 1 variabel $kosong
                                }

                                echo "<tr>";
                                echo "<td" . $tanggal_td . ">" . $tanggal . "</td>";
                                echo "<td" . $keterangan_td . ">" . $keterangan . "</td>";
                                echo "<td" . $cabang_td . ">" . $cabang . "</td>";
                                echo "<td" . $jumlah_td . ">" . $jumlah . "</td>";
                                echo "<td" . $status_td . ">" . $status . "</td>";
                                echo "<td" . $saldo_td . ">" . $saldo . "</td>";
                                echo "</tr>";
                            }

                            $numrow++; // Tambah 1 setiap kali looping
                        }

                echo "</table></div>";

                // Cek apakah variabel kosong lebih dari 0
                // Jika lebih dari 0, berarti ada data yang masih kosong
                if ($kosong > 0) {
        ?>
                <script>
                    $(document).ready(function() {
                        // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                        $("#jumlah_kosong").html('<?php echo $kosong; ?>');

                        $("#kosong").show(); // Munculkan alert validasi kosong
                    });
                </script>
        <?php
                } else { // Jika semua data sudah diisi
                    echo "<hr style='margin-top: 0;'>";

                    // Buat sebuah tombol untuk mengimport data ke database
                    echo "<button type='submit' name='import' class='btn btn-success'>IMPORT</button>";
                }

                echo "</form>";
            } else { // Jika file yang diupload bukan File Excel 2007 (.xlsx)
                // Munculkan pesan validasi
                echo "<div class='alert alert-danger'>
					Hanya File Excel 2007 (.xlsx) yang diperbolehkan
                </div>";
            }
        }
        ?>
    </div>
</body>

</html>