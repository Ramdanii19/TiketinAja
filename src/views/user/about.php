<?php session_start();
include "../../config/koneksi.php";
$_SESSION['role'] = isset($_SESSION["role"]) ? $_SESSION["role"] : '';
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <link href="../../assets/css/output.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800">
  <?php include "./header.php" ?>
  <div class="flex justify-center items-center p-8">
    <div class="container text-center">
      <p class="font-bold text-2xl text-blue-500 mb-4">About Us</p>

      <!-- Profiles Section -->
      <div class="flex justify-center gap-4 flex-wrap">
        <!-- Profile 1 -->
        <div class="profile text-center bg-white p-6 rounded-lg shadow-lg w-64 min-w-0">
          <img src="../../assets/img/ramdani.jpg" alt="Foto Orang 1" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
          <div class="name text-xl font-medium mb-2">Muhamad Ramdani</div>
          <div class="jobdesk text-gray-500">Mengelola dan menangani aspek Administratif</div>
        </div>
        <!-- Profile 2 -->
        <div class="profile text-center bg-white p-6 rounded-lg shadow-lg w-64 min-w-0">
          <img src="../../assets/img/rafi.jpg" alt="Foto Orang 2" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
          <div class="name text-xl font-medium mb-2">Muhammad Raffi</div>
          <div class="jobdesk text-gray-500">Mengelola dan menangani bagian terkait User</div>
        </div>
        <!-- Profile 3 -->
        <div class="profile text-center bg-white p-6 rounded-lg shadow-lg w-64 min-w-0">
          <img src="../../assets/img/hafidh.jpg" alt="Foto Orang 3" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
          <div class="name text-xl font-medium mb-2">Hafidh Adrito Perbawa</div>
          <div class="jobdesk text-gray-500">Mengelola dan menangani aspek Autentikasi</div>
        </div>
      </div>
    </div>
  </div>
  <footer class="sm:absolute sticky bottom-0 left-0 right-0 bg-gray-800 text-white py-6">
    <div class="max-w-screen-xl mx-auto px-4 text-center">
      <h5 class="text-lg font-medium mb-2">
        <a href="./landing.php" class="text-white hover:text-indigo-600 font-medium">
          Back to home menu
        </a>
      </h5>
    </div>
  </footer>
</body>

</html>