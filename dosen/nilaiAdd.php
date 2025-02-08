<?php
include '../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['mhs'];
    $nip = $_POST['dosen'];
    $tugas = $_POST['tugas'];
    $uts = $_POST['uts'];
    $uas = $_POST['uas'];
    
    $insertQuery = "INSERT INTO nilai (nim, nip, nl_tugas, nl_uts, nl_uas) VALUES ('$nim', '$nip', '$tugas', '$uts', '$uas')";
    mysqli_query($conn, $insertQuery);
    header("Location: nilaiView.php");
}
?>
<form method='post'>
    Nama Mahasiswa: <select name='mhs'>
        <?php
        $result = mysqli_query($conn, "SELECT nim, nama FROM mahasiswa");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='{$row['nim']}'>{$row['nama']}</option>";
        }
        ?>
    </select><br>
    Nama Dosen: <select name='dosen'>
        <?php
        $result = mysqli_query($conn, "SELECT nip, nama FROM dosen");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='{$row['nip']}'>{$row['nama']}</option>";
        }
        ?>
    </select><br>
    Nilai Tugas: <input type='number' name='tugas' required><br>
    Nilai UTS: <input type='number' name='uts' required><br>
    Nilai UAS: <input type='number' name='uas' required><br>
    <button type='submit'>Simpan</button>
</form>
