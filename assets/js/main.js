/* ============================================================
   main.js
   Shared by every page: sticky header, mobile menu, footer year.
   Media Clock — static rebuild
   ============================================================ */

/* * Header : sticky scroll state — background + shrink past 60px.
   Driven by an IntersectionObserver on the sentinel rather than a scroll
   handler, so nothing runs while scrolling — the browser fires once, at
   the 60px boundary, and the class change is the only DOM write. */
(function () {
  const siteHeader = document.querySelector(".site-header"),
    headerSentinel = document.querySelector(".header-sentinel");
  if (!siteHeader || !headerSentinel) return;

  let headerScrolled = false;
  function setHeaderScrolled(on) {
    if (on === headerScrolled) return;
    headerScrolled = on;
    siteHeader.classList.toggle("is-scrolled", on);
  }

  if ("IntersectionObserver" in window) {
    new IntersectionObserver(
      ([entry]) => setHeaderScrolled(!entry.isIntersecting),
      { threshold: 0 },
    ).observe(headerSentinel);
  } else {
    // fallback: throttled to one read per frame
    let headerTicking = false;
    window.addEventListener(
      "scroll",
      () => {
        if (headerTicking) return;
        headerTicking = true;
        requestAnimationFrame(() => {
          setHeaderScrolled(window.scrollY > 60);
          headerTicking = false;
        });
      },
      { passive: true },
    );
  }
  setHeaderScrolled(window.scrollY > 60);
})();

/* * Header : full-screen mobile menu */
(function () {
  const fsMenu = document.getElementById("fsMenu"),
    navToggle = document.getElementById("navToggle"),
    navClose = document.getElementById("navClose");
  if (!fsMenu || !navToggle) return;

  function setMenu(open) {
    fsMenu.classList.toggle("open", open);
    fsMenu.setAttribute("aria-hidden", open ? "false" : "true");
    navToggle.setAttribute("aria-expanded", open ? "true" : "false");
    // scroll lock is a class, not an inline style, so that CSS can scope it to
    // the mobile breakpoint — a stale "open" state can never lock the desktop
    document.body.classList.toggle("menu-open", open);
  }

  navToggle.addEventListener("click", () => setMenu(true));
  if (navClose) navClose.addEventListener("click", () => setMenu(false));
  fsMenu
    .querySelectorAll("a, button")
    .forEach((el) => el.addEventListener("click", () => setMenu(false)));
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") setMenu(false);
  });

  // The quote tab is painted ABOVE the menu (z-index 99999 vs 9999) and sits
  // outside it, so a tap there would otherwise open the contact panel behind
  // a still-open menu, with the body scroll still locked. Close the menu for
  // any contact trigger, wherever it lives.
  document
    .querySelectorAll(".sticky-quote, .contactBtn")
    .forEach((el) => el.addEventListener("click", () => setMenu(false)));

  // Opening the menu on a phone and then widening past the mobile breakpoint
  // (rotation, or a resized desktop window) would otherwise leave the
  // full-screen overlay covering the desktop layout with the body locked.
  const desktop = window.matchMedia("(min-width: 992px)");
  const onBreakpoint = (e) => {
    if (e.matches) setMenu(false);
  };
  if (desktop.addEventListener)
    desktop.addEventListener("change", onBreakpoint);
  else if (desktop.addListener) desktop.addListener(onBreakpoint); // Safari < 14
})();

/* * Footer : current year */
(function () {
  const yearEl = document.getElementById("gfyear");
  if (yearEl) yearEl.textContent = new Date().getFullYear();
})();

/* * Service hero : Request For Proposal card */
(function () {
  const form = document.getElementById("rfpForm"),
    success = document.getElementById("rfpSuccess");
  if (!form || !success) return;
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    if (!form.checkValidity()) {
      form.reportValidity();
      return;
    }
    form.hidden = true;
    success.hidden = false;
  });
})();

/* * Contact section : panel opened by any .contactBtn (header, footer, hero, CTAs) */
(function () {
  const contact = document.getElementById("contact"),
    interest = document.getElementById("interest");
  // header + footer both carry .contactBtn, so bail out politely if a page
  // has no contact panel rather than throwing on click
  if (!contact) return;
  function openContact(v) {
    contact.classList.add("active");
    contact.setAttribute("aria-hidden", "false");
    if (v) interest.value = v;
    setTimeout(
      () => contact.scrollIntoView({ behavior: "smooth", block: "start" }),
      30,
    );
  }
  document
    .querySelectorAll(".contactBtn")
    .forEach((b) =>
      b.addEventListener("click", () => openContact(b.dataset.interest)),
    );
  const enquiryForm = document.getElementById("form");
  if (enquiryForm)
    enquiryForm.addEventListener("submit", (e) => {
      e.preventDefault();
      if (!e.target.checkValidity()) {
        e.target.reportValidity();
        return;
      }
      e.target.classList.add("hidden");
      document.getElementById("success").classList.add("show");
    });
})();

/* * FAQ Accordion — shared component */
(function () {
  const faqItems = document.querySelectorAll(".faqitem");
  if (!faqItems.length) return;
  document.querySelectorAll(".faqbtn").forEach((b) =>
    b.addEventListener("click", () => {
      const currentItem = b.closest(".faqitem");
      const isAlreadyOpen = currentItem.classList.contains("open");

      // Close all other FAQ items so multiple cannot be open simultaneously
      faqItems.forEach((item) => {
        if (item !== currentItem) {
          item.classList.remove("open");
          const btn = item.querySelector(".faqbtn");
          if (btn) btn.setAttribute("aria-expanded", "false");
        }
      });

      // Toggle clicked item
      currentItem.classList.toggle("open", !isAlreadyOpen);
      b.setAttribute("aria-expanded", !isAlreadyOpen ? "true" : "false");
    }),
  );
})();
