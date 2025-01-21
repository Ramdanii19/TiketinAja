<?php
include "../../config/koneksi.php";
$user_id = 2;

$queryListPesanan = "SELECT * FROM bookings WHERE user_id = '$user_id'";
$resultListPesanan = mysqli_query($conn, $queryListPesanan);
$penerbanganData = [];
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
    <header class="bg-white shadow">
        <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div>
                    <a href="landing.php" class="text-indigo-600 font-bold text-2xl">
                        TiketinAja
                    </a>
                </div>

                <div class="flex items-center gap-4">
                    <a href="#" class="rounded-md bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white shadow">
                        Login
                    </a>
                    <a href="#" class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-indigo-600">
                        Register
                    </a>
                </div>
            </div>
        </div>
    </header>

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
                                <a href="#"
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
                                    <?php
                                    if ($dataPesanan['status'] == 'confirmed') { ?>
                                        <p class="flex place-self-end focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><?php echo $dataPesanan['status'] ?></p>
                                    <?php
                                    } else { ?>

                                        <p class="flex place-self-end  focus:outline-none focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 bg-gray-500 text-white border-gray-600 hover:bg-gray-700 hover:border-gray-600 focus:ring-gray-700"><?php echo $dataPesanan['status'] ?></p>
                                    <?php
                                    }
                                    ?>
                                </a>
                            <?php } ?>
                        </div>
                    <?php } else { ?>
                        <div class="bg-white p-4 text-gray-700 rounded-md">
                            <p class="text-center text-sm font-medium">Penerbangan Tidak Tersedia</p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</body>

</html>