<?php
include 'src/config/koneksi.php'; // Koneksi ke database

// Proses Registrasi
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi input
    if ($name && $email && $password) {
        // Cek apakah email sudah terdaftar
        $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error_message = "Email already taken!";
        } else {
            // Hash password untuk keamanan
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO user (name, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $hashed_password);

            if ($stmt->execute()) {
                // Redirect ke login setelah berhasil registrasi
                header("Location: login.php?registered=true");
                exit();
            } else {
                $error_message = "Error: " . $stmt->error;
            }
        }
    } else {
        $error_message = "All fields are required!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="css/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <!-- Modal Notifikasi -->
    <?php if (isset($_GET['registered'])): ?>
        <div class="fixed inset-0 items-center justify-center bg-gray-800 bg-opacity-50">
            <div class="bg-white p-8 rounded-lg shadow-lg w-96 text-center">
                <h3 class="text-lg font-semibold text-green-600">Account has been registered!</h3>
            </div>
        </div>
    <?php endif; ?>

    <!-- Card Register -->
    <div id="register-form" class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Register</h2>

        <!-- Form Register -->
        <form action="register.php" method="POST">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                <input type="text" id="name" name="name" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm">
            </div>

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

            <button type="submit" name="register" class="w-full py-2 bg-green-600 text-white font-semibold rounded-md">Register</button>
        </form>

        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">Already have an account?</p>
            <a href="login.php" class="text-sm text-blue-600 hover:underline">Sign in here</a>
        </div>
    </div>

</body>
</html>
