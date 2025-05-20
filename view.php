<?php
// Panggil file koneksi
include 'koneksi.php';

// Query untuk mengambil data dari tb_mahasiswa
$query = "SELECT * FROM tb_mhs";
$result = mysqli_query($koneksi, $query);

// Cek apakah data ditemukan
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' cellpadding='8'>";
    echo "<tr><th>no</th><th>NIM</th><th>NAMA</th><th>PRODI</th><th>JK</th></tr>";
    
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . $row['NIM'] . "</td>";
        echo "<td>" . $row['NAMA'] . "</td>";
        echo "<td>" . $row['PRODI'] . "</td>";
        echo "<td>" . $row['JK'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Tidak ada data mahasiswa.";
}
?>