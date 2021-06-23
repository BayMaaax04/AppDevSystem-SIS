const scripts = () => {
    preventInspect();
    darkMode();
    toggleDarkMode();
    uploadProfile();
    activeNavbar();
    changeAtiveTab();
    heightTextArea();
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

const uploadProfile = () => {
    document
        .querySelector("#change-picture-btn")
        .addEventListener("click", function () {
            document.querySelector("#profile-pic").click();
        });
};

const ijaboCropTool = () => {
    $("#profile-pic").ijaboCropTool({
        preview: "",
        setRatio: 1,
        allowedExtensions: ["jpg", "jpeg", "png"],
        buttonsText: ["CROP", "QUIT"],
        buttonsColor: ["#30bf7d", "#ee5155", -15],
        processUrl: '{{ route{"userProfileUpdate"} }}',
        // withCSRF: ["_token", "{{csrf_token() }}"],
        onSuccess: function (message, element, status) {
            alert(message);
        },
        onError: function (message, element, status) {
            alert(message);
        },
    });
};

const activeNavbar = () => {
    var header = document.getElementById("navbar");
    var links = header.querySelectorAll("#nav-links");
    for (var i = 0; i < links.length; i++) {
        links[i].addEventListener("click", function () {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
};

const changeAtiveTab = (event, tabID) => {
    let element = event.target;
    while (element.nodeName !== "A") {
        element = element.parentNode;
    }
    ulElement = element.parentNode.parentNode;
    aElements = ulElement.querySelectorAll("li > a");
    tabContents = document
        .getElementById("tabs-id")
        .querySelectorAll(".tab-content > div");
    for (let i = 0; i < aElements.length; i++) {
        aElements[i].classList.remove("text-gray-800");
        aElements[i].classList.remove("border-red-accent");
        aElements[i].classList.add("text-gray-500");

        aElements[i].classList.remove("dark:text-gray-50");
        aElements[i].classList.remove("dark:border-gray-200");
        aElements[i].classList.add("dark:text-gray-500");

        tabContents[i].classList.add("hidden");
        tabContents[i].classList.remove("block");
    }
    element.classList.remove("text-gray-500");
    element.classList.add("text-gray-800");
    element.classList.add("border-red-accent");

    element.classList.remove("dark:text-gray-500");
    element.classList.add("dark:text-gray-50");

    document.getElementById(tabID).classList.remove("hidden");
    document.getElementById(tabID).classList.add("block");
};

const heightTextArea = () => {
    // Dealing with Textarea Height
    function calcHeight(value) {
        let numberOfLineBreaks = (value.match(/\n/g) || []).length;
        // min-height + lines x line-height + padding + border
        let newHeight = 20 + numberOfLineBreaks * 20 + 12 + 2;
        return newHeight;
    }

    let textarea = document.querySelector(".resize-ta");
    textarea.addEventListener("keyup", () => {
        textarea.style.height = calcHeight(textarea.value) + "px";
    });
};

scripts();
