/*=============== SHOW MENU ===============*/
const navMenu = document.getElementById("nav-menu"),
  navToggle = document.getElementById("nav-toggle"),
  navClose = document.getElementById("nav-close");

// show menu
if (navToggle) {
  navToggle.addEventListener("click", () => {
    navMenu.classList.add("show-menu");
  });
}

// hidden menu
if (navClose) {
  navClose.addEventListener("click", () => {
    navMenu.classList.remove("show-menu");
  });
}

/*=============== REMOVE MENU MOBILE ===============*/
const navLink = document.querySelectorAll(".nav__link");

const linkAction = () => {
  const navMenu = document.getElementById("nav-menu");
  // when click on each nav__link, we remove the show menu
  navMenu.classList.remove("show-menu");
};
navLink.forEach((n) => n.addEventListener("click", linkAction));

/*=============== ADD BLUR HEADER ===============*/
const blurHeader = () =>{
  const header = document.getElementById('header')
  // Menggunakan window.scrollY agar aman saat build
  window.scrollY >= 50 ? header.classList.add('blur-header')
                      : header.classList.remove('blur-header') 
}
window.addEventListener('scroll', blurHeader)

/*=============== SHOW SCROLL UP ===============*/ 
const scrollUp = () => {
  const scrollUp = document.getElementById('scroll-up')
  // Menggunakan window.scrollY agar aman saat build
  window.scrollY >= 350 ? scrollUp.classList.add('show-scroll')
                      : scrollUp.classList.remove('show-scroll') 
}
window.addEventListener('scroll', scrollUp)

/*=============== SCROLL SECTIONS ACTIVE LINK ===============*/
const sections = document.querySelectorAll('section[id]')

const scrollActive = () => {
  const scrollDown = window.scrollY

  sections.forEach(current =>{
    const sectionHeight = current.offsetHeight,
          sectionTop = current.offsetTop - 58,
          sectionId = current.getAttribute('id'),
          sectionsClass = document.querySelector('.nav__menu a[href*='+ sectionId +']')

          if(sectionsClass && scrollDown > sectionTop && scrollDown <= sectionTop + sectionHeight){
            sectionsClass.classList.add('active-link')
          } else if (sectionsClass){
            sectionsClass.classList.remove('active-link')
          }
  })
}
window.addEventListener('scroll', scrollActive)

/*=============== SCROLL REVEAL ANIMATION ===============*/
const sr = ScrollReveal({
  origin: 'top',
  distance: '40px',
  opacity: 1,
  scale: 1.1,
  duration: 2500,
  delay: 300,
  // reset: true, // Animation repeat
})

sr.reveal(`.home__data, .about__img, .about__data, .visit__data`)
sr.reveal(`.home__image, .footer__img-1, .footer__img-2`, {rotate: {z: -15}})
sr.reveal(`.home__bread, .about__bread`, {rotate: {z: 15}})
sr.reveal(`.home__footer`, {scale: 1, origin: 'bottom'})
sr.reveal(`.new__card:nth-child(1) img`, {rotate: {z: -30}, distance: 0}) 
sr.reveal(`.new__card:nth-child(2) img`, {rotate: {z: 15}, distance: 0, delay: 600}) 
sr.reveal(`.new__card:nth-child(3) img`, {rotate: {z: -30}, distance: 0, delay: 900}) 
sr.reveal(`.favorite__card img`, {interval: 100, rotate: {z: 15}, distance: 0}) 
sr.reveal(`.footer__container`, {scale: 1})

/*=============== MODAL FUNCTIONS ===============*/
// Ditempelkan ke 'window' agar tidak dihapus oleh Vite
window.openModal = function (id) {
  document.getElementById(id).style.display = "block";
}

window.closeModal = function (id) {
  document.getElementById(id).style.display = "none";
}

// Tutup modal ketika klik di area luar modal
window.onclick = function (event) {
  const modals = document.querySelectorAll('.modal');
  modals.forEach(modal => {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  });
};

const orderModal = document.getElementById('orderModal');
if (orderModal) {
    orderModal.addEventListener('show.bs.modal', function (event) {
        // Tombol yang di-klik
        const button = event.relatedTarget;

        // Ambil data dari atribut data-*
        const productName = button.getAttribute('data-product-name');
        const productPrice = button.getAttribute('data-product-price');

        // Cari input di dalam modal dan isi nilainya
        const modalProdukInput = orderModal.querySelector('#produk');
        const modalHargaInput = orderModal.querySelector('#harga');

        modalProdukInput.value = productName;
        // Format harga menjadi 'Rp. xxx.xxx'
        modalHargaInput.value = 'Rp. ' + new Intl.NumberFormat('id-ID').format(productPrice);
    });
}
/*=============== WHATSAPP ORDER FORM ===============*/
 const orderForm = document.getElementById('orderForm');
    if (orderForm) {
        orderForm.addEventListener('submit', function(e) {
            e.preventDefault(); 

            const produk = document.getElementById('produk').value;
            const harga = document.getElementById('harga').value;
            const nama = document.getElementById('nama').value;
            const nomor = document.getElementById('nomor').value;
            const alamat = document.getElementById('alamat').value;
            const nomorAdmin = '6282120035698'; 

            const pesan = `Halo, saya ingin memesan.

*Detail Pesanan:*
Produk: ${produk}
Harga: ${harga}

*Data Pembeli:*
Nama: ${nama}
Nomor WA: ${nomor}
Alamat: ${alamat}

Terima kasih.`;

            const encodedPesan = encodeURIComponent(pesan);
            // Perbaikan typo dari sebelumnya
            const whatsappLink = `https://wa.me/${nomorAdmin}?text=${encodedPesan}`;
            window.open(whatsappLink, '_blank');
        });
    }