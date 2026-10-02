/* ============================================================
   csd.js
   Custom Software Development advertisement pages only (Perth, Melbourne).
   Loaded after main.js, which supplies the shared form validator, the
   [data-slider] engine the Technologies strip runs on, and mcThankYou().

   Everything here is specific to these pages. Nothing in this file touches
   the main site, the mobile-app ad pages, or any shared script.

   Every effect below is decorative: with this file blocked the page still
   reads, the form still validates and submits, and the marquee still runs
   (that one is pure CSS). Anything that only exists to move is skipped
   outright for a visitor who asks for reduced motion.
   ============================================================ */
(function () {
  "use strict";

  var reduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  /* tilt and parallax follow a cursor, so they are for mice and trackpads
     only — on a touchscreen they would fire once on tap and stick */
  var finePointer = window.matchMedia("(hover:hover) and (pointer:fine)").matches;

  /* ----------------------------------------------------------
     Scroll progress bar + header shadow
     ---------------------------------------------------------- */
  (function () {
    var bar = document.getElementById("csdProgress"),
      header = document.getElementById("csdHeader");
    if (!bar && !header) return;
    var ticking = false;
    function paint() {
      ticking = false;
      var doc = document.documentElement,
        scrollable = doc.scrollHeight - doc.clientHeight;
      if (bar) bar.style.width = (scrollable > 0 ? (doc.scrollTop / scrollable) * 100 : 0) + "%";
      if (header) header.classList.toggle("is-scrolled", doc.scrollTop > 10);
    }
    window.addEventListener(
      "scroll",
      function () {
        if (ticking) return;
        ticking = true;
        requestAnimationFrame(paint);
      },
      { passive: true },
    );
    paint();
  })();

  /* ----------------------------------------------------------
     Anything that sends the visitor to the form, and the logo/footer
     "back to top". One delegated listener rather than a handler per
     button, so a new CTA only needs the data attribute.
     ---------------------------------------------------------- */
  document.addEventListener("click", function (ev) {
    var top = ev.target.closest("[data-csd-top]");
    if (top) {
      ev.preventDefault();
      window.scrollTo({ top: 0, behavior: reduced ? "auto" : "smooth" });
      return;
    }
    var trigger = ev.target.closest("[data-csd-scroll-to]");
    if (!trigger) return;
    var target = document.querySelector(trigger.dataset.csdScrollTo);
    if (!target) return;
    ev.preventDefault();
    target.scrollIntoView({ behavior: reduced ? "auto" : "smooth", block: "center" });
    /* focus the first field so a keyboard visitor lands in the form rather
       than at the top of the document */
    var first = target.querySelector("input, select, textarea");
    if (first) {
      window.setTimeout(
        function () {
          first.focus({ preventScroll: true });
        },
        reduced ? 0 : 420,
      );
    }
  });

  /* ----------------------------------------------------------
     Typewriter headline word
     ---------------------------------------------------------- */
  (function () {
    var el = document.getElementById("csdRotWord");
    if (!el || reduced) return;
    var words = ["business", "team", "customers", "workflow"],
      i = 0;
    function type(word, n, done) {
      el.textContent = word.slice(0, n);
      if (n < word.length) window.setTimeout(function () { type(word, n + 1, done); }, 90);
      else window.setTimeout(done, 1900);
    }
    function erase(n, done) {
      el.textContent = el.textContent.slice(0, n);
      if (n > 0) window.setTimeout(function () { erase(n - 1, done); }, 45);
      else done();
    }
    function cycle() {
      erase(el.textContent.length, function () {
        i = (i + 1) % words.length;
        type(words[i], 1, cycle);
      });
    }
    window.setTimeout(cycle, 2400);
  })();

  /* ----------------------------------------------------------
     Scroll reveal. The class is added here rather than in the HTML so a
     visitor with JS blocked never meets a page of invisible sections.
     ---------------------------------------------------------- */
  (function () {
    var targets = document.querySelectorAll(
      ".csd-section .csd-center, .csd-tilt, .csd-compare, .csd-faq-list details, .csd-own-copy",
    );
    if (!targets.length) return;
    if (reduced || !("IntersectionObserver" in window)) return;

    Array.prototype.forEach.call(targets, function (t) {
      t.classList.add("csd-reveal");
      /* stagger by position in the row, so a grid comes in left to right
         instead of all at once */
      var idx = Array.prototype.indexOf.call(t.parentNode.children, t);
      t.style.transitionDelay = (idx % 3) * 0.12 + "s";
      var icon = t.querySelector(".csd-icon svg");
      if (icon) icon.style.animationDelay = (idx % 3) * 0.12 + 0.3 + "s";
    });

    var io = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (!entry.isIntersecting) return;
          var t = entry.target;
          t.classList.add("is-in");
          io.unobserve(t);
          /* drop the delay and the reveal class once it has played, or the
             transition would fight the tilt transform on the next hover */
          window.setTimeout(function () {
            t.style.transitionDelay = "";
            t.classList.remove("csd-reveal");
          }, 1500);
        });
      },
      { threshold: 0.15, rootMargin: "0px 0px -40px 0px" },
    );
    Array.prototype.forEach.call(targets, function (t) {
      io.observe(t);
    });
  })();

  /* ----------------------------------------------------------
     3D tilt + cursor glare on every card, and the hero parallax
     ---------------------------------------------------------- */
  if (finePointer && !reduced) {
    Array.prototype.forEach.call(document.querySelectorAll(".csd-tilt"), function (card) {
      card.addEventListener("mouseenter", function () {
        card.classList.add("is-moving");
      });
      card.addEventListener("mousemove", function (ev) {
        var r = card.getBoundingClientRect(),
          x = (ev.clientX - r.left) / r.width,
          y = (ev.clientY - r.top) / r.height;
        card.style.setProperty("--csd-mx", x * 100 + "%");
        card.style.setProperty("--csd-my", y * 100 + "%");
        card.style.transform =
          "perspective(1000px) rotateX(" + (0.5 - y) * 10 + "deg) rotateY(" + (x - 0.5) * 12 + "deg) translateY(-8px)";
      });
      card.addEventListener("mouseleave", function () {
        card.classList.remove("is-moving");
        card.style.transform = "";
      });
    });

    var frame = document.getElementById("csdVideoFrame"),
      hero = document.querySelector(".csd-hero");
    if (frame && hero) {
      hero.addEventListener("mousemove", function (ev) {
        /* below 1025px the frame is flat (see csd.css); tilting it here would
           reintroduce the rotation the breakpoint removed */
        if (window.innerWidth < 1025) return;
        var x = ev.clientX / window.innerWidth - 0.5,
          y = ev.clientY / window.innerHeight - 0.5;
        frame.style.transform = "rotateY(" + (-8 + x * 10) + "deg) rotateX(" + (4 - y * 8) + "deg)";
      });
      hero.addEventListener("mouseleave", function () {
        frame.style.transform = "";
      });
    }

    var orbs = document.querySelectorAll(".csd-orb");
    if (orbs.length) {
      window.addEventListener(
        "mousemove",
        function (ev) {
          var x = (ev.clientX / window.innerWidth - 0.5) * 30,
            y = (ev.clientY / window.innerHeight - 0.5) * 30;
          Array.prototype.forEach.call(orbs, function (orb, i) {
            orb.style.translate = (i ? -x : x) + "px " + (i ? -y : y) + "px";
          });
        },
        { passive: true },
      );
    }
  }

  /* ----------------------------------------------------------
     Hero video — play it only while it is on screen.
     `autoplay` alone is unreliable: several browsers refuse to start a video
     that has never been visible, and those that do start it burn data on a
     file the visitor may scroll straight past.
     ---------------------------------------------------------- */
  (function () {
    var video = document.querySelector(".csd-video-frame video");
    if (!video) return;
    if (reduced) {
      video.removeAttribute("autoplay");
      video.pause();
      return;
    }
    if (!("IntersectionObserver" in window)) return;
    new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          /* play() rejects if the browser still refuses; nothing to do about
             it, and an unhandled rejection would show in the console */
          var p = video.play();
          if (p && typeof p.catch === "function") p.catch(function () {});
        } else {
          video.pause();
        }
      });
    }).observe(video);
  })();

  /* ----------------------------------------------------------
     The form.
     main.js's validator runs first, in the capture phase, and stops this
     handler from firing while anything is invalid — so reaching here means
     every field passed.
     ---------------------------------------------------------- */
  (function () {
    var form = document.getElementById("csdQuoteForm"),
      success = document.getElementById("csdQuoteSuccess");
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
