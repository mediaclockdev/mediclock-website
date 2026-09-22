/* ============================================================
   career.js — Careers page only (loaded by $page_js)
   Media Clock — static rebuild

   1. "Apply Now" on a vacancy preselects that role in the form.
      The link is a plain #apply anchor, so it still works without this.
   2. The application form's success message, the same swap the
      consultation form does in main.js.
   ============================================================ */
(function () {
  "use strict";

  /* * Vacancy -> form */
  var position = document.getElementById("aPosition");
  document.querySelectorAll(".vacancy-apply").forEach(function (link) {
    link.addEventListener("click", function () {
      if (!position) return;
      var role = link.dataset.role;
      var match = [...position.options].find(function (o) {
        return o.textContent === role;
      });
      if (!match) return;
      position.value = match.value || match.textContent;
      /* clear a "please choose" error left over from an earlier attempt */
      position.dispatchEvent(new Event("change", { bubbles: true }));
    });
  });

  /* * Application form : success message
     Registered without capture, so the shared validator in main.js (which
     listens in the capture phase) stops an invalid form before this runs. */
  var form = document.getElementById("applyForm");
  var success = document.getElementById("applySuccess");
  if (!form || !success) return;
  form.addEventListener("submit", function (e) {
    e.preventDefault();
    form.classList.add("hidden");
    success.classList.add("show");
  });
})();
