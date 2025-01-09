// scripts/slideshow.js
document.addEventListener("DOMContentLoaded", () => {
    const slides = document.querySelectorAll(".slideshow img");
    let currentIndex = 0;

    function showNextSlide() {
        // Hilangkan kelas 'active' dari gambar saat ini
        slides[currentIndex].classList.remove("active");

        // Perbarui indeks ke gambar berikutnya
        currentIndex = (currentIndex + 1) % slides.length;

        // Tambahkan kelas 'active' ke gambar berikutnya
        slides[currentIndex].classList.add("active");
    }

    // Ubah gambar setiap 5 detik
    setInterval(showNextSlide, 5000);
});