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
                    <a class="block text-indigo-600" href="#">
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

    <div class="container min-w-full flex items-center justify-center">
        <div class=" bg-indigo-500 p-8 md:p-12 lg:px-96  lg:py-8">
            <div class="text-center ltr:sm:text-left rtl:sm:text-right">
                <fieldset class="w-1/2 grid grid-cols-2 gap-4">
                    <legend class="sr-only">Booking</legend>

                    <div>
                        <label
                            for="DeliveryStandard"
                            class="flex cursor-pointer justify-between gap-4 rounded-lg border border-gray-100 bg-white px-4 py-3 text-xs font-medium shadow-sm hover:border-gray-200 has-[:checked]:border-blue-500 has-[:checked]:ring-1 has-[:checked]:ring-blue-500">
                            <div>
                                <p class="text-gray-700">Pulang-Pergi</p>

                            </div>

                            <input
                                type="radio"
                                name="DeliveryOption"
                                value="DeliveryStandard"
                                id="DeliveryStandard"
                                class="size-4 border-gray-300 text-blue-500"
                                checked />
                        </label>
                    </div>

                    <div>
                        <label
                            for="DeliveryPriority"
                            class="flex cursor-pointer justify-between gap-4 rounded-lg border border-gray-100 bg-white px-4 py-3 text-xs font-medium shadow-sm hover:border-gray-200 has-[:checked]:border-blue-500 has-[:checked]:ring-1 has-[:checked]:ring-blue-500">
                            <div>
                                <p class="text-gray-700">Sekali Jalan</p>

                            </div>

                            <input
                                type="radio"
                                name="DeliveryOption"
                                value="DeliveryPriority"
                                id="DeliveryPriority"
                                class="size-4 border-gray-300 text-blue-500" />
                        </label>
                    </div>
                </fieldset>

                <article class="flex items-center justify-center flex-col gap-5 rounded-xl bg-white p-4 ring ring-indigo-50 sm:p-6 lg:p-4 mt-3">
                    <div class="flex items-center justify-center sm:gap-8 lg:gap-2">
                        <div class="flex items-center justify-between gap-4 rounded-lg border border-gray-100 bg-white px-4 py-3 text-base font-medium shadow-sm hover:border-gray-200 has-[:checked]:border-blue-500 has-[:checked]:ring-1 has-[:checked]:ring-blue-500">
                            <select
                                name="HeadlineAct"
                                id="HeadlineAct"
                                class="mt-1.5 w-full rounded-lg border-gray-300 text-gray-700 sm:text-sm">
                                <option value="">Bandara Asal</option>
                                <optgroup label="Jakarta">
                                    <option value="AK">SOEKARNO HATTA</option>
                                    <option value="AK">HALIM PERDANA KUSUMA</option>
                                </optgroup>
                                <optgroup label="Bali">
                                    <option value="AK">I GUSTI NGURAH RAI</option>
                                </optgroup>
                                <optgroup label="Yogyakarta">
                                    <option value="AK">YOGYAKARTA</option>
                                </optgroup>
                                <optgroup label="Jawa Barat">
                                    <option value="AK">KERTAJATI</option>
                                </optgroup>

                            </select>
                        </div>
                        <a
                            class="inline-block rounded-full border border-indigo-600 bg-indigo-600 p-4 text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500"
                            href="#">
                            <span class="sr-only"> Switch </span>


                            <svg
                                class="size-5 rtl:rotate-180"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M18 10L21 7M21 7L18 4M21 7H7M6 14L3 17M3 17L6 20M3 17H17" />
                            </svg>
                        </a>
                        <div class="flex items-center justify-between gap-4 rounded-lg border border-gray-100 bg-white px-4 py-3 text-base font-medium shadow-sm hover:border-gray-200 has-[:checked]:border-blue-500 has-[:checked]:ring-1 has-[:checked]:ring-blue-500">
                            <select
                                name="HeadlineAct"
                                id="HeadlineAct"
                                class="mt-1.5 w-full rounded-lg border-gray-300 text-gray-700 sm:text-sm">
                                <option value="">Bandara Tujuan</option>
                                <optgroup label="Jakarta">
                                    <option value="AK">SOEKARNO HATTA</option>
                                    <option value="AK">HALIM PERDANA KUSUMA</option>
                                </optgroup>
                                <optgroup label="Bali">
                                    <option value="AK">I GUSTI NGURAH RAI</option>
                                </optgroup>
                                <optgroup label="Yogyakarta">
                                    <option value="AK">YOGYAKARTA</option>
                                </optgroup>
                                <optgroup label="Jawa Barat">
                                    <option value="AK">KERTAJATI</option>
                                </optgroup>

                            </select>
                        </div>
                        <div class="flex cursor-pointer justify-between gap-4 rounded-lg border border-gray-100 bg-white px-4 py-3 text-base font-medium shadow-sm hover:border-gray-200 has-[:checked]:border-blue-500 has-[:checked]:ring-1 has-[:checked]:ring-blue-500">
                            <input type="date">
                        </div>
                        <div class="flex text-center cursor-pointer justify-between gap-4 rounded-lg border border-gray-100 bg-white px-4 py-3 text-base font-medium shadow-sm hover:border-gray-200 has-[:checked]:border-blue-500 has-[:checked]:ring-1 has-[:checked]:ring-blue-500">
                            <input type="number" placeholder="Jumlah Penumpang">
                        </div>

                        <a
                            class="inline-block rounded bg-indigo-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring "
                            href=" #">
                            Cari Sekarang
                        </a>
                    </div>

                </article>





                <div class="bg-white mt-2 pt-2 rounded-lg">
                    <div class="flex justify-evenly items-center ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="pb-2 size-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>

                        <nav class=" flex items-center justify-center gap-6" aria-label="Tabs">
                            <a
                                href="#"
                                class="flex flex-col shrink-0 border-b border-transparent px-1 pb-4 text-base font-medium text-slate-900 hover:border-gray-300 hover:text-gray-700 focus:border-sky-500">
                                Sen, 13 Jan
                                <span class="text-xs font-normal">Rp 800.000</span>
                            </a>
                            <a
                                href="#"
                                class="flex flex-col shrink-0 border-b border-transparent px-1 pb-4 text-base font-medium text-slate-900 hover:border-gray-300 hover:text-gray-700 focus:border-sky-500">
                                Sen, 13 Jan
                                <span class="text-xs font-normal">Rp 800.000</span>
                            </a>
                            <a
                                href="#"
                                class="flex flex-col shrink-0 border-b border-transparent px-1 pb-4 text-base font-medium text-slate-900 hover:border-gray-300 hover:text-gray-700 focus:border-sky-500">
                                Sen, 13 Jan
                                <span class="text-xs font-normal">Rp 800.000</span>
                            </a>
                            <a
                                href="#"
                                class="flex flex-col shrink-0 border-b border-transparent px-1 pb-4 text-base font-medium text-slate-900 hover:border-gray-300 hover:text-gray-700 focus:border-sky-500">
                                Sen, 13 Jan
                                <span class="text-xs font-normal">Rp 800.000</span>
                            </a>
                            <a
                                href="#"
                                class="flex flex-col shrink-0 border-b border-transparent px-1 pb-4 text-base font-medium text-slate-900 hover:border-gray-300 hover:text-gray-700 focus:border-sky-500">
                                Sen, 13 Jan
                                <span class="text-xs font-normal">Rp 800.000</span>
                            </a>
                            <a
                                href="#"
                                class="flex flex-col shrink-0 border-b border-transparent px-1 pb-4 text-base font-medium text-slate-900 hover:border-gray-300 hover:text-gray-700 focus:border-sky-500">
                                Sen, 13 Jan
                                <span class="text-xs font-normal">Rp 800.000</span>
                            </a>
                            <a
                                href="#"
                                class="flex flex-col shrink-0 border-b border-transparent px-1 pb-4 text-base font-medium text-slate-900 hover:border-gray-300 hover:text-gray-700 focus:border-sky-500">
                                Sen, 13 Jan
                                <span class="text-xs font-normal">Rp 800.000</span>
                            </a>


                        </nav>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="pb-2 size-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                        </svg>


                    </div>
                </div>


            </div>
        </div>
    </div>

</body>

</html>