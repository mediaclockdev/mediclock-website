/* ============================================================
   case-study.js — one project's case study (case-study.php)
   Reveal on scroll, the slow-scrolling phone screenshot and the
   device tilt. (The reading progress bar is commented out below.) A project's own live mockups
   have their own script (assets/js/case-studies/<slug>.js).
   ============================================================ */

(function () {
  const page = document.querySelector(".cs-page");
  if (!page) return;

  const reduceMotion = matchMedia("(prefers-reduced-motion: reduce)").matches;
  const finePointer = matchMedia("(pointer: fine)").matches;
  const hasObserver = "IntersectionObserver" in window;

  /* * Reveal on scroll : copy rises in (.cs-up), devices drop in (.cs-rv) */
  const reveals = page.querySelectorAll(".cs-up, .cs-rv");
  if (hasObserver) {
    const revealObserver = new IntersectionObserver(
      (entries) =>
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          entry.target.classList.add("is-in");
          revealObserver.unobserve(entry.target);
        }),
      { threshold: 0.2 },
    );
    reveals.forEach((el) => revealObserver.observe(el));
  } else {
    reveals.forEach((el) => el.classList.add("is-in"));
  }

  /* * Progress bar : how far down the page the reader is
     Hidden for now — no other page on the site has one. Remove this comment
     (and the ones in case-study.php and case-study.css) to bring it back.
  const progress = page.querySelector(".cs-progress");
  if (progress) {
    let queued = false;
    const draw = () => {
      queued = false;
      const doc = document.documentElement;
      const max = doc.scrollHeight - doc.clientHeight || 1;
      progress.style.transform = "scaleX(" + Math.min(1, doc.scrollTop / max) + ")";
    };
    addEventListener(
      "scroll",
      () => {
        if (queued) return;
        queued = true;
        requestAnimationFrame(draw);
      },
      { passive: true },
    );
    draw();
  }
  */

  /* * Scrolling phone : the screenshot travels its own height minus the
     screen's (--d), at about 15px a second (--t), once the phone is on screen */
  const scrollers = page.querySelectorAll("[data-cs-scroll]");
  const fit = () =>
    scrollers.forEach((phone) => {
      const track = phone.querySelector(".cs-scroll-track");
      const distance = Math.max(0, track.offsetHeight - track.parentNode.clientHeight);
      track.style.setProperty("--d", distance + "px");
      track.style.setProperty("--t", Math.max(40, Math.round(distance / 15)) + "s");
    });
  if (scrollers.length) {
    fit();
    addEventListener("resize", fit);
    addEventListener("load", fit);
    scrollers.forEach((phone) => phone.querySelector("img").addEventListener("load", fit));
    if (hasObserver && !reduceMotion) {
      const scrollObserver = new IntersectionObserver(
        (entries) =>
          entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add("is-running");
            scrollObserver.unobserve(entry.target);
          }),
        { threshold: 0.4 },
      );
      scrollers.forEach((phone) => scrollObserver.observe(phone));
    }
  }

  /* * Tilt : the tablet and laptop turn a little towards the pointer */
  if (finePointer && !reduceMotion) {
    page.querySelectorAll("[data-cs-tilt]").forEach((device) => {
      device.addEventListener("pointermove", (e) => {
        const r = device.getBoundingClientRect();
        const x = (e.clientX - r.left) / r.width - 0.5;
        device.style.transition = "rotate .1s";
        device.style.rotate = "y " + x * 14 + "deg";
      });
      device.addEventListener("pointerleave", () => {
        device.style.transition = "rotate .6s";
        device.style.rotate = "";
      });
    });
  }
})();
