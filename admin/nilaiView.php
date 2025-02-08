<?php
include '../koneksi/koneksi.php';

$query = "SELECT m.nim, m.nama, n.nl_tugas, n.nl_uts, n.nl_uas, 
                 (0.2 * n.nl_tugas) + (0.4 * n.nl_uts) + (0.4 * n.nl_uas) AS nilai_akhir, 
                 d.nip, d.nama as dosen 
          FROM nilai n 
          LEFT JOIN mahasiswa m ON n.nim = m.nim  
          LEFT JOIN dosen d ON d.nip = n.nip";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Nilai</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Daftar Nilai</h2>
    <table>
        <tr>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Tugas</th>
            <th>UTS</th>
            <th>UAS</th>
            <th>Nilai Akhir</th>
            <th>Dosen</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= htmlspecialchars($row['nim']) ?></td>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= $row['nl_tugas'] ?></td>
            <td><?= $row['nl_uts'] ?></td>
            <td><?= $row['nl_uas'] ?></td>
            <td><?= number_format($row['nilai_akhir'], 2) ?></td>
            <td><?= htmlspecialchars($row['dosen']) ?></td>
            <td>
                <a href="nilaiEdit.php?id=<?= $row['nim'] ?>">Edit</a> |
                <a href="nilaiDelete.php?id=<?= $row['nim'] ?>" onclick="return confirm('Hapus data?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <a href="./?adm=nilaiAdd">Tambah Data</a>
</body>
</html>
