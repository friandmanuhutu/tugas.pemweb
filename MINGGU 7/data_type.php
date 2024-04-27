<?php
    // Get Type
    $var1 = 12;
    echo gettype($var1); // Output: integer
    echo "<br>";
    $var2 = 99.99;
    echo gettype($var2); // Output: double
    echo "<br>";
    $var3 = "Informatika";
    echo gettype($var3); // Output: string

    echo "<br/><br/>";

    // Var Dump
    $var1 = 12;
    var_dump($var1); // Output: int(12)
    echo "<br/>";
    $var2 = 99.99;
    var_dump($var2); // Output: float(99.99)
    echo "<br/>";
    $var3 = "Informatika";
    var_dump($var3); // Output: string(11) "Informatika"

    echo "<br/><br/>";

    // Integer
    $umur = 21;
    $harga = 15000;
    var_dump($umur); // Output: int(21)
    echo "<br />";
    var_dump($harga); // Output: int(15000)

    echo "<br/><br/>";

    // Float
    $IPK  =3.19;
    $nilai_tukar = 13235.50;
    var_dump($IPK); // Output: float(3.19)
    echo "<br />";
    var_dump($nilai_tukar); // Output: float(13235.5)

    echo "<br/><br/>";

    // String
    $huruf = 'A';
    $nama = "Anto";
    $situs = "https://bif-sby.telkomuniversity.ac.id/";
    $kalimat = "Sedang serius belajar PHP";

    var_dump($huruf); // Output: string(1) "A"
    echo "<br>";
    var_dump($nama); // Output: string(4) "Anto"
    echo "<br>";
    var_dump($situs); // Output: string(42) "https://bif-sby.telkomuniversity.ac.id/"
    echo "<br>";
    var_dump($kalimat); // Output: string(23) "Sedang serius belajar PHP"

    echo "<br/><br/>";

    // String Double Quote Escaped
    $kalimat = "Saya sedang belajar \"PHP\"";
    echo $kalimat; // Output: Saya sedang belajar "PHP"

    echo "<br/><br/>";

    // String Double Quote
    $prodi = "Informatika";
    $belajar1 = 'Sedang belajar programming di $prodi';
    echo $belajar1; // Output: Sedang belajar programming di $prodi
    echo "<br>";
    $belajar2 = "Sedang belajar programming di $prodi";
    echo $belajar2; // Output: Sedang belajar programming di Informatika

    echo "<br/><br/>";

    // String Double Quote (Kurung Kurawal)
    $kata="Fakultas";
    echo "{$kata} Informatika"; // Output: Fakultas Informatika

    echo "<br/><br/>";

    // Boolean
    $benar = true;
    $salah = false;

    var_dump($benar); // Output: bool(true)
    echo "<br/>";
    var_dump($salah); // Output: bool(false)
    echo "<br/>";
    if ($benar) {
        echo "Anda Benar!"; // Output: Anda Benar!
    }

    echo "<br/><br/>";

    // Array
    $siswa = array("Andri", "Joko", "Sukma", "Rina", "Sari");
    echo $siswa[1]; // Output: Joko

    // Menambah Elemen Array
    $macam2 = array(121, "Joko", 44.99, "Belajar PHP");
    $macam2[4] = "Informatika";
    $macam2[5] = 212;
    $macam2[6] = 3.14;

    echo "<pre>";
    var_dump($macam2);
    echo "</pre>";

    // Menambah & Menghapus Elemen Array
    $macam2 = array(121,"Joko",44.99,"Belajar PHP");
    $macam2[] = "Informatika";

    unset($macam2[0]);
    unset($macam2[2]);
    unset($macam2[3]);

    echo "<pre>";
    var_dump($macam2);
    echo "</pre>";

    // Array Association
    $siswa = array(
        "satu"  => "Andri",
        "dua"   => "Joko",
        "tiga"  => "Sukma",
        "empat" => "Rina"
    );
    echo $siswa["dua"]; // Output: Joko
    echo "<br>";
    echo $siswa["empat"]; // Output: Rina

    echo "<br/><br/>";

    // Array Association Short Syntax
    $siswa = [
        "satu"  => "Andri",
        "dua"   => "Joko",
        "tiga"  => "Sukma",
        "empat" => "Rina"
    ];
    echo $siswa["satu"]; // Output: Andri
    echo "<br>";
    echo $siswa["tiga"]; // Output: Sukma

    // Object
    class Siswa {
        public $nama;
        public $umur;
        public $tgl_lahir;
    
        public function get_nama(){
          return $this->nama;
        }
    }
    $andi = new Siswa;
    $andi->nama = "Andi";
    $andi->umur = 13;
    $andi->tgl_lahir = "13 Des 1990";
    echo "<pre>";
    print_r($andi);
    echo "</pre>";

    // Null
    $var3 = null;
    var_dump($var3); // Output: NULL
?>
