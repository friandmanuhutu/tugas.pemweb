<?php
  // Informasi untuk koneksi database
  $dbhost = "localhost"; // Lokasi host database (biasanya localhost)
  $dbuser = "root";      // Username untuk mengakses database
  $dbpass = "";          // Password untuk mengakses database

  // Buat Koneksi
  $connection   = mysqli_connect($dbhost,$dbuser,$dbpass); // Membuat koneksi ke database
  if(!$connection){
    die ("Koneksi dengan database gagal: ".mysqli_connect_errno()." - ".mysqli_connect_error()); // Menampilkan pesan jika koneksi gagal
  }

  // Buat Database
  $query = "CREATE DATABASE IF NOT EXISTS my_campus"; // Query untuk membuat database 'my_campus' jika belum ada
  $result = mysqli_query($connection, $query); // Menjalankan query
  if(!$result){
    die ("Query Error: ".mysqli_errno($connection)." - ".mysqli_error($connection)); // Menampilkan pesan jika query gagal
  }
  else {
    echo "Database <b>'my_campus'</b> berhasil dibuat... <br>"; // Menampilkan pesan jika database berhasil dibuat
  }

  // Pilih Database
  $result = mysqli_select_db($connection, "my_campus"); // Memilih database 'my_campus'
  if(!$result){
    die ("Query Error: ".mysqli_errno($connection)." - ".mysqli_error($connection)); // Menampilkan pesan jika pemilihan database gagal
  }
  else {
    echo "Database <b>'my_campus'</b> berhasil dipilih... <br>"; // Menampilkan pesan jika database berhasil dipilih
  }

  // Buat Tabel student
  $query = "DROP TABLE IF EXISTS student"; // Menghapus tabel 'student' jika sudah ada
  $query_result = mysqli_query($connection, $query); // Menjalankan query
  if(!$query_result){
    die ("Query Error: ".mysqli_errno($connection)." - ".mysqli_error($connection)); // Menampilkan pesan jika query gagal
  }
  else {
    echo "Tabel <b>'student'</b> berhasil dihapus... <br>"; // Menampilkan pesan jika tabel berhasil dihapus
  }
  $query  = "
    CREATE TABLE student 
      (nim CHAR(8), 
      name VARCHAR(100), 
      birth_city VARCHAR(50), 
      birth_date DATE, 
      faculty VARCHAR(50), 
      department VARCHAR(50), 
      gpa DECIMAL(3,2), 
      PRIMARY KEY (nim))"; // Query untuk membuat tabel 'student' dengan kolom-kolom tertentu
  $query_result = mysqli_query($connection, $query); // Menjalankan query
  if(!$query_result){
      die ("Query Error: ".mysqli_errno($connection)." - ".mysqli_error($connection)); // Menampilkan pesan jika query gagal
  }
  else {
    echo "Tabel <b>'student'</b> berhasil dibuat... <br>"; // Menampilkan pesan jika tabel berhasil dibuat
  }

  // Insert data student
  $query  = "
    INSERT INTO student 
    VALUES 
      ('12041952', 'Brian Yuko', 'Padang', '1996-11-23', 'FTIB', 'Informatika', 3.1), 
      ('12042010', 'Safira Yanuar', 'Bandung', '1994-08-22', 'FTIB', 'Informatika', 3.9), 
      ('12042012', 'Rezja Zalva', 'Jakarta', '1997-12-31', 'FTIB', 'Sistem Informasi', 3.5), 
      ('12042034', 'Agha Rizky', 'Jakarta', '1997-06-28', 'FTEIC', 'Sains Data', 3.4), 
      ('12042041', 'Adhiaksa', 'Medan', '1995-04-02', 'FTEIC','Bisnis Digital', 3.7)"; // Query untuk memasukkan data ke dalam tabel 'student'
  $query_result = mysqli_query($connection, $query); // Menjalankan query
  if(!$query_result){
      die ("Query Error: ".mysqli_errno($connection)." - ".mysqli_error($connection)); // Menampilkan pesan jika query gagal
  }
  else {
    echo "Tabel <b>'student'</b> berhasil diisi... <br>"; // Menampilkan pesan jika tabel berhasil diisi
  }

  // Buat Tabel Admin
  $query = "DROP TABLE IF EXISTS admin"; // Menghapus tabel 'admin' jika sudah ada
  $query_result = mysqli_query($connection, $query); // Menjalankan query
  if(!$query_result){
    die ("Query Error: ".mysqli_errno($connection)." - ".mysqli_error($connection)); // Menampilkan pesan jika query gagal
  }
  else {
    echo "Tabel <b>'admin'</b> berhasil dihapus... <br>"; // Menampilkan pesan jika tabel berhasil dihapus
  }
  $query  = "CREATE TABLE admin (username VARCHAR(50), password CHAR(40))"; // Query untuk membuat tabel 'admin' dengan kolom username dan password
  $query_result = mysqli_query($connection, $query); // Menjalankan query
  if(!$query_result){
      die ("Query Error: ".mysqli_errno($connection)." - ".mysqli_error($connection)); // Menampilkan pesan jika query gagal
  }
  else {
    echo "Tabel <b>'admin'</b> berhasil dibuat... <br>"; // Menampilkan pesan jika tabel berhasil dibuat
  }

  // Insert Data Admin
  $username = "admin";
  $password = sha1("adminmahasiswa"); // Mengenkripsi password sebelum dimasukkan ke dalam database
  $query  = "INSERT INTO admin VALUES ('$username','$password')"; // Query untuk memasukkan data admin ke dalam tabel 'admin'
  $query_result = mysqli_query($connection, $query); // Menjalankan query
  if(!$query_result){
      die ("Query Error: ".mysqli_errno($connection)." - ".mysqli_error($connection)); // Menampilkan pesan jika query gagal
  }
  else {
    echo "Tabel <b>'admin'</b> berhasil diisi... <br>"; // Menampilkan pesan jika tabel berhasil diisi
  }

  mysqli_close($connection); // Menutup koneksi database
?>
