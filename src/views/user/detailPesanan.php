<?php
include "../../config/koneksi.php";
$getID = $_GET['id'];
$queryDetailPesanan = "SELECT 
        b.booking_code, 
        b.detail_penerbangan, 
        b.total_price, 
        b.status, 
        u.name
    FROM 
        bookings b
    LEFT JOIN 
        penumpang u ON u.booking_id = b.id
    WHERE 
        b.id = '$getID'
";
$resultDetailPesanan = mysqli_query($conn, $queryDetailPesanan);
$dataDetailPesanan = mysqli_fetch_assoc($resultDetailPesanan);
$detail_penerbangan = json_decode($dataDetailPesanan['detail_penerbangan'], true); // Decode JSON
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TiketinAja</title>
    <link href="../../assets/css/output.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
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
            <div class="grid grid-cols-1 gap-3 sm:gap-8 lg:grid-cols-6">
                <div class="lg:col-span-2 flex flex-col gap-2 bg-red-300">
                    <h1 class="text-3xl font-bold text-white">
                        Detail Pesanan
                    </h1>
                    <input id="text" class="hidden" type="text" value="https://hogangnono.com" /><br />
                    <div id="qrcode" class="bg-white border border-gray-300 rounded-lg w-24"></div>
                </div>
                <div class="flex flex-col gap-3 overflow-x-auto rounded-lg shadow-lg pt-5 bg-white lg:col-span-4">
                    <div class="flow-root">
                        <dl class="-my-3 divide-y divide-gray-100 text-sm">
                            <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4 px-5">
                                <dt class="font-medium text-gray-900">Maskapai</dt>
                                <dd class="text-gray-700 sm:col-span-2 ">
                                    <span><?php echo $detail_penerbangan['maskapai']; ?></span>
                                </dd>
                            </div>
                            <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4 px-5">
                                <dt class="font-medium text-gray-900">Booking Code</dt>
                                <dd class="text-gray-700 sm:col-span-2"><?php echo $dataDetailPesanan['booking_code']; ?></dd>
                            </div>

                            <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4 px-5">
                                <dt class="font-medium text-gray-900">Nama Penumpang</dt>
                                <dd class="text-gray-700 sm:col-span-2"><?php echo $dataDetailPesanan['name']; ?></dd>
                            </div>


                            <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4 px-5">
                                <dt class="font-medium text-gray-900">Penerbangan</dt>
                                <dd class="text-gray-700 sm:col-span-2 flex items-center gap-3">
                                    <?php echo $detail_penerbangan['asal']; ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                    </svg>
                                    <?php echo $detail_penerbangan['tujuan']; ?>
                                </dd>
                            </div>
                            <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4 px-5">
                                <dt class="font-medium text-gray-900">Total Harga</dt>
                                <dd class="text-gray-700 sm:col-span-2">Rp <?php echo number_format($dataDetailPesanan['total_price'], 0, ',', '.'); ?></dd>
                            </div>
                        </dl>
                    </div>
                    <div class="grid text-center sm:justify-end p-2.5">
                        <a href="#" class="rounded-md bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white shadow">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

<script>
    var qrcode = new QRCode("qrcode");

    function makeCode() {
        var elText = document.getElementById("text");

        if (!elText.value) {
            alert("Input a text");
            elText.focus();
            return;
        }

        qrcode.makeCode(elText.value);
    }

    makeCode();

    $("#text").
    on("blur", function() {
        makeCode();
    }).
    on("keydown", function(e) {
        if (e.keyCode == 13) {
            makeCode();
        }
    });
</script>