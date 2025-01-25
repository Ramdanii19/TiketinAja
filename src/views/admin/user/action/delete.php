<?php
include "../../../../config/koneksi.php";

$id = $_GET["id"];
$delUser = "DELETE FROM user WHERE id='$id'";
$resultUser = mysqli_query($conn, $delUser);

if($resultUser) {
  echo"<script>alert('Daftar Berhasil Di hapus !') </script>";  
  echo"<script type='text/javascript'>window.location = '../dashboard.php'</script>";  
} else {
  echo"<script>alert('Daftar Gagal Di hapus !') </script>";  
  echo"<script type='text/javascript'>window.location = '../dashboard.php'</script>";  
}

?>