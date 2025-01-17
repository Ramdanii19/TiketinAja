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
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-6">
                <div class="lg:col-span-2">
                    <h1 class="text-3xl font-bold text-white">
                        Pilih Tiket Anda
                    </h1>
                </div>

                <div class="overflow-x-auto rounded-lg shadow-lg bg-white lg:col-span-4">
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
                                    <a href="detailPesanan.php" class="px-4 py-2 rounded bg-indigo-600 text-white hover:bg-indigo-700">View</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>

</html>