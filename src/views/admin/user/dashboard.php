<?php
include "../../../config/koneksi.php";
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  header("Location: ../../Auth/login.php");
  exit;
}
$query = "SELECT * FROM user";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User</title>
  <link href="../../../assets/css/output.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
            <a href="../dashboard.php" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-neutral-500 hover:bg-neutral-100 hover:text-neutral-700 dark:hover:bg-neutral-900 dark:hover:text-neutral-300">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                <path fill-rule="evenodd" d="M3 6a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3V6Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3v2.25a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3V6ZM3 15.75a3 3 0 0 1 3-3h2.25a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3v-2.25Zm9.75 0a3 3 0 0 1 3-3H18a3 3 0 0 1 3 3V18a3 3 0 0 1-3 3h-2.25a3 3 0 0 1-3-3v-2.25Z" clip-rule="evenodd" />
              </svg>
              Dashboard
            </a>
          </li>

          <li>
            <a href="./dashboard.php" class="flex items-center gap-2 bg-blue-800/10 px-4 py-3 text-sm font-medium text-blue-500">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                <path fill-rule="evenodd" d="M12 2a5 5 0 1 1 0 10A5 5 0 0 1 12 2ZM3 20a8.97 8.97 0 0 1 9-9 8.97 8.97 0 0 1 9 9H3Z" clip-rule="evenodd" />
              </svg>
              User
            </a>
          </li>

          <li>
            <a href="../pesawat/dashboard.php" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-neutral-500 hover:bg-neutral-100 hover:text-neutral-700 dark:hover:bg-neutral-900 dark:hover:text-neutral-300">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                <path d="M21.6 13.8c-1.3 0-4.1-.3-7.2-1l-5.3 5.5 2.2 3.5-2.6 2.2-4-5.9-2.9-1c-.6-.3-1-1-1-1.6s.4-1.3 1-1.6l2.9-1 4-5.9 2.6 2.2-2.2 3.5 5.3 5.5c3.1-.7 5.9-1 7.2-1 .5 0 .8.3.8.8v.8c-.1.6-.4.9-.9.9z" />
              </svg>
              Pesawat
            </a>
          </li>

          <li>
            <a href="../booking/dashboard.php" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-neutral-500 hover:bg-neutral-100 hover:text-neutral-700 dark:hover:bg-neutral-900 dark:hover:text-neutral-300">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                <path d="M9 2h6a2 2 0 0 1 2 2h3v18H4V4h3a2 2 0 0 1 2-2Zm1 11-2 2 4 4 7-7-2-2-5 5-2-2Z" />
              </svg>
              Booking
            </a>
          </li>

          <li>
            <a href="../penumpang/dashboard.php" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-neutral-500 hover:bg-neutral-100 hover:text-neutral-700 dark:hover:bg-neutral-900 dark:hover:text-neutral-300">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                <path d="M9 2a5 5 0 1 1 0 10A5 5 0 0 1 9 2ZM15 3.5a3.5 3.5 0 1 1 0 7 3.5 3.5 0 0 1 0-7ZM4 20a6 6 0 1 1 12 0H4Zm14-6a4 4 0 0 1 4 4v2h-4v-6Z" />
              </svg>
              Penumpang
            </a>
          </li>

          <li>
            <a href="../logout.php" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-neutral-500 hover:bg-neutral-100 hover:text-neutral-700 dark:hover:bg-neutral-900 dark:hover:text-neutral-300">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                <path d="M10 3H5v18h5v2H3V1h7v2Zm11 9-4-4v3H9v2h8v3l4-4Z" />
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
        <p class="font-bold text-2xl text-blue-500">Data User</p>

        <!-- Modal toggle -->
        <div class="flex justify-end">
          <button data-modal-target="create-modal" data-modal-toggle="create-modal" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Tambah Data User
          </button>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="px-6 py-3">
                  <div class="flex items-center">
                    Nama
                    <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                      </svg></a>
                  </div>
                </th>
                <th scope="col" class="px-6 py-3">
                  <div class="flex items-center">
                    Email
                    <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                      </svg></a>
                  </div>
                </th>
                <th scope="col" class="px-6 py-3">
                  <div class="flex items-center">
                    Role
                    <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                      </svg></a>
                  </div>
                </th>
                <th scope="col" class="px-6 py-3">
                  <div class="flex items-center">
                    Action
                    <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                      </svg></a>
                  </div>
                </th>
              </tr>
            </thead>

            <tbody>
              <?php
              if ($count > 0) {
                while ($data = mysqli_fetch_assoc($result)) { ?>
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class='px-6 py-4'><?php echo $data['name']; ?></td>
                    <td class='px-6 py-4'><?php echo $data['email']; ?></td>
                    <td class='px-6 py-4'><?php echo $data['role']; ?></td>
                    <td class='px-6 py-4 flex gap-3 w-full'>
                      <a href="edit.php?id=<?php echo $data['id']; ?>" class="text-blue-500"><i class="fas fa-edit"></i></a>
                      <a href='delete.php?id=<?php echo $data['id']; ?>' onclick='return confirm("Yakin ingin menghapus?")' class="text-red-500"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
              <?php  }
              } else {
                echo "<tr>
                                    <td colspan='9' align='center' height='20'>
                                      <div> Belum ada data Mahasiswa </div>
                                    </td>
                                </tr>";
              }
              ?>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Create modal -->
        <div id="create-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
          <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                  Create Data User
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="create-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                  </svg>
                  <span class="sr-only">Close modal</span>
                </button>
              </div>
              <!-- Modal body -->
              <?php
              if (!isset($_POST['submit'])) {
              ?>
                <form class="p-4 md:p-5" method="POST">
                  <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                      <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="John Doe" required="">
                    </div>
                    <div class="col-span-2">
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                      <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="JhonDoe@gmail.com" required="">
                    </div>
                    <div class="col-span-2">
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Passoword</label>
                      <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="********" required="">
                    </div>
                    <div class="col-span-2">
                      <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                      <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                        <option value="user">Select role</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                      </select>
                    </div>
                  </div>
                  <button type="submit" name="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                    </svg>
                    Tambah Data
                  </button>
                </form>
              <?php
              } else {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $role = $_POST["role"];

                $insertUser = "INSERT INTO user (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')";
                $queryUser = mysqli_query($conn, $insertUser);

                if ($queryUser) {
                  echo "<script>alert('Daftar Berhasil Disimpan !') </script>";
                  echo "<script type='text/javascript'>window.location = 'dashboard.php'</script>";
                } else {
                  echo "<script>alert('Daftar Gagal Disimpan !') </script>";
                  echo "<script type='text/javascript'>window.location = 'dashboard.php'</script>";
                }
              }
              ?>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script>
    const modalToggleButtons = document.querySelectorAll('[data-modal-toggle]');
    const closeModalButtons = document.querySelectorAll('[data-modal-toggle="create-modal"]');
    const modals = document.querySelectorAll('.hidden');

    modalToggleButtons.forEach((button) => {
      button.addEventListener('click', () => {
        const target = button.getAttribute('data-modal-target');
        const modal = document.getElementById(target);

        if (modal) {
          modal.classList.toggle('hidden');
          modal.classList.toggle('flex');
        }
      });
    });

    closeModalButtons.forEach((button) => {
      button.addEventListener('click', () => {
        const modal = button.closest('.fixed'); // Find the parent modal container
        if (modal) {
          modal.classList.add('hidden');
          modal.classList.remove('flex');
        }
      });
    });

    modals.forEach((modal) => {
      modal.addEventListener('click', (e) => {
        if (e.target === modal) {
          modal.classList.add('hidden');
          modal.classList.remove('flex');
        }
      });
    });
  </script>

  <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>

</html>