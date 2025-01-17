<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link href="../../assets/css/output.css" rel="stylesheet">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <script>
        // Fungsi untuk mengubah tampilan antara form login dan register
        function toggleForms(formType) {
            if (formType === 'register') {
                document.getElementById('login-form').style.display = 'none';
                document.getElementById('register-form').style.display = 'block';
            } else {
                document.getElementById('login-form').style.display = 'block';
                document.getElementById('register-form').style.display = 'none';
            }
        }

        // Menampilkan modal notifikasi ketika registrasi berhasil
        function showNotification() {
            const modal = document.getElementById('notification-modal');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 3000); // Hide modal after 3 seconds
        }

        // Memastikan modal muncul hanya ketika halaman login pertama kali dimuat setelah registrasi
        window.onload = function () {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('registered') && urlParams.get('registered') === 'true') {
                showNotification(); // Show the registration success modal
            }
        };
    </script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <!-- Modal Notifikasi -->
    <div id="notification-modal" class="fixed inset-0 items-center justify-center bg-gray-800 bg-opacity-50 hidden">
        <div class="bg-white p-8 rounded-lg shadow-lg w-96 text-center">
            <h3 class="text-lg font-semibold text-green-600">Account has been registered!</h3>
        </div>
    </div>

    <!-- Card Login -->
    <div id="login-form" class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Login</h2>

        <!-- Form Login -->
        <form action="/login" method="POST">
            <!-- Input Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" id="email" name="email" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <!-- Input Password -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" id="password" name="password" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <!-- Button Login -->
            <button type="submit"
                class="w-full py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Login
            </button>
        </form>

        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">Don't have an account?</p>
            <a href="javascript:void(0);" onclick="toggleForms('register')"
                class="text-sm text-blue-600 hover:underline">Register here</a>
        </div>
    </div>

    <!-- Card Register -->
    <div id="register-form" class="bg-white p-8 rounded-lg shadow-lg w-96 mt-8" style="display: none;">
        <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Register</h2>

        <!-- Form Register -->
        <form action="/register" method="POST">
            <!-- Input Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                <input type="text" id="name" name="name" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <!-- Input Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input type="email" id="email" name="email" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <!-- Input Password -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input type="password" id="password" name="password" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <!-- Button Register -->
            <button type="submit"
                class="w-full py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                Register
            </button>
        </form>

        <div class="mt-4 text-center">
            <p class="text-sm text-gray-600">Already have an account?</p>
            <a href="javascript:void(0);" onclick="toggleForms('login')"
                class="text-sm text-blue-600 hover:underline">Sign in here</a>
        </div>
    </div>

</body>

</html>