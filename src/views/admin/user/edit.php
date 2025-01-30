<?php
include "../../../config/koneksi.php";

$getId = $_GET["id"];
$editUser = "SELECT * FROM user WHERE id = '$getId'";
$resultUser = mysqli_query($conn, $editUser);
$dataUser = mysqli_fetch_array($resultUser);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data User</title>
  <link href="../../../assets/css/output.css" rel="stylesheet">
</head>
<body>
  <?php if(!isset($_POST['submit'])) {?>
  <div class="mx-auto w-1/2 px-4 py-16 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-lg">
      <h1 class="text-center text-2xl font-bold text-indigo-600 sm:text-3xl">Edit Data User</h1>
      <form method="POST" class="mb-0 mt-6 space-y-4 rounded-lg p-4 shadow-lg sm:p-6 lg:p-8">
        <div>
          <input
                type="text"
                name="id"
                class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                value="<?php echo $dataUser[0]?>" hidden
              />
          <label for="name" class="sr-only">Nama</label>
          <div class="relative">
            <input
              type="text"
              name="name"
              class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
              value="<?php echo $dataUser[1]?>"
            />
          </div>
        </div>
        <div>
          <label for="email" class="sr-only">Email</label>
          <div class="relative">
            <input
              type="email"
              name="email"
              class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
              value="<?php echo $dataUser[2]?>"
            />
          </div>
        </div>
        <div>
          <label for="password" class="sr-only">Password</label>
          <div class="relative">
            <input
              type="password"
              name="password"
              class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
              value="<?php echo $dataUser[3]?>"
            />
          </div>
        </div>
        <div>
          <label for="role" class="sr-only">Role</label>
          <div class="relative">
          <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                <option value="<?php echo $dataUser[4]?>"><?php echo $dataUser[4]?></option>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <button
          type="submit"
          name="submit"
          class="block w-full rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white mt-4"
        >
          Update Data
        </button>
      </form>
    </div>
  </div>
  <?php
  } else {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password =$_POST["password"];
    $role = $_POST["role"];

    $updateUser = "UPDATE user SET name='$name', email='$email', password='$password', role='$role' WHERE id='$id'";
    $queryUser = mysqli_query($conn, $updateUser);


    if($queryUser) {
      echo"<script>alert('Daftar Berhasil Disimpan !') </script>";  
      echo"<script type='text/javascript'>window.location = 'dashboard.php'</script>";  
    } else {
      echo"<script>alert('Daftar Gagal Disimpan !') </script>";  
      echo"<script type='text/javascript'>window.location = 'dashboard.php'</script>";  
    }
  }
  ?>

</body>
</html>