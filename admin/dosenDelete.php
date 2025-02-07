<?php
include '../koneksi/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['nip'])) {
    $nip = $_GET['nip'];
    $query = "DELETE FROM dosen WHERE nip = '$nip'";
    if (mysqli_query($conn, $query)) {
        echo "Data berhasil dihapus!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
