/*!
 * Minimal theme switcher
 *
 * Pico.css - https://picocss.com
 * Copyright 2019-2023 - Licensed under MIT
 */

const themeSwitcher = {
    // Config
    _scheme: "auto",
    menuTarget: "details[role='list']",
    buttonsTarget: "a[data-theme-switcher]",
    buttonAttribute: "data-theme-switcher",
    rootAttribute: "data-theme",
    localStorageKey: "picoPreferredColorScheme",

    // Init
    init() {
        this.scheme = this.schemeFromLocalStorage;
        this.initSwitchers();
    },

    // Get color scheme from local storage
    get schemeFromLocalStorage() {
        if (typeof window.localStorage !== "undefined") {
            if (window.localStorage.getItem(this.localStorageKey) !== null) {
                return window.localStorage.getItem(this.localStorageKey);
            }
        }
        return this._scheme;
    },

    // Preferred color scheme
    get preferredColorScheme() {
        return window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
    },

    // Init switchers
    initSwitchers() {
        const buttons = document.querySelectorAll(this.buttonsTarget);
        buttons.forEach((button) => {
            button.addEventListener(
                "click",
                (event) => {
                    event.preventDefault();
                    // Set scheme
                    this.scheme = button.getAttribute(this.buttonAttribute);
                    // Close dropdown
                    document.querySelector(this.menuTarget).removeAttribute("open");
                },
                false
            );
        });
    },

    // Set scheme
    set scheme(scheme) {
        if (scheme == "auto") {
            this.preferredColorScheme == "dark" ? (this._scheme = "dark") : (this._scheme = "light");
        } else if (scheme == "dark" || scheme == "light") {
            this._scheme = scheme;
        }
        this.applyScheme();
        //Change the logo to the dark one
        if (this._scheme == "dark") {
            document.querySelector("article div:nth-of-type(2)").style.backgroundImage = "url('icon/light.jpeg')";
        } else {
            document.querySelector("article div:nth-of-type(2)").style.backgroundImage = "url('icon/dark.jpg')";
        }
        this.schemeToLocalStorage();
    },

    // Get scheme
    get scheme() {
        return this._scheme;
    },

    // Apply scheme
    applyScheme() {
        document.querySelector("html").setAttribute(this.rootAttribute, this.scheme);
        //Change the border color of the logo to black when its light mode
        if (this._scheme == "dark") {
            document.getElementById("logo").style.borderColor = "white";
        } else {
            document.getElementById("logo").style.borderColor = "black";
        }
    },

    // Store scheme to local storage
    schemeToLocalStorage() {
        if (typeof window.localStorage !== "undefined") {
            window.localStorage.setItem(this.localStorageKey, this.scheme);
        }
    },
};

// Init
themeSwitcher.init();
