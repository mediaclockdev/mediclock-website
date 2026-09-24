/* ============================================================
   landing.js
   Advertisement landing pages only (Perth, Melbourne). Loaded after main.js,
   which supplies the shared form validator and mcThankYou().

   Everything here is specific to these pages. Nothing in this file touches
   the main site, and no main-site script depends on it.
   ============================================================ */
(function () {
  "use strict";

  /* * Anything that sends the visitor to the form.
     One delegated listener rather than a handler per button, so a new CTA
     only needs the data attribute. */
  document.addEventListener("click", function (ev) {
    const trigger = ev.target.closest("[data-lp-scroll-to]");
    if (!trigger) return;
    const target = document.querySelector(trigger.dataset.lpScrollTo);
    if (!target) return;
    ev.preventDefault();
    const reduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    target.scrollIntoView({ behavior: reduced ? "auto" : "smooth", block: "center" });
    /* focus the first field so a keyboard visitor lands in the form rather
       than at the top of the document */
    const first = target.querySelector("input, textarea");
    if (first) {
      window.setTimeout(function () {
        first.focus({ preventScroll: true });
      }, reduced ? 0 : 420);
    }
  });

  /* * Sticky quote button — hidden until the hero form has scrolled away, and
     hidden again once the visitor reaches the footer, so it never covers the
     phone number or sits on top of the form it points at. */
  (function () {
    const btn = document.querySelector(".lp-sticky-quote"),
      form = document.getElementById("lp-quote"),
      footer = document.querySelector(".lp-footer");
    if (!btn || !form) return;

    let pastForm = false,
      atFooter = false;

    function apply() {
      btn.classList.toggle("is-shown", pastForm && !atFooter);
    }

    if (!("IntersectionObserver" in window)) {
      btn.classList.add("is-shown");
      return;
    }
    new IntersectionObserver(
      function (entries) {
        pastForm = !entries[0].isIntersecting;
        apply();
      },
      { rootMargin: "-80px 0px 0px 0px" },
    ).observe(form);

    if (footer) {
      new IntersectionObserver(function (entries) {
        atFooter = entries[0].isIntersecting;
        apply();
      }).observe(footer);
    }
  })();

  /* * Reviews — "Read more" expands a clamped review in place.
     The full text is always in the DOM; only its height is limited, so find
     in page and screen readers reach all of it either way. */
  document.addEventListener("click", function (ev) {
    const btn = ev.target.closest(".lp-review-more");
    if (!btn) return;
    const card = btn.closest(".lp-review");
    const open = card.classList.toggle("is-open");
    btn.setAttribute("aria-expanded", open ? "true" : "false");
    btn.textContent = open ? "Show less" : "Read more";
  });

  /* * Hero/trust video — play it only while it is on screen.
     `autoplay` alone is unreliable: several browsers refuse to start a video
     that has never been visible, and those that do start it burn data on a
     2.5MB file the visitor may never scroll to. Pausing it again on the way
     out keeps a long page from decoding video nobody is looking at. */
  (function () {
    const video = document.querySelector(".lp-trust-media video");
    if (!video || !("IntersectionObserver" in window)) return;
    if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
      video.removeAttribute("autoplay");
      video.pause();
      return;
    }
    new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            /* play() rejects if the browser still refuses; nothing to do
               about it, and an unhandled rejection would show in the console */
            const p = video.play();
            if (p && typeof p.catch === "function") p.catch(function () {});
          } else {
            video.pause();
          }
        });
      },
      { threshold: 0.25 },
    ).observe(video);
  })();

  /* * The form.
     main.js's validator runs first, in the capture phase, and stops this
     handler from firing while anything is invalid — so reaching here means
     every field passed. */
  (function () {
    const form = document.getElementById("lpQuoteForm"),
      success = document.getElementById("lpQuoteSuccess");
    if (!form) return;
    form.addEventListener("submit", function (ev) {
      ev.preventDefault();
      if (success) {
        form.hidden = true;
        success.hidden = false;
      }
      if (typeof window.mcThankYou === "function") {
        window.mcThankYou("enquiry");
      }
    });
  })();
})();
