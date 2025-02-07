<?php
include '../koneksi/koneksi.php';

// Mendapatkan data mahasiswa untuk dropdown
$queryMahasiswa = "SELECT nim, nama FROM mahasiswa";
$resultMahasiswa = mysqli_query($conn, $queryMahasiswa);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nip = '12345678'; // Ganti dengan nip dosen yang login
    $nim = $_POST['nim'];
    $nl_tugas = $_POST['nl_tugas'];
    $nl_uts = $_POST['nl_uts'];
    $nl_uas = $_POST['nl_uas'];

    $query = "INSERT INTO nilai (nim, nip, nl_tugas, nl_uts, nl_uas) VALUES ('$nim', '$nip', '$nl_tugas', '$nl_uts', '$nl_uas')";
    if (mysqli_query($conn, $query)) {
        echo "Nilai berhasil ditambahkan!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Nilai Mahasiswa</title>
</head>
<body>
    <h2>Tambah Nilai Mahasiswa</h2>
    <form method="POST">
        <label>Mahasiswa:</label><br>
        <select name="nim" required>
            <option value="">Pilih Mahasiswa</option>
            <?php while ($row = mysqli_fetch_assoc($resultMahasiswa)) { ?>
            <option value="<?= $row['nim'] ?>"><?= $row['nim'] ?> - <?= $row['nama'] ?></option>
            <?php } ?>
        </select><br><br>

        <label>Nilai Tugas:</label><br>
        <input type="number" name="nl_tugas" min="0" max="100" required><br><br>

        <label>Nilai UTS:</label><br>
        <input type="number" name="nl_uts" min="0" max="100" required><br><br>

        <label>Nilai UAS:</label><br>
        <input type="number" name="nl_uas" min="0" max="100" required><br><br>

        <button type="submit">Tambah Nilai</button>
    </form>
</body>
</html>
