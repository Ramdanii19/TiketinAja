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
                <div class="lg:col-span-2 flex flex-col gap-2">
                    <h1 class="text-3xl font-bold text-white">
                        Detail Pesanan
                    </h1>
                    <img class="bg-white border border-gray-300 rounded-lg " src="https://upload.wikimedia.org/wikipedia/commons/d/d0/QR_code_for_mobile_English_Wikipedia.svg" alt="">
                </div>
                <div class="flex flex-col gap-3 overflow-x-auto rounded-lg shadow-lg pt-5 bg-white lg:col-span-4">
                    <div class="flow-root">
                        <dl class="-my-3 divide-y divide-gray-100 text-sm">
                            <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4 px-5">
                                <dt class="font-medium text-gray-900">Title</dt>
                                <dd class="text-gray-700 sm:col-span-2">Mr</dd>
                            </div>

                            <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4 px-5">
                                <dt class="font-medium text-gray-900">Name</dt>
                                <dd class="text-gray-700 sm:col-span-2">John Frusciante</dd>
                            </div>

                            <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4 px-5">
                                <dt class="font-medium text-gray-900">Occupation</dt>
                                <dd class="text-gray-700 sm:col-span-2">Guitarist</dd>
                            </div>

                            <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4 px-5">
                                <dt class="font-medium text-gray-900">Salary</dt>
                                <dd class="text-gray-700 sm:col-span-2">$1,000,000+</dd>
                            </div>

                            <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4 px-5">
                                <dt class="font-medium text-gray-900 sm:col-span-1">Bio</dt>
                                <dd class="text-gray-700 sm:col-span-2">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et facilis debitis explicabo
                                    doloremque impedit nesciunt dolorem facere, dolor quasi veritatis quia fugit aperiam
                                    aspernatur neque molestiae labore aliquam soluta architecto?
                                </dd>
                            </div>
                        </dl>
                    </div>
                    <div class="grid text-center sm:justify-end p-2.5">
                        <a href="#" class="rounded-md bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white shadow">
                            Kembali
                        </a>
                    </div>
                </div>


            </div>
        </div>
    </section>
</body>

</html>