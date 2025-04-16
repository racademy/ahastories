document.addEventListener("DOMContentLoaded", function () {
  // Parallax bg elements
  const section = document.querySelector(".programmes-hero");
  const element = document.querySelector(".background-element-fourth");

  function updateParallax() {
    if (!section || !element) return;

    const sectionRect = section.getBoundingClientRect();
    const windowHeight = window.innerHeight;

    if (sectionRect.top < windowHeight && sectionRect.bottom > 0) {
      const scrollPercent =
        1 - sectionRect.bottom / (windowHeight + sectionRect.height);
      const move = scrollPercent * 150;
      element.style.transform = `translateY(${move}px)`;
    }
  }

  window.addEventListener("scroll", updateParallax);
  window.addEventListener("resize", updateParallax);
  updateParallax();
  // End of parallax
});
