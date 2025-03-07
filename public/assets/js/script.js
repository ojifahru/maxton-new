let lastScroll = 0;
window.addEventListener("scroll", () => {
  if (Date.now() - lastScroll < 50) return; // Throttling event
  lastScroll = Date.now();

  const navbar = document.getElementById("navbar");

  if (window.scrollY > 50) {
    // Ketika scroll lebih dari 50px
    navbar.classList.remove("bg-opacity-50"); // Hapus opacity
    navbar.classList.add("sticky-top");
    navbar.classList.remove("navbar-floating");
  } else {
    // Ketika scroll kurang dari atau sama dengan 50px
    navbar.classList.add("bg-opacity-50"); // Tambahkan opacity kembali
    navbar.classList.remove("sticky-top");
    navbar.classList.add("navbar-floating");
  }
});

// Tambahkan datatable
$(document).ready(() => {
  $("#myTable").DataTable();
});

// Get the button
var mybutton = document.getElementById("backToTopBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

$(document).ready(function () {
  $(".owl-carousel").owlCarousel({
    loop: true,
    margin: 20,
    // nav: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 2,
      },
      1000: {
        items: 3,
      },
    },
  });
});
