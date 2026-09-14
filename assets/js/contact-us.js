/* * Contact us : office tabs swap the one map iframe */
(function () {
  const map = document.getElementById("officeMap"),
    tabs = document.querySelectorAll(".offices-tab");
  if (!map) return;
  tabs.forEach((tab) =>
    tab.addEventListener("click", () => {
      tabs.forEach((t) => t.setAttribute("aria-pressed", String(t === tab)));
      map.src = tab.dataset.map;
      map.title = tab.dataset.title;
    }),
  );
})();

/* * Contact us : blog subscribe (no backend yet, same as the other forms) */
(function () {
  const form = document.getElementById("subscribeForm"),
    success = document.getElementById("subscribeSuccess");
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
