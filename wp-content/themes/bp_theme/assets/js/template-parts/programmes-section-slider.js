jQuery(function ($) {
  $(document).ready(function () {
    // Init programmes slider in wp admin and front
    if (typeof wp !== "undefined" && wp.domReady) {
      wp.domReady(function () {
        setTimeout(function () {
          initializeProgrammesSlider();
        }, 1300);
      });
    } else {
      initializeProgrammesSlider();
    }
    // init slider ending

    function initializeProgrammesSlider() {
      // Programmes slider
      new Splide("#programmes-splide-slider", {
        type: "loop",
        perPage: 1,
        gap: "12px",
        arrows: true,
        pagination: false,
        padding: {
          left: "39%",
          right: "20%",
        },
        breakpoints: {
          1024: {
            padding: {
              left: "30%",
              right: "10%",
            },
          },
          768: {
            padding: {
              left: "20%",
              right: "10%",
            },
          },
          500: {
            padding: {
              left: "0%",
              right: "10%",
            },
          },
        },
      }).mount();
      // End slider
    }
  });
});
