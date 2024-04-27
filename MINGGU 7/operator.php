<?php 
    // Aritmatika 
    $hasil1 = +11; // Menetapkan nilai positif 11 ke variabel $hasil1.
    $hasil2 = -3; // Menetapkan nilai negatif 3 ke variabel $hasil2.
    $hasil3 = 3 + 5; // Menetapkan hasil penjumlahan 3 dan 5 ke variabel $hasil3.
    $hasil4 = 8 - 4.5; // Menetapkan hasil pengurangan 8 dan 4.5 ke variabel $hasil4.
    $hasil5 = 2 * 5; // Menetapkan hasil perkalian 2 dan 5 ke variabel $hasil5.
    $hasil6 = 3 + 8 / 5 - 3; // Menetapkan hasil operasi aritmatika kompleks ke variabel $hasil6.
    $hasil7 = 10 % 4; // Menetapkan sisa pembagian 10 dan 4 ke variabel $hasil7.
    $hasil8 = 2 ** 4; // Menetapkan hasil operasi pangkat 2 pangkat 4 ke variabel $hasil8.

    var_dump($hasil1); echo "<br>"; // Menampilkan tipe dan nilai dari $hasil1.
    var_dump($hasil2); echo "<br>"; // Menampilkan tipe dan nilai dari $hasil2.
    var_dump($hasil3); echo "<br>"; // Menampilkan tipe dan nilai dari $hasil3.
    var_dump($hasil4); echo "<br>"; // Menampilkan tipe dan nilai dari $hasil4.
    var_dump($hasil5); echo "<br>"; // Menampilkan tipe dan nilai dari $hasil5.
    var_dump($hasil6); echo "<br>"; // Menampilkan tipe dan nilai dari $hasil6.
    var_dump($hasil7); echo "<br>"; // Menampilkan tipe dan nilai dari $hasil7.
    var_dump($hasil8); // Menampilkan tipe dan nilai dari $hasil8.
    
    echo "<br/><br/>";

    // Increment
    $a = 5;
    echo ++$a;    // Output: 6 (Pre-increment)
    echo $a;      // Output: 6
    echo "<br>";
    $b = 5;
    echo $b++;   // Output: 5 (Post-increment)
    echo $b;    // Output: 6
    echo "<br>";
    $a = 5;
    echo --$a;  // Output: 4 (Pre-decrement)
    echo $a;    // Output: 4
    echo "<br>";
    $b = 5;
    echo $b--;  // Output: 5 (Post-decrement)
    echo $b;    // Output: 4

    echo "<br/><br/>";

    // Perbandingan
    var_dump(12 < 14);   echo "<br />";  // Output: bool(true)
    var_dump(14 < 14);   echo "<br />";  // Output: bool(false)
    var_dump(14 <= 14);  echo "<br />";  // Output: bool(true)
    var_dump(10 <> 14);  echo "<br />";  // Output: bool(true)
    var_dump(15 == 10);  echo "<br />";  // Output: bool(false)
    var_dump(10 === 10); echo "<br />";  // Output: bool(true)
    var_dump(150 == 1.5e2);   // Output: bool(true)

    echo "<br/><br/>";
    
    // String
    $hasil = "Belajar"."PHP"; // Menggabungkan dua string menjadi satu.
    echo $hasil; // Output: BelajarPHP
    echo "<br>";
    $a = "Sstt!";
    $b = " lagi";
    $c = " serius";
    $d = " belajar PHP";
    $hasil = $a.$b.$c.$d; // Menggabungkan beberapa string menjadi satu.
    echo $hasil; // Output: Sstt! lagi serius belajar PHP
    echo "<br>";
    $hasil = 9 . " ekor anak beruang"; // Menggabungkan angka dengan string.
    echo $hasil; // Output: 9 ekor anak beruang
    echo "<br>";
    $hasil = true . " adalah data boolean"; // Menggabungkan boolean dengan string.
    echo $hasil; // Output: 1 adalah data boolean

    echo "<br/><br/>";

    // Array
    $kelasA = ["Andri","Joko","Sukma","Rina","Sari"]; // Mendefinisikan array $kelasA.
    $kelasB = ["Alex","Rina","Rico"]; // Mendefinisikan array $kelasB.
    $semua = $kelasA + $kelasB; // Menggabungkan kedua array.
    print_r($semua); echo "<br>"; // Menampilkan hasil gabungan kedua array.
    var_dump($kelasA == $kelasB);  echo "<br>"; // Output: bool(false)
    var_dump($kelasA === $kelasB); echo "<br>"; // Output: bool(false)
    var_dump($kelasA != $kelasB);  echo "<br>"; // Output: bool(true)
    var_dump($kelasA <> $kelasB);  echo "<br>"; // Output: bool(true)
    var_dump($kelasA !== $kelasB); // Output: bool(true)
?>
