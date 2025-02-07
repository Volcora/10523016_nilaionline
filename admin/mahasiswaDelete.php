<?php
include '../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    $query = "DELETE FROM mahasiswa WHERE nim = '$nim'";
    if (mysqli_query($conn, $query)) {
        echo "Data berhasil dihapus!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
