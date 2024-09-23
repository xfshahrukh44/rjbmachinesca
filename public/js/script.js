$('.dropdown-do').hover(function () {
  var isHovered = $(this).is(':hover')
  if (isHovered) {
    $(this).children('.sub-menu').stop().slideDown(300)
  } else {
    $(this).children('.sub-menu').stop().slideUp(300)
  }
})

document.addEventListener("DOMContentLoaded", function() {
    $('.banner-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        responsive: {
            0: { items: 1 },
            600: { items: 1 },
            1000: { items: 1 }
        }
    });
});


$('.pro-slider').owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  dots: false,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 3
    },
    1000: {
      items: 3
    }
  }
})

// testimonials-slider
$('.testimonials-slider').owlCarousel({
  loop: true,
  margin: 10,
  nav: false,
  dots: false,
  autoplay: true,
  autoplayTimeout: 5000,
  autoplayHoverPause: false,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 2
    },
    1000: {
      items: 2
    }
  }
});






