/* ============================================================
   home-new.js — the new homepage (home-new.php)
   Hero typing slides, scroll progress, reveal-on-scroll, the
   services picture switcher, the process roadmap and the enquiry form.
   Every block bails out quietly if its markup is missing.
   ============================================================ */
(function () {
  const page = document.querySelector(".hn-page");
  if (!page) return;
  const reduced = matchMedia("(prefers-reduced-motion: reduce)").matches;

  /* * Scroll progress bar along the top of the window */
  (function () {
    const bar = page.querySelector(".hn-progress");
    if (!bar) return;
    let queued = false;
    const update = () => {
      queued = false;
      const h = document.documentElement;
      const max = h.scrollHeight - h.clientHeight;
      bar.style.transform = "scaleX(" + (max > 0 ? Math.min(1, scrollY / max) : 0) + ")";
    };
    const queue = () => {
      if (!queued) {
        queued = true;
        requestAnimationFrame(update);
      }
    };
    addEventListener("scroll", queue, { passive: true });
    addEventListener("resize", queue);
    update();
  })();

  /* * Reveal on scroll — fade up once, the first time each block is seen */
  (function () {
    const items = page.querySelectorAll(".hn-reveal");
    if (reduced || !("IntersectionObserver" in window)) {
      items.forEach((el) => el.classList.add("is-in"));
      return;
    }
    const io = new IntersectionObserver(
      (entries) =>
        entries.forEach((entry) => {
          if (!entry.isIntersecting) return;
          entry.target.classList.add("is-in");
          io.unobserve(entry.target);
        }),
      { threshold: 0.12 },
    );
    items.forEach((el) => io.observe(el));
  })();

  /* * Hero — types each slide's two-line headline, shows its lead, erases it,
     then moves on; the background picture and the dots follow the slide */
  (function () {
    const hero = page.querySelector(".hn-hero");
    const data = hero && hero.querySelector(".hn-hero-data");
    if (!data) return;
    let slides;
    try {
      slides = JSON.parse(data.textContent);
    } catch (err) {
      return;
    }
    if (!slides.length) return;
    const t1 = hero.querySelector(".hn-t1"),
      t2 = hero.querySelector(".hn-t2"),
      caret = hero.querySelector(".hn-caret"),
      lead = hero.querySelector(".hn-hero-lead"),
      tag = hero.querySelector(".hn-hero-tag"),
      srTitle = hero.querySelector(".hn-hero-title .visually-hidden"),
      sweep = hero.querySelector(".hn-hero-sweep"),
      bgs = [...hero.querySelectorAll(".hn-hero-bg")],
      dots = [...hero.querySelectorAll(".hn-hero-dots i")];
    const wait = (ms) => new Promise((r) => setTimeout(r, ms));

    // n characters of the slide, spread over the two lines; the caret follows
    function render(d, n) {
      const n1 = Math.min(n, d.a.length),
        n2 = Math.max(0, n - d.a.length);
      t1.textContent = d.a.slice(0, n1);
      t2.textContent = d.b.slice(0, n2);
      (n2 > 0 ? t2 : t1).parentNode.appendChild(caret);
    }

    let started = false;
    function setSlide(i) {
      const d = slides[i];
      if (started && !reduced) {
        hero.classList.add("is-shifting");
        sweep.classList.remove("is-playing");
        void sweep.offsetWidth; // restart the animation
        sweep.classList.add("is-playing");
        setTimeout(() => hero.classList.remove("is-shifting"), 520);
      }
      bgs.forEach((b, k) => b.classList.toggle("is-on", k === i));
      dots.forEach((b, k) => b.classList.toggle("is-on", k === i));
      tag.textContent = d.tag;
      lead.textContent = d.sub;
      if (srTitle) srTitle.textContent = d.a + " " + d.b;
      started = true;
    }

    if (reduced) {
      setSlide(0);
      render(slides[0], 99);
      lead.classList.add("is-shown");
      return;
    }

    lead.classList.remove("is-shown");
    (async function loop() {
      for (let i = 0; ; i = (i + 1) % slides.length) {
        setSlide(i);
        const d = slides[i],
          len = d.a.length + d.b.length;
        for (let c = 1; c <= len; c++) {
          render(d, c);
          await wait(40);
        }
        lead.classList.add("is-shown");
        await wait(2500);
        lead.classList.remove("is-shown");
        await wait(400);
        for (let c = len; c >= 0; c--) {
          render(d, c);
          await wait(20);
        }
        await wait(220);
      }
    })();
  })();

  /* * What we do — hovering, focusing or tapping a service shows its picture */
  (function () {
    const root = page.querySelector(".hn-services");
    if (!root) return;
    const choices = [...root.querySelectorAll(".hn-service-choice")],
      bgs = [...root.querySelectorAll(".hn-service-bg")];
    if (!choices.length || bgs.length !== choices.length) return;
    const activate = (index) => {
      choices.forEach((c, i) => {
        c.classList.toggle("is-active", i === index);
        c.setAttribute("aria-pressed", i === index ? "true" : "false");
      });
      bgs.forEach((b, i) => {
        b.classList.toggle("is-active", i === index);
        b.setAttribute("aria-hidden", i === index ? "false" : "true");
      });
    };
    choices.forEach((c, i) => {
      c.addEventListener("mouseenter", () => activate(i));
      c.addEventListener("focus", () => activate(i));
      c.addEventListener("click", () => activate(i));
    });
  })();

  /* * Our process — the orange route draws itself as the roadmap scrolls by;
     the step nearest the middle of the screen is highlighted */
  (function () {
    const map = page.querySelector(".hn-roadmap"),
      glow = map && map.querySelector(".hn-road-glow");
    if (!glow) return;
    const steps = [...map.querySelectorAll(".hn-step")],
      points = [...map.querySelectorAll(".hn-road-point")];
    const length = glow.getTotalLength();
    glow.style.strokeDasharray = length;
    glow.style.strokeDashoffset = length;
    let queued = false;
    function update() {
      queued = false;
      const r = map.getBoundingClientRect(),
        vh = innerHeight;
      const travel = Math.max(0, Math.min(1, (vh * 0.68 - r.top) / (r.height - vh * 0.12)));
      glow.style.strokeDashoffset = length * (1 - travel);
      const focusY = vh * 0.57;
      let active = 0,
        best = Infinity;
      steps.forEach((step, i) => {
        const sr = step.getBoundingClientRect(),
          d = Math.abs(sr.top + sr.height / 2 - focusY);
        if (d < best && sr.top < vh * 0.88 && sr.bottom > vh * 0.1) {
          best = d;
          active = i;
        }
      });
      steps.forEach((step, i) => {
        step.classList.toggle("is-active", i === active);
        step.classList.toggle("is-done", i < active);
        if (points[i]) {
          points[i].classList.toggle("is-active", i === active);
          points[i].classList.toggle("is-done", i < active);
        }
      });
    }
    const queue = () => {
      if (!queued) {
        queued = true;
        requestAnimationFrame(update);
      }
    };
    addEventListener("scroll", queue, { passive: true });
    addEventListener("resize", queue);
    update();
  })();

  /* * Enquiry form — sends to send-contact.php in the background, then opens
     the thank-you page (main.js mcThankYou), like every other form on the site */
  (function () {
    const form = document.getElementById("hnContactForm");
    if (!form) return;
    const status = form.querySelector(".hn-form-status"),
      btn = form.querySelector('button[type="submit"]'),
      phone = form.querySelector('[name="phone"]');
    const say = (msg, isError) => {
      status.textContent = msg;
      status.classList.toggle("is-error", !!isError);
    };
    // the handler wants at least 8 digits
    const checkPhone = () =>
      phone.setCustomValidity(
        phone.value.trim() && phone.value.replace(/\D/g, "").length < 8
          ? "Please enter a valid phone number (at least 8 digits)."
          : "",
      );
    phone.addEventListener("input", checkPhone);

    form.addEventListener("submit", (e) => {
      e.preventDefault();
      checkPhone();
      if (!form.checkValidity()) {
        form.reportValidity();
        return;
      }
      const label = btn.innerHTML;
      btn.disabled = true;
      btn.textContent = "Sending...";
      say("");
      const reset = () => {
        btn.disabled = false;
        btn.innerHTML = label;
      };
      fetch(form.getAttribute("action"), {
        method: "POST",
        body: new FormData(form),
        headers: { "X-Requested-With": "XMLHttpRequest", Accept: "application/json" },
      })
        .then((res) => res.json())
        .then((data) => {
          if (data && data.success) {
            btn.textContent = "Enquiry sent ✓";
            say("Thanks — your project brief has been sent. Taking you to the next step…");
            if (typeof window.mcThankYou === "function") window.mcThankYou(data.kind || "enquiry");
          } else {
            say((data && data.message) || "Failed to send your enquiry. Please try again.", true);
            reset();
          }
        })
        .catch((err) => {
          console.error("Enquiry form error:", err);
          say("Sorry, something went wrong while sending your enquiry. Please try again.", true);
          reset();
        });
    });
  })();
})();
