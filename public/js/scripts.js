const scripts = () => {
    preventInspect();
    darkMode();
    uploadProfile();
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

const uploadProfile = () => {
    document
        .querySelector("#change-picture-btn")
        .addEventListener("click", function () {
            document.querySelector("#profile-pic").click();
        });
};

scripts();
