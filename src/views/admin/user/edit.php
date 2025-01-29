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
</head>
<body>
  <h1>Edit Data User</h1>
  <br><br>
  <?php if(!isset($_POST['submit'])) {?>
  <form method="post">
    <table>
      <tr>
        <td><input type="text" name="id" value="<?php echo $dataUser[0]?>" readonly hidden></td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td><input type="text" name="name" value="<?php echo $dataUser[1]?>"></td>
      </tr>
      <tr>
        <td>Email</td>
        <td>:</td>
        <td><input type="email" name="email" value="<?php echo $dataUser[2]?>"></td>
      </tr>
      <tr>
        <td>Password</td>
        <td>:</td>
        <td><input type="password" name="password" value="<?php echo $dataUser[3]?>"></td>
      </tr>
      <tr>
        <td>Role</td>
        <td>:</td>
        <td>
          <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
              <option value="<?php echo $dataUser[4]?>"><?php echo $dataUser[4]?></option>
              <option value="user">User</option>
              <option value="admin">Admin</option>
          </select>
        </td>
      </tr>
      <tr>
        <td><input type="submit" name="submit" value="simpan"></td>
      </tr>
    </table>
  </form>
  <?php
  } else {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password =$_POST["password"];
    $role = $_POST["role"];

    $updateUser = "UPDATE user SET name='$name', email='$email', password='$password', role='$role'";
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