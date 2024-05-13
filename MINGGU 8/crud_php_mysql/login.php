<?php
  // Variabel untuk menyimpan pesan kesalahan
  $error_message = "";

  // Variabel untuk menyimpan username dan password
  $username = "";
  $password = "";

  // Memeriksa apakah form telah disubmit
  if (isset($_POST["submit"])) {
    // Mengambil nilai username dan password dari form, membersihkan dan melarang kode HTML menggunakan htmlentities, strip_tags, dan trim
    $username = htmlentities(strip_tags(trim($_POST["username"])));
    $password = htmlentities(strip_tags(trim($_POST["password"])));

    // Memeriksa apakah username kosong
    if (empty($username)) {
      $error_message .= "- Username belum diisi <br>";
    }

    // Memeriksa apakah password kosong
    if (empty($password)) {
      $error_message .= "- Password belum diisi <br>";
    }

    // Jika tidak ada pesan kesalahan, lanjutkan dengan proses autentikasi
    if ($error_message === "") {
      // Memasukkan file connection.php untuk melakukan koneksi ke database
      include("connection.php");

      // Melakukan escape pada username dan password untuk menghindari SQL injection
      $username = mysqli_real_escape_string($connection, $username);
      $password = mysqli_real_escape_string($connection, $password);

      // Mengenkripsi password menggunakan fungsi sha1 sebelum membandingkannya dengan database
      $password_sha1 = sha1($password);

      // Query untuk mencari admin dengan username dan password yang sesuai
      $query = "
        SELECT * FROM admin 
        WHERE username = '$username' AND password = '$password_sha1'";
      $result = mysqli_query($connection, $query);

      // Memeriksa apakah hasil query menghasilkan baris atau tidak
      if(mysqli_num_rows($result) == 0 )  {
        // Jika tidak ada baris yang cocok, tambahkan pesan kesalahan
        $error_message .= "- Username dan/atau Password tidak sesuai";
      }

      // Membebaskan hasil query dan menutup koneksi database
      mysqli_free_result($result);
      mysqli_close($connection);

      // Jika tidak ada pesan kesalahan, lanjutkan dengan membuat sesi dan mengarahkan pengguna ke halaman "student_view.php"
      if ($error_message === "") {
        session_start(); // Memulai sesi
        $_SESSION["username"] = $username; // Menyimpan username dalam sesi
        header("Location: student_view.php"); // Mengarahkan pengguna ke halaman "student_view.php"
        exit; // Menghentikan eksekusi skrip setelah header location
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Mahasiswa</title>
  <link rel="stylesheet" href="style/login.css">
</head>
<body>
  <div class="container">
    <h1>Data Mahasiswa</h1>
    <?php
      // Menampilkan pesan kesalahan jika ada
      if ($error_message !== "")
        echo "<div class='error'>$error_message</div>";
    ?>
    <!-- Formulir login -->
    <form action="login.php" method="post">
      <fieldset>
        <legend>Login</legend>
        <p>
          <label for="username">Username : </label>
          <!-- Input untuk username, nilai defaultnya adalah nilai yang dimasukkan sebelumnya -->
          <input type="text" name="username" id="username" value="<?php echo $username ?>" placeholder="Masukan username anda">
        </p>
        <p>
          <label for="password">Password : </label>
          <!-- Input untuk password, nilai defaultnya adalah nilai yang dimasukkan sebelumnya -->
          <input type="password" name="password" id="password" value="<?php echo $password ?>" placeholder="Masukan password anda">
        </p>
        <p>
          <!-- Tombol untuk mengirimkan formulir -->
          <input type="submit" name="submit" value="Log In">
        </p>
      </fieldset>
    </form>
  </div>
</body>
</html>
