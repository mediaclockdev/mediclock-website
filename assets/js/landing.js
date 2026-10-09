/* ============================================================
   landing.js
   Advertisement landing pages only (Perth, Melbourne). Loaded after main.js,
   which supplies the shared form validator and mcThankYou().

   Everything here is specific to these pages. Nothing in this file touches
   the main site, and no main-site script depends on it.
   ============================================================ */
(function () {
  "use strict";

  /* * Quote Popup Modal controller */
  const quoteModal = document.getElementById("lpQuoteModal");
  let touchStartY = null;
  let touchMoved = false;

  function openQuoteModal() {
    if (!quoteModal) return;
    quoteModal.classList.add("is-open");
    quoteModal.setAttribute("aria-hidden", "false");
    const firstInput = quoteModal.querySelector("input:not([type=hidden])");
    if (firstInput) {
      setTimeout(function () {
        firstInput.focus();
      }, 150);
    }
  }

  function closeQuoteModal() {
    if (!quoteModal) return;
    quoteModal.classList.remove("is-open");
    quoteModal.setAttribute("aria-hidden", "true");
  }

  // Smooth wheel scrolling for the underlying website while modal is open
  if (quoteModal) {
    quoteModal.addEventListener("wheel", function (ev) {
      const dialog = quoteModal.querySelector(".lp-modal-dialog");
      if (dialog && ev.target.closest(".lp-modal-dialog")) {
        const canScrollUp = ev.deltaY < 0 && dialog.scrollTop > 0;
        const canScrollDown = ev.deltaY > 0 && (dialog.scrollTop + dialog.clientHeight < dialog.scrollHeight - 1);
        if (canScrollUp || canScrollDown) {
          return;
        }
      }
      window.scrollBy({ top: ev.deltaY, left: ev.deltaX, behavior: "auto" });
    }, { passive: true });

    // Touch scrolling on mobile backdrop
    quoteModal.addEventListener("touchstart", function (ev) {
      touchMoved = false;
      if (ev.touches.length === 1) {
        touchStartY = ev.touches[0].clientY;
      }
    }, { passive: true });

    quoteModal.addEventListener("touchmove", function (ev) {
      if (touchStartY !== null && ev.touches.length === 1) {
        const currentY = ev.touches[0].clientY;
        const deltaY = touchStartY - currentY;
        if (Math.abs(deltaY) > 5) {
          touchMoved = true;
        }
        const dialog = quoteModal.querySelector(".lp-modal-dialog");
        if (dialog && ev.target.closest(".lp-modal-dialog")) {
          const canScrollUp = deltaY < 0 && dialog.scrollTop > 0;
          const canScrollDown = deltaY > 0 && (dialog.scrollTop + dialog.clientHeight < dialog.scrollHeight - 1);
          if (canScrollUp || canScrollDown) {
            touchStartY = currentY;
            return;
          }
        }
        window.scrollBy({ top: deltaY, behavior: "auto" });
        touchStartY = currentY;
      }
    }, { passive: true });

    quoteModal.addEventListener("touchend", function () {
      touchStartY = null;
    }, { passive: true });
  }

  // Delegated click listener: opening and closing modal
  document.addEventListener("click", function (ev) {
    if (ev.target.closest("[data-lp-open-modal], [data-lp-scroll-to='#lp-quote']")) {
      ev.preventDefault();
      openQuoteModal();
      return;
    }
    const closeBtn = ev.target.closest("[data-lp-close-modal]");
    if (closeBtn) {
      if (touchMoved && closeBtn.classList.contains("lp-modal-backdrop")) {
        // Was dragging/scrolling, don't close
        touchMoved = false;
        return;
      }
      ev.preventDefault();
      closeQuoteModal();
      return;
    }
    const otherScroll = ev.target.closest("[data-lp-scroll-to]");
    if (otherScroll && otherScroll.dataset.lpScrollTo !== "#lp-quote") {
      const target = document.querySelector(otherScroll.dataset.lpScrollTo);
      if (!target) return;
      ev.preventDefault();
      const reduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
      target.scrollIntoView({ behavior: reduced ? "auto" : "smooth", block: "center" });
    }
  });

  // Close modal with Escape key
  document.addEventListener("keydown", function (ev) {
    if (ev.key === "Escape" && quoteModal && quoteModal.classList.contains("is-open")) {
      closeQuoteModal();
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

  /* * Hero showreel — play it only while it is on screen.
     `autoplay` alone is unreliable: several browsers refuse to start a video
     that has never been visible, and those that do start it burn data on a
     2.5MB file the visitor may never scroll to. Pausing it again on the way
     out keeps a long page from decoding video nobody is looking at. */
  (function () {
    const video = document.querySelector(".lp-hero-media video");
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

  /* * The form(s) — both the inline closing quote and the popup modal quote.
     main.js's validator runs first, in the capture phase, and stops this
     handler from firing while anything is invalid — so reaching here means
     every field passed. */
  (function () {
    [
      { formId: "lpQuoteForm", successId: "lpQuoteSuccess" },
      { formId: "lpModalQuoteForm", successId: "lpModalQuoteSuccess" },
    ].forEach(function (cfg) {
      const form = document.getElementById(cfg.formId),
        success = document.getElementById(cfg.successId);
      if (!form) return;

      form.addEventListener("submit", function (ev) {
        ev.preventDefault();

        const base = (document.body && document.body.dataset.siteBase) || "/";
        const action = form.getAttribute("action") || (base + "send-contact.php");
        const submitBtn = form.querySelector('button[type="submit"]');

        if (submitBtn) {
          submitBtn.disabled = true;
          submitBtn.dataset.origText = submitBtn.textContent;
          submitBtn.textContent = "Sending...";
        }

        const formData = new FormData(form);

        fetch(action, {
          method: "POST",
          body: formData,
          headers: {
            "X-Requested-With": "XMLHttpRequest",
            "Accept": "application/json",
          },
        })
          .then((res) => res.json())
          .then((data) => {
            if (data && data.success) {
              if (submitBtn) {
                submitBtn.textContent = "Redirecting...";
              }
              const kind = (data && data.kind) || "enquiry";
              if (typeof window.mcThankYou === "function") {
                window.mcThankYou(kind);
              } else {
                const base = (document.body && document.body.dataset.siteBase) || "/";
                const url = base + "thank-you/?form=" + encodeURIComponent(kind);
                try {
                  window.location.replace(url);
                } catch (e) {
                  window.location.href = url;
                }
              }
              // Fallback: if browser hasn't redirected after 2.5s, show inline message
              setTimeout(() => {
                if (success) {
                  form.hidden = true;
                  success.hidden = false;
                }
              }, 2500);
            } else {
              alert((data && data.message) || "Failed to send request. Please try again.");
              if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.textContent = submitBtn.dataset.origText || "Submit";
              }
            }
          })
          .catch((err) => {
            console.error("Form error:", err);
            alert("Sorry, an error occurred while sending your request. Please try again.");
            if (submitBtn) {
              submitBtn.disabled = false;
              submitBtn.textContent = submitBtn.dataset.origText || "Submit";
            }
          });
      });
    });
  })();
})();
