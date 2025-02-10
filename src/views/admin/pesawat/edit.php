<?php
include "../../../config/koneksi.php";
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  header("Location: ../../Auth/login.php");
  exit;
}

$getId = $_GET["id"];
$editPesawat = "SELECT * FROM pesawat WHERE id = '$getId'";
$resultPesawat = mysqli_query($conn, $editPesawat);
$dataPesawat = mysqli_fetch_array($resultPesawat, MYSQLI_NUM);
$jsonPesawat = json_decode($dataPesawat[9], true);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data Pesawat</title>
  <link href="../../../assets/css/output.css" rel="stylesheet">
</head>

<body>
  <?php if (!isset($_POST['submit'])) { ?>
    <div class="mx-auto w-1/2 px-4 py-16 sm:px-6 lg:px-8">
      <div class="mx-auto max-w-lg">
        <h1 class="text-center text-2xl font-bold text-indigo-600 sm:text-3xl">Edit Data Pesawat</h1>
        <form method="POST" class="mb-0 mt-6 space-y-4 rounded-lg p-4 shadow-lg sm:p-6 lg:p-8">
          <div>
            <input
              type="text"
              name="id"
              class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
              value="<?php echo $dataPesawat[0] ?>" hidden />
            <label for="nomor" class="font-semibold">Nomor Penerbangan</label>
            <div class="relative">
              <input
                type="text"
                name="nomor"
                class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                value="<?php echo $dataPesawat[1] ?>"
                required="" />
            </div>
          </div>
          <div>
            <label for="maskapai" class="font-semibold">Maskapai</label>
            <div class="relative">
              <input
                type="text"
                name="maskapai"
                class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                value="<?php echo $dataPesawat[2] ?>"
                required="" />
            </div>
          </div>
          <div>
            <label for="asal" class="font-semibold">Asal</label>
            <div class="relative">
              <input
                type="text"
                name="asal"
                class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                value="<?php echo $dataPesawat[3] ?>"
                required="" />
            </div>
          </div>
          <div>
            <label for="tujuan" class="font-semibold">Tujuan</label>
            <div class="relative">
              <input
                type="text"
                name="tujuan"
                class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                value="<?php echo $dataPesawat[4] ?>"
                required="" />
            </div>
          </div>
          <div>
            <label for="keberangakatan" class="font-semibold">Keberangkatan</label>
            <div class="relative">
              <input
                type="datetime-local"
                name="keberangkatan"
                class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                value="<?php echo $dataPesawat[5] ?>"
                required="" />
            </div>
          </div>
          <div>
            <label for="kedatangan" class="font-semibold">Kedatangan</label>
            <div class="relative">
              <input
                type="datetime-local"
                name="kedatangan"
                class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                value="<?php echo $dataPesawat[6] ?>"
                required="" />
            </div>
          </div>
          <div>
            <label for="price" class="font-semibold">Price</label>
            <div class="relative">
              <input
                type="number"
                name="price"
                class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                value="<?php echo $dataPesawat[7] ?>"
                required="" />
            </div>
          </div>
          <div>
            <label for="kursi" class="font-semibold">Kursi</label>
            <div class="relative">
              <input
                type="number"
                name="kursi"
                class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                value="<?php echo $dataPesawat[8] ?>"
                required="" />
            </div>
          </div>
          <div>
            <label for="operasional" class="font-semibold">Operasional</label>
            <div class="relative">
              <input
                type="text"
                name="operasional"
                class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                value="<?php echo htmlspecialchars(implode(', ', $jsonPesawat)); ?>" />
            </div>
          </div>
          <button
            type="submit"
            name="submit"
            class="block w-full rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white mt-4">
            Update Data
          </button>
        </form>
      </div>
    </div>
  <?php
  } else {
    $id = $_POST["id"];
    $nomor = $_POST["nomor"];
    $maskapai = $_POST["maskapai"];
    $asal = $_POST["asal"];
    $tujuan = $_POST["tujuan"];
    $keberangkatan = $_POST["keberangkatan"];
    $kedatangan = $_POST["kedatangan"];
    $price = $_POST["price"];
    $kursi = $_POST["kursi"];
    $jadwal = $_POST["operasional"];
    $jadwalArray = explode(", ", $jadwal);
    $operasional = json_encode($jadwalArray);

    $updatePesawat = "UPDATE pesawat SET nomor_penerbangan='$nomor', maskapai='$maskapai', asal='$asal', tujuan='$tujuan', waktu_keberangkatan='$keberangkatan', waktu_kedatangan='$kedatangan', price='$price', kursi='$kursi', operasional='$operasional' WHERE id='$id'";
    $queryPesawat = mysqli_query($conn, $updatePesawat);


    if ($queryPesawat) {
      echo "<script>alert('Daftar Berhasil Disimpan !') </script>";
      echo "<script type='text/javascript'>window.location = 'dashboard.php'</script>";
    } else {
      echo "<script>alert('Daftar Gagal Disimpan !') </script>";
      echo "<script type='text/javascript'>window.location = 'dashboard.php'</script>";
    }
  }
  ?>

</body>

</html>