<!-- <?php
        $getID = $_GET['id'];
        $getJML = $_GET['jumlah'];
        $getTIPE = $_GET['tipe'];
        ?> -->
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

    <section class="relative bg-indigo-600">
        <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-5">
                <div class="lg:col-span-2">
                    <h1 class="max-w-xl text-3xl font-bold text-slate-100">
                        Form Pemesanan
                    </h1>
                </div>

                <div class="rounded-lg bg-white p-8 shadow-lg lg:col-span-3 lg:p-12">
                    <form id="order-form" class="space-y-4">
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div class="relative">
                                <input
                                    class="peer w-full rounded-lg border border-gray-200 p-3 text-sm focus:outline-none focus:border-blue-500"
                                    placeholder="Nama Depan"
                                    type="text"
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
                                    id="ln" required />
                                <label
                                    class="absolute -top-3 left-3 px-2 bg-white text-sm text-gray-500 transition-all scale-0 peer-focus:scale-100 peer-focus:text-blue-500"
                                    for="ln">Nama Belakang</label>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">
                            <div class="relative">
                                <select
                                    name="gender"
                                    id="gender"
                                    class="peer w-full rounded-lg border border-gray-200 p-3 text-sm focus:outline-none focus:border-blue-500" required>
                                    <option value="" disabled selected>Jenis Kelamin</option>
                                    <option value="male">Laki-laki</option>
                                    <option value="female">Perempuan</option>
                                </select>
                                <label
                                    for="gender"
                                    class="absolute -top-3 left-3 px-2 bg-white text-sm text-gray-500 transition-all scale-0 peer-focus:scale-100 peer-focus:text-blue-500">
                                    Jenis Kelamin
                                </label>
                            </div>
                            <div class="relative">
                                <input
                                    id="birth-date"
                                    type="date"
                                    class="peer w-full rounded-lg border border-gray-200 p-3 text-sm focus:outline-none focus:border-blue-500" required />
                                <label
                                    for="birth-date"
                                    class="absolute -top-3 left-3 px-2 bg-white text-sm text-gray-500 transition-all scale-0 peer-focus:scale-100 peer-focus:text-blue-500">
                                    Tanggal Lahir
                                </label>
                            </div>
                            <div class="relative">
                                <input
                                    id="phone-number"
                                    type="tel"
                                    placeholder="Nomor Telepon"
                                    class="peer w-full rounded-lg border border-gray-200 p-3 text-sm focus:outline-none focus:border-blue-500" required />
                                <label
                                    for="phone-number"
                                    class="absolute -top-3 left-3 px-2 bg-white text-sm text-gray-500 transition-all scale-0 peer-focus:scale-100 peer-focus:text-blue-500">
                                    Nomor Telepon
                                </label>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button
                                type="submit"
                                class="inline-block w-full rounded-lg bg-indigo-600 px-5 py-3 font-medium text-white sm:w-auto">
                                Pesan Sekarang
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <section id="order-modal" class="flex fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 items-center justify-center z-50">
            <div class="rounded-3xl bg-white p-8 text-center sm:p-12">
                <p class="text-sm font-semibold uppercase tracking-widest text-indigo-500">
                    Pesanan diproses
                </p>
                <h2 class="mt-6 text-3xl font-bold">Terimakasih Atas Pemesanan Anda!</h2>
                <a href="listPesanan.php"
                    id="close-modal"
                    class="mt-8 inline-block w-full rounded-full bg-indigo-600 py-4 text-sm font-bold text-white shadow-xl">
                    Lihat Pesanan
                </a>
            </div>
        </section>
    </section>

    <script>
        const form = document.getElementById('order-form');
        const modal = document.getElementById('order-modal');
        const closeModal = document.getElementById('close-modal');

        form.addEventListener('submit', (e) => {
            e.preventDefault(); // Prevent form from submitting
            modal.classList.remove('hidden'); // Show modal
        });

        closeModal.addEventListener('click', () => {
            modal.classList.add('hidden'); // Hide modal
        });
    </script>




</body>

</html>