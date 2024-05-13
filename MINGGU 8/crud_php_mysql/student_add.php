<?php
  // Mulai sesi
  session_start();
  // Periksa apakah pengguna telah login. Jika belum, arahkan ke halaman login.
  if (!isset($_SESSION["username"])) {
     header("Location: login.php");
  }

  // Sertakan file koneksi database
  include("connection.php");

  // Inisialisasi variabel-variabel untuk data mahasiswa dan pesan kesalahan
  $nim = "";
  $name = "";
  $birth_city = "";
  $select_ftib = "selected";
  $select_fteic = ""; 
  $department = "";
  $gpa = "";
  $birth_date = 1; 
  $birth_month = "1"; 
  $birth_year = 1996;
  $error_message = "";

  // Jika tombol submit ditekan
  if (isset($_POST["submit"])) {
    // Ambil nilai dari form dan lakukan sanitasi
    $nim = htmlentities(strip_tags(trim($_POST["nim"])));
    $name = htmlentities(strip_tags(trim($_POST["name"])));
    $birth_city = htmlentities(strip_tags(trim($_POST["birth_city"])));
    $faculty = htmlentities(strip_tags(trim($_POST["faculty"])));
    $department = htmlentities(strip_tags(trim($_POST["department"])));
    $gpa = htmlentities(strip_tags(trim($_POST["gpa"])));
    $birth_date = htmlentities(strip_tags(trim($_POST["birth_date"])));
    $birth_month = htmlentities(strip_tags(trim($_POST["birth_month"])));
    $birth_year = htmlentities(strip_tags(trim($_POST["birth_year"])));

    // Validasi input
    if (empty($nim)) {
      $error_message .= "- NIM belum diisi <br>";
    } elseif (!preg_match("/^[0-9]{8}$/", $nim)) {
      $error_message .= "- NIM harus berupa 8 digit angka <br>";
    }

    // Periksa apakah NIM sudah digunakan sebelumnya
    $nim = mysqli_real_escape_string($connection, $nim);
    $query = "SELECT * FROM student WHERE nim='$nim'";
    $query_result = mysqli_query($connection, $query);
    $data_amount = mysqli_num_rows($query_result);
    if ($data_amount >= 1) {
       $error_message .= "- NIM yang sama sudah digunakan <br>";
    }

    if (empty($name)) {
      $error_message .= "- Nama belum diisi <br>";
    }

    if (empty($birth_city)) {
      $error_message .= "- Tempat lahir belum diisi <br>";
    }

    if (empty($department)) {
      $error_message .= "- Jurusan belum diisi <br>";
    }

    // Validasi IPK
    if (!is_numeric($gpa) OR ($gpa <=0)) {
      $error_message .= "- IPK harus diisi dengan angka";
    }

    // Jika tidak ada pesan kesalahan, tambahkan data mahasiswa ke database
    if ($error_message === "") {
      // Sanitasi dan tambahkan data ke query
      $nim = mysqli_real_escape_string($connection, $nim);
      $name = mysqli_real_escape_string($connection, $name );
      $birth_city = mysqli_real_escape_string($connection, $birth_city);
      $faculty = mysqli_real_escape_string($connection, $faculty);
      $department = mysqli_real_escape_string($connection, $department);
      $birth_date = mysqli_real_escape_string($connection, $birth_date);
      $birth_month = mysqli_real_escape_string($connection, $birth_month);
      $birth_year  = mysqli_real_escape_string($connection, $birth_year);
      $gpa = (float) $gpa;

      // Format tanggal lahir
      $birth_date_full = $birth_year . "-" . $birth_month . "-" . $birth_date;

      // Buat query untuk menambahkan data mahasiswa
      $query = "INSERT INTO student VALUES ";
      $query .= "('$nim', '$name', '$birth_city', ";
      $query .= "'$birth_date_full','$faculty','$department',$gpa)";

      // Eksekusi query
      $result = mysqli_query($connection, $query);

      // Jika berhasil, arahkan ke halaman student_view.php dengan pesan sukses
      if ($result) {
        $message = "Mahasiswa dengan nama = \"<b>$name</b>\" sudah berhasil di tambah";
        $message = urlencode($message);
        header("Location: student_view.php?message={$message}");
      } else {
        // Jika query gagal, tampilkan pesan kesalahan
        die("Query gagal dijalankan: " . mysqli_errno($connection) . " - " . mysqli_error($connection));
      }
    }
  }

  // Array bulan untuk dropdown
  $arr_month = [
    "1" => "Januari",
    "2" => "Februari",
    "3" => "Maret",
    "4" => "April",
    "5" => "Mei",
    "6" => "Juni",
    "7" => "Juli",
    "8" => "Agustus",
    "9" => "September",
    "10" => "Oktober",
    "11" => "Nopember",
    "12" => "Desember"
  ];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Mahasiswa</title>
  <link href="style/student_add.css" rel="stylesheet" >
</head>
<body>
  <div class="container">
    <div id="header">
      <h1 id="logo">Data Mahasiswa</h1>
    </div>
    <hr>
    <!-- Menu navigasi -->
    <nav>
      <ul>
        <li><a href="student_view.php">Tampil</a></li>
        <li><a href="student_add.php">Tambah</a>
        <li><a href="logout.php">Logout</a>
      </ul>
    </nav>
    <h2>Tambah Data Mahasiswa</h2>
    <!-- Tampilkan pesan kesalahan jika ada -->
    <?php
      if ($error_message !== "") {
          echo "<div class='error'>$error_message</div>";
      }
    ?>
    <!-- Form untuk menambahkan data mahasiswa -->
    <form id="form_mahasiswa" action="student_add.php" method="post">
      <fieldset>
        <legend>Mahasiswa Baru</legend>
        <p>
          <label for="nim">NIM : </label>
          <input type="text" name="nim" id="nim" value="<?php echo $nim ?>" placeholder="Contoh: 12345678"> (8 digit angka)
        </p>
        <p>
          <label for="name">Nama : </label>
          <input type="text" name="name" id="name" value="<?php echo $name ?>">
        </p>
        <p>
          <label for="birth_city">Tempat Lahir : </label>
          <input type="text" name="birth_city" id="birth_city" value="<?php echo $birth_city ?>">
        </p>
        <p>
          <label for="birth_date" >Tanggal Lahir : </label>
            <select name="birth_date" id="birth_date">
              <?php
                // Loop untuk menampilkan opsi tanggal
                for ($i = 1; $i <= 31; $i++) {
                  if ($i == $birth_date){
                    echo "<option value=$i selected>";
                  }
                  else {
                    echo "<option value=$i>";
                  }
                  echo str_pad($i, 2, "0", STR_PAD_LEFT);
                  echo "</option>";
                }
              ?>
            </select>
            <select name="birth_month">
              <?php
                // Loop untuk menampilkan opsi bulan
                foreach ($arr_month as $key => $value) {
                  if ($key == $birth_month){
                    echo "<option value=\"{$key}\" selected>{$value}</option>";
                  }
                  else {
                    echo "<option value=\"{$key}\">{$value}</option>";
                  }
                }
              ?>
            </select>
            <select name="birth_year">
              <?php
                // Loop untuk menampilkan opsi tahun
                for ($i = 1990; $i <= 2005; $i++) {
                if ($i == $birth_year){
                    echo "<option value=$i selected>";
                  }
                  else {
                    echo "<option value=$i>";
                  }
                  echo "$i </option>";
                }
              ?>
            </select>
        </p>
        <p>
          <label for="faculty" >Fakultas : </label>
            <select name="faculty" id="faculty">
              <option value="FTIB" <?php echo $select_ftib ?>>FTIB </option>
              <option value="FTEIC" <?php echo $select_fteic ?>>FTEIC</option>
            </select>
        </p>
        <p>
          <label for="department">Jurusan : </label>
          <input type="text" name="department" id="department" value="<?php echo $department ?>">
        </p>
        <p>
          <label for="gpa">IPK : </label>
          <input type="text" name="gpa" id="gpa" value="<?php echo $gpa ?>" placeholder="Contoh: 2.75"> (angka desimal dipisah dengan karakter titik ".")
        </p>
      </fieldset>
      <br>
      <!-- Tombol submit -->
      <p>
        <input type="submit" name="submit" value="Tambah Data">
      </p>
    </form>
  </div>
</body>
</html>
<?php
  // Tutup koneksi database
  mysqli_close($connection);
?>
