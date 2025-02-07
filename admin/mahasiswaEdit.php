<?php
include '../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    $query = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $jur = $_POST['jur'];

    $query = "UPDATE mahasiswa SET nama = '$nama', jk = '$jk', jur = '$jur' WHERE nim = '$nim'";
    if (mysqli_query($conn, $query)) {
        echo "Data berhasil diperbarui!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
</head>
<body>
    <h2>Edit Data Mahasiswa</h2>
    <form method="POST">
        <input type="hidden" name="nim" value="<?= $data['nim'] ?>">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?= $data['nama'] ?>" required><br>
        <label>Jenis Kelamin:</label>
        <input type="text" name="jk" value="<?= $data['jk'] ?>" required><br>
        <label>Jurusan:</label>
        <input type="text" name="jur" value="<?= $data['jur'] ?>" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
