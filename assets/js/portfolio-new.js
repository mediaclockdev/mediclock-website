/* ============================================================
   portfolio-new.js — the new portfolio page (portfolio-new.php)
   Reveal on scroll, the process timeline trigger, the project
   filters, the card tilt and the custom cursor.
   ============================================================ */

(function () {
  const page = document.querySelector(".pf-page");
  if (!page) return;

  const reduceMotion = matchMedia("(prefers-reduced-motion: reduce)").matches;
  const finePointer = matchMedia("(pointer: fine)").matches;
  const projects = page.querySelectorAll(".pf-project");

  /* * Reveal on scroll : fade each .pf-reveal up the first time it shows */
  const reveals = page.querySelectorAll(".pf-reveal");
  if ("IntersectionObserver" in window) {
    const revealObserver = new IntersectionObserver(
      (entries) =>
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          entry.target.classList.add("is-visible");
          revealObserver.unobserve(entry.target);
        }),
      { threshold: 0.12 },
    );
    reveals.forEach((el) => revealObserver.observe(el));
  } else {
    reveals.forEach((el) => el.classList.add("is-visible"));
  }

  /* * Process timeline : start the line once a third of the section is on screen */
  const process = page.querySelector(".pf-process");
  if (process) {
    if ("IntersectionObserver" in window) {
      const processObserver = new IntersectionObserver(
        (entries) => {
          if (!entries.some((entry) => entry.isIntersecting)) return;
          process.classList.add("is-active");
          processObserver.disconnect();
        },
        { threshold: 0.35 },
      );
      processObserver.observe(process);
    } else {
      process.classList.add("is-active");
    }
  }

  /* * Filters : show only the projects whose data-type matches */
  const filters = page.querySelectorAll(".pf-filter");
  filters.forEach((btn) =>
    btn.addEventListener("click", () => {
      filters.forEach((b) => {
        b.classList.toggle("is-active", b === btn);
        b.setAttribute("aria-pressed", b === btn ? "true" : "false");
      });
      const filter = btn.dataset.filter;
      let shown = 0;
      projects.forEach((project) => {
        const show = filter === "all" || project.dataset.type === filter;
        project.hidden = !show;
        if (show && !reduceMotion && project.animate) {
          project.animate(
            [
              { opacity: 0, transform: "translateY(18px)" },
              { opacity: 1, transform: "translateY(0)" },
            ],
            { duration: 420, delay: shown * 45, easing: "ease-out" },
          );
        }
        if (show) shown++;
      });
    }),
  );

  if (!finePointer || reduceMotion) return;

  /* * Card tilt : a slight 3D lean towards the mouse */
  projects.forEach((card) => {
    card.addEventListener("mousemove", (e) => {
      const r = card.getBoundingClientRect(),
        x = (e.clientX - r.left) / r.width - 0.5,
        y = (e.clientY - r.top) / r.height - 0.5;
      // same lift as the CSS :hover (--pf-lift), plus the lean
      card.style.transform = `perspective(900px) rotateY(${x * 3}deg) rotateX(${-y * 3}deg) translateY(-6px)`;
    });
    card.addEventListener("mouseleave", () => (card.style.transform = ""));
  });

  /* * Cursor : an orange dot that follows the mouse and grows over anything clickable */
  const cursor = page.querySelector(".pf-cursor");
  if (!cursor) return;
  document.addEventListener("mousemove", (e) => {
    cursor.style.left = e.clientX + "px";
    cursor.style.top = e.clientY + "px";
    cursor.classList.add("is-on");
  });
  document.addEventListener("mouseleave", () => cursor.classList.remove("is-on"));
  page.querySelectorAll("a, button, .pf-project").forEach((el) => {
    el.addEventListener("mouseenter", () => cursor.classList.add("is-big"));
    el.addEventListener("mouseleave", () => cursor.classList.remove("is-big"));
  });
})();
