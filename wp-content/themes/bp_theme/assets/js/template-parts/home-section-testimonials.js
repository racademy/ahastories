jQuery(function ($) {
  $(document).ready(function () {
    // Init testimonials slider in wp admin and front
    if (typeof wp !== "undefined" && wp.domReady) {
      wp.domReady(function () {
        setTimeout(function () {
          initializeTestimonialsSlider();
        }, 1800);
      });
    } else {
      initializeTestimonialsSlider();
    }
    // init slider ending

    function initializeTestimonialsSlider() {
      // Testimonial slider
      new Splide(".testimonials-slider", {
        type: "loop",
        perPage: 3,
        gap: "24px",
        arrows: true,
        pagination: true,
        breakpoints: {
          1200: {
            perPage: 2,
          },
          800: {
            perPage: 1,
            pagination: false,
          },
        },
      }).mount();
      // End slider
    }

    // Parallax bg elements
    const section = document.querySelector(".home-section-testimonials");
    const elements = document.querySelectorAll(
      ".background-element-one, .background-element-two"
    );

    function updateParallax() {
      if (!section || elements.length === 0) return;

      const sectionRect = section.getBoundingClientRect();
      const windowHeight = window.innerHeight;

      if (sectionRect.top < windowHeight && sectionRect.bottom > 0) {
        const scrollPercent =
          1 - sectionRect.bottom / (windowHeight + sectionRect.height);
        const offset = scrollPercent * 100;

        elements.forEach((el, index) => {
          const multiplier = index === 0 ? 100 : 80;
          const move = scrollPercent * multiplier;
          el.style.transform = `translateY(${move}px)`;
        });
      }
    }

    window.addEventListener("scroll", updateParallax);
    window.addEventListener("resize", updateParallax);
    updateParallax();
    // End of parallax
  });
});
