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

    <section class="bg-indigo-600">
        <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-5">
                <div class="lg:col-span-2 ">
                    <h1 class="max-w-xl text-3xl font-bold text-slate-100">
                        Form Pemesanan
                    </h1>

                </div>

                <div class="rounded-lg bg-white p-8 shadow-lg lg:col-span-3 lg:p-12">
                    <form action="#" class="space-y-4">

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div class="relative">
                                <input
                                    class="peer w-full rounded-lg border border-gray-200 p-3 text-sm focus:outline-none focus:border-blue-500"
                                    placeholder="Nama Depan"
                                    type="text"
                                    id="ln" />
                                <label class="absolute -top-3 left-3 px-2 bg-white text-sm text-gray-500 transition-all scale-0 peer-focus:scale-100 peer-focus:text-blue-500" for="fn">Nama Depan</label>
                            </div>
                            <div class="relative">
                                <input
                                    class="peer w-full rounded-lg border border-gray-200 p-3 text-sm focus:outline-none focus:border-blue-500"
                                    placeholder="Nama Belakang"
                                    type="text"
                                    id="ln" />
                                <label class="absolute -top-3 left-3 px-2 bg-white text-sm text-gray-500 transition-all scale-0 peer-focus:scale-100 peer-focus:text-blue-500" for="fn">Nama Belakang</label>
                            </div>


                        </div>

                        <div class="grid grid-cols-1 gap-4 text-center sm:grid-cols-3">
                            <div class="relative">
                                <select
                                    name="HeadlineAct"
                                    id="HeadlineAct"
                                    class="peer w-full rounded-lg border border-gray-200 p-3 text-sm focus:outline-none focus:border-blue-500">
                                    <option value="JM">Laki-laki</option>
                                    <option value="SRV">Perempuan</option>
                                </select>
                                <label
                                    for="tanggal-lahir"
                                    class="absolute -top-3 left-3 px-2 bg-white text-sm text-gray-500 transition-all scale-0 peer-focus:scale-100 peer-focus:text-blue-500">
                                    Tanggal Lahir
                                </label>
                            </div>
                            <div class="relative">
                                <input
                                    id="tanggal-lahir"
                                    type="date"
                                    class="peer w-full rounded-lg border border-gray-200 p-3 text-sm focus:outline-none focus:border-blue-500" />
                                <label
                                    for="tanggal-lahir"
                                    class="absolute -top-3 left-3 px-2 bg-white text-sm text-gray-500 transition-all scale-0 peer-focus:scale-100 peer-focus:text-blue-500">
                                    Tanggal Lahir
                                </label>
                            </div>
                            <div class="relative">
                                <input
                                    id="tanggal-lahir"
                                    type="telp" placeholder="Nomor Telepon"
                                    class="peer w-full rounded-lg border border-gray-200 p-3 text-sm focus:outline-none focus:border-blue-500" />
                                <label
                                    for="tanggal-lahir"
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
    </section>

</body>

</html>