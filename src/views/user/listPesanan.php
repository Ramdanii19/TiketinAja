<?php
session_start();
include "../../config/koneksi.php";
$_SESSION['role'];
$user_id = $_SESSION['id'];

$queryListPesanan = "SELECT * FROM bookings WHERE user_id = '$user_id'";
$resultListPesanan = mysqli_query($conn, $queryListPesanan);
$penerbanganData = [];
$pesananData = [];
while ($dataPesanan = mysqli_fetch_array($resultListPesanan, MYSQLI_ASSOC)) {
    $pesananData[] = $dataPesanan;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TiketinAja</title>
    <link href="../../assets/css/output.css" rel="stylesheet">
</head>

<body>
    <?php include "./header.php" ?>


    <section class="relative bg-indigo-600 py-16">
        <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-6">
                <div class="lg:col-span-2">
                    <h1 class="text-3xl font-bold text-white">
                        Pilih Tiket Anda
                    </h1>
                </div>

                <div class="lg:col-span-4">
                    <?php if (count($pesananData) > 0) {
                    ?>

                        <div class="flex flex-col gap-4 ">
                            <?php foreach ($pesananData as $dataPesanan) {
                                $detail_penerbangan = json_decode($dataPesanan['detail_penerbangan'], true); // Decode JSON into an associative array

                            ?>
                                <a href="detailPesanan.php?id=<?php echo $dataPesanan['id'] ?>"
                                    class=" cursor-pointer shadow-sm flex items-start sm:items-center justify-between flex-col sm:flex-row gap-5 rounded-lg border border-gray-100 bg-white p-6">
                                    <div class="flex items-center gap-4 w-64">
                                        <img class="w-12" src="../../assets/img/<?php echo $detail_penerbangan['maskapai'] ?>.png" alt="Garuda">
                                        <div>
                                            <p class="text-sm  font-medium text-gray-700"><?php echo $dataPesanan['booking_code']; ?></p>
                                        </div>
                                    </div>

                                    <div class="flex gap-3">
                                        <p class="font-semibold  text-gray-800"><?php echo $detail_penerbangan['asal'] ?></p>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                        </svg>

                                        <p class="font-semibold  text-gray-800"><?php echo $detail_penerbangan['tujuan'] ?></p>
                                    </div>
                                    <p class="flex place-self-end  text-white  font-medium rounded-lg text-sm px-5 py-2.5 <?php echo ($dataPesanan['status'] == 'confirmed' ? 'bg-green-600' : ($dataPesanan['status'] == 'canceled' ? 'bg-rose-500' : 'bg-gray-600')); ?>"><?php echo $dataPesanan['status'] ?></p>
                                </a>
                            <?php } ?>
                        </div>
                    <?php } else { ?>
                        <div class="bg-white p-4 text-slate-900 rounded-md flex gap-1 justify-center flex-col items-center">
                            <p class="text-sm font-medium">Penerbangan Tidak Tersedia</p>
                            <a href="landing.php" class="text-xs font-bold text-blue-600">Pesan Sekarang</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <?php include "./footer.php" ?>
</body>

</html>
