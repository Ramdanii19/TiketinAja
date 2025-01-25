<?php
session_start();
include "../../config/koneksi.php";
$_SESSION['role'] = isset($_SESSION["role"]) ? $_SESSION["role"] : '';
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    header("Location: ../Auth/login.php");
    exit;
}
$user_id = $_SESSION['id'];
// Store POST data in session variables
$getPergi = $_GET['pergi'];
if (isset($_GET['pulang'])) {
    $getPulang = $_GET['pulang'];
    $queryPulang = "SELECT * FROM pesawat WHERE id = '$getPulang'";
    $resultPulang = mysqli_query($conn, $queryPulang);
    $dataPulang = mysqli_fetch_array($resultPulang);
};
if (isset($_POST["submit"])) {
    $_SESSION['tipe'] = isset($_POST["tipe"]) ? $_POST["tipe"] : '';
    $_SESSION['bandaraAsal'] = isset($_POST["bandaraAsal"]) ? $_POST["bandaraAsal"] : '';
    $_SESSION['bandaraTujuan'] = isset($_POST["bandaraTujuan"]) ? $_POST["bandaraTujuan"] : '';
    $_SESSION['keberangkatan'] = isset($_POST["keberangkatan"]) ? $_POST["keberangkatan"] : '';
    $_SESSION['kepulangan'] = isset($_POST["kepulangan"]) ? $_POST["kepulangan"] : '';
    $_SESSION['jumlahPenumpang'] = isset($_POST["jumlah"]) ? $_POST["jumlah"] : '';
}


$queryPergi = "SELECT * FROM pesawat WHERE id = '$getPergi'";

$resultPergi = mysqli_query($conn, $queryPergi);

$dataPergi = mysqli_fetch_array($resultPergi);

if (!isset($_POST['pesan'])) {

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


        <section class="relative bg-indigo-600">
            <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-5">
                    <div class="lg:col-span-2">
                        <h1 class="max-w-xl text-3xl font-bold text-slate-100">
                            Form Pemesanan
                        </h1>
                    </div>

                    <div class="rounded-lg bg-white p-8 shadow-lg lg:col-span-3 lg:p-12">
                        <form id="order-form" class="space-y-4" method="post">
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <div class="relative">
                                    <input
                                        class="peer w-full rounded-lg border border-gray-200 p-3 text-sm focus:outline-none focus:border-blue-500"
                                        placeholder="Nama Depan"
                                        type="text"
                                        name="namaDepan"
                                        id="fn" required />
                                    <label
                                        class="absolute -top-3 left-3 px-2 bg-white text-sm text-gray-500 transition-all scale-0 peer-focus:scale-100 peer-focus:text-blue-500"
                                        for="fn">Nama Depan</label>
                                </div>
                                <div class="relative">
                                    <input
                                        class="peer w-full rounded-lg border border-gray-200 p-3 text-sm focus:outline-none focus:border-blue-500"
                                        placeholder="Nama Belakang"
                                        type="text"
                                        name="namaBelakang"
                                        id="ln" required />
                                    <label
                                        class="absolute -top-3 left-3 px-2 bg-white text-sm text-gray-500 transition-all scale-0 peer-focus:scale-100 peer-focus:text-blue-500"
                                        for="ln">Nama Belakang</label>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-2">
                                <div class="relative">
                                    <input
                                        id="birth-date"
                                        type="date"
                                        name="tanggalLahir"
                                        class="peer w-full rounded-lg border border-gray-200 p-3 text-sm focus:outline-none focus:border-blue-500" required />
                                    <label
                                        for="birth-date"
                                        class="absolute -top-3 left-3 px-2 bg-white text-sm text-gray-500 transition-all scale-0 peer-focus:scale-100 peer-focus:text-blue-500">
                                        Tanggal Lahir
                                    </label>
                                </div>


                                <div class="relative">
                                    <input
                                        id="paspor-number"
                                        type="text"
                                        placeholder="Nomor Paspor"
                                        name="nomorPaspor"
                                        class="peer w-full rounded-lg border border-gray-200 p-3 text-sm focus:outline-none focus:border-blue-500" required />
                                    <label
                                        for="paspor-number"
                                        class="absolute -top-3 left-3 px-2 bg-white text-sm text-gray-500 transition-all scale-0 peer-focus:scale-100 peer-focus:text-blue-500">
                                        Nomor Paspor
                                    </label>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 items-center">
                                <label for="" class="col-span-1 rounded-lg border border-gray-200 p-3 text-sm"><?php echo $dataPergi[3];
                                                                                                                echo " - ";
                                                                                                                echo $dataPergi[4] ?></label>
                                <input disabled type="num" class="col-span-1 sm:col-span-2 rounded-lg border border-gray-200 p-3 text-sm" value="Rp <?php echo number_format($dataPergi[7] * $_SESSION['jumlahPenumpang'], 0, ',', '.') ?>">
                                <input name="totalPergi" type="number" class="hidden col-span-1 sm:col-span-2 rounded-lg border border-gray-200 p-3 text-sm" value="<?php echo $dataPergi[7] * $_SESSION['jumlahPenumpang'] ?>">
                            </div>
                            <?php
                            if (isset($getPulang)) {
                            ?>


                                <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 items-center">
                                    <label for="" class="col-span-1 rounded-lg border border-gray-200 p-3 text-sm"><?php echo $dataPulang[3];
                                                                                                                    echo " - ";
                                                                                                                    echo $dataPulang[4] ?></label>
                                    <input disabled type="num" class="col-span-1 sm:col-span-2 rounded-lg border border-gray-200 p-3 text-sm" value="Rp <?php echo number_format($dataPulang[7] * $_SESSION['jumlahPenumpang'], 0, ',', '.') ?>">
                                    <input name="totalPulang" type="number" class="hidden col-span-1 sm:col-span-2 rounded-lg border border-gray-200 p-3 text-sm" value="<?php echo $dataPulang[7] * $_SESSION['jumlahPenumpang'] ?>">
                                </div>
                            <?php
                            }
                            ?>
                            <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-2">
                                <div>
                                    <label
                                        for="Option1"
                                        class="block w-full font-medium cursor-pointer rounded-lg border border-gray-200 p-3 text-gray-600 hover:border-indigo-600 has-[:checked]:border-indigo-600 has-[:checked]:bg-indigo-600 has-[:checked]:text-white"
                                        tabindex="0">
                                        <input class="sr-only" id="Option1" type="radio" tabindex="-1" value="bank_transfer" name="paymentMethod" />

                                        <span class="text-sm"> Bank Transfer </span>
                                    </label>
                                </div>

                                <div>
                                    <label
                                        for="Option2"
                                        class="block w-full font-medium cursor-pointer rounded-lg border border-gray-200 p-3 text-gray-600 hover:border-indigo-600 has-[:checked]:border-indigo-600 has-[:checked]:bg-indigo-600 has-[:checked]:text-white"
                                        tabindex="0">
                                        <input class="sr-only" id="Option2" type="radio" tabindex="-1" value="credit_card" name="paymentMethod" />

                                        <span class="text-sm"> Credit Card </span>
                                    </label>
                                </div>


                            </div>


                            <div class="mt-4">
                                <button
                                    type="submit"
                                    name="pesan"
                                    class="inline-block w-full rounded-lg bg-indigo-600 px-5 py-3 font-medium text-white sm:w-auto">
                                    Pesan Sekarang
                                </button>
                            </div>
                        </form>
                    <?php
                } else {
                    // Handle Pergi booking
                    $booking_code_pergi = 'BOOK-' . strtoupper(uniqid());
                    $detail_penerbangan_pergi = [
                        "nomor_penerbangan" => htmlspecialchars($dataPergi[1]),
                        "maskapai" => htmlspecialchars($dataPergi[2]),
                        "asal" => htmlspecialchars($dataPergi[3]),
                        "tujuan" => htmlspecialchars($dataPergi[4]),
                        "waktu_keberangkatan" => htmlspecialchars($dataPergi[5]),
                        "waktu_kedatangan" => htmlspecialchars($dataPergi[6]),
                    ];
                    $total_price_pergi = htmlspecialchars($_POST['totalPergi']);

                    $detail_penerbangan_pergi = json_encode($detail_penerbangan_pergi);
                    $queryBookingPergi = "INSERT INTO bookings (user_id, pesawat_id, booking_code, detail_penerbangan, total_price, status)
                    VALUES ('$user_id', '$getPergi', '$booking_code_pergi', '$detail_penerbangan_pergi', '$total_price_pergi', 'pending')";

                    if (mysqli_query($conn, $queryBookingPergi)) {
                        $booking_id_pergi = mysqli_insert_id($conn);

                        // Insert passengers for Pergi
                        $name = htmlspecialchars($_POST['namaDepan']) . ' ' . htmlspecialchars($_POST['namaBelakang']);
                        $age = date("Y") - date("Y", strtotime(htmlspecialchars($_POST['tanggalLahir'])));
                        $passport_number = htmlspecialchars($_POST['nomorPaspor']);

                        $queryPassengerPergi = "INSERT INTO penumpang (booking_id, name, age, passport_number) 
                        VALUES ('$booking_id_pergi', '$name', '$age', '$passport_number')";
                        if (!mysqli_query($conn, $queryPassengerPergi)) {
                            $passengerErrors[] = mysqli_error($conn);
                        }

                        // Insert payment for Pergi
                        $payment_date = date('Y-m-d H:i:s');
                        $payment_method = htmlspecialchars($_POST['paymentMethod']);
                        $queryPaymentPergi = "INSERT INTO payment (booking_id, payment_date, amount, status, payment_method) 
                        VALUES ('$booking_id_pergi', '$payment_date', '$total_price_pergi', 'pending', '$payment_method')";

                        if (!mysqli_query($conn, $queryPaymentPergi)) {
                            echo "Error inserting payment for Pergi: " . mysqli_error($conn);
                        }
                    } else {
                        echo "Error inserting Pergi booking: " . mysqli_error($conn);
                    }

                    // Handle Pulang booking (if applicable)
                    if (isset($getPulang)) {
                        $booking_code_pulang = 'BOOK-' . strtoupper(uniqid());
                        $detail_penerbangan_pulang = [
                            "nomor_penerbangan" => htmlspecialchars($dataPulang[1]),
                            "maskapai" => htmlspecialchars($dataPulang[2]),
                            "asal" => htmlspecialchars($dataPulang[3]),
                            "tujuan" => htmlspecialchars($dataPulang[4]),
                            "waktu_keberangkatan" => htmlspecialchars($dataPulang[5]),
                            "waktu_kedatangan" => htmlspecialchars($dataPulang[6]),
                        ];
                        $total_price_pulang = htmlspecialchars($_POST['totalPulang']);

                        $detail_penerbangan_pulang = json_encode($detail_penerbangan_pulang);
                        $queryBookingPulang = "INSERT INTO bookings (user_id, pesawat_id, booking_code, detail_penerbangan, total_price, status)
                        VALUES ('$user_id', '$getPulang', '$booking_code_pulang', '$detail_penerbangan_pulang', '$total_price_pulang', 'pending')";

                        if (mysqli_query($conn, $queryBookingPulang)) {
                            $booking_id_pulang = mysqli_insert_id($conn);

                            // Insert passengers for Pulang
                            $queryPassengerPulang = "INSERT INTO penumpang (booking_id, name, age, passport_number) 
                            VALUES ('$booking_id_pulang', '$name', '$age', '$passport_number')";
                            if (!mysqli_query($conn, $queryPassengerPulang)) {
                                $passengerErrors[] = mysqli_error($conn);
                            }

                            // Insert payment for Pulang
                            $queryPaymentPulang = "INSERT INTO payment (booking_id, payment_date, amount, status, payment_method) 
                            VALUES ('$booking_id_pulang', '$payment_date', '$total_price_pulang', 'pending', '$payment_method')";
                            if (!mysqli_query($conn, $queryPaymentPulang)) {
                                echo "Error inserting payment for Pulang: " . mysqli_error($conn);
                            }
                        } else {
                            echo "Error inserting Pulang booking: " . mysqli_error($conn);
                        }
                    }

                    header("Location: listPesanan.php");
                }



                    ?>
                    </div>
                </div>
            </div>

        </section>






    </body>

    </html>