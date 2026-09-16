/* ============================================================
   * blog.js — blog index + article
   1. Category filter on the index (no page reload).
   2. "On this page" highlighting as the article scrolls.
   Both guard on their own markup, so the file is safe on either page.
   ============================================================ */
(function () {
  "use strict";

  /* * Category filter */
  var filters = document.querySelectorAll(".blog-filter");
  var grid = document.getElementById("blogGrid");
  var empty = document.getElementById("blogEmpty");

  if (filters.length && grid) {
    var items = grid.querySelectorAll(".blog-grid-item");

    filters.forEach(function (btn) {
      btn.addEventListener("click", function () {
        var want = btn.dataset.filter;
        var shown = 0;

        filters.forEach(function (b) {
          var on = b === btn;
          b.classList.toggle("is-active", on);
          b.setAttribute("aria-pressed", on ? "true" : "false");
        });

        items.forEach(function (li) {
          var show = want === "all" || li.dataset.cat === want;
          li.hidden = !show;
          if (show) shown++;
        });

        if (empty) empty.hidden = shown > 0;
      });
    });
  }

  /* * On this page — folded shut on phones, where a long list would push
     the article itself off the screen; open from tablet up */
  var toc = document.querySelector(".post-toc");
  if (toc) {
    var narrow = window.matchMedia("(max-width: 991.98px)");
    var fold = function (mq) {
      toc.open = !mq.matches;
    };
    fold(narrow);
    if (narrow.addEventListener) narrow.addEventListener("change", fold);
  }

  /* * On this page — mark the section currently in view */
  var tocLinks = document.querySelectorAll(".post-toc a");
  if (tocLinks.length && "IntersectionObserver" in window) {
    var byId = {};
    var headings = [];

    tocLinks.forEach(function (a) {
      var id = a.getAttribute("href").slice(1);
      var h = document.getElementById(id);
      if (h) {
        byId[id] = a;
        headings.push(h);
      }
    });

    var mark = function (id) {
      tocLinks.forEach(function (a) {
        a.classList.toggle("is-current", a === byId[id]);
      });
    };

    var io = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) mark(entry.target.id);
        });
      },
      // a band just under the sticky header: the heading nearest the top wins
      { rootMargin: "-120px 0px -70% 0px", threshold: 0 }
    );

    headings.forEach(function (h) {
      io.observe(h);
    });
  }
})();
