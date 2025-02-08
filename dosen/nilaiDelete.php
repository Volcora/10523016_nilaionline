<?php
include '../koneksi/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $deleteQuery = "DELETE FROM nilai WHERE nim='$id'";
    mysqli_query($conn, $deleteQuery);
    header("Location: nilaiView.php");
}
?>