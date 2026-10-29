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

  /* * FAQ — the <details> open and close smoothly instead of snapping. The
     height is animated from where it is to where it is going, so a second
     tap mid-way simply turns it round. The script runs the one-open-at-a-
     time rule itself (the name="…" that does it in HTML closes the other
     answer instantly, which jolted the page), animating the closing answer
     too, and while one above closes it holds the tapped question still on
     screen instead of letting it slide up from under the finger. Each
     question that opens then glides up to just under the sticky header, so
     its answer can always be read below it. Without
     the script, or with reduced motion, the plain <details> behaviour stays. */
  /* Switched off: the FAQ is now plain <details> (open and close at once,
     each on its own, nothing scrolls). The old code is kept below; delete
     this return to bring it back. It holds comments of its own, so it is
     turned off here rather than commented out. */
  (function () {
    return;
    const list = document.querySelector(".lp2-faq-list");
    if (!list || window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;
    const items = Array.prototype.slice.call(list.querySelectorAll("details"));
    const DUR = 420,
      EASE = "cubic-bezier(0.25, 0.8, 0.25, 1)";

    function animate(d, open) {
      /* the height right now, mid-animation or not, before stopping it */
      const from = d.getBoundingClientRect().height;
      if (d._anim) d._anim.cancel();
      d.classList.toggle("is-closing", !open);
      d.open = open;
      const to = d.getBoundingClientRect().height;
      d.open = true; /* stays open while it closes, so the answer shows */
      d.style.overflow = "hidden";
      d._anim = d.animate([{ height: from + "px" }, { height: to + "px" }], { duration: DUR, easing: EASE });
      const answer = d.querySelector("p");
      if (d._fade) d._fade.cancel();
      if (answer) d._fade = answer.animate([{ opacity: open ? 0 : 1 }, { opacity: open ? 1 : 0 }], { duration: DUR * 0.8, easing: "ease", fill: "both" });
      d._anim.onfinish = function () {
        d._anim = null;
        d.open = open;
        d.classList.remove("is-closing");
        d.style.overflow = "";
      };
      return to;
    }

    /* keep el at the same place on screen while the list above it moves */
    /* function hold(el) {
      const top = el.getBoundingClientRect().top,
        end = performance.now() + DUR + 60;
      (function frame() {
        const dy = el.getBoundingClientRect().top - top;
        if (Math.abs(dy) > 0.5) window.scrollBy({ top: dy, behavior: "instant" });
        if (performance.now() < end) requestAnimationFrame(frame);
      })();
    } */

    /* hold the tapped question (el) still while the list above it moves, and
       ease the page by `extra` so it ends just under the header (`height`,
       the opened item's full height, was used by the fit-only version). The browser's own scroll anchoring is
       paused meanwhile, or it corrects the same shift twice and the page
       jumps up. */
    function hold(el, height) {
      const root = document.documentElement,
        header = document.querySelector(".lp-header"),
        top = el.getBoundingClientRect().top,
        roof = (header ? header.getBoundingClientRect().height : 0) + 16,
        /* was: scroll only as far as needed to fit the answer on screen
        extra = Math.max(0, Math.min(top + height - (window.innerHeight - 24), top - roof)), */
        /* every opened question glides up to just under the header, so the
           answer always has the screen below it to read */
        extra = top - roof,
        start = performance.now();
      /* the page's smooth scrolling (main.css) is paused too, so each nudge
         lands at once; the scroll is set directly, as older Safari throws on
         scrollBy({ behavior: "instant" }) and the page was left to jump */
      root.style.overflowAnchor = "none";
      root.style.scrollBehavior = "auto";
      (function frame(now) {
        const t = Math.min(1, (now - start) / DUR),
          ease = 1 - Math.pow(1 - t, 3),
          dy = el.getBoundingClientRect().top - (top - extra * ease);
        /* if (Math.abs(dy) > 0.5) window.scrollBy({ top: dy, behavior: "instant" }); */
        if (Math.abs(dy) > 0.5) window.scrollTo(0, window.pageYOffset + dy);
        if (now < start + DUR + 60) requestAnimationFrame(frame);
        else root.style.overflowAnchor = root.style.scrollBehavior = "";
      })(start);
    }

    items.forEach(function (d) {
      d.removeAttribute("name");
      d.querySelector("summary").addEventListener("click", function (e) {
        e.preventDefault();
        const opening = !d.open || d.classList.contains("is-closing");
        if (opening) {
          items.forEach(function (o) {
            if (o !== d && o.open && !o.classList.contains("is-closing")) animate(o, false);
          });
          /* hold(this); */
          hold(this, animate(d, true));
        } else animate(d, false);
        /* animate(d, opening); */
      });
    });
  })();

  /* * FAQ — one answer open at a time, each opening and closing over 400ms
     instead of snapping. The height is animated; a second tap mid-way turns
     it round. When an answer above the tapped one closes, the page moves
     with it frame by frame so the tapped question stays still under the
     finger — nothing else scrolls. Without the script (or with reduced
     motion) it is plain <details>, still one open at a time by name="…". */
  (function () {
    const items = Array.prototype.slice.call(document.querySelectorAll(".lp2-faq-item"));
    if (!items.length || window.matchMedia("(prefers-reduced-motion: reduce)").matches) return;
    const DUR = 400,
      root = document.documentElement;

    function toggle(d, open) {
      const from = d.getBoundingClientRect().height;
      if (d._anim) d._anim.cancel();
      d.open = open;
      const to = d.getBoundingClientRect().height;
      d.open = true; /* stays open while it closes, so the answer shows */
      d.classList.toggle("is-closing", !open);
      d.style.overflow = "hidden";
      d._anim = d.animate({ height: [from + "px", to + "px"] }, { duration: DUR, easing: "ease" });
      d._anim.onfinish = function () {
        d._anim = null;
        d.open = open;
        d.classList.remove("is-closing");
        d.style.overflow = "";
      };
    }

    items.forEach(function (d) {
      d.removeAttribute("name"); /* the script keeps one open, animated */
      const summary = d.querySelector("summary");
      summary.addEventListener("click", function (e) {
        e.preventDefault();
        const open = !d.open || d.classList.contains("is-closing"),
          top = summary.getBoundingClientRect().top,
          end = performance.now() + DUR + 50;
        if (open) {
          items.forEach(function (o) {
            if (o !== d && o.open && !o.classList.contains("is-closing")) toggle(o, false);
          });
        }
        toggle(d, open);
        /* the browser's own scroll anchoring and smooth scrolling are paused
           meanwhile, so they do not move the page as well */
        root.style.overflowAnchor = "none";
        root.style.scrollBehavior = "auto";
        (function frame() {
          const dy = summary.getBoundingClientRect().top - top;
          if (Math.abs(dy) > 0.5) window.scrollTo(0, window.pageYOffset + dy);
          if (performance.now() < end) requestAnimationFrame(frame);
          else root.style.overflowAnchor = root.style.scrollBehavior = "";
        })();
      });
    });
  })();
})();
