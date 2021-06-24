const scripts = () => {
    preventInspect();
    darkMode();
    toggleDarkMode();
    uploadProfile();

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
            current[0].className = current[0].className.replace("active", "");
            this.className += " active";
        });
    }
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
