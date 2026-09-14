/* * Homepage : Our Journey counters — count up once, when first scrolled into view */
(function () {
  const nums = document.querySelectorAll("[data-count]");
  if (!nums.length || !("IntersectionObserver" in window)) return;
  if (matchMedia("(prefers-reduced-motion: reduce)").matches) return;

  const io = new IntersectionObserver((entries) => {
    entries.forEach(({ isIntersecting, target }) => {
      if (!isIntersecting) return;
      io.unobserve(target);
      const to = +target.dataset.count, t0 = performance.now();
      (function tick(now) {
        const p = Math.min((now - t0) / 2000, 1);
        target.textContent = Math.round(to * p);
        if (p < 1) requestAnimationFrame(tick);
      })(t0);
    });
  });
  nums.forEach((n) => { n.textContent = "0"; io.observe(n); });
})();
