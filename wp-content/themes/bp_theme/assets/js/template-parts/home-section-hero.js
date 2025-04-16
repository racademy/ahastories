jQuery(function ($) {
  $(document).ready(function () {
    // Init hero slider in wp admin and front
    if (typeof wp !== "undefined" && wp.domReady) {
      wp.domReady(function () {
        setTimeout(initializeSlider, 1500);
      });
    } else {
      initializeSlider();
    }
    // init slider ending

    function initializeSlider() {
      // Slider hero section
      const splide1 = new Splide(".hero__slider1", {
        type: "loop",
        direction: "ttb",
        drag: "free",
        focus: "center",
        heightRatio: 0.5,
        perPage: 3,
        autoScroll: {
          speed: 0.7,
          pauseOnHover: false,
        },
        pagination: false,
        arrows: false,
        pauseOnHover: false,
        breakpoints: {
          1024: {
            direction: "rtl",
            perPage: 3.5,
            autoScroll: {
              pauseOnHover: true,
            },
          },
          800: {
            perPage: 3,
          },
          700: {
            perPage: 2.5,
          },
          575: {
            perPage: 2,
          },
          475: {
            perPage: 1.5,
          },
        },
      });

      const splide2 = new Splide(".hero__slider2", {
        type: "loop",
        direction: "ttb",
        drag: "free",
        focus: "center",
        heightRatio: 0.5,
        perPage: 3,
        autoScroll: {
          speed: -0.7,
          pauseOnHover: false,
        },
        pagination: false,
        arrows: false,
        pauseOnHover: false,
        breakpoints: {
          1024: {
            direction: "rtl",
            perPage: 3.5,
          },
          800: {
            perPage: 3,
          },
          700: {
            perPage: 2.5,
          },
          575: {
            perPage: 2,
          },
          475: {
            perPage: 1.5,
          },
        },
      });

      splide1.mount(window.splide.Extensions);
      splide2.mount(window.splide.Extensions);
      // Slider hero section end
    }
  });
});
