<?php
include "../../../config/koneksi.php";
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  header("Location: ../../Auth/login.php");
  exit;
}

$id = $_GET['id'];
$delPesawat = "DELETE FROM pesawat WHERE id='$id'";
$resultPesawat = mysqli_query($conn, $delPesawat);

if ($resultPesawat) {
  echo "<script>alert('Daftar Berhasil Dihapus!');</script>";
  echo "<script type='text/javascript'>window.location = 'dashboard.php'</script>";
} else {
  echo "<script>alert('Daftar Gagal Dihapus!');</script>";
  echo "<script type='text/javascript'>window.location = 'dashboard.php'</script>";
}
