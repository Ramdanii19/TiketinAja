<?php
session_start();
include 'koneksi.php'; // Koneksi ke database

// Proses Login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi input
    if ($email && $password) {
        // Cek apakah email terdaftar
        $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $user['email'];
                $_SESSION['name'] = $user['name'];

                // Redirect ke halaman dashboard setelah login
                header("Location: src/views/admin/dashboard.php");
                exit();
            } else {
                $error_message = "Invalid email or password!";
            }
        } else {
            $error_message = "No user found with this email!";
        }
    } else {
        $error_message = "Email and password are required!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="src/assets/css/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <!-- Card Login -->
    <div id="login-form" class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Login</h2>

        <!-- Form Login -->
        <form action="login.php" method="POST">
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" id="email" name="email" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" id="password" name="password" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm">
            </div>

            <?php if (isset($error_message)): ?>
                <div class="text-red-600 text-sm mb-4"><?= $error_message ?></div>
            <?php endif; ?>

            <button type="submit" name="login" class="w-full py-2 bg-blue-600 text-white font-semibold rounded-md">Login</button>
        </form>

        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">Don't have an account?</p>
            <a href="src/views/Auth/register.php" class="text-sm text-blue-600 hover:underline">Register here</a>
        </div>
    </div>

</body>
</html>
