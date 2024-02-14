let display = document.querySelector("#profileWindow");

function profileWindowToggleController() {
    display.className = display.className === "hidden" ? "block" : "hidden";
    // document.querySelector("#profileWindow").className = "hidden";
}