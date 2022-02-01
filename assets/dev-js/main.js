function viewBasic() {
    document.querySelector('.container').style.opacity = 1;
    function checkWow(){
        if(typeof WOW == 'function') {
            beginWow();
        }else{
            setTimeout(checkWow,500);
        }
    }
        
    function beginWow(){
        new WOW().init();
        console.log(WOW);
    }
    checkWow();
}
function docReady(fn) {
    if (document.readyState === "complete" || document.readyState === "interactive") {
        setTimeout(fn, 100);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
    }
}

docReady(viewBasic);