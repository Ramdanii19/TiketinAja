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
                <a class="block text-indigo-600" href="#">
                    <h1 class="text-xl font-semibold">TiketinAja</h1>
                </a>
                <div class="flex items-center gap-4">
                    <div class="hidden sm:flex sm:gap-4">
                        <a class="rounded-md bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-indigo-700 border border-indigo-600" href="#">Login</a>
                        <a class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-indigo-600 hover:bg-gray-200 border border-gray-200" href="#">Register</a>
                    </div>
                    <button class="block rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-700 border border-gray-200 md:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <main class="mx-auto">
        <section class="relative w-full bg-cover bg-center bg-no-repeat  py-12"
            style="background-image: url('https://images.unsplash.com/photo-1632099058914-1d1c64915d0b?q=80&w=1971&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
            <div class=" mx-auto max-w-screen-xl px-4">
                <div class="text-center flex items-center justify-center flex-col">
                    <h2 class="text-2xl font-bold text-white sm:text-3xl md:text-5xl">Pesan Tiket Sekarang!</h2>
                    <fieldset class="mt-4 grid grid-cols-2 sm:flex gap-4">
                        <label class="flex justify-between sm:justify-start sm:items-center gap-4 bg-white rounded-lg px-5 py-3 text-sm">
                            <input type="radio" name="trip-type" value="round-trip" id="round-trip" class="">
                            <span class="cursor-pointer">Pulang-Pergi</span>
                        </label>
                        <label class="flex justify-start items-center gap-4 bg-white rounded-lg px-5 py-3 text-sm">
                            <input type="radio" name="trip-type" value="one-way" id="one-way" class="">
                            <span class="cursor-pointer">Sekali Jalan</span>
                        </label>

                    </fieldset>
                    <article class=" mt-4 rounded-lg bg-white p-6 shadow-lg border border-gray-200">
                        <div class="flex flex-wrap flex-grow-0 gap-4 justify-center">
                            <select id="bandaraAsal" class="w-full sm:w-auto rounded-md border-gray-300 px-4 py-2 text-gray-700 sm:text-sm border">
                                <option value="Bandara Asal">Bandara Asal</option>
                                <optgroup label="Jakarta">
                                    <option value="SH">Soekarno Hatta</option>
                                    <option value="HP">Halim Perdanakusuma</option>
                                </optgroup>
                                <optgroup label="Bali">
                                    <option value="NR">Ngurah Rai</option>
                                </optgroup>
                            </select>
                            <button id="swapButton" class="hidden md:block rounded-full border border-indigo-600 bg-indigo-600 p-3 text-white hover:bg-transparent hover:text-indigo-600 ">
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 10L21 7M21 7L18 4M21 7H7M6 14L3 17M3 17L6 20M3 17H17" />
                                </svg>
                            </button>
                            <select id="bandaraTujuan" class="w-full sm:w-auto rounded-md border-gray-300 px-4 py-2 text-gray-700 sm:text-sm border">
                                <option value="Bandara Tujuan">Bandara Tujuan</option>
                                <optgroup label="Yogyakarta">
                                    <option value="YK">Yogyakarta</option>
                                </optgroup>
                                <optgroup label="Jawa Barat">
                                    <option value="KJ">Kertajati</option>
                                </optgroup>
                            </select>
                            <input type="date" class="w-full sm:w-auto rounded-md border-gray-300 px-4 py-2 text-gray-700 sm:text-sm border" />
                            <input
                                type="date"
                                id="return-date"
                                class="w-full sm:w-auto rounded-md border-gray-300 px-4 py-2 text-gray-700 sm:text-sm border"
                                placeholder="Tanggal Pulang">
                            <input type="number" placeholder="Jumlah Penumpang" class="w-full sm:w-auto rounded-md border-gray-300 px-4 py-2 text-gray-700 sm:text-sm border" />
                        </div>

                        <div class="mt-4 flex justify-center">
                            <a class="rounded bg-indigo-600 px-6 py-2 text-sm font-medium text-white hover:bg-indigo-700 border border-indigo-600" href="penerbanganTersedia.php">
                                Cari Sekarang
                            </a>
                        </div>
                    </article>
                </div>
            </div>
        </section>
    </main>
</body>

</html>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const roundTripRadio = document.getElementById('round-trip');
        const oneWayRadio = document.getElementById('one-way');
        const returnDateInput = document.getElementById('return-date');
        const swapButton = document.getElementById("swapButton");

        // Default state
        returnDateInput.style.display = 'block';

        // Event listeners
        roundTripRadio.addEventListener('change', () => {
            returnDateInput.style.display = 'block';
        });

        oneWayRadio.addEventListener('change', () => {
            returnDateInput.style.display = 'none';
        });

        document.getElementById("swapButton").addEventListener("click", function() {
            // Ambil elemen bandaraAsal dan bandaraTujuan
            const bandaraAsal = document.getElementById("bandaraAsal");
            const bandaraTujuan = document.getElementById("bandaraTujuan");

            // Cari parent dari masing-masing elemen
            const parentAsal = bandaraAsal.parentNode;
            const parentTujuan = bandaraTujuan.parentNode;

            // Simpan placeholder untuk membantu pertukaran
            const placeholder = document.createElement("div");

            // Tukar posisi elemen
            parentAsal.replaceChild(placeholder, bandaraAsal);
            parentTujuan.replaceChild(bandaraAsal, bandaraTujuan);
            parentAsal.replaceChild(bandaraTujuan, placeholder);
        });
    });
</script>