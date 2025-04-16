document.addEventListener("DOMContentLoaded", function () {
  // Parallax bg elements why need it section
  const section = document.querySelector(".home-why-need-it");
  const elements = document.querySelectorAll(".background-element-three");

  function updateParallax() {
    if (!section || elements.length === 0) return;

    const sectionRect = section.getBoundingClientRect();
    const windowHeight = window.innerHeight;

    if (sectionRect.top < windowHeight && sectionRect.bottom > 0) {
      const scrollPercent =
        1 - sectionRect.bottom / (windowHeight + sectionRect.height);
      const offset = scrollPercent * 100;

      elements.forEach((el) => {
        const move = scrollPercent * 100;
        el.style.transform = `translateY(${move}px)`;
      });
    }
  }

  window.addEventListener("scroll", updateParallax);
  window.addEventListener("resize", updateParallax);
  updateParallax();
  // End of parallax
});
