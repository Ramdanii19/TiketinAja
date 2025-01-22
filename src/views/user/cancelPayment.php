<?php
include "../../config/koneksi.php";

if (isset($_GET['id'])) {
    $bookingID = $_GET['id'];

    // Update payment status to "completed"
    $queryPayment = "UPDATE payment SET status = 'failed' WHERE booking_id = '$bookingID'";

    // Update booking status to "confirmed"
    $queryBooking = "UPDATE bookings SET status = 'canceled' WHERE id = '$bookingID'";

    if (mysqli_query($conn, $queryPayment) && mysqli_query($conn, $queryBooking)) {
        // Redirect back with a success message
        header("Location: listPesanan.php?message=success");
    } else {
        // Redirect back with an error message
        header("Location: listPesanan.php?message=error");
    }
} else {
    header("Location: listPesanan.php?message=invalid");
}
