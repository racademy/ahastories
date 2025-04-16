jQuery(document).ready(function ($) {
  // URL redirection and hash hiding
  const links = document.querySelectorAll('a[href^="#"]');

  links.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();

      const targetId = this.getAttribute("href").substring(1);

      const isHomePage = window.location.pathname === "/";

      if (!isHomePage) {
        window.location.href = "/#" + targetId;
      } else {
        const targetElement = document.getElementById(targetId);
        if (targetElement) {
          targetElement.scrollIntoView({
            behavior: "smooth",
            block: "start",
          });
        }
      }
    });
  });

  if (window.location.hash) {
    const targetId = window.location.hash.substring(1);
    const targetElement = document.getElementById(targetId);
    if (targetElement) {
      targetElement.scrollIntoView({
        behavior: "smooth",
        block: "start",
      });

      history.pushState(null, null, " ");
    }
  }
  // URL redirection and hash hiding end

  // Nav menu mobile , arrows by screen width changing default ones
  const menuToggle = document.querySelector(".menu-toggle");
  const nav = document.querySelector(".main-navigation");

  function isDesktop() {
    return window.innerWidth < 1024;
  }

  if (menuToggle && nav && isDesktop()) {
    menuToggle.addEventListener("click", () => {
      if (nav.classList.contains("active")) {
        nav.classList.remove("active");

        setTimeout(() => {
          nav.style.display = "none";
        }, 400);
      } else {
        nav.style.display = "block";
        setTimeout(() => {
          nav.classList.add("active");
        }, 10);
      }

      menuToggle.classList.toggle("open");
    });
  }

  if (isDesktop()) {
    document.querySelectorAll(".menu-item.has-children").forEach((item) => {
      const arrow = item.querySelector(".submenu-arrow");

      if (arrow) {
        const toggleBtn = document.createElement("button");
        toggleBtn.setAttribute("aria-expanded", "false");
        toggleBtn.classList.add("submenu-toggle");
        toggleBtn.appendChild(arrow);

        const link = item.querySelector(".menu-link");
        link.insertAdjacentElement("afterend", toggleBtn);

        toggleBtn.addEventListener("click", (e) => {
          e.preventDefault();
          item.classList.toggle("submenu-open");
          const isExpanded = toggleBtn.getAttribute("aria-expanded") === "true";
          toggleBtn.setAttribute("aria-expanded", String(!isExpanded));
        });
      }
    });
  }
  // Nav menu end mobile

  // Modal openining and closing
  const openModalBtns = document.querySelectorAll(".open-modal");
  const modal = document.getElementById("open-modal");
  const modalForm = document.querySelector(".modal-form");
  let originalFormHTML = modalForm ? modalForm.innerHTML : "";

  const openModal = () => {
    modal.style.display = "flex";
    document.body.classList.add("modal-open");
  };

  const closeModal = () => {
    modal.style.display = "none";
    document.body.classList.remove("modal-open");

    if (modalForm) {
      modalForm.innerHTML = originalFormHTML;
    }
  };

  openModalBtns.forEach((btn) => {
    btn.addEventListener("click", function (e) {
      e.preventDefault();
      openModal();
    });
  });

  document.addEventListener("click", function (e) {
    if (
      e.target.id === "close-modal" ||
      e.target.classList.contains("modal-close")
    ) {
      closeModal();
    }

    if (e.target === modal) {
      closeModal();
    }
  });

  // Replace modal content with CF7 success message
  document.addEventListener("wpcf7mailsent", function () {
    const modalForm = document.querySelector(".modal-form");
    const successMessage = document.getElementById("modal-success-message");

    if (modalForm && successMessage) {
      modalForm.innerHTML = successMessage.innerHTML;
    }
  });
  // Modal ending
});
