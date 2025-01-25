<header class="bg-white shadow">
    <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div>
                <a href="landing.php" class="text-indigo-600 font-bold text-2xl">
                    TiketinAja
                </a>
            </div>

            <?= ($_SESSION['role']) ? '
            <div class="flex items-center gap-4">
            <a href="listPesanan.php" class="rounded-md bg-indigo-700 px-5 py-2.5 text-sm font-medium text-slate-100">
                            Lihat Pesanan
                        </a>
            <a href="../Auth/logout.php" class="rounded-md bg-rose-800 px-5 py-2.5 text-sm font-medium text-slate-100">
                            Logout
                        </a>
                        </div>
                        ' : '<div class="flex items-center gap-4">
                        <a href="../Auth/login.php" class="rounded-md bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white shadow">
                            Login
                        </a>
                        <a href="../Auth/register.php" class="rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-indigo-600">
                            Register
                        </a>
                    </div>'  ?>
        </div>
    </div>
</header>