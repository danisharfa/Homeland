// Atur event click pada tombol eye
document.getElementById("eyepass").addEventListener("click", togglePasswordVisibility);

function togglePasswordVisibility() {
  const button = document.getElementById("eyepass");
  const icon = button.querySelector("i");
  const passwordInput = document.getElementById("password");

  // Ubah tipe pada elemen input
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    icon.classList.remove("bi-eye-slash");
    icon.classList.add("bi-eye");
  } else {
    passwordInput.type = "password";
    icon.classList.remove("bi-eye");
    icon.classList.add("bi-eye-slash");
  }
}
