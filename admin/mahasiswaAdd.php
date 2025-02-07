<?php
include '../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $jur = $_POST['jur'];

    $query = "INSERT INTO mahasiswa (nim, nama, jk, jur) VALUES ('$nim', '$nama', '$jk', '$jur')";
    if (mysqli_query($conn, $query)) {
        echo "Data berhasil ditambahkan!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <h2>Tambah Data Mahasiswa</h2>
    <form method="POST">
        <label>NIM:</label>
        <input type="text" name="nim" required><br>
        <label>Nama:</label>
        <input type="text" name="nama" required><br>
        <label>Jenis Kelamin:</label>
        <input type="text" name="jk" required><br>
        <label>Jurusan:</label>
        <input type="text" name="jur" required><br>
        <button type="submit">Tambah</button><a href="mahasiswaView.php">Kembali</a>
    </form>
</body>
</html>
