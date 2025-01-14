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
                    <table class="w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left font-medium text-gray-900">Maskapai</th>
                                <th class="px-4 py-2 text-left font-medium text-gray-900">Tanggal</th>
                                <th class="px-4 py-2 text-left font-medium text-gray-900">Keberangkatan</th>
                                <th class="px-4 py-2 text-left font-medium text-gray-900">Durasi</th>
                                <th class="px-4 py-2 text-left font-medium text-gray-900">Kedatangan</th>
                                <th class="px-4 py-2 text-left font-medium text-gray-900">Harga</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="flex items-center gap-3 px-4 py-2 font-medium text-gray-900">
                                    <img class="w-20" src="https://logos-world.net/wp-content/uploads/2023/01/Garuda-Indonesia-Logo.jpg" alt="Logo Garuda Indonesia">
                                    Garuda Indonesia
                                </td>
                                <td class="px-4 py-2 text-gray-700">Sel, 14 Jan</td>
                                <td class="px-4 py-2 text-gray-700">04:25</td>
                                <td class="px-4 py-2 text-gray-700">7 Jam</td>
                                <td class="px-4 py-2 text-gray-700">11:25</td>
                                <td class="px-4 py-2 text-gray-700">Rp 2.023.850</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>

</html>