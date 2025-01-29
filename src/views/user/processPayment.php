<?php
include "../../config/koneksi.php";

if (isset($_GET['id'])) {
    $bookingID = $_GET['id'];

    // Update payment status to "completed"
    $queryPayment = "UPDATE payment SET status = 'completed' WHERE booking_id = '$bookingID'";

    // Update booking status to "confirmed"
    $queryBooking = "UPDATE bookings SET status = 'confirmed' WHERE id = '$bookingID'";

    // Get the booked flight details and the number of booked seats
    $queryPesawat = "SELECT pesawat_id, total_price 
                     FROM bookings 
                     WHERE id = '$bookingID'";

    $result = mysqli_query($conn, $queryPesawat);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $pesawatID = $row['pesawat_id'];
        $totalPrice = $row['total_price'];

        // Reduce available seats
        $queryUpdateSeats = "UPDATE pesawat SET kursi = kursi - price/$totalPrice WHERE id = '$pesawatID'";

        // Execute all queries
        if (mysqli_query($conn, $queryPayment) && mysqli_query($conn, $queryBooking) && mysqli_query($conn, $queryUpdateSeats)) {
            // Redirect back with a success message
            header("Location: listPesanan.php?message=success");
            exit();
        } else {
            // Redirect back with an error message
            header("Location: listPesanan.php?message=error");
            exit();
        }
    } else {
        // Redirect back with an error message if booking not found
        header("Location: listPesanan.php?message=notfound");
        exit();
    }
} else {
    header("Location: listPesanan.php?message=invalid");
    exit();
}
