document.querySelector(".form-section").addEventListener("submit", function (e) {
  e.preventDefault();
  alert("Perubahan berhasil disimpan!");
});

document.querySelector(".btn-danger").addEventListener("click", function () {
  const confirmDelete = confirm("Yakin ingin menghapus akun?");
  if (confirmDelete) {
    alert("Akunmu telah dihapus (simulasi).");
    // Tambahkan logic API jika dibutuhkan
  }
});