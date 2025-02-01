<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="../../assets/css/output.css" rel="stylesheet">
</head>

<body>
  <div class="flex w-full ">
    <!-- SideBar -->
    <div class="flex flex-col border-neutral-100 dark:border-neutral-800 w-1/6 ">
      <div class="flex flex-col px-4 py-4 gap-2 text-center">
          <p class="font-bold text-xl text-blue-500">TiketinAja</p>
      </div>
      <div class="menu-wrapper">
        <ul class="space-y-1">
          <li>
            <a href="dashboard.php" class="flex items-center gap-2 bg-blue-800/10 px-4 py-3 text-sm font-medium text-blue-500">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                <path fill-rule="evenodd" d="M3 6a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V6Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3V6ZM3 15.75a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3v-2.25Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3v-2.25Z" clip-rule="evenodd" />
              </svg>
              Dashboard
            </a>
          </li>

          <li>
            <a href="user/dashboard.php" class="flex items-center gap-2 px-4 py-3 text-sm font-medium text-neutral-500 hover:bg-neutral-100 hover:text-neutral-700 dark:hover:bg-neutral-900 dark:hover:text-neutral-300">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                <path fill-rule="evenodd" d="M12 2a5 5 0 1 1 0 10A5 5 0 0 1 12 2ZM3 20a8.97 8.97 0 0 1 9-9 8.97 8.97 0 0 1 9 9H3Z" clip-rule="evenodd"/>
              </svg>
              User
            </a>
          </li>

          <li>
            <a href="pesawat/dashboard.php" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-neutral-500 hover:bg-neutral-100 hover:text-neutral-700 dark:hover:bg-neutral-900 dark:hover:text-neutral-300">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
              <path d="M21.6 13.8c-1.3 0-4.1-.3-7.2-1l-5.3 5.5 2.2 3.5-2.6 2.2-4-5.9-2.9-1c-.6-.3-1-1-1-1.6s.4-1.3 1-1.6l2.9-1 4-5.9 2.6 2.2-2.2 3.5 5.3 5.5c3.1-.7 5.9-1 7.2-1 .5 0 .8.3.8.8v.8c-.1.6-.4.9-.9.9z"/>
            </svg>
              Pesawat
            </a>
          </li>

          <li>
            <a href="booking/dashboard.php" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-neutral-500 hover:bg-neutral-100 hover:text-neutral-700 dark:hover:bg-neutral-900 dark:hover:text-neutral-300">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
              <path d="M9 2h6a2 2 0 0 1 2 2h3v18H4V4h3a2 2 0 0 1 2-2Zm1 11-2 2 4 4 7-7-2-2-5 5-2-2Z"/>
            </svg>
              Booking
            </a>
          </li>

          <li>
            <a href="penumpang/dashboard.php" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-neutral-500 hover:bg-neutral-100 hover:text-neutral-700 dark:hover:bg-neutral-900 dark:hover:text-neutral-300">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
              <path d="M9 2a5 5 0 1 1 0 10A5 5 0 0 1 9 2ZM15 3.5a3.5 3.5 0 1 1 0 7 3.5 3.5 0 0 1 0-7ZM4 20a6 6 0 1 1 12 0H4Zm14-6a4 4 0 0 1 4 4v2h-4v-6Z"/>
            </svg>
              Penumpang
            </a>
          </li>

          <li>
            <a href="logout.php" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-neutral-500 hover:bg-neutral-100 hover:text-neutral-700 dark:hover:bg-neutral-900 dark:hover:text-neutral-300">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
              <path d="M10 3H5v18h5v2H3V1h7v2Zm11 9-4-4v3H9v2h8v3l4-4Z"/>
            </svg>
              Logout
            </a>
          </li>
        </ul>
      </div>
    </div>

    <div class="flex flex-col w-full">
      <!-- Konten -->
      <div class="flex flex-col py-10 px-8">
        <p class="font-bold text-2xl text-blue-500 mb-4">Dashboard</p>
        <div class="grid grid-cols-4 gap-5">
          <div class="flex flex-col rounded-xl gap-4 bg-[#d8f3ed] border-2 border-[#64b0a5] p-4">
            <div class="flex gap-3">
              <div class="bg-white rounded-xl">
                <img src="../../assets/img/icon-user.png" alt="user" class="w-12 p-2">
              </div>
              <div class="">
                <p class="font-bold">10</p>
                <p class="text-slate-700 text-sm font-normal">Total User</p>
              </div>
            </div>
            <a href="/user.php">
              <div class="flex border-t-[1px] border-[#c2e7e4] justify-between items-center w-full">
                <p class="text-[#64b0a5] font-bold text-xs mt-3">See Details</p>
                <img src="../../assets/img/icon-arrow-green.png" alt="arrow" class="max-w-4 mt-3">
              </div>
            </a>
          </div>
          <div class="flex flex-col rounded-xl gap-4 bg-[#e4dfff] border-2 border-[#aca3d3] p-4">
            <div class="flex gap-3">
              <div class="bg-white rounded-xl">
                <img src="../../assets/img/icon-pesawat.png" alt="pesawat" class="w-12 p-2">
              </div>
              <div class="">
                <p class="font-bold">33</p>
                <p class="text-slate-700 text-sm font-normal">Total Pesawat</p>
              </div>
            </div>
            <a href="/pesawat.php">
              <div class="flex border-t-[1px] border-[#dfd9fd] justify-between items-center w-full">
                <p class="text-[#aca3d3] font-bold text-xs mt-3">See Details</p>
                <img src="../../assets/img/icon-arrow-purple.png" alt="arrow" class="max-w-4 mt-3">
              </div>
            </a>
          </div>
          <div class="flex flex-col rounded-xl gap-4 bg-[#fee4cd] border-2 border-[#e0b88e] p-4">
            <div class="flex gap-3">
              <div class="bg-white rounded-xl">
                <img src="../../assets/img/icon-penumpang.png" alt="user" class="w-12 p-2">
              </div>
              <div class="">
                <p class="font-bold">28</p>
                <p class="text-slate-700 text-sm font-normal">Total Penumpang</p>
              </div>
            </div>
            <a href="/penumpang.php">
              <div class="flex border-t-[1px] border-[#fcdcbb] justify-between items-center w-full">
                <p class="text-[#e0b88e] font-bold text-xs mt-3">See Details</p>
                <img src="../../assets/img/icon-arrow-orange.png" alt="arrow" class="max-w-4 mt-3">
              </div>
            </a>
          </div>
          <div class="flex flex-col rounded-xl gap-4 bg-[#ccebff] border-2 border-[#95c2db] p-4">
            <div class="flex gap-3">
              <div class="bg-white rounded-xl">
                <img src="../../assets/img/icon-booking.png" alt="user" class="w-12 p-2">
              </div>
              <div class="">
                <p class="font-bold">20</p>
                <p class="text-slate-700 text-sm font-normal">Total Booking</p>
              </div>
            </div>
            <a href="/booking.php">
              <div class="flex border-t-[1px] border-[#bae2fd] justify-between items-center w-full">
                <p class="text-[#95c2db] font-bold text-xs mt-3">See Details</p>
                <img src="../../assets/img/icon-arrow-blue.png" alt="arrow" class="max-w-4 mt-3">
              </div>
            </a>
          </div>
        </div>
      </div>

    </div>

  </div>


</body>

</html>