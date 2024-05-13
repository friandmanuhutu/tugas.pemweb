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

// Ambil NIM siswa yang akan diedit dari URL
if(isset($_GET['edit'])){
    $nim_to_edit = $_GET['edit'];
    
    // Query untuk mengambil data siswa berdasarkan NIM
    $query = "SELECT * FROM student WHERE nim='$nim_to_edit'";
    $result = mysqli_query($connection, $query);
    
    if(!$result) {
        die ("Query Error: ".mysqli_errno($connection)." - ".mysqli_error($connection));
    }
    
    // Ambil data siswa
    $data = mysqli_fetch_assoc($result);
    
    // Format tanggal lahir
    $birth_date = strtotime($data["birth_date"]);
    $formatted_date = date("Y-m-d", $birth_date);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
    <link rel="stylesheet" href="style/student_edit.css">
</head>
<body>
    <h1>Edit Data Siswa</h1>
    <form action="process_student_edit.php" method="POST">
        <input type="hidden" name="nim" value="<?php echo $data['nim']; ?>">
        <label>Nama:</label><br>
        <input type="text" name="name" value="<?php echo $data['name']; ?>"><br>
        <label>Tempat Lahir:</label><br>
        <input type="text" name="birth_city" value="<?php echo $data['birth_city']; ?>"><br>
        <label>Tanggal Lahir:</label><br>
        <input type="date" name="birth_date" value="<?php echo $formatted_date; ?>"><br>
        <label>Fakultas:</label><br>
        <input type="text" name="faculty" value="<?php echo $data['faculty']; ?>"><br>
        <label>Jurusan:</label><br>
        <input type="text" name="department" value="<?php echo $data['department']; ?>"><br>
        <label>IPK:</label><br>
        <input type="text" name="gpa" value="<?php echo $data['gpa']; ?>"><br>
        <input type="submit" value="Simpan Perubahan">
    </form>
</body>
</html>

<?php
// Bebaskan hasil query dan tutup koneksi
mysqli_free_result($result);
mysqli_close($connection);
?>
