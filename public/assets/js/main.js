/* globals {$} */
// page style
var targetStyle = document.getElementById("style"),
    ltrDirection = "/assets/css/style-ltr.css";
rtlDirection = "/assets/css/style-rtl.css";

document.getElementById("en").onclick = function () {
    localStorage.setItem("lang_local", "en");
};
document.getElementById("ar").onclick = function () {
    localStorage.setItem("lang_local", "ar");
};

var lang = localStorage.getItem("lang_local");
if (window.location.href.indexOf("en") > -1) {
    targetStyle.href = ltrDirection;
} else if (window.location.href.indexOf("ar") > -1) {
    targetStyle.href = rtlDirection;
} else {
    targetStyle.href = ltrDirection;
}

document.addEventListener("DOMContentLoaded", function () {
    new SmartPhoto(".js-smartPhoto");

    var SearchIcon = document.querySelector(".app-bar-search .search-icon");
    var SearchInput = document.querySelector(".app-bar-search .search-input");
    var Brand = document.querySelector(".navbar .navbar-brand");
    SearchIcon.addEventListener("click", (e) => {
        SearchInput.classList.toggle("open");
        Brand.classList.toggle("hide");
    });
    window.addEventListener("scroll", function () {
        if (this.window.innerWidth > 767) {
            if (window.scrollY > 40) {
                document
                    .getElementById("navbar_top")
                    .classList.add("fixed-top");
                // add padding top to show content behind navbar
                navbar_height = document.querySelector(".navbar").offsetHeight;
                document.body.style.paddingTop = navbar_height + "px";
            } else {
                document
                    .getElementById("navbar_top")
                    .classList.remove("fixed-top");
                // remove padding top from body
                document.body.style.paddingTop = "0";
            }

            if (window.scrollY > 170) {
                document
                    .getElementById("search-box")
                    .classList.remove("d-none");
                document.getElementById("nav-list").classList.add("d-none");
            } else {
                document.getElementById("search-box").classList.add("d-none");
                document.getElementById("nav-list").classList.remove("d-none");
            }
        } else {
            document.getElementById("navbar_top").classList.add("fixed-top");
        }
    });

    document.addEventListener("touchstart", function () {}, true);
});

$(document).ready(function () {
    /*===================
    Back to top button
    ===================*/
    var backtotop = $(".back-to-top");
    function back() {
        if (backtotop) {
            if ($(window).scrollTop() > 100) {
                backtotop.addClass("active");
            } else {
                backtotop.removeClass("active");
            }
        }
        return 0;
    }
    $(window).ready(function () {
        back();
    });
    $(window).scroll(function () {
        back();
    });
});

/*=====================================
  START SETTING BOX COMPONENT MECANISME
  =====================================*/

// getv all ul list items
// const themes_list = document.querySelectorAll('.themes-list li');

var themeColor = localStorage.getItem("theme_color");
var textColor = localStorage.getItem("text_color");
var darkColor = localStorage.getItem("mode_color");

if (themeColor != null && textColor != null && darkColor != null) {
    //set --main-color as a storage color option
    document.documentElement.style.setProperty("--theme-color", themeColor);
    document.documentElement.style.setProperty("--text-color", textColor);
    document.documentElement.style.setProperty("--mode-color", darkColor);
}

function changeTheme(newThemeColor, newTextColor, newModeColor) {
    // change --main-color attribute from the root element
    document.documentElement.style.setProperty("--theme-color", newThemeColor);
    document.documentElement.style.setProperty("--text-color", newTextColor);
    document.documentElement.style.setProperty("--mode-color", newModeColor);
    // set teh selected color in localstorage as a color_option variable
    localStorage.setItem("theme_color", newThemeColor);
    localStorage.setItem("text_color", newTextColor);
    localStorage.setItem("mode_color", newModeColor);
}

function changeToDark() {
    // get the color from the cutom attribute "color"
    let newThemeColor = "#00000f";
    let newTextColor = "#eee";
    let newModeColor = "#1a202c";
    changeTheme(newThemeColor, newTextColor, newModeColor);
}
function changeToLight() {
    // get the color from the cutom attribute "color"
    let newThemeColor = "#f8f6f6";
    let newTextColor = "#1a202c";
    let newModeColor = "#ccc";
    changeTheme(newThemeColor, newTextColor, newModeColor);
}

function toggleCheckTheme() {
    if (document.getElementById("CheckThemeBox").checked === true) {
        changeToDark();
    } else {
        changeToLight();
    }
}

let ourGallery = document.querySelectorAll(
    ".portfolio-details .portfolio-details-slider img"
);

ourGallery.forEach((image) => {
    image.addEventListener("click", (e) => {
        // get the selected imag sourse an dalt name
        let imgSrc = e.target.getAttribute("src");
        let imgAlt = e.target.getAttribute("alt");

        // show the popup overly section
        let overlay = document.querySelector(".popup-overlay");
        overlay.style.display = "block";

        // create img box div
        let imgBox = document.createElement("div");
        imgBox.className = "popup-img-box";

        // create the img tag
        let img = document.createElement("img");

        // create the close button
        let closer = document.createElement("span");
        let closeMark = document.createTextNode("X");
        closer.className = "popup-closer";
        closer.appendChild(closeMark);

        // check if the img has alt text
        if (imgAlt != null) {
            let imgHeading = document.createElement("span");
            let imgText = document.createTextNode(imgAlt);
            imgHeading.className = "popup-img-text";
            imgHeading.appendChild(imgText);
            imgBox.appendChild(imgHeading);
        }
        // set img tag src and alt
        img.src = imgSrc;
        img.alt = imgAlt;

        //append the img and the closer to img popup box
        imgBox.appendChild(img);
        imgBox.appendChild(closer);

        // append popup box the overlay
        overlay.appendChild(imgBox);

        // close popup section when the click on closer item
        closer.onclick = function () {
            overlay.style.display = "none";
            imgBox.remove();
        };
    });
});

// bullets mecanisme
function scrollToSection(elements) {
    let links = document.querySelectorAll(elements);
    links.forEach((link) => {
        link.addEventListener("click", (e) => {
            e.preventDefault();
            handelActive(e);
            document.querySelector(e.target.dataset.section).scrollIntoView({
                behavior: "smooth",
            });
        });
    });
}
