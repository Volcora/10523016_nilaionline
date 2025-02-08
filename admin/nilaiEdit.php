<?php
include '../koneksi/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM nilai WHERE nim='$id'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tugas = $_POST['tugas'];
    $uts = $_POST['uts'];
    $uas = $_POST['uas'];
    $updateQuery = "UPDATE nilai SET nl_tugas='$tugas', nl_uts='$uts', nl_uas='$uas' WHERE nim='$id'";
    mysqli_query($conn, $updateQuery);
    header("Location: nilaiView.php");
}
?>
<form method='post'>
    Nilai Tugas: <input type='number' name='tugas' value='<?= $data['nl_tugas'] ?>' required><br>
    Nilai UTS: <input type='number' name='uts' value='<?= $data['nl_uts'] ?>' required><br>
    Nilai UAS: <input type='number' name='uas' value='<?= $data['nl_uas'] ?>' required><br>
    <button type='submit'>Update</button>
</form>
