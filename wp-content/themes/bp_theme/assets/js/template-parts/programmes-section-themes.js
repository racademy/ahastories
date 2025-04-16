document.addEventListener("DOMContentLoaded", () => {
  // Accordion themes section
  const items = document.querySelectorAll(".theme-item");

  items.forEach((item) => {
    const toggle = item.querySelector(".theme-item__toggle");
    const answer = item.querySelector(".theme-item__answer");

    toggle.addEventListener("click", () => {
      const isOpen = item.classList.contains("active");

      items.forEach((el) => {
        if (el !== item) {
          el.classList.remove("active");
          el.querySelector(".theme-item__answer").style.maxHeight = "0px";
        }
      });

      if (!isOpen) {
        item.classList.add("active");
        answer.style.maxHeight = answer.scrollHeight + "px";
      } else {
        item.classList.remove("active");
        answer.style.maxHeight = "0px";
      }

      toggle.setAttribute("aria-expanded", !isOpen);
    });
  });
  // End of accordion
});
