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

  // A .contactBtn outside the menu (a hero or package button) sits above it and
  // would otherwise open the contact panel behind a still-open menu, with the
  // body scroll still locked. Close the menu for any contact trigger.
  document
    .querySelectorAll(".contactBtn")
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

/* * Forms : validation for every form on the site (contact, RFP card, subscribe)
   Rules per field (by type / name) — every message shows under its field:
     required     not empty, and not just spaces
     name         letters, spaces, ' - . only, 2+ characters
     company      2+ characters
     email        name@domain.tld
     tel          digits, spaces, + - ( ) only; 8–15 digits, or a valid
                  Australian number when data-phone="au" (field behind +61)
     website      optional; domain with or without http(s)://
     message      10+ characters
     select       an option picked
     radio group  one option picked, when any radio in the group is required
                  (the group is checked through its first radio)
   On submit an invalid form is stopped here (before the forms' own success
   handlers below), every error is shown and the first bad field is focused. */
(function () {
  const forms = document.querySelectorAll("form[novalidate]");
  if (!forms.length) return;
  /* local part: dot-separated runs of the characters an address may use, so
     "dana..x@", ".dana@" and "dana.@" are all refused. Domain: labels with at
     least one character between the dots, then a 2+ letter suffix. */
  const EMAIL =
      /^[A-Za-z0-9!#$%&'*+/=?^_`{|}~-]+(\.[A-Za-z0-9!#$%&'*+/=?^_`{|}~-]+)*@[^\s@.]+(\.[^\s@.]+)*\.[a-z]{2,}$/i,
    AU_PHONE = /^0?[2-478]\d{8}$/,
    /* \u2019 as well as ': phones and word processors substitute a typographic
       apostrophe automatically, so O\u2019Brien would otherwise be rejected */
    PERSON = /^[\p{L}][\p{L}\s'\u2019.-]*$/u,
    WEBSITE = /^(https?:\/\/)?([a-z0-9-]+\.)+[a-z]{2,}(:\d+)?([/?#]\S*)?$/i;

  const kind = (el) => {
    const n = el.name.replace(/^rfp_/, "");
    if (el.type === "radio") return n === "budget" ? "budget" : "choice";
    if (el.type === "file") return "file";
    if (el.type === "email") return "email";
    if (el.type === "tel") return "phone";
    if (el.tagName === "SELECT") return "select";
    if (el.tagName === "TEXTAREA" || n === "message") return "message";
    if (/name$/.test(n) && n !== "company") return "person";
    if (n === "company") return "company";
    if (n === "website") return "website";
    return "text";
  };
  const EMPTY = {
    email: "Please enter your email address.",
    phone: "Please enter your phone number.",
    select: "Please select a service.",
    budget: "Please select your project budget.",
    choice: "Please choose an option.",
    message: "Please write your requirements.",
    person: "Please enter your name.",
    company: "Please enter your company name.",
    file: "Please choose a file.",
    text: "This field is required.",
  };

  /* * What a field will accept as it is typed.
     The validator below says whether a value is *right*; these say which
     characters can appear at all, so a letter typed into a phone number never
     shows up rather than sitting there until the visitor is told off for it.
     Each one mirrors the pattern its field is checked against.
     Deliberately not applied to the message, company or website fields: those
     take almost anything, and silently eating a character while someone writes
     is worse than telling them afterwards. */
  const collapse = (v) => v.replace(/\s{2,}/g, " ").replace(/^\s+/, "");
  const SANITISE = {
    phone: (v) => collapse(v.replace(/[^\d\s()+.-]/g, "")),
    person: (v) => collapse(v.replace(/[^\p{L}\s'\u2019.-]/gu, "")),
    /* only whitespace: an address is too varied to filter safely, and
       stripping more could turn a mistyped address into a valid wrong one.
       A space is the one thing that is never part of one and is the usual
       leftover when pasting out of a signature. */
    email: (v) => v.replace(/\s+/g, ""),
  };

  function problem(el) {
    if (el.type === "radio") {
      const picked = el.form.querySelector(`input[name="${el.name}"]:checked`);
      return picked ? "" : EMPTY[kind(el)];
    }
    const v = el.value.trim(),
      k = kind(el);
    // data-empty lets a page word its own "this is required" line
    if (!v) return el.required ? el.dataset.empty || EMPTY[k] || EMPTY.text : "";
    switch (k) {
      case "email":
        return EMAIL.test(v) ? "" : "Please enter a valid email address, e.g. name@company.com.au.";
      case "phone": {
        if (/[^\d\s()+.-]/.test(v)) return "Phone number can only contain digits, spaces, +, - and brackets.";
        let digits = v.replace(/\D/g, "");
        if (el.dataset.phone === "au") {
          if (digits.length === 11 && digits.startsWith("61")) digits = digits.slice(2);
          return AU_PHONE.test(digits) ? "" : "Please enter a valid Australian phone number, e.g. 412 345 678.";
        }
        return digits.length >= 8 && digits.length <= 15 ? "" : "Please enter a valid phone number (8–15 digits).";
      }
      case "person":
        if (v.length < 2) return "Name must be at least 2 characters.";
        return PERSON.test(v) ? "" : "Name can only contain letters, spaces, apostrophes and hyphens.";
      case "company":
        if (v.length < 2) return "Company name must be at least 2 characters.";
        /* length alone let "12" and "@@" through */
        return /\p{L}/u.test(v) ? "" : "Please enter a valid company name.";
      case "website":
        return WEBSITE.test(v) ? "" : "Please enter a valid website, e.g. yourwebsite.com.au.";
      case "message":
        return v.length >= 10 ? "" : "Please add a little more detail (at least 10 characters).";
      case "file": {
        /* `accept` only filters the picker: the visitor can switch it to "all
           files" or drag one in, so the type and the size are checked here too */
        const f = el.files && el.files[0];
        if (!f) return "";
        const exts = (el.accept || "")
          .split(",")
          .map((a) => a.trim().toLowerCase())
          .filter((a) => a.startsWith("."));
        const name = f.name.toLowerCase(),
          ext = name.slice(name.lastIndexOf("."));
        if (exts.length && !exts.includes(ext)) {
          const list = exts.map((a) => a.slice(1).toUpperCase());
          return `That file is ${ext || "not a recognised type"}. Please attach a ${list
            .slice(0, -1)
            .join(", ")} or ${list[list.length - 1]} file.`;
        }
        const maxMb = parseFloat(el.dataset.maxMb || "5");
        if (f.size > maxMb * 1024 * 1024) {
          return `That file is ${(f.size / 1048576).toFixed(1)}MB. Please attach one under ${maxMb}MB.`;
        }
        return "";
      }
    }
    return "";
  }

  // the message goes after the field, or after the +61 wrapper around it
  function errorEl(el) {
    const anchor = el.closest(".phone-field, .budget-options") || el;
    let out = anchor.nextElementSibling;
    if (!out || !out.classList.contains("field-error")) {
      out = document.createElement("small");
      out.className = "field-error";
      out.id = (el.id || el.name) + "Error";
      out.setAttribute("aria-live", "polite");
      anchor.after(out);
      el.setAttribute("aria-describedby", [el.getAttribute("aria-describedby"), out.id].filter(Boolean).join(" "));
    }
    return out;
  }

  // show = paint the message; otherwise only refresh a message already on screen
  function check(el, show) {
    const msg = problem(el);
    el.setCustomValidity(msg);
    if (show || el.classList.contains("is-invalid")) {
      el.classList.toggle("is-invalid", !!msg);
      el.setAttribute("aria-invalid", msg ? "true" : "false");
      errorEl(el).textContent = msg;
    }
    return !msg;
  }

  forms.forEach((form) => {
    const fields = [...form.elements].filter(
      (el) => el.name && !["hidden", "range", "submit", "button", "checkbox", "radio"].includes(el.type),
    );
    // radio groups: validated as one field, through the group's first radio
    const groups = {};
    form.querySelectorAll('input[type="radio"]').forEach((r) => (groups[r.name] = groups[r.name] || []).push(r));
    Object.values(groups).forEach((radios) => {
      if (!radios.some((r) => r.required)) return;
      fields.push(radios[0]);
      radios.forEach((r) => r.addEventListener("change", () => check(radios[0], false)));
    });
    fields.forEach((el) => {
      if (el.type === "radio") return check(el, false);
      /* registered before the check below, so check() reads the cleaned value */
      const clean = SANITISE[kind(el)];
      if (clean && el.tagName === "INPUT") {
        el.addEventListener("input", () => {
          const next = clean(el.value);
          if (next === el.value) return;
          /* keep the caret where the visitor left it, not at the end */
          const at = Math.max(0, (el.selectionStart || 0) - (el.value.length - next.length));
          el.value = next;
          try {
            el.setSelectionRange(at, at);
          } catch (err) {
            /* email inputs refuse the selection API in some browsers; the
               value is still clean, the caret just lands at the end */
          }
        });
      }
      check(el, false);
      el.addEventListener("input", () => check(el, false));
      /* a file is chosen in one action, so a rejected one is called out straight
         away rather than waiting for blur or submit */
      el.addEventListener("change", () => check(el, el.type === "file"));
      // judge a field once the visitor leaves it, not while they're typing
      el.addEventListener("blur", () => (el.value.trim() || el.classList.contains("is-invalid")) && check(el, true));
    });
    form.addEventListener(
      "submit",
      (e) => {
        const bad = fields.filter((el) => !check(el, true));
        if (!bad.length) return;
        e.preventDefault();
        e.stopImmediatePropagation();
        bad[0].focus();
      },
      true,
    );
  });
})();

/* * Where a sent form goes.
   A confirmation page rather than an inline message, so the submission has a
   URL an analytics goal or an ad conversion can be set against. `kind` picks
   the wording on the other side. The inline success blocks are kept as the
   fallback for anything that stops the redirect. */
function mcThankYou(kind) {
  const base = document.body.dataset.siteBase || "/";
  window.location.href = base + "thank-you/?form=" + encodeURIComponent(kind);
}

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
    mcThankYou("proposal");
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
      mcThankYou("enquiry");
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

/* * FAQ Smooth Accordion */
(function() {
  const details = document.querySelectorAll('.lp-faq-item');
  if (details.length === 0) return;

  details.forEach((el) => {
    const summary = el.querySelector('summary');
    const content = el.querySelector('p');

    let animation = null;
    let isClosing = false;
    let isExpanding = false;

    summary.addEventListener('click', (e) => {
      e.preventDefault();
      el.style.overflow = 'hidden';

      // Close others
      details.forEach((other) => {
        if (other !== el && other.hasAttribute('open')) {
          other.style.overflow = 'hidden';
          const startHeight = `${other.offsetHeight}px`;
          const endHeight = `${other.querySelector('summary').offsetHeight}px`;
          if (other.animation) other.animation.cancel();
          other.animation = other.animate({ height: [startHeight, endHeight] }, { duration: 300, easing: 'ease' });
          other.animation.onfinish = () => {
            other.removeAttribute('open');
            other.style.height = '';
            other.style.overflow = '';
            other.animation = null;
          };
        }
      });

      if (isClosing || !el.hasAttribute('open')) {
        open();
      } else if (isExpanding || el.hasAttribute('open')) {
        shrink();
      }
    });

    function shrink() {
      isClosing = true;
      const startHeight = `${el.offsetHeight}px`;
      const endHeight = `${summary.offsetHeight}px`;
      if (animation) animation.cancel();
      animation = el.animate({ height: [startHeight, endHeight] }, { duration: 300, easing: 'ease' });
      animation.onfinish = () => {
        el.removeAttribute('open');
        animation = null;
        isClosing = false;
        el.style.height = '';
        el.style.overflow = '';
      };
    }

    function open() {
      el.style.height = `${el.offsetHeight}px`;
      el.setAttribute('open', true);
      window.requestAnimationFrame(() => {
        isExpanding = true;
        const startHeight = `${el.offsetHeight}px`;
        const endHeight = `${summary.offsetHeight + content.offsetHeight}px`;
        if (animation) animation.cancel();
        animation = el.animate({ height: [startHeight, endHeight] }, { duration: 300, easing: 'ease' });
        animation.onfinish = () => {
          animation = null;
          isExpanding = false;
          el.style.height = '';
          el.style.overflow = '';
        };
      });
    }
  });
})();
