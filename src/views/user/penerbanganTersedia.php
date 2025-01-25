<?php
session_start();
include "../../config/koneksi.php";
$_SESSION['role'] = isset($_SESSION["role"]) ? $_SESSION["role"] : '';

// Store POST data in session variables
if (isset($_POST["submit"])) {
    $_SESSION['tipe'] = isset($_POST["tipe"]) ? htmlspecialchars($_POST["tipe"]) : '';
    $_SESSION['bandaraAsal'] = isset($_POST["bandaraAsal"]) ? htmlspecialchars($_POST["bandaraAsal"]) : '';
    $_SESSION['bandaraTujuan'] = isset($_POST["bandaraTujuan"]) ? htmlspecialchars($_POST["bandaraTujuan"]) : '';
    $_SESSION['keberangkatan'] = isset($_POST["keberangkatan"]) ? htmlspecialchars($_POST["keberangkatan"]) : '';
    $_SESSION['kepulangan'] = isset($_POST["kepulangan"]) ? htmlspecialchars($_POST["kepulangan"]) : '';
    $_SESSION['jumlahPenumpang'] = isset($_POST["jumlah"]) ? htmlspecialchars($_POST["jumlah"]) : '';
}


// Query untuk mencari tiket berdasarkan kriteria
$queryCariTiket = "
    SELECT * FROM pesawat 
    WHERE asal = '" . $_SESSION['bandaraAsal'] . "' 
    AND tujuan = '" . $_SESSION['bandaraTujuan'] . "' 
    AND DATE(waktu_keberangkatan) = '" . $_SESSION['keberangkatan'] . "' 
";

$resultCariTiket = mysqli_query($conn, $queryCariTiket);
$penerbanganData = [];
while ($dataPenerbangan = mysqli_fetch_array($resultCariTiket, MYSQLI_ASSOC)) {
    $penerbanganData[] = $dataPenerbangan;
}

$queryPesawat = "SELECT * FROM pesawat";
$resultPesawat = mysqli_query($conn, $queryPesawat);

$pesawatData = [];
while ($dataPesawat = mysqli_fetch_array($resultPesawat, MYSQLI_ASSOC)) {
    $pesawatData[] = $dataPesawat;
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

<body data-tipe="<?php echo htmlspecialchars($_SESSION['tipe']); ?>">
    <header class="bg-white shadow">
        <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div>
                    <a href="landing.php" class="text-indigo-600 font-bold text-2xl">TiketinAja</a>
                </div>
                <?= ($_SESSION['role']) ? '<a href="../Auth/logout.php" class="rounded-md bg-rose-800 px-5 py-2.5 text-sm font-medium text-slate-100">
                            Logout
                        </a>' : '<div class="flex items-center gap-4">
                        <a href="../Auth/login.php" class="rounded-md bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white shadow">
                            Login
                        </a>
                        <a href="../Auth/register.php" class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-indigo-600">
                            Register
                        </a>
                    </div>'  ?>
            </div>
        </div>
    </header>

    <main class="container mx-auto p-4">
        <!-- Booking Form -->
        <div class="bg-indigo-500 p-6 md:p-10 lg:p-16 rounded-md shadow-lg">
            <form class="space-y-4" action="penerbanganTersedia.php" method="post">
                <!-- Radio buttons for trip type -->
                <fieldset class="grid grid-cols-2 sm:flex gap-4">
                    <label class="flex justify-start items-center gap-4 bg-white rounded-lg px-5 py-3 text-sm">
                        <input required type="radio" name="tipe" value="pp" id="pp" <?php if ($_SESSION['tipe'] == 'pp') echo 'checked'; ?>>
                        <span class="cursor-pointer">Pulang-Pergi</span>
                    </label>
                    <label class="flex justify-start items-center gap-4 bg-white rounded-lg px-5 py-3 text-sm">
                        <input required type="radio" name="tipe" value="sekali" id="sekali" <?php if ($_SESSION['tipe'] == 'sekali') echo 'checked'; ?>>
                        <span class="cursor-pointer">Sekali Jalan</span>
                    </label>
                </fieldset>

                <!-- Input fields -->
                <div class="grid grid-cols-1 lg:flex lg:items-center gap-4">
                    <select id="bandaraAsal" name="bandaraAsal" class="p-4 rounded-lg w-full border-gray-300">
                        <option disabled>Bandara Asal</option>
                        <option value="<?php echo htmlspecialchars($_SESSION['bandaraAsal']); ?>"><?php echo htmlspecialchars($_SESSION['bandaraAsal']); ?></option>
                        <?php
                        $uniqueAsal = [];
                        foreach ($pesawatData as $dataPesawat) {
                            $asal = trim($dataPesawat['asal']);
                            if (!in_array($asal, $uniqueAsal)) {
                                $uniqueAsal[] = $asal;
                                echo "<option value='" . htmlspecialchars($asal) . "'>" . htmlspecialchars($dataPesawat['asal']) . "</option>";
                            }
                        }
                        ?>
                    </select>
                    <button id="swapButton" type="button" class="w-15 h-15 hidden lg:block rounded-full border border-indigo-600 bg-indigo-600 p-3 text-white hover:bg-transparent hover:text-indigo-600">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 10L21 7M21 7L18 4M21 7H7M6 14L3 17M3 17L6 20M3 17H17" />
                        </svg>
                    </button>
                    <select id="bandaraTujuan" name="bandaraTujuan" class="p-4 rounded-lg w-full border-gray-300">
                        <option disabled>Bandara Tujuan</option>
                        <option value="<?php echo htmlspecialchars($_SESSION['bandaraTujuan']); ?>"><?php echo htmlspecialchars($_SESSION['bandaraTujuan']); ?></option>
                        <?php
                        $uniqueTujuan = [];
                        foreach ($pesawatData as $dataPesawat) {
                            $tujuan = trim($dataPesawat['tujuan']);
                            if (!in_array($tujuan, $uniqueTujuan)) {
                                $uniqueTujuan[] = $tujuan;
                                echo "<option value='" . htmlspecialchars($tujuan) . "'>" . htmlspecialchars($dataPesawat['tujuan']) . "</option>";
                            }
                        }
                        ?>
                    </select>
                    <input required type="date" name="keberangkatan" value="<?php echo $_SESSION['keberangkatan'] ?>" class="p-4 rounded-lg w-full border-gray-300" placeholder="Tanggal Berangkat">
                    <input type="date" id="kepulangan" name="kepulangan" value="<?php echo $_SESSION['kepulangan'] ?>" class="p-4 rounded-lg w-full border-gray-300" placeholder="Tanggal Pulang" value="<?php echo $_SESSION['kepulangan'] ?>">
                    <input required type="number" name="jumlah" min=1 value="<?php echo $_SESSION['jumlahPenumpang'] ?>" placeholder="Jumlah Penumpang" class="p-4 rounded-lg bg-white text-sm w-full border-gray-300">
                </div>

                <!-- Submit Button -->
                <button type="submit" name="submit" class="block w-full rounded bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">Cari Sekarang</button>
            </form>
        </div>

        <!-- Ticket List -->
        <div class="mt-4">
            <h1 class="text-lg font-bold text-gray-700 sm:text-xl">Jadwal Pergi</h1>
            <?php if (count($penerbanganData) > 0) { ?>
                <div class="flex flex-col gap-4 mt-2">
                    <?php foreach ($penerbanganData as $dataPenerbangan) { ?>
                        <a href="
                        <?php echo ($_SESSION['kepulangan'] ? 'pulangTersedia.php?pergi=' . $dataPenerbangan['id']
                            : 'formPemesanan.php?pergi=' . $dataPenerbangan['id']); ?>"
                            class="cursor-pointer shadow-sm flex items-start justify-between flex-col sm:flex-row gap-5 rounded-lg border border-gray-100 bg-white p-6">
                            <div class="flex items-center gap-4 w-48">
                                <img class="w-12" src="../../assets/img/<?php echo $dataPenerbangan['maskapai'] ?>.png" alt="Garuda">
                                <div>
                                    <p class="text-sm sm:text-base font-medium text-gray-700"><?php echo $dataPenerbangan['maskapai'] ?></p>
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <p class="font-semibold text-xl sm:text-2xl text-gray-800"><?php echo date('H:i', strtotime($dataPenerbangan['waktu_keberangkatan'])); ?></p>
                                <div class="flex flex-col justify-center items-center">
                                    <p class="text-xs font-medium text-gray-500"><?php
                                                                                    $waktuKeberangkatan = strtotime($dataPenerbangan['waktu_keberangkatan']);
                                                                                    $waktuKedatangan = strtotime($dataPenerbangan['waktu_kedatangan']);
                                                                                    $durasiDetik = $waktuKedatangan - $waktuKeberangkatan;
                                                                                    $jam = floor($durasiDetik / 3600);
                                                                                    $menit = floor(($durasiDetik % 3600) / 60);
                                                                                    echo ($jam > 0 ? $jam . 'j ' : '') . ($menit > 0 ? $menit . 'm' : '');
                                                                                    ?></p>
                                    <div class="mt-2 w-32 overflow-hidden rounded-full bg-gray-200">
                                        <div class="h-0.5"></div>
                                    </div>
                                </div>
                                <p class="font-semibold text-xl sm:text-2xl text-gray-800"><?php echo date('H:i', strtotime($dataPenerbangan['waktu_kedatangan'])); ?></p>
                            </div>

                            <p class="flex place-self-end font-bold text-xl sm:text-2xl text-rose-500">IDR <?php echo number_format($dataPenerbangan['price'], 0, ',', '.') ?></p>
                        </a>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <div class="bg-indigo-600 px-4 py-3 text-white">
                    <p class="text-center text-sm font-medium">Penerbangan Tidak Tersedia</p>
                </div>
            <?php } ?>
        </div>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const pp = document.getElementById('pp');
            const sekali = document.getElementById('sekali');
            const kepulangan = document.getElementById('kepulangan');
            const swapButton = document.getElementById("swapButton");

            kepulangan.style.display = (document.body.getAttribute('data-tipe') === 'pp') ? 'block' : 'none';

            pp.addEventListener('change', () => kepulangan.style.display = 'block');
            sekali.addEventListener('change', () => {
                kepulangan.style.display = 'none';
                kepulangan.value = '';
            });

            swapButton.addEventListener("click", function(event) {
                event.preventDefault();
                const bandaraAsal = document.getElementById("bandaraAsal");
                const bandaraTujuan = document.getElementById("bandaraTujuan");
                [bandaraAsal.value, bandaraTujuan.value] = [bandaraTujuan.value, bandaraAsal.value];
            });
        });
    </script>
</body>

</html>