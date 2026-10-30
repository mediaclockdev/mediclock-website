/* ============================================================
   case-studies/total-inspections.js — the Total Inspections case study
   Keeps the two admin-portal mockups (includes/case-studies/
   total-inspections/) looking live: the numbers drift, the bars move
   and new rows arrive in the activity lists. Runs only while a mockup
   is on screen, and not at all for readers who ask for less motion.
   ============================================================ */

(function () {
  const mocks = document.querySelectorAll(".cs-mock");
  if (!mocks.length || matchMedia("(prefers-reduced-motion: reduce)").matches) return;

  const rand = (a, b) => a + Math.random() * (b - a);
  const clamp = (v, a, b) => Math.max(a, Math.min(b, v));

  /* * Numbers : [data-k] cells count to their new value and flash */
  const live = { site: 6, s: [12, 8, 24], total: 1429, insp: 42, up: 99.98, comp: 96.4, gr: 12.4, c: [582, 410, 284, 153], tpl: 24, used: 1240 };
  const format = (k, v) =>
    k === "up" ? v.toFixed(2) + "%"
      : k === "comp" ? v.toFixed(1) + "%"
      : k === "gr" ? "+" + v.toFixed(1) + "%"
      : k === "cap" ? Math.round(v) + "% Capacity"
      : Math.round(v).toLocaleString("en-AU");
  const shown = {};
  const put = (k, v) => {
    const from = k in shown ? shown[k] : v;
    shown[k] = v;
    document.querySelectorAll('[data-k="' + k + '"]').forEach((el) => {
      if (from === v) return;
      el.classList.remove("fx");
      void el.offsetWidth;
      el.classList.add("fx");
      // progress from the clock, clamped: a frame's own timestamp can be
      // earlier than t0, which would run the count backwards past its start
      const t0 = performance.now();
      (function step() {
        const p = Math.min(1, Math.max(0, (performance.now() - t0) / 900));
        el.textContent = format(k, from + (v - from) * (1 - Math.pow(1 - p, 3)));
        if (p < 1) requestAnimationFrame(step);
      })();
    });
  };
  // the markup already shows the starting values
  ["total", "insp", "up", "comp", "gr", "used", "tpl", "site"].forEach((k) => (shown[k] = live[k]));
  shown.cap = (live.insp / 48) * 100;
  live.s.forEach((v, i) => (shown["s" + (i + 1)] = v));
  live.c.forEach((v, i) => (shown["c" + i] = v));

  function tickNumbers() {
    live.total += Math.round(rand(1, 3));
    live.insp = clamp(live.insp + Math.round(rand(-1.2, 1.2)), 36, 47);
    live.up = +clamp(live.up + rand(-0.012, 0.012), 99.95, 99.99).toFixed(2);
    live.comp = +clamp(live.comp + rand(-0.25, 0.25), 95.8, 97.4).toFixed(1);
    live.gr = +clamp(live.gr + rand(-0.25, 0.25), 11.6, 13.2).toFixed(1);
    live.c = live.c.map((v) => v + Math.round(rand(0, 2.2)));
    live.used += Math.round(rand(1, 4));
    if (Math.random() < 0.1 && live.tpl < 32) live.tpl++;
    live.site = clamp(live.site + Math.round(rand(-1.2, 1.2)), 3, Math.min(9, live.insp));
    live.s = live.s.map((v, i) =>
      Math.random() < 0.12 ? clamp(v + (Math.random() < 0.5 ? -1 : 1), [10, 6, 22][i], [14, 10, 26][i]) : v,
    );
    ["total", "insp", "up", "comp", "gr", "used", "tpl", "site"].forEach((k) => put(k, live[k]));
    put("cap", (live.insp / 48) * 100);
    live.s.forEach((v, i) => put("s" + (i + 1), v));
    live.c.forEach((v, i) => {
      put("c" + i, v);
      document.querySelectorAll('[data-b="' + i + '"]').forEach((bar) => (bar.style.width = clamp(v / 8.1, 0, 100) + "%"));
    });
  }

  /* * Lists : a new row slides in at the top and the oldest drops off */
  const ago = (m) =>
    m < 1 ? "JUST NOW" : m < 60 ? m + " MINUTES AGO" : m < 1440 ? Math.round(m / 60) + " HOURS AGO" : m < 2880 ? "YESTERDAY" : Math.round(m / 1440) + " DAYS AGO";
  const agoShort = (m) => {
    const a = ago(m).toLowerCase();
    return a === "just now" ? "Just now" : a === "yesterday" ? "Yesterday" : a;
  };
  const esc = (s) => s.replace(/&/g, "&amp;").replace(/</g, "&lt;");
  const fill = (selector, html) => document.querySelectorAll(selector).forEach((el) => (el.innerHTML = html));

  const activity = [
    ["New branding assets uploaded", "Corporate marketing package"],
    ["API Key Rotation", "Security protocol completed for AWS instances."],
    ["Regional Server Sync", "Australia East database mirrored successfully."],
    ["Legacy template archived", '"Standard House" moved to cold storage.'],
    ["Inspector onboarded", "Perth region account provisioned."],
    ["Report engine updated", "PDF renderer v3.8 deployed."],
    ["Backup completed", "Nightly snapshot verified."],
  ];
  const activityRows = [[0, 14], [1, 120], [2, 1215], [3, 2880]];
  let activityNext = 4;
  const drawActivity = () =>
    fill(".cs-mock .al", activityRows.map(([i, m], n) =>
      "<div" + (n === 0 ? ' class="is-new"' : "") + "><b>" + esc(activity[i][0]) + "</b><span>" + esc(activity[i][1]) + "</span><small>" + ago(m) + "</small></div>",
    ).join(""));

  const templates = [
    ["Residential Structural Template updated", "David Chen", "#0a58b0"],
    ['New "Dilapidation Report" template created', "Sarah Williams", "#16a34a"],
    ["Pest Template version 2.4 archived", "System Audit", "#f59e0b"],
    ["Commercial checklist cloned", "Marcus Vane", "#0a58b0"],
    ["Pool Safety template published", "Tom Halloway", "#16a34a"],
    ["Asbestos template reviewed", "Sarah Jenkins", "#f59e0b"],
  ];
  const templateRows = [[0, 14], [1, 120], [2, 1440]];
  let templateNext = 3;
  const drawTemplates = () =>
    fill(".cs-mock .tal", templateRows.map(([i, m], n) => {
      const t = templates[i];
      return '<div class="' + (n === 0 ? "is-new" : "") + '" style="--dc:' + t[2] + '">' + esc(t[0]) +
        "<small>" + (m >= 1440 ? "System Audit" : "By " + t[1]) + " • " + agoShort(m) + "</small></div>";
    }).join(""));

  const inspectors = ["Marcus Vane", "Sarah Jenkins", "Tom Halloway", "Priya Nair", "Leo Carter", "Hana Ito"];
  const categories = ["Residential", "Commercial", "Pest Control", "Pre-Purchase"];
  const reports = [[90412, 0, 0, 2.4, 1], [89211, 1, 1, 4.8, 1], [88764, 2, 2, 6.1, 0]];
  let reportId = 90413;
  const drawReports = () =>
    fill(".cs-mock .rtb", reports.map(([id, who, cat, hours, passed], n) =>
      '<div class="rt' + (n === 0 ? " is-new" : "") + '"><b>#TI-' + id + "</b><span>" + inspectors[who] + "</span><span>" + categories[cat] +
        "</span><span>" + hours.toFixed(1) + 'h turnaround</span><span class="' + (passed ? "ok" : "lt") + '">' + (passed ? "PASSED" : "LATE") + "</span></div>",
    ).join(""));

  /* * Timers : run only while a mockup is visible and the tab is in front */
  const timers = [
    [tickNumbers, 2400],
    [() => {
      activityRows.forEach((row) => (row[1] += Math.round(rand(2, 9))));
      activityRows.unshift([activityNext++ % activity.length, 0]);
      activityRows.pop();
      drawActivity();
    }, 7000],
    [() => {
      templateRows.forEach((row) => (row[1] += Math.round(rand(3, 15))));
      templateRows.unshift([templateNext++ % templates.length, 0]);
      templateRows.pop();
      drawTemplates();
    }, 8500],
    [() => {
      reports.unshift([(reportId += Math.round(rand(1, 9))), Math.floor(rand(0, 6)), Math.floor(rand(0, 4)), +rand(1.8, 7).toFixed(1), Math.random() < 0.78 ? 1 : 0]);
      reports.pop();
      drawReports();
    }, 5500],
  ];
  let running = [];
  const visible = new Set();
  const sync = () => {
    const on = visible.size > 0 && !document.hidden;
    if (on && !running.length) running = timers.map(([fn, ms]) => setInterval(fn, ms));
    if (!on && running.length) {
      running.forEach(clearInterval);
      running = [];
    }
  };
  if ("IntersectionObserver" in window) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => (entry.isIntersecting ? visible.add(entry.target) : visible.delete(entry.target)));
      sync();
    });
    mocks.forEach((mock) => observer.observe(mock));
  } else {
    mocks.forEach((mock) => visible.add(mock));
    sync();
  }
  document.addEventListener("visibilitychange", sync);
})();
