<?php
echo '<link rel="stylesheet" type="text/css" href="nivo-slider.css">';
echo '<link rel="stylesheet" type="text/css" href="style-sheet.css">';
echo '<link rel="stylesheet" type="text/css" href="style-sheet2.css">';
include '../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $jur = $_POST['jur'];
    $password = $_POST['password'];

    $query = "INSERT INTO mahasiswa (nim, nama, jk, jur, password) VALUES ('$nim', '$nama', '$jk', '$jur', '$password')";
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
    <form method="POST" class=""boxtable>
        <div class="odd">
        <label>NIM:</label>
        <input type="text" name="nim" required><br>
        <label>Nama:</label>
        <input type="text" name="nama" required><br>
        <label>Jenis Kelamin:</label>
        <select name="jk" required>
            <option value="Pria">Pria</option>
            <option value="Perempuan">Perempuan</option>
        </select><br>
        <label>Jurusan:</label>
        <select name="jur" required>
            <option value="Sistem_Informasi">Sistem Informasi</option>
            <option value="Teknik_Informatika">Teknik Informatika</option>
        </select><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Tambah</button><a href="mahasiswaView.php">Kembali</a>
        </div>
    </form>
</body>
</html>
