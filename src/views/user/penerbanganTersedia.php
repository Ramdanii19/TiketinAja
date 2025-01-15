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
                <!-- Logo -->
                <a class="block text-indigo-600 text-xl font-semibold" href="landing.php">TiketinAja</a>

                <!-- Navigation -->
                <div class="hidden md:flex items-center gap-4">
                    <a class="rounded-md bg-indigo-600 px-4 py-2 text-sm text-white" href="#">Login</a>
                    <a class="rounded-md border border-indigo-600 px-4 py-2 text-sm text-indigo-600" href="#">Register</a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button class="p-2 rounded bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <main class="container mx-auto p-4">
        <!-- Booking Form -->
        <div class="bg-indigo-500 p-6 md:p-10 lg:p-16 rounded-md shadow-lg">
            <form class="space-y-4">
                <!-- Radio buttons for trip type -->
                <fieldset class="grid grid-cols-2 sm:flex gap-4">
                    <label class="flex justify-start items-center gap-4 bg-white rounded-lg px-5 py-3 text-sm">
                        <input type="radio" name="trip-type" value="round-trip" id="round-trip" class="">
                        <span class="cursor-pointer">Pulang-Pergi</span>
                    </label>
                    <label class="flex justify-start items-center gap-4 bg-white rounded-lg px-5 py-3 text-sm">
                        <input type="radio" name="trip-type" value="one-way" id="one-way" class="">
                        <span class="cursor-pointer">Sekali Jalan</span>
                    </label>
                </fieldset>

                <!-- Input fields -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                    <select class="p-4 rounded-lg w-full border-gray-300">
                        <option>Bandara Asal</option>
                        <option>SOEKARNO HATTA</option>
                        <option>I GUSTI NGURAH RAI</option>
                    </select>
                    <select class="p-4 rounded-lg w-full border-gray-300">
                        <option>Bandara Tujuan</option>
                        <option>SOEKARNO HATTA</option>
                        <option>I GUSTI NGURAH RAI</option>
                    </select>
                    <input type="date" class="p-4 rounded-lg w-full border-gray-300" placeholder="Tanggal Berangkat">
                    <!-- Pulang date -->
                    <input
                        type="date"
                        id="return-date"
                        class="p-4 rounded-lg w-full border-gray-300 placeholder-gray-400"
                        placeholder="Tanggal Pulang">
                    <input type="number" placeholder="Jumlah Penumpang" class="p-4 rounded-lg bg-white text-sm text-gray-500 w-full border-gray-300">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="block w-full rounded bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">
                    Cari Sekarang
                </button>
            </form>

            <script>
                const roundTripRadio = document.getElementById('round-trip');
                const oneWayRadio = document.getElementById('one-way');
                const returnDateInput = document.getElementById('return-date');

                // Default state
                returnDateInput.style.display = 'block';

                // Event listeners
                roundTripRadio.addEventListener('change', () => {
                    if (roundTripRadio.checked) {
                        returnDateInput.style.display = 'block';
                    }
                });

                oneWayRadio.addEventListener('change', () => {
                    if (oneWayRadio.checked) {
                        returnDateInput.style.display = 'none';
                    }
                });
            </script>


        </div>

        <!-- Ticket List -->
        <div class="mt-8 bg-white rounded-md shadow-lg overflow-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Maskapai</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Durasi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <img class="w-16" src="https://logos-world.net/wp-content/uploads/2023/01/Garuda-Indonesia-Logo.jpg" alt="Garuda">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">04:25</td>
                        <td class="px-6 py-4 whitespace-nowrap">7 Jam</td>
                        <td class="px-6 py-4 whitespace-nowrap">Rp 2.023.850</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="formPemesanan.php" class="px-4 py-2 rounded bg-indigo-600 text-white hover:bg-indigo-700">View</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>