<?php
include "../../../config/koneksi.php";

$getId = $_GET["id"];
$editPenumpang = "SELECT * FROM penumpang WHERE id = '$getId'";
$resultPenumpang = mysqli_query($conn, $editPenumpang);
$dataPenumpang = mysqli_fetch_array($resultPenumpang);


$queryBookings = "SELECT id, booking_code FROM bookings";
$resultBookings = mysqli_query($conn, $queryBookings);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data Penumpang</title>
  <link href="../../../assets/css/output.css" rel="stylesheet">
</head>
<body>
  <?php if(!isset($_POST['submit'])) {?>
  <div class="mx-auto w-1/2 px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-lg">
      <h1 class="text-center text-2xl font-bold text-indigo-600 sm:text-3xl">Edit Data Penumpang</h1>
      <form method="POST" class="mb-0 mt-6 space-y-4 rounded-lg p-4 shadow-lg sm:p-6 lg:p-8">
        <div>
          <input
                type="text"
                name="id"
                class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                value="<?php echo $dataPenumpang[0]?>" hidden
              />
          <label for="kode_booking" class="font-semibold">Booking Kode</label>
          <div class="relative mb-4">
            <select id="kode_booking" name="kode_booking" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
              <?php while ($dataBookings = mysqli_fetch_assoc($resultBookings)) { ?>
                <option value="<?php echo $dataBookings['id']; ?>"><?php echo $dataBookings['booking_code']; ?></option>
              <?php } ?>
            </select>
          </div>
          <label for="name" class="font-semibold">Nama</label>
          <div class="relative">
            <input
              type="text"
              name="name"
              class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
              value="<?php echo $dataPenumpang[2]?>"
            />
          </div>
        </div>
        <div>
          <label for="umur" class="font-semibold">Age</label>
          <div class="relative">
            <input
              type="number"
              name="umur"
              class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
              value="<?php echo $dataPenumpang[3]?>"
            />
          </div>
        </div>
        <div>
          <label for="passport" class="font-semibold">Kode Passport</label>
          <div class="relative">
            <input
              type="text"
              name="passport"
              class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
              value="<?php echo $dataPenumpang[4]?>"
            />
          </div>
        </div>

        <button
          type="submit"
          name="submit"
          class="block w-full rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white mt-4"
        >
          Update Data
        </button>
      </form>
    </div>
  </div>
  <?php
  } else {
    $id = $_POST["id"];
    $kode_booking = $_POST["kode_booking"];
    $name = $_POST["name"];
    $umur = $_POST["umur"];
    $passport = $_POST["passport"];

    $updatePenumpang = "UPDATE penumpang SET booking_id='$kode_booking', name='$name', age='$umur', passport_number='$passport' WHERE id='$id'";
    $queryPenumpang = mysqli_query($conn, $updatePenumpang);


    if($queryPenumpang) {
      echo"<script>alert('Daftar Berhasil Disimpan !') </script>";  
      echo"<script type='text/javascript'>window.location = 'dashboard.php'</script>";  
    } else {
      echo"<script>alert('Daftar Gagal Disimpan !') </script>";  
      echo"<script type='text/javascript'>window.location = 'dashboard.php'</script>";  
    }
  }
  ?>

</body>
</html>