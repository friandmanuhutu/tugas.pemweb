function validateForm() {
  var isValid = true; // Diasumsikan formulir valid pada awalnya
  
  // Validasi Nama
  var nameInput = document.getElementById("name");
  var nameError = document.getElementById("nameError");
  if (nameInput.value.trim() === "") { // Periksa apakah input nama kosong
      nameError.innerHTML = "Nama harus diisi"; // Tetapkan pesan kesalahan
      nameInput.classList.add("invalid"); // Tambahkan kelas invalid untuk styling
      isValid = false; // Tetapkan formulir sebagai tidak valid
  } else {
      nameError.innerHTML = ""; // Hapus pesan kesalahan
      nameInput.classList.remove("invalid"); // Hapus kelas invalid
  }

  // Validasi Username
  var usernameInput = document.getElementById("username");
  var usernameError = document.getElementById("usernameError");
  if (usernameInput.value.trim() === "") { // Periksa apakah input username kosong
      usernameError.innerHTML = "Username harus diisi"; // Tetapkan pesan kesalahan
      usernameInput.classList.add("invalid"); // Tambahkan kelas invalid untuk styling
      isValid = false; // Tetapkan formulir sebagai tidak valid
  } else {
      usernameError.innerHTML = ""; // Hapus pesan kesalahan
      usernameInput.classList.remove("invalid"); // Hapus kelas invalid
  }

  // Validasi Email
  var emailInput = document.getElementById("email");
  var emailError = document.getElementById("emailError");
  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Pola ekspresi reguler untuk memvalidasi email
  if (!emailPattern.test(emailInput.value.trim())) { // Periksa apakah format email valid
      emailError.innerHTML = "Email tidak valid"; // Tetapkan pesan kesalahan
      emailInput.classList.add("invalid"); // Tambahkan kelas invalid untuk styling
      isValid = false; // Tetapkan formulir sebagai tidak valid
  } else {
      emailError.innerHTML = ""; // Hapus pesan kesalahan
      emailInput.classList.remove("invalid"); // Hapus kelas invalid
  }

  return isValid; // mengembalikan status kevalidan formulir secara keseluruhan
}
