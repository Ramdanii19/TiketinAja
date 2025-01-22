<?php
include "../../config/koneksi.php";
$getID = $_GET['id'];
$queryDetailPesanan = "SELECT 
        b.booking_code, 
        b.detail_penerbangan, 
        b.total_price, 
        b.status, 
        u.name,
        p.payment_method
    FROM 
        bookings b
    LEFT JOIN 
        penumpang u ON u.booking_id = b.id
    LEFT JOIN 
        payment p ON p.booking_id = b.id
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
                <div class="lg:col-span-2 flex flex-col gap-2">
                    <h1 class="text-3xl font-bold text-white">
                        Detail Pesanan
                    </h1>
                    <div class="py-8 bg-white flex items-center justify-center border-gray-300 rounded-lg ">

                        <div id="qrcode" class=""></div>
                    </div>

                    <input id="text" class="hidden" type="text" value="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" />
                </div>
                <div class=" flex flex-col gap-3 overflow-x-auto rounded-lg shadow-lg pt-5 bg-white lg:col-span-4">
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
                            <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4 px-5">
                                <dt class="font-medium text-gray-900">Status</dt>
                                <dd class="text-gray-700 sm:col-span-2">
                                    <span
                                        class="inline-flex items-center justify-center rounded-full px-2.5 py-0.5 <?php echo ($dataDetailPesanan['status'] == 'confirmed' ? 'text-emerald-700 bg-emerald-100' : ($dataDetailPesanan['status'] == 'canceled' ? 'text-rose-700 bg-rose-100' : ' text-gray-700 bg-gray-100')); ?> ">
                                        <p class="whitespace-nowrap text-sm"> <?php echo $dataDetailPesanan['status']; ?>
                                        </p>
                                    </span>
                                </dd>
                            </div>
                            <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4 px-5">
                                <dt class="font-medium text-gray-900">Metode Pembayaran</dt>
                                <dd class="text-gray-700 sm:col-span-2"><?php echo $dataDetailPesanan['payment_method']; ?></dd>
                            </div>
                        </dl>
                    </div>
                    <div class="grid text-center sm:justify-end p-2.5">
                        <?php
                        if ($dataDetailPesanan['status'] != 'pending') {
                        ?>
                            <a href="listPesanan.php" class="rounded-md bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white shadow">
                                Kembali
                            </a>
                        <?php
                        } else {
                        ?>
                            <div class="flex gap-3">
                                <a href="cancelPayment.php?id=<?php echo $getID; ?>"
                                    class="rounded-md bg-rose-500 p-2.5 text-sm font-medium text-white shadow"
                                    onclick="return confirm('Are you sure you want to cancel this payment?');">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                    </svg>

                                </a>
                                <a href="processPayment.php?id=<?php echo $getID; ?>"
                                    class="rounded-md bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white shadow"
                                    onclick="return confirm('Are you sure you want to confirm this payment?');">
                                    Bayar
                                </a>

                            </div>

                        <?php
                        }
                        ?>
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