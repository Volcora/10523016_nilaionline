<?php
include '../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $kode_mtkul = $_POST['kode_mtkul'];
    $password = $_POST['password'];

    $query = "INSERT INTO dosen (nip, nama, kode_mtkul, password) VALUES ('$nip', '$nama', '$kode_mtkul', '$password')";
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
    <title>Tambah Dosen</title>
</head>
<body>
    <h2>Tambah Data Dosen</h2>
    <form method="POST">
        <label>NIP:</label>
        <input type="text" name="nip" required><br>
        <label>Nama:</label>
        <input type="text" name="nama" required><br>
        <label>Kode Matkul:</label>
        <input type="text" name="kode_mtkul" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Tambah</button>
    </form>
</body>
</html>
