<?php
require 'vendor/autoload.php'; // Load autoload file from PhpSpreadsheet

use PhpOffice\PhpSpreadsheet\IOFactory;

// Lokasi file Excel yang ingin diimpor
$excelFile = 'path/to/your/excel/file.xlsx';

// Membaca file Excel
$spreadsheet = IOFactory::load($excelFile);

// Mengambil data dari lembar aktif (biasanya lembar pertama)
$sheet = $spreadsheet->getActiveSheet();

// Mendapatkan jumlah baris dan kolom
$highestRow = $sheet->getHighestDataRow();
$highestColumn = $sheet->getHighestDataColumn();

// Mengonversi kolom huruf ke nomor kolom
$highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);

// Meloopi baris dan kolom untuk mengambil data
$data = [];
for ($row = 1; $row <= $highestRow; ++$row) {
    for ($col = 1; $col <= $highestColumnIndex; ++$col) {
        $data[$row][$col] = $sheet->getCellByColumnAndRow($col, $row)->getValue();
    }
}

// Sekarang Anda memiliki data dari file Excel dalam bentuk array
// Anda dapat melakukan apa pun yang Anda inginkan dengan data ini, seperti menyimpannya dalam database atau menampilkan di halaman web

// Contoh menampilkan data
echo '<pre>';
print_r($data);
echo '</pre>';
?>
