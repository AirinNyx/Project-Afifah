<?php
// Panggil file koneksi
include 'koneksi.php';

// Query untuk mengambil data dari tb_mahasiswa
$query = "SELECT tb_mhs.NIM, tb_mhs.NAMA, tb_matkul.Matkul, tb_nilai.NILAI
              FROM tb_nilai
              JOIN tb_mhs ON tb_nilai.NIM = tb_mhs.NIM
              JOIN tb_matkul ON tb_nilai.MATKUL = tb_matkul.Matkul";
$result = mysqli_query($koneksi, $query);

// Cek apakah data ditemukan
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' cellpadding='8'>";
    echo "<tr><th>No</th><th>NIM</th><th>NAMA</th><th>MATKUL</th><th>NILAI</th></tr>";
    
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . $row['NIM'] . "</td>";
        echo "<td>" . $row['NAMA'] . "</td>";
        echo "<td>" . $row['Matkul'] . "</td>";
        echo "<td>" . $row['NILAI'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Tidak ada data mahasiswa.";
}
?>