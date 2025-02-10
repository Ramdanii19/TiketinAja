<?php
include "../../../config/koneksi.php";
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  header("Location: ../../Auth/login.php");
  exit;
}

$id = $_GET['id'];
$delUser = "DELETE FROM user WHERE id='$id'";
$resultUser = mysqli_query($conn, $delUser);

if ($resultUser) {
  echo "<script>alert('Daftar Berhasil Dihapus!');</script>";
  echo "<script type='text/javascript'>window.location = 'dashboard.php'</script>";
} else {
  echo "<script>alert('Daftar Gagal Dihapus!');</script>";
  echo "<script type='text/javascript'>window.location = 'dashboard.php'</script>";
}
