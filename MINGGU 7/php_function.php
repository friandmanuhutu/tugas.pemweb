<?php
    // String
    $kalimat = "Sedang belajar PHP";
    echo strtolower($kalimat); // Mengubah kalimat menjadi huruf kecil
    echo "<br>";
    echo strtoupper($kalimat); // Mengubah kalimat menjadi huruf besar

    echo "<br/><br/>";

    // String
    $kalimat = "sedang dalam perjalanan menjadi seorang web programmer";
    echo ucfirst($kalimat); // Mengubah huruf pertama kalimat menjadi huruf besar
    echo "<br>";
    $kalimat = "Sedang dalam perjalanan menjadi seorang web programmer";
    echo lcfirst($kalimat); // Mengubah huruf pertama kalimat menjadi huruf kecil

    echo "<br/><br/>";

    // Trim
    $a = "      abcd      ";
    $trim_a = trim($a); // Menghapus spasi di awal dan akhir string
    echo $a."<br>";
    echo $trim_a."<br>";

    echo "<br/><br/>";

    // Number Format
    echo number_format(39999.99,0,',','.')."<br>";   // Memformat angka menjadi format yang diinginkan
    echo number_format(39999.99,2,',','.')."<br>";   
    echo number_format(39999.99,4,',','.')."<br>";   
    echo number_format(1499999,2,',','.')."<br>";    
    echo number_format(135000,2,' ',' ')."<br>";  

    echo "<br/><br/>";
    
    // SubString
    $kalimat = "Belajar PHP di Telkom University Surabaya";
    echo substr($kalimat,0)."<br>";   // Mengambil substring dari kalimat
    echo substr($kalimat,15)."<br>";  
    echo substr($kalimat,0,7)."<br>"; 
    echo substr($kalimat,0,11);

    echo "<br/><br/>";

    // Array Count
    $zoo = array("kucing","ikan","ayam","bebek","sapi");
    echo count($zoo); // Menghitung jumlah elemen dalam array

    echo "<br/><br/>";

    // Array Count
    $zoo = array("kucing","ikan","ayam","bebek","sapi");
    for ($i=0; $i < count($zoo); $i++) { // Looping untuk mencetak setiap elemen dalam array
        echo $zoo[$i]."<br>";
    }

    echo "<br/><br/>";

    // Array Push
    $siswa = array("andi", "gina", "joko", "santi");
    $var = array_push($siswa,"rani"); // Menambahkan elemen ke array
    echo $var;
    echo "<br/>";
    print_r($siswa); 

    echo "<br/><br/>";

    // Array Pop
    $siswa = array("andi", "gina", "joko", "santi");
    $satu_siswa = array_pop($siswa); // Menghapus dan mengembalikan elemen terakhir dari array
    echo $satu_siswa;
    echo "<br/>";
    print_r($siswa);

    echo "<br/><br/>";

    // In Array
    $siswa = array("andi", "gina", "joko", "santi");
    $cek = in_array("joko",$siswa); // Memeriksa apakah nilai tertentu ada dalam array
    var_dump($cek); // Outputkan hasil pemeriksaan
?>
