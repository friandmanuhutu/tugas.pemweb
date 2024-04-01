// Menunggu hingga seluruh konten HTML dimuat
document.addEventListener('DOMContentLoaded', function() {
    // Mendapatkan elemen display
    const display = document.querySelector('.display');
    // Mendapatkan semua tombol
    const buttons = document.querySelectorAll('.buttons button');

    // Iterasi melalui setiap tombol
    buttons.forEach(button => {
        // Menambahkan event listener untuk setiap tombol
        button.addEventListener('click', function() {
            // Mendapatkan nilai dari atribut data-value pada tombol yang diklik
            const value = this.dataset.value;
            // Mendapatkan nilai yang saat ini ditampilkan di layar
            const displayValue = display.value;

            // Kondisi untuk setiap nilai data-value
            if (value === 'AC') {
                // Jika 'AC' (All Clear), hapus semua input
                display.value = '';
            } else if (value === 'DEL') {
                // Jika 'DEL' (Delete), hapus karakter terakhir
                display.value = displayValue.slice(0, -1);
            } else if (value === '=') {
                // Jika '=', evaluasi ekspresi dan tampilkan hasilnya
                try {
                    display.value = eval(displayValue);
                } catch (error) {
                    // Tangani kesalahan jika terjadi
                    display.value = 'Error';
                }
            } else {
                // Jika tombol selain 'AC', 'DEL', atau '=', tambahkan nilai ke layar
                display.value += value;
            }
        });
    });
});
