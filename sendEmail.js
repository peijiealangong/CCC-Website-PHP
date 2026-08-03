document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("contactForm");
    const status = document.getElementById("contactStatus");
    const submitButton = form?.querySelector('[type="submit"]');
    if (!form || !status || !submitButton) return;

    const setStatus = (message, type = "") => {
        status.textContent = message;
        status.className = `form-status${type ? ` is-${type}` : ""}`;
    };

    form.addEventListener("submit", async (event) => {
        event.preventDefault();

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        if (typeof window.emailjs === "undefined") {
            setStatus("The message service is unavailable right now. Please use the email link below.", "error");
            return;
        }

        const formData = new FormData(form);
        const originalLabel = submitButton.innerHTML;
        submitButton.disabled = true;
        submitButton.textContent = "Sending…";
        setStatus("Sending your message…");

        try {
            await window.emailjs.send("service_irt14bl", "template_wnlfnbh", {
                from_name: String(formData.get("name") || ""),
                from_email: String(formData.get("email") || ""),
                message: String(formData.get("message") || "")
            });
            form.reset();
            setStatus("Thanks — your message has been sent.", "success");
        } catch (error) {
            setStatus("We could not send your message. Please try again or use the email link below.", "error");
        } finally {
            submitButton.disabled = false;
            submitButton.innerHTML = originalLabel;
        }
    });
});
