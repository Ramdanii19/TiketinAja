<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TiketinAja</title>
    <link href="../../assets/css/output.css" rel="stylesheet">

</head>

<body>
    <header class="bg-white">
        <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="md:flex md:items-center md:gap-12">
                    <a class="block text-indigo-600" href="landing.php">
                        <h1 class="h-8 font-semibold text-xl">TiketinAja</h1>
                    </a>
                </div>



                <div class="flex items-center gap-4">
                    <div class="sm:flex sm:gap-4">
                        <a
                            class="rounded-md bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white shadow"
                            href="#">
                            Login
                        </a>

                        <div class="hidden sm:flex">
                            <a
                                class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-indigo-600"
                                href="#">
                                Register
                            </a>
                        </div>
                    </div>

                    <div class="block md:hidden">
                        <button class="rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="size-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
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
        <section id="order-modal" class="hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center z-50">
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