// 導覽列滑下來變色並FIXED
var mynavbar = document.querySelector(".mynavbar");
var navlinks = document.querySelector(".navlinks");
window.addEventListener("scroll", function() {
    var scrollHeight = window.pageYOffset;
    var navlinksHeight = navlinks.getBoundingClientRect().height;
    if (scrollHeight > navlinksHeight) {
        // console.log(mynavbar)
        mynavbar.classList.remove("mynavbar");
        mynavbar.classList.add("fixnavbar");
    } else {
        mynavbar.classList.remove("fixnavbar");
        mynavbar.classList.add("mynavbar");
    }
});

//回到頂端的圖片偵測捲軸高度出現
var backToTop = document.getElementById("pictop");
var slideshow = document.getElementById("slideshow");
window.addEventListener("scroll", function() {
    var scrollHeight = window.pageYOffset;
    // console.log(pageYOffset)
    if (scrollHeight > 600) {
        backToTop.style.display = "block";
    } else {
        backToTop.style.display = "none"
    }
});