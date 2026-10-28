/* ============================================================
   landing-v2.js
   Advertisement landing pages, version 2 — only what its own sections
   need. Loaded after main.js and landing.js, which already handle the
   quote modal, the forms and the sticky button.
   ============================================================ */
(function () {
  /* * Reveal on scroll — elements marked data-lp2-reveal fade up the first
     time they come into view. .lp2-js on <html> is what hides them first,
     so nothing is ever hidden unless this script is here to show it again.
     Cards in the same row are staggered by their position in it. */
  (function () {
    const els = document.querySelectorAll("[data-lp2-reveal]");
    if (!els.length || !("IntersectionObserver" in window)) return;
    if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;

    document.documentElement.classList.add("lp2-js");
    const io = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (!entry.isIntersecting) return;
          io.unobserve(entry.target);
          entry.target.classList.add("is-in");
        });
      },
      { threshold: 0.15, rootMargin: "0px 0px -40px 0px" },
    );
    els.forEach(function (el) {
      const i = Array.prototype.indexOf.call(el.parentElement.children, el);
      el.style.transitionDelay = Math.min(i, 3) * 0.12 + "s";
      io.observe(el);
    });
  })();

  /* * Sticky quote button — kept out of the way while the hero (which has
     its own button) is on screen; see .lp2-at-hero in landing-v2.css. */
  (function () {
    /* the headline and button, not the whole hero: the reel of numbers
       below them is long, and the button belongs there */
    const hero = document.querySelector(".lp2-hero-copy");
    if (!hero || !("IntersectionObserver" in window)) return;
    document.documentElement.classList.add("lp2-at-hero");
    new IntersectionObserver(
      function (entries) {
        document.documentElement.classList.toggle("lp2-at-hero", entries[0].isIntersecting);
      },
      { rootMargin: "0px 0px -40% 0px" },
    ).observe(hero);
  })();

  /* * Reel — the hero phones stay pinned while the numbers scroll up over
     them. Every number reads clearly (0.75), the one at the middle of the
     screen at full strength, and the phones dim to an eighth as the first
     number rises from the bottom of the screen to two-thirds of the way up,
     so the numbers are always the brightest thing on screen. Pure CSS does the pinning; this only sets
     the two opacities from the scroll position. Off for reduced motion,
     where the numbers simply sit under the phones. */
  (function () {
    const reel = document.querySelector("[data-lp2-reel]");
    if (!reel || window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;
    const apps = reel.querySelector(".lp2-apps"),
      pin = reel.querySelector(".lp2-reel-pin"),
      stats = reel.querySelectorAll(".lp2-reel-stat");
    if (!apps || !stats.length) return;
    document.documentElement.classList.add("lp2-reel-on");

    let ticking = false;
    function update() {
      ticking = false;
      const vh = window.innerHeight,
        top = pin.getBoundingClientRect().top,
        /* the middle of the pinned area, under the header */
        mid = Math.max(top, 0) + pin.offsetHeight / 2;
      stats.forEach(function (s) {
        const r = s.getBoundingClientRect(),
          k = Math.max(0, 1 - Math.abs(r.top + r.height / 2 - mid) / (vh * 0.32));
        s.style.opacity = (0.75 + 0.25 * k).toFixed(3);
      });
      /* dimming starts as the first number crosses the bottom of the
         screen, or of the phones when the pin is shorter than the screen
         (on a phone, where the number waits just under them) */
      const first = stats[0].getBoundingClientRect().top,
        start = Math.min(vh * 0.95, pin.getBoundingClientRect().bottom),
        dim = Math.min(1, Math.max(0, (start - first) / (vh * 0.35)));
      /* down to 0.12 (was 0.25, with a dark blob behind the numbers too) */
      apps.style.opacity = (1 - 0.88 * dim).toFixed(3);
      pin.style.setProperty("--scrim", dim.toFixed(3));
    }
    function onScroll() {
      if (ticking) return;
      ticking = true;
      requestAnimationFrame(update);
    }
    window.addEventListener("scroll", onScroll, { passive: true });
    window.addEventListener("resize", onScroll);
    update();
  })();

  /* * Swipe rows (.lp2-swipe) — on a phone, pillars, features and pricing
     scroll sideways (pure CSS). This adds a dot per card under each row and
     keeps the one in view lit. The dots are hidden above phone width. */
  document.querySelectorAll(".lp2-swipe").forEach(function (row) {
    const cards = row.children;
    if (cards.length < 2) return;
    const dots = document.createElement("div");
    dots.className = "lp2-swipe-dots";
    dots.setAttribute("aria-hidden", "true");
    for (let i = 0; i < cards.length; i++) dots.appendChild(document.createElement("span"));
    row.after(dots);

    /* counted by position on screen, not in the HTML: pricing moves its
       popular card first with CSS order */
    function sync() {
      const mid = row.scrollLeft + row.clientWidth / 2;
      let on = 0;
      for (let i = 0; i < cards.length; i++) {
        if (cards[i].offsetLeft - row.offsetLeft > mid) continue;
        on = Math.max(on, Array.prototype.filter.call(cards, function (c) {
          return c.offsetLeft < cards[i].offsetLeft;
        }).length);
      }
      Array.prototype.forEach.call(dots.children, function (d, i) {
        d.classList.toggle("is-on", i === on);
      });
    }
    row.addEventListener("scroll", sync, { passive: true });
    sync();
  });

  /* * Carousels (Our work) — each row is native scroll-snap, so swiping and
     trackpads already work. This wires the arrows to step one card at a
     time, keeps the dots on the card in view, and greys out an arrow at
     either end. */
  document.querySelectorAll("[data-lp2-carousel]").forEach(function (root) {
    const track = root.querySelector("[data-lp2-track]"),
      cards = track ? track.children : [],
      dots = root.querySelectorAll(".lp2-dots span"),
      prev = root.querySelector("[data-lp2-prev]"),
      next = root.querySelector("[data-lp2-next]");
    if (!track || !cards.length) return;

    /* distance from one card to the next, read live so it follows resizes */
    function step() {
      return cards.length > 1 ? cards[1].offsetLeft - cards[0].offsetLeft : track.clientWidth;
    }
    function current() {
      return Math.max(0, Math.min(cards.length - 1, Math.round(track.scrollLeft / step())));
    }
    function sync() {
      const i = current();
      dots.forEach(function (d, n) {
        d.classList.toggle("is-on", n === i);
      });
      if (prev) prev.disabled = track.scrollLeft < 4;
      if (next) next.disabled = track.scrollLeft > track.scrollWidth - track.clientWidth - 4;
    }
    function go(delta) {
      track.scrollTo({ left: (current() + delta) * step() });
    }

    if (prev) prev.addEventListener("click", function () { go(-1); });
    if (next) next.addEventListener("click", function () { go(1); });

    let ticking = false;
    track.addEventListener("scroll", function () {
      if (ticking) return;
      ticking = true;
      requestAnimationFrame(function () {
        ticking = false;
        sync();
      });
    }, { passive: true });
    window.addEventListener("resize", sync);
    sync();
  });

  /* * Stats — count each number up from zero the first time the row is
     seen. The real figure is already in the HTML, so with no
     IntersectionObserver, or with reduced motion, nothing is touched and the
     row reads as written. */
  (function () {
    const nums = document.querySelectorAll("[data-lp2-count]");
    if (!nums.length || !("IntersectionObserver" in window)) return;
    if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;

    function run(el) {
      const raw = el.getAttribute("data-lp2-count"),
        target = parseFloat(raw),
        decimals = (raw.split(".")[1] || "").length,
        duration = 1400;
      if (isNaN(target)) return;
      let start = null;
      function frame(now) {
        if (start === null) start = now;
        const t = Math.min((now - start) / duration, 1),
          /* ease-out: fast at first, settling onto the figure */
          eased = 1 - Math.pow(1 - t, 3);
        el.textContent = (target * eased).toFixed(decimals);
        if (t < 1) requestAnimationFrame(frame);
        else el.textContent = raw;
      }
      requestAnimationFrame(frame);
    }

    const io = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (!entry.isIntersecting) return;
          io.unobserve(entry.target);
          run(entry.target);
        });
      },
      { threshold: 0.6 },
    );
    nums.forEach(function (el) {
      /* only start from zero if the number is not already on screen — one
         that is visible at load would flash its figure and then drop to 0 */
      const r = el.getBoundingClientRect();
      if (r.top > window.innerHeight) el.textContent = (0).toFixed((el.getAttribute("data-lp2-count").split(".")[1] || "").length);
      io.observe(el);
    });
  })();
})();
