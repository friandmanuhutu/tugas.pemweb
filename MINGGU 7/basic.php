<?php
    // Standard
    echo "<p>Kalimat ini berasal dari Standard PHP tag </p>";
    // Ini adalah tag PHP standar yang digunakan untuk mengeksekusi kode PHP.

    // Case Insensitive
    echo "<p>Hello World</p>"; // Output: Hello World
    ECHO "<p>Hello World</p>"; // Output: Hello World (karena PHP bersifat case-insensitive)
    EcHo "<p>Hello World</p>"; // Output: Hello World (karena PHP bersifat case-insensitive)

    // Case Insensitive Error / Warning
    $andi = "Andi";
    echo $Andi; // Output: Notice: Undefined variable: Andi (karena nama variabel tidak sama persis)

    // Statement
    echo "<p>Hello world</p>"; // Output: Hello world
    $a = 3; $b = 4; // Mendefinisikan variabel $a dan $b dengan nilai 3 dan 4.
    $nama = "Informatika"; // Mendefinisikan variabel $nama dengan nilai "Informatika".
    $c = $a / 25.0; // Mendefinisikan variabel $c dengan hasil pembagian $a oleh 25.0.
    if ($a != $b) { // Memeriksa apakah $a tidak sama dengan $b.
        echo "<p>Pemrograman Web</p>"; // Output: Pemrograman Web
    }

    // Parse Error (Semicolon)
    // $a = 5 + 7
    // echo $a;
    // Potongan kode ini tidak dapat dijalankan karena kurangnya titik koma (;) setelah statement $a = 5 + 7.
?>
