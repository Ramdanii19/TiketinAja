<?php
include "../../../config/koneksi.php";
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  header("Location: ../../Auth/login.php");
  exit;
}

$getId = $_GET["id"];
$editBookings = "SELECT * FROM bookings WHERE id = '$getId'";
$resultBookings = mysqli_query($conn, $editBookings);
$dataBookings = mysqli_fetch_array($resultBookings);

$queryuser = "SELECT  
  bookings.id,
  user.name AS user_name,
  pesawat.nomor_penerbangan,
  bookings.detail_penerbangan,
  bookings.booking_code,
  bookings.total_price,
  bookings.status
FROM `bookings`
JOIN user ON bookings.user_id = user.id
JOIN pesawat ON bookings.pesawat_id = pesawat.id
WHERE bookings.id = '$getId';";
$result = mysqli_query($conn, $queryuser);
$datauser = mysqli_fetch_array($result);

$queryUser = "SELECT id, name FROM user";
$resultUser = mysqli_query($conn, $queryUser);

$queryPesawat = "SELECT id, nomor_penerbangan FROM Pesawat";
$resultPesawat = mysqli_query($conn, $queryPesawat);
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
  <?php if (!isset($_POST['submit'])) { ?>
    <div class="mx-auto w-1/2 px-4 py-16 sm:px-6 lg:px-8">
      <div class="mx-auto max-w-lg">
        <h1 class="text-center text-2xl font-bold text-indigo-600 sm:text-3xl">Edit Data Penumpang</h1>
        <form method="POST" class="mb-0 mt-6 space-y-4 rounded-lg p-4 shadow-lg sm:p-6 lg:p-8">
          <div>
            <input
              type="text"
              name="id"
              class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
              value="<?php echo $dataBookings[0] ?>" hidden />
            <label for="name" class="font-semibold">Penumpang</label>
            <div class="relative mb-4">
              <select id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                <option hidden value="<?php echo $dataBookings[1] ?>"><?php echo $datauser[1] ?></option>
                <?php while ($dataUser = mysqli_fetch_assoc($resultUser)) { ?>
                  <option value="<?php echo $dataUser['id']; ?>"><?php echo $dataUser['name']; ?></option>
                <?php } ?>
              </select>
            </div>
            <label for="name" class="font-semibold">Nomor Penerbangan</label>
            <div class="relative mb-4">
              <select id="nomor_penerbangan" name="nomor_penerbangan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                <option hidden value="<?php echo $dataBookings[2] ?>"><?php echo $datauser[2] ?></option>
                <?php while ($dataPesawat = mysqli_fetch_assoc($resultPesawat)) { ?>
                  <option value="<?php echo $dataPesawat['id']; ?>"><?php echo $dataPesawat['nomor_penerbangan']; ?></option>
                <?php } ?>
              </select>
            </div>
            <label for="booking_code" class="font-semibold">Booking Code</label>
            <div class="relative">
              <input
                type="text"
                name="booking_code"
                class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                value="<?php echo $dataBookings[3] ?>"
                required="" />
            </div>
          </div>
          <div>
            <label for="total_price" class="font-semibold">Total Price</label>
            <div class="relative">
              <input
                type="text"
                name="total_price"
                class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                value="<?php echo $dataBookings[5] ?>"
                required="" />
            </div>
          </div>
          <div>
            <label for="passport" class="font-semibold">Status</label>
            <div class="relative">
              <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                <option value="<?php echo $dataBookings[6] ?>"><?php echo $dataBookings[6] ?></option>
                <option value="pending">pending</option>
                <option value="confirmed">confirmed</option>
                <option value="canceled">canceled</option>
              </select>
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
    $name = $_POST["name"];
    $nomor_penerbangan = $_POST["nomor_penerbangan"];
    $booking_code = $_POST["booking_code"];
    $editDetail = "SELECT * FROM pesawat WHERE id = $nomor_penerbangan";
    $resultDetail = mysqli_query($conn, $editDetail);
    $dataDetail = mysqli_fetch_array($resultDetail);
    $detail_penerbangan = [
      "nomor_penerbangan" => htmlspecialchars($dataDetail[1]),
      "maskapai" => htmlspecialchars($dataDetail[2]),
      "asal" => htmlspecialchars($dataDetail[3]),
      "tujuan" => htmlspecialchars($dataDetail[4]),
      "waktu_keberangkatan" => htmlspecialchars($dataDetail[5]),
      "waktu_kedatangan" => htmlspecialchars($dataDetail[6])
    ];
    $total_price = $_POST["total_price"];
    $status = $_POST["status"];
    $detail_penerbangan = json_encode($detail_penerbangan);

    $updateBookings = "UPDATE bookings SET user_id='$name', pesawat_id='$nomor_penerbangan', booking_code='$booking_code', detail_penerbangan='$detail_penerbangan', total_price='$total_price', status='$status' WHERE id='$id'";
    $queryBookings = mysqli_query($conn, $updateBookings);


    if ($queryBookings) {
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