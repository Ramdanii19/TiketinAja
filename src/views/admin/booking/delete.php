<?php
include "../../../config/koneksi.php";

$id = $_GET['id'];
  $delBookings = "DELETE FROM bookings WHERE id='$id'";
  $resultBookings = mysqli_query($conn, $delBookings);

  if ($resultBookings) {
      echo "<script>alert('Daftar Berhasil Dihapus!');</script>";
      echo "<script type='text/javascript'>window.location = 'dashboard.php'</script>";
  } else {
      echo "<script>alert('Daftar Gagal Dihapus!');</script>";
      echo "<script type='text/javascript'>window.location = 'dashboard.php'</script>";
  }
?>