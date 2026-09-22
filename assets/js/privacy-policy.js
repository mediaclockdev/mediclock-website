/* ============================================================
   privacy-policy.js
   Privacy Policy page only (loaded by $page_js).
   Media Clock — static rebuild

   The contents rail is the blog article's .post-toc, so this does what
   blog.js does for an article: fold the list shut on phones, and mark the
   section being read. It also keeps that entry in view inside the card.
   ============================================================ */
(function () {
  const toc = document.querySelector(".legal-toc, .post-toc");
  if (!toc) return;

  /* folded shut on phones, where a 15-item list would push the policy itself
     off the screen; open from tablet up */
  if (toc.tagName === "DETAILS") {
    const narrow = window.matchMedia("(max-width: 991.98px)");
    const fold = (mq) => {
      toc.open = !mq.matches;
    };
    fold(narrow);
    narrow.addEventListener("change", fold);
  }

  /* every contents link that points at a section on this page */
  const links = new Map();
  toc.querySelectorAll('a[href^="#"]').forEach((a) => {
    const id = decodeURIComponent(a.getAttribute("href").slice(1));
    if (document.getElementById(id)) links.set(id, a);
  });
  const sections = [...links.keys()].map((id) => document.getElementById(id));
  if (!sections.length) return;

  let current = "";

  function scrollLinkIntoView(link) {
    /* only when the card itself scrolls — otherwise this would move the page */
    if (toc.scrollHeight <= toc.clientHeight) return;
    const l = link.getBoundingClientRect();
    const t = toc.getBoundingClientRect();
    if (l.top < t.top + 8) toc.scrollTop -= t.top + 8 - l.top;
    else if (l.bottom > t.bottom - 8) toc.scrollTop += l.bottom - (t.bottom - 8);
  }

  function update() {
    /* the heading the reader has most recently passed under the fixed header */
    const line =
      parseFloat(
        getComputedStyle(document.documentElement).getPropertyValue("--header-h"),
      ) + 32;
    let id = sections[0].id;
    for (const section of sections) {
      if (section.getBoundingClientRect().top <= line) id = section.id;
      else break;
    }
    /* at the very bottom the last section may never reach the line */
    if (window.innerHeight + window.scrollY >= document.body.scrollHeight - 2) {
      id = sections[sections.length - 1].id;
    }
    if (id === current) return;
    if (current) {
      links.get(current).classList.remove("is-current");
      links.get(current).removeAttribute("aria-current");
    }
    current = id;
    const link = links.get(id);
    link.classList.add("is-current");
    link.setAttribute("aria-current", "true");
    scrollLinkIntoView(link);
  }

  /* at most one read every 100ms, so a fast scroll doesn't thrash layout.
     A timer rather than requestAnimationFrame: rAF is paused while the tab is
     in the background, which would leave the list stuck on a stale section. */
  let last = 0;
  let timer = 0;
  function onScroll() {
    const now = Date.now();
    clearTimeout(timer);
    if (now - last >= 100) {
      last = now;
      update();
    } else {
      timer = setTimeout(() => {
        last = Date.now();
        update();
      }, 100);
    }
  }

  update();
  window.addEventListener("scroll", onScroll, { passive: true });
  window.addEventListener("resize", onScroll, { passive: true });
  /* a click lands before the smooth scroll finishes, so mark it straight away */
  toc.addEventListener("click", (e) => {
    if (e.target.closest('a[href^="#"]')) setTimeout(update, 0);
  });
})();
