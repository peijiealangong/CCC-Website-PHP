const EMAILJS_URL = "https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js";
const EMAILJS_PUBLIC_KEY = "nP3uTecuX7yRltzvW";
let emailJsLoader;

function loadEmailJs() {
    if (window.emailjs) return Promise.resolve(window.emailjs);
    if (emailJsLoader) return emailJsLoader;

    emailJsLoader = new Promise((resolve, reject) => {
        const script = document.createElement("script");
        script.src = EMAILJS_URL;
        script.async = true;
        script.onload = () => {
            if (!window.emailjs) {
                reject(new Error("Email service did not initialize."));
                return;
            }
            window.emailjs.init({ publicKey: EMAILJS_PUBLIC_KEY });
            resolve(window.emailjs);
        };
        script.onerror = () => reject(new Error("Email service could not load."));
        document.head.appendChild(script);
    });

    return emailJsLoader;
}

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

        const formData = new FormData(form);
        const originalLabel = submitButton.innerHTML;
        submitButton.disabled = true;
        submitButton.textContent = "Sending…";
        setStatus("Sending your message…");

        try {
            const emailjs = await loadEmailJs();
            await emailjs.send("service_irt14bl", "template_wnlfnbh", {
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
