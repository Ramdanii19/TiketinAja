<?php
session_start();
include "../../config/koneksi.php";
$_SESSION['role'];
$queryPenerbangan = "SELECT * FROM pesawat";
$resultPenerbangan = mysqli_query($conn, $queryPenerbangan);
$countPenerbangan = mysqli_num_rows($resultPenerbangan);

$penerbanganData = [];
while ($dataPenerbangan = mysqli_fetch_array($resultPenerbangan, MYSQLI_ASSOC)) {
    $penerbanganData[] = $dataPenerbangan;
}
if (!isset($_POST['submit'])) {

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

        <main class="mx-auto">
            <section class="relative w-full bg-cover bg-center bg-no-repeat py-12"
                style="background-image: url('https://images.unsplash.com/photo-1632099058914-1d1c64915d0b?q=80&w=1971&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
                <div class="absolute inset-0 bg-black/60"></div>

                <div class="relative mx-auto max-w-screen-xl px-4 ">
                    <form action="penerbanganTersedia.php" method="post" class="text-center flex items-center justify-center flex-col">
                        <h2 class="text-2xl font-bold text-white sm:text-3xl md:text-5xl">Pesan Tiket Sekarang!</h2>
                        <fieldset class="mt-4 grid grid-cols-2 sm:flex gap-4">
                            <label class="flex justify-between sm:justify-start sm:items-center gap-4 bg-white rounded-lg px-5 py-3 text-sm">
                                <input type="radio" name="tipe" value="pp" id="pp" class="">
                                <span class="cursor-pointer">Pulang-Pergi</span>
                            </label>
                            <label class="flex justify-start items-center gap-4 bg-white rounded-lg px-5 py-3 text-sm">
                                <input type="radio" name="tipe" value="sekali" id="sekali" class="">
                                <span class="cursor-pointer">Sekali Jalan</span>
                            </label>

                        </fieldset>
                        <article class=" mt-4 rounded-lg bg-white p-6 shadow-lg border border-gray-200">
                            <div class="flex flex-wrap flex-grow-0 gap-4 justify-center">
                                <select id="bandaraAsal" name="bandaraAsal" class="w-full sm:w-auto rounded-md border-gray-300 px-4 py-2 text-gray-700 sm:text-sm border">
                                    <option value="">Bandara Asal</option>

                                    <?php
                                    $uniqueAsal = [];
                                    foreach ($penerbanganData as $dataPenerbangan) {
                                        $asal = (trim($dataPenerbangan['asal']));
                                        if (!in_array($asal, $uniqueAsal)) {
                                            $uniqueAsal[] = $asal;
                                    ?>
                                            <option value="<?php echo htmlspecialchars($asal); ?>">
                                                <?php echo htmlspecialchars($dataPenerbangan['asal']); ?>
                                            </option>
                                    <?php
                                        }
                                    }
                                    ?>

                                </select>
                                <button id="swapButton" class="hidden md:block rounded-full border border-indigo-600 bg-indigo-600 p-3 text-white hover:bg-transparent hover:text-indigo-600 ">
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 10L21 7M21 7L18 4M21 7H7M6 14L3 17M3 17L6 20M3 17H17" />
                                    </svg>
                                </button>
                                <select id="bandaraTujuan" name="bandaraTujuan" class="w-full sm:w-auto rounded-md border-gray-300 px-4 py-2 text-gray-700 sm:text-sm border">
                                    <option value="">Bandara Tujuan</option>
                                    <?php
                                    $uniqueTujuan = [];
                                    foreach ($penerbanganData as $dataPenerbangan) {
                                        $tujuan = (trim($dataPenerbangan['tujuan']));
                                        if (!in_array($tujuan, $uniqueTujuan)) {
                                            $uniqueTujuan[] = $tujuan;
                                    ?>
                                            <option value="<?php echo htmlspecialchars($tujuan); ?>">
                                                <?php echo htmlspecialchars($dataPenerbangan['tujuan']); ?>
                                            </option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <input type="date" name="keberangkatan" class="w-full sm:w-auto rounded-md border-gray-300 px-4 py-2 text-gray-700 sm:text-sm border" min="<?php echo date('Y-m-d'); ?>" />
                                <input type="date" id="kepulangan" name="kepulangan" class="w-full sm:w-auto rounded-md border-gray-300 px-4 py-2 text-gray-700 sm:text-sm border" placeholder="Tanggal Pulang" min="<?php echo date('Y-m-d'); ?>" />

                                <input type="number" name="jumlah" placeholder="Jumlah Penumpang" class="w-full sm:w-auto rounded-md border-gray-300 px-4 py-2 text-gray-700 sm:text-sm border" />
                            </div>

                            <div class="mt-4 flex justify-center">
                                <button type="submit" name="submit" class="rounded bg-indigo-600 px-6 py-2 text-sm font-medium text-white hover:bg-indigo-700 border border-indigo-600" href="penerbanganTersedia.php">
                                    Cari Sekarang
                                </button>
                            </div>
                        </article>
                    </form>
                <?php
            } else {

                $tipe = $_POST["tipe"];
                $bandaraAsal = $_POST["bandaraAsal"];
                $bandaraTujuan = $_POST["bandaraTujuan"];
                $keberangkatan = $_POST["keberangkatan"];
                $kepulangan = !empty($_POST['kepulangan']) ? $_POST['kepulangan'] : NULL;
                $jumlah = $_POST["jumlah"];
            }
                ?>
                </div>
            </section>
        </main>
    </body>

    </html>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const pp = document.getElementById('pp');
            const sekali = document.getElementById('sekali');
            const kepulangan = document.getElementById('kepulangan');
            const swapButton = document.getElementById("swapButton");

            // Default state
            kepulangan.style.display = 'block';

            // Event listeners
            pp.addEventListener('change', () => {
                kepulangan.style.display = 'block';
            });

            sekali.addEventListener('change', () => {
                kepulangan.style.display = 'none';
            });

            document.getElementById("swapButton").addEventListener("click", function(event) {
                event.preventDefault(); // Mencegah aksi default tombol

                const bandaraAsal = document.getElementById("bandaraAsal");
                const bandaraTujuan = document.getElementById("bandaraTujuan");

                // Simpan nilai saat ini
                const asalValue = bandaraAsal.value;
                const tujuanValue = bandaraTujuan.value;

                // Tukar nilai
                bandaraAsal.value = tujuanValue;
                bandaraTujuan.value = asalValue;
            });
        });
    </script>