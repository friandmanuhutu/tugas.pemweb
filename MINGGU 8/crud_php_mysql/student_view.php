<?php
  // Mulai sesi
  session_start();
  // Periksa apakah pengguna telah login. Jika belum, arahkan ke halaman login.
  if (!isset($_SESSION["username"])) {
     header("Location: login.php");
  }

  // Sertakan file koneksi database
  include("connection.php");
  
  // Periksa apakah ada pesan yang dikirimkan melalui URL
  if (isset($_GET["message"])) {
      $message = $_GET["message"];
  }
     
  // Query untuk menampilkan data mahasiswa dari database, diurutkan berdasarkan NIM
  $query = "SELECT * FROM student ORDER BY nim ASC";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Mahasiswa</title>
  <!-- Sertakan file CSS -->
  <link href="style/student_view.css" rel="stylesheet" >
  <link rel="stylesheet" href="style/student_deleted.css">
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
    <!-- Tabel untuk menampilkan data mahasiswa -->
    <table border="1">
      <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Fakultas</th>
        <th>Jurusan</th>
        <th>IPK</th>
        <th colspan="2">Action</th>
      </tr>
      <?php
        // Eksekusi query untuk mendapatkan data mahasiswa
        $result = mysqli_query($connection, $query);
        // Periksa apakah query berhasil dieksekusi
        if(!$result) {
            die ("Query Error: ".mysqli_errno($connection)." - ".mysqli_error($connection));
        }

        // Tampilkan data mahasiswa dalam tabel
        while($data = mysqli_fetch_assoc($result)){ 
          // Format tanggal lahir ke format "dd-mm-yyyy"
          $birth_date = strtotime($data["birth_date"]);
          $formatted_date = date("d-m-Y", $birth_date);
          
          // Tampilkan data dalam baris tabel
          echo "<tr>";
          echo "<td>$data[nim]</td>";
          echo "<td>$data[name]</td>";
          echo "<td>$data[birth_city]</td>";
          echo "<td>$formatted_date</td>";
          echo "<td>$data[faculty]</td>";
          echo "<td>$data[department]</td>";
          echo "<td>$data[gpa]</td>";
          echo "<td><a href='student_view.php?hapus=$data[nim]'id='hapus-link'> Hapus </a></td>";
          echo "<td><a href='student_edit.php?edit=$data[nim]' id='edit-link'> Edit </a></td>";
          echo "</tr>";
        }
        
        // Bebaskan hasil query dan tutup koneksi database
        mysqli_free_result($result);
        mysqli_close($connection);
      ?>
    </table>

    <?php
      // Sertakan koneksi database untuk menghapus data mahasiswa
      include("connection.php");

      // Periksa apakah parameter 'hapus' telah ditetapkan di URL
      if(isset($_GET['hapus'])){
          // Dapatkan NIM mahasiswa yang akan dihapus
          $nim_to_delete = $_GET['hapus'];
          
          // Query untuk menghapus data dari database
          $delete_query = "DELETE FROM student WHERE nim='$nim_to_delete'";
          
          // Lakukan query penghapusan
          if(mysqli_query($connection, $delete_query)){
              // Jika penghapusan berhasil, arahkan kembali ke student_view.php setelah penundaan
              echo "<div class='notification'>Data telah dihapus</div>";
              echo "<meta http-equiv=refresh content=2;URL='student_view.php'>";
          } else {
              // Jika penghapusan gagal, tampilkan pesan kesalahan
              echo "Gagal menghapus data: " . mysqli_error($connection);
          }
      }

      // Tutup koneksi database
      mysqli_close($connection);
    ?>

    <?php
      // Ambil pesan yang dikirimkan melalui URL
      $message = urldecode($_GET['message'] ?? '');

      // Tampilkan pesan jika ada
      if (!empty($message)) {
          echo "<div id='message'>" . $message . "</div>";
      }
    ?>

    <!-- Tambahkan script JavaScript untuk menghilangkan pesan setelah 2 detik -->
    <script>
      // Fungsi untuk menghilangkan pesan setelah 2 detik
      setTimeout(function() {
        var messageElement = document.getElementById('message');
        if (messageElement) {
          messageElement.style.display = 'none';
        }
      }, 2000); // 2000 milidetik = 2 detik
    </script>
  </div>
</body>
</html>
