document.addEventListener("DOMContentLoaded", () => {
    const _headerButton = document.querySelector("body>header>button");
    const _headerNav = document.querySelector("body>header>nav");
    const _header = document.querySelector("body>header");
    const _footerButton = document.querySelector("body>footer>button");
    const _footerNav = document.querySelector("body>footer>nav");
    const _footer = document.querySelector("body>footer");

    _headerButton.addEventListener("click", event => {
        if (_headerNav.style.display === "block") {
             _headerNav.style.display = "none";
             _header.classList.remove("opened");
        } else {
            _headerNav.style.display = "block";
            _header.classList.add("opened");
        }
    });

    _footerButton.addEventListener("click", () => {
        _footerNav.style.display = _footerNav.style.display === "block" ? "none" : "block";
    });
});
