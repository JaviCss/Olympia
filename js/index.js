$("#owl1").owlCarousel({
  autoplay: false,
  autoplayTimeout: 3000,
  autoplayHoverPause: true,
  autoplaySpeed: 1000,
  items: 1,
  loop: true,
  autoHeight: false,
  responsiveClass: true,
  responsive: {
    0: {
      margin: 10,
      items: 1,
      nav: false,
      dots: true,
    },
    600: {
      margin: 10,
      items: 1,
      nav: false,
      dots: true,
    },
    1024: {
      margin: 60,
      items: 1,
      nav: false,
      loop: false,
      dots: true,
    },
  },
});

/*
  $(document).ready(function () {
    // FONDO NAVBAR
    $(window).scroll(function () {
      if ($('.navbar').offset().top > 100) {
        $('.navbar').addClass('fondo')
      } else {
        $('.navbar').removeClass('fondo')
      }
    })
  })
  */
const element = document.querySelector('.icon-down');
element.classList.add('animate__animated', 'animate__slideInDown', 'animate__infinite', 'infinite', 'animate__slow');


grecaptcha.ready(function () {
  grecaptcha.execute('6LfFf8oaAAAAAJEnFqr1kZAeobLezLOYXUrGS5J9', { action: 'homepage' }).then(function (token) {
    // Add your logic to submit to your backend server here.
    $('#google-response').val(token)
  });
});
