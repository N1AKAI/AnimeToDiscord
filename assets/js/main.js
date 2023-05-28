window.onload = function () {
    let tabs = document.querySelectorAll("ul.nav-tabs > li");
    tabs.forEach(function (tab) {
        tab.addEventListener("click", function (e) {
            e.preventDefault();
            let currActiveLi = document.querySelector("ul.nav-tabs > li.active");
            let currTab = document.querySelector(".tab-pane.active");
            currActiveLi.classList.remove("active");
            currTab.classList.remove("active");
            this.classList.add("active");
            let tabId = this.firstElementChild.getAttribute("href");
            document.querySelector(tabId).classList.add("active");
        });
    });
};