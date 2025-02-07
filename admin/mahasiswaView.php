<?php
include '../koneksi/koneksi.php';

$query = "SELECT * FROM mahasiswa";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Mahasiswa</title>
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <table border="1">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Jurusan</th>
                <th>Aksi</th>
                <th><a href="mahasiswaAdd.php">Tambah</a></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['nim'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['jk'] ?></td>
                <td><?= $row['jur'] ?></td>
                <td>
                    <a href="mahasiswaEdit.php?nim=<?= $row['nim'] ?>">Edit</a>
                    <a href="mahasiswaDelete.php?nim=<?= $row['nim'] ?>">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
