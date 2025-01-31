<?php
include "../../../config/koneksi.php";

$id = $_GET['id'];
  $delPenumpang = "DELETE FROM penumpang WHERE id='$id'";
  $resultPenumpang = mysqli_query($conn, $delPenumpang);

  if ($resultPenumpang) {
      echo "<script>alert('Daftar Berhasil Dihapus!');</script>";
      echo "<script type='text/javascript'>window.location = 'dashboard.php'</script>";
  } else {
      echo "<script>alert('Daftar Gagal Dihapus!');</script>";
      echo "<script type='text/javascript'>window.location = 'dashboard.php'</script>";
  }
?>