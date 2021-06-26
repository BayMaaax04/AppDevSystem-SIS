const scripts = () => {
    // preventInspect();
    darkMode();
    toggleDarkMode();
    // ijaboCropTool();
    activeNavbar();
};
const preventInspect = () => {
    document.addEventListener("contextmenu", function (e) {
        e.preventDefault();
    });
};

const darkMode = () => {
    if (
        localStorage.theme === "dark" ||
        (!"theme" in localStorage &&
            window.matchMedia("(prefers-color-scheme: dark)").matches)
    ) {
        document.querySelector("html").classList.add("dark");
    } else if (localStorage.theme === "dark") {
        document.querySelector("html").classList.add("dark");
    }
};

const toggleDarkMode = () => {
    document
        .getElementById("switchTheme")
        .addEventListener("click", function () {
            let htmlClasses = document.querySelector("html").classList;
            if (localStorage.theme == "dark") {
                htmlClasses.remove("dark");
                localStorage.removeItem("theme");
            } else {
                htmlClasses.add("dark");
                localStorage.theme = "dark";
            }
        });
};

const activeNavbar = () => {
    const currentLocation = location.href;
    const navLinks = document.querySelectorAll("a#nav-links");
    const navLength = navLinks.length;
    for (let i = 0; i < navLength; i++) {
        if (navLinks[i].href === currentLocation) {
            navLinks[i].className =
                "active lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-red-accent border-b-2 border-red-accent font-bold";
        }
    }
};

scripts();
