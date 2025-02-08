<?php
include '../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['nip'])) {
    $nip = $_GET['nip'];
    $query = "SELECT * FROM dosen WHERE nip = '$nip'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $kode_mtkul = $_POST['kode_mtkul'];
    $password = $_POST['password'];

    $query = "UPDATE dosen SET nama = '$nama', kode_mtkul = '$kode_mtkul', password = '$password' WHERE nip = '$nip'";
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
    <title>Edit Dosen</title>
</head>
<body>
    <h2>Edit Data Dosen</h2>
    <form method="POST">
        <input type="hidden" name="nip" value="<?= $data['nip'] ?>">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?= isset($data['nama']) ? $data['nama'] : 'Data tidak tersedia'; ?>" required><br>
        <label>Kode Mtkul:</label>
        <input type="text" name="kode_mtkul" value="<?= isset($data['kode_mtkul']) ? $data['kode_mtkul'] : 'Data tidak tersedia'; ?>" required><br>
        <label>Password:</label>
        <input type="password" name="password" value="<?= isset($data['password']) ? $data['password'] : ''; ?>" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
