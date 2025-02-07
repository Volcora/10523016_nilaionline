<?php
include '../koneksi/koneksi.php';

$query = "SELECT * FROM dosen";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Dosen</title>
</head>
<body>
    <h2>Data Dosen</h2>
    <table border="1">
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Kode Matkul</th>
                <th>Aksi</th>
                <th><a href="dosenAdd.php">Tambah</a></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['nip'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['kode_mtkul'] ?></td>
                <td>
                    <a href="dosenEdit.php?nip=<?= $row['nip'] ?>">Edit</a>
                    <a href="dosenDelete.php?nip=<?= $row['nip'] ?>">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
