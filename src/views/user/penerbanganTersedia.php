<?php
include "../../config/koneksi.php";

// Menerima data POST
$bandaraAsal = isset($_POST["bandaraAsal"]) ? $_POST["bandaraAsal"] : '';
$bandaraTujuan = isset($_POST["bandaraTujuan"]) ? $_POST["bandaraTujuan"] : '';
$keberangkatan = isset($_POST["keberangkatan"]) ? $_POST["keberangkatan"] : '';
$kepulangan = isset($_POST["kepulangan"]) ? $_POST["kepulangan"] : '';
$jumlahPenumpang = isset($_POST["jumlah"]) ? $_POST["jumlah"] : '';

// Query untuk mencari tiket berdasarkan kriteria
// if ($kepulangan) {
//     // Cari tiket pulang-pergi
$queryCariTiket = "
        SELECT * FROM pesawat 
        WHERE asal = '$bandaraAsal' 
        AND tujuan = '$bandaraTujuan' 
        AND DATE(waktu_keberangkatan) = '$keberangkatan' 
    ";
// } else {
//     // Cari tiket sekali jalan
//     $queryCariTiket = "
//         SELECT * FROM pesawat 
//         WHERE asal = '$bandaraAsal' 
//         AND tujuan = '$bandaraTujuan' 
//         AND DATE(waktu_keberangkatan) = '$keberangkatan'
//     ";
// }

$resultCariTiket = mysqli_query($conn, $queryCariTiket);
$penerbanganData = [];
while ($dataPenerbangan = mysqli_fetch_array($resultCariTiket, MYSQLI_ASSOC)) {
    $penerbanganData[] = $dataPenerbangan;
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

    <main class="container mx-auto p-4">
        <!-- Booking Form -->
        <div class="bg-indigo-500 p-6 md:p-10 lg:p-16 rounded-md shadow-lg">
            <form class="space-y-4">
                <!-- Radio buttons for trip type -->
                <fieldset class="grid grid-cols-2 sm:flex gap-4">
                    <label class="flex justify-start items-center gap-4 bg-white rounded-lg px-5 py-3 text-sm">
                        <input type="radio" name="tipe" value="pp" id="pp" class="">
                        <span class="cursor-pointer">Pulang-Pergi</span>
                    </label>
                    <label class="flex justify-start items-center gap-4 bg-white rounded-lg px-5 py-3 text-sm">
                        <input type="radio" name="tipe" value="sekali" id="sekali" class="">
                        <span class="cursor-pointer">Sekali Jalan</span>
                    </label>
                </fieldset>

                <!-- Input fields -->
                <div class="grid grid-cols-1 lg:flex lg:items-center gap-4">
                    <select id="bandaraAsal" class="p-4 rounded-lg w-full border-gray-300">
                        <option><?php echo $bandaraAsal ?></option>
                        <option value="">Bandara Asal</option>
                        <option>SOEKARNO HATTA</option>
                        <option>I GUSTI NGURAH RAI</option>
                    </select>
                    <button id="swapButton" class="w-15 h-15 hidden lg:block rounded-full border border-indigo-600 bg-indigo-600 p-3 text-white hover:bg-transparent hover:text-indigo-600 ">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 10L21 7M21 7L18 4M21 7H7M6 14L3 17M3 17L6 20M3 17H17" />
                        </svg>
                    </button>
                    <select id="bandaraTujuan" class="p-4 rounded-lg w-full border-gray-300">
                        <option><?php echo $bandaraTujuan ?></option>
                        <option>Bandara Tujuan</option>
                        <option>SOEKARNO HATTA</option>
                        <option>I GUSTI NGURAH RAI</option>
                    </select>
                    <input type="date" class="p-4 rounded-lg w-full border-gray-300" placeholder="Tanggal Berangkat">
                    <!-- Pulang date -->
                    <input
                        type="date"
                        id="return-date"
                        class="p-4 rounded-lg w-full border-gray-300 placeholder-gray-400"
                        placeholder="Tanggal Pulang">
                    <input type="number" placeholder="Jumlah Penumpang" class="p-4 rounded-lg bg-white text-sm text-gray-500 w-full border-gray-300">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="block w-full rounded bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">
                    Cari Sekarang
                </button>
            </form>
            <?php

            ?>



        </div>

        <!-- Ticket List -->
        <div class="mt-8 bg-white rounded-md shadow-lg overflow-auto">
            <?php if (count($penerbanganData) > 0) { ?>

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Maskapai</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Durasi</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php
                        foreach ($penerbanganData as $dataPenerbangan) {



                        ?>
                            <tr>

                                <td class="px-6 py-4 whitespace-nowrap flex gap-2 items-center">
                                    <img class="w-12" src="https://logos-world.net/wp-content/uploads/2023/01/Garuda-Indonesia-Logo.jpg" alt="Garuda">
                                    <p class="font-medium text-gray-700"><?php echo $dataPenerbangan['maskapai'] ?></p>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap"><?php echo date('H:i', strtotime($dataPenerbangan['waktu_keberangkatan'])) ?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?php echo gmdate("H:i", strtotime($dataPenerbangan['waktu_kedatangan']) - strtotime($dataPenerbangan['waktu_keberangkatan'])) ?> Jam</td>
                                <td class="px-6 py-4 whitespace-nowrap">Rp <?php echo number_format($dataPenerbangan['price'], 0, ',', '.') ?></td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="formPemesanan.php?id=<?php echo $dataPenerbangan['id'] ?>" class="px-4 py-2 rounded bg-indigo-600 text-white hover:bg-indigo-700">Pesan</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <div class="bg-indigo-600 px-4 py-3 text-white">
                    <p class="text-center text-sm font-medium">
                        Penerbangan Tidak Tersedia
                    </p>
                </div> <?php } ?>
        </div>
    </main>
</body>

</html>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const roundTripRadio = document.getElementById('round-trip');
        const oneWayRadio = document.getElementById('one-way');
        const returnDateInput = document.getElementById('return-date');
        const swapButton = document.getElementById("swapButton");

        // Default state
        returnDateInput.style.display = 'block';

        // Event listeners
        roundTripRadio.addEventListener('change', () => {
            returnDateInput.style.display = 'block';
        });

        oneWayRadio.addEventListener('change', () => {
            returnDateInput.style.display = 'none';
        });

        // Fungsi swap untuk tukar posisi elemen
        document.getElementById("swapButton").addEventListener("click", function() {
            event.preventDefault();
            // Ambil elemen bandaraAsal dan bandaraTujuan
            const bandaraAsal = document.getElementById("bandaraAsal");
            const bandaraTujuan = document.getElementById("bandaraTujuan");

            // Cari parent dari masing-masing elemen
            const parentAsal = bandaraAsal.parentNode;
            const parentTujuan = bandaraTujuan.parentNode;

            // Simpan placeholder untuk membantu pertukaran
            const placeholder = document.createElement("div");

            // Tukar posisi elemen
            parentAsal.replaceChild(placeholder, bandaraAsal);
            parentTujuan.replaceChild(bandaraAsal, bandaraTujuan);
            parentAsal.replaceChild(bandaraTujuan, placeholder);
        });
    });
</script>