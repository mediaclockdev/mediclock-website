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

/* * Contact us : blog subscribe */
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
    const base = (document.body && document.body.dataset.siteBase) || "/";
    const action = form.getAttribute("action") || (base + "send-contact.php");
    const submitBtn = form.querySelector('button[type="submit"]');

    if (submitBtn) {
      submitBtn.disabled = true;
      submitBtn.dataset.origText = submitBtn.textContent;
      submitBtn.textContent = "Subscribing...";
    }

    const formData = new FormData(form);

    fetch(action, {
      method: "POST",
      body: formData,
      headers: {
        "X-Requested-With": "XMLHttpRequest",
        "Accept": "application/json",
      },
    })
      .then((res) => res.json())
      .then((data) => {
        if (data && data.success) {
          form.hidden = true;
          success.hidden = false;
        } else {
          alert((data && data.message) || "Failed to subscribe. Please try again.");
          if (submitBtn) {
            submitBtn.disabled = false;
            submitBtn.textContent = submitBtn.dataset.origText || "Subscribe";
          }
        }
      })
      .catch((err) => {
        console.error("Subscribe error:", err);
        alert("Sorry, an error occurred while processing your subscription.");
        if (submitBtn) {
          submitBtn.disabled = false;
          submitBtn.textContent = submitBtn.dataset.origText || "Subscribe";
        }
      });
  });
})();
