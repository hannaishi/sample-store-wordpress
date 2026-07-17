const btn = document.querySelector(".header-btn-menu");
const nav = document.querySelector(".header-menu");

if (btn && nav) {
    btn.addEventListener("click", () => {
        nav.classList.toggle("open-menu");

        btn.textContent =
            btn.textContent === "メニュー" ? "閉じる" : "メニュー";
    });
}

document.addEventListener("wpcf7mailsent", function () {
    setTimeout(function () {
        const response = document.querySelector(".wpcf7-response-output");

        if (response) {
            response.style.display = "none";
        }
    }, 3000);
});
