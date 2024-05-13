<?php
  // Informasi untuk koneksi database
  $dbhost = "localhost"; // Nama host database (biasanya localhost jika database berada pada server yang sama dengan server web)
  $dbuser = "root";      // Nama pengguna database
  $dbpass = "";          // Kata sandi database (kosong karena tidak ada kata sandi)
  $dbname = "my_campus"; // Nama database yang akan digunakan

  // Membuat koneksi ke database menggunakan mysqli_connect()
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); // Menggunakan informasi koneksi yang telah disediakan

  // Memeriksa apakah koneksi berhasil
  if (!$connection) { // Jika koneksi gagal
    // Menampilkan pesan kesalahan dan menghentikan eksekusi script menggunakan die()
    die ("Koneksi dengan database gagal: " . mysqli_connect_errno() . " - " . mysqli_connect_error());
  }
?>
