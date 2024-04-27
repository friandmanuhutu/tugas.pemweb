<?php
    // Menampilkan Variabel dan Konstanta
    $nama = "Andi"; // Mendefinisikan variabel $nama dengan nilai "Andi".
    define("GAJI", 50000000); // Mendefinisikan konstanta GAJI dengan nilai 50000000.
    echo $nama; // Menampilkan nilai dari variabel $nama.
    echo "<br>"; // Menampilkan baris baru dalam HTML.
    echo GAJI; // Menampilkan nilai dari konstanta GAJI.

    // Memanggil variabel dalam string
    $nama = "Andi"; // Mendefinisikan variabel $nama dengan nilai "Andi".
    echo "<p>Selamat pagi $nama</p>"; // Menampilkan teks "Selamat pagi" diikuti oleh nilai dari variabel $nama.

    // Menghapus Variabel
    $nama = "Andi"; // Mendefinisikan variabel $nama dengan nilai "Andi".
    echo $nama; // Menampilkan nilai dari variabel $nama.
    unset($nama); // Menghapus variabel $nama dari memori.
?>
