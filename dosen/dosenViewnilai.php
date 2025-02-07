<?php
include '../koneksi/koneksi.php';

// Query untuk mendapatkan data nilai mahasiswa yang terkait dengan dosen tertentu
$nip = '12345678'; // Ganti dengan nip dosen yang login
$query = "
    SELECT 
        nilai.nim, 
        mahasiswa.nama, 
        nilai.nl_tugas, 
        nilai.nl_uts, 
        nilai.nl_uas 
    FROM 
        nilai
    JOIN mahasiswa ON nilai.nim = mahasiswa.nim
    WHERE nilai.nip = '$nip'
";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lihat Nilai Mahasiswa</title>
</head>
<body>
    <h2>Daftar Nilai Mahasiswa</h2>
    <table border="1">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Nilai Tugas</th>
                <th>Nilai UTS</th>
                <th>Nilai UAS</th>
                <th><a href="dosenNilai.php">Tambah</a></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['nim'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['nl_tugas'] ?></td>
                <td><?= $row['nl_uts'] ?></td>
                <td><?= $row['nl_uas'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
