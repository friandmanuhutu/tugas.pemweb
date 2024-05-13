<?php
// Koneksi ke database
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "my_campus";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Periksa koneksi
if(!$connection){
  die ("Koneksi dengan database gagal: ".mysqli_connect_errno()." - ".mysqli_connect_error());
}

// Tangkap data yang dikirim dari formulir
$nim = $_POST['nim'];
$name = $_POST['name'];
$birth_city = $_POST['birth_city'];
$birth_date = $_POST['birth_date'];
$faculty = $_POST['faculty'];
$department = $_POST['department'];
$gpa = $_POST['gpa'];

// Query untuk memperbarui data siswa di database
$update_query = "UPDATE student SET name='$name', birth_city='$birth_city', birth_date='$birth_date', faculty='$faculty', department='$department', gpa='$gpa' WHERE nim='$nim'";

// Eksekusi query
if(mysqli_query($connection, $update_query)){
    echo "Data siswa berhasil diperbarui.";
    echo "<meta http-equiv=refresh content=2;URL='student_view.php'>";
} else {
    echo "Gagal memperbarui data siswa: " . mysqli_error($connection);
}

// Tutup koneksi
mysqli_close($connection);
?>
