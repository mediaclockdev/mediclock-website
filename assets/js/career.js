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

  /* * Application form : submit handler
     Registered without capture, so the shared validator in main.js (which
     listens in the capture phase) stops an invalid form before this runs. */
  var form = document.getElementById("applyForm");
  var success = document.getElementById("applySuccess");
  if (!form || !success) return;

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    var base = (document.body && document.body.dataset.siteBase) || "/";
    var action = form.getAttribute("action") || (base + "send-contact.php");
    var submitBtn = form.querySelector('button[type="submit"]');

    if (submitBtn) {
      submitBtn.disabled = true;
      submitBtn.dataset.origText = submitBtn.textContent;
      submitBtn.textContent = "Submitting application...";
    }

    var formData = new FormData(form);

    fetch(action, {
      method: "POST",
      body: formData,
      headers: {
        "X-Requested-With": "XMLHttpRequest",
        "Accept": "application/json",
      },
    })
      .then(function (res) { return res.json(); })
      .then(function (data) {
        if (data && data.success) {
          form.classList.add("hidden");
          success.classList.add("show");
          if (typeof mcThankYou === "function") {
            mcThankYou(data.kind || "application");
          }
        } else {
          alert((data && data.message) || "Failed to submit application. Please try again.");
          if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.textContent = submitBtn.dataset.origText || "Submit";
          }
        }
      })
      .catch(function (err) {
        console.error("Application form error:", err);
        alert("Sorry, an error occurred while submitting your application. Please try again.");
        if (submitBtn) {
          submitBtn.disabled = false;
          submitBtn.textContent = submitBtn.dataset.origText || "Submit";
        }
      });
  });
})();
