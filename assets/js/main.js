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
  // * Contact : live "0 / 180" counter for any textarea with data-counter
  document.querySelectorAll("[data-counter]").forEach((ta) => {
    const out = document.getElementById(ta.dataset.counter);
    if (!out) return;
    const update = () => (out.textContent = `${ta.value.length} / ${ta.maxLength}`);
    ta.addEventListener("input", update);
    update();
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

/* * Slider — shared carousel engine for [data-slider] (logo sliders, testimonials)
   Native horizontal scroll + scroll-snap does the actual moving, so touch
   swipe, trackpads and arrow keys work for free. This adds autoplay, dots and
   looping on top. Autoplay pauses on hover, keyboard focus and touch, while the
   slider is off-screen or the tab is hidden, and is off entirely for visitors
   who ask for reduced motion. Per-view counts come from the --cur custom
   property the CSS sets per breakpoint, so the dot count follows the layout. */
(function () {
  const sliders = document.querySelectorAll("[data-slider]");
  if (!sliders.length) return;
  const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)");

  sliders.forEach((root) => {
    const track = root.querySelector(".mc-slider-track");
    const dots = root.querySelector(".mc-slider-dots");
    if (!track) return;
    const slides = [...track.children];
    const delay = parseInt(root.dataset.autoplay, 10) || 0;
    let page = 0, pageCount = 1, timer = 0, paused = false, onScreen = true, ticking = false;

    const perView = () =>
      Math.max(1, parseInt(getComputedStyle(root).getPropertyValue("--cur"), 10) || 1);

    function markDots() {
      if (!dots) return;
      [...dots.children].forEach((b, i) =>
        b.setAttribute("aria-current", i === page ? "true" : "false"),
      );
    }
    function renderDots() {
      pageCount = Math.max(1, Math.ceil(slides.length / perView()));
      page = Math.min(page, pageCount - 1);
      if (!dots) return;
      dots.textContent = "";
      dots.hidden = pageCount < 2;
      for (let i = 0; i < pageCount; i++) {
        const b = document.createElement("button");
        b.type = "button";
        b.setAttribute("aria-label", `Show ${i + 1} of ${pageCount}`);
        b.addEventListener("click", () => {
          goTo(i);
          start();
        });
        dots.appendChild(b);
      }
      markDots();
    }
    function goTo(i) {
      page = (i + pageCount) % pageCount;
      const first = slides[page * perView()];
      if (first)
        track.scrollTo({
          left: first.offsetLeft,
          behavior: reduceMotion.matches ? "auto" : "smooth",
        });
      markDots();
    }
    function stop() {
      clearInterval(timer);
      timer = 0;
    }
    function start() {
      stop();
      if (!delay || reduceMotion.matches || pageCount < 2) return;
      timer = setInterval(() => {
        if (!paused && onScreen && !document.hidden) goTo(page + 1);
      }, delay);
    }

    // keep the dots honest when the visitor swipes or scrolls the track themselves
    track.addEventListener(
      "scroll",
      () => {
        if (ticking) return;
        ticking = true;
        requestAnimationFrame(() => {
          ticking = false;
          const atEnd = track.scrollLeft >= track.scrollWidth - track.clientWidth - 2;
          const step = slides[1] ? slides[1].offsetLeft - slides[0].offsetLeft : track.clientWidth;
          const i = atEnd ? pageCount - 1 : Math.round(track.scrollLeft / (step * perView()));
          const next = Math.min(Math.max(i, 0), pageCount - 1);
          if (next !== page) {
            page = next;
            markDots();
          }
        });
      },
      { passive: true },
    );

    root.addEventListener("mouseenter", () => (paused = true));
    root.addEventListener("mouseleave", () => (paused = false));
    root.addEventListener("focusin", () => (paused = true));
    root.addEventListener("focusout", (e) => {
      if (!root.contains(e.relatedTarget)) paused = false;
    });
    track.addEventListener("pointerdown", () => (paused = true));
    ["pointerup", "pointercancel"].forEach((t) =>
      track.addEventListener(t, () => {
        paused = false;
        start();
      }),
    );
    if ("IntersectionObserver" in window) {
      new IntersectionObserver(([e]) => (onScreen = e.isIntersecting)).observe(root);
      // Native lazy-loading only fetches a slide once it scrolls into the track, so
      // the next page would pop in blank mid-autoplay. Once the slider is within
      // ~800px of the viewport, load every slide's image instead.
      const preload = new IntersectionObserver(
        ([e]) => {
          if (!e.isIntersecting) return;
          root.querySelectorAll('img[loading="lazy"]').forEach((img) => (img.loading = "eager"));
          preload.disconnect();
        },
        { rootMargin: "800px 0px" },
      );
      preload.observe(root);
    }

    // per-view changes at the tablet / phone breakpoints, and the dot count with it.
    // ResizeObserver rather than window "resize": it also catches layout changes
    // that never fire a resize event (zoom, container changes, device emulation).
    let lastPerView = perView();
    const onLayout = () => {
      const pv = perView();
      if (pv === lastPerView) return;
      lastPerView = pv;
      renderDots();
      goTo(page);
      start();
    };
    if ("ResizeObserver" in window) new ResizeObserver(onLayout).observe(root);
    else window.addEventListener("resize", onLayout, { passive: true });
    if (reduceMotion.addEventListener) reduceMotion.addEventListener("change", start);

    renderDots();
    start();
  });
})();
