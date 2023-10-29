$('#sliderliste').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
	  // navigation: true,
    // navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    navigation:true,
    dots:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:1,
            nav:false
        },
        1000:{
            items:1,
            nav:true,
            loop:false
        }
    }
});
$('#kampanyaliste').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
	  // navigation: true,
    navText: ["<i class='fa fa-arrow-left'></i>", "<i class='fa fa-arrow-right'></i>"],
    nav: true,
    dots:true,
	  navigation:true,
    responsive:{
        0:{
            items:2,
            nav:true
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:2,
            nav:true,
            loop:false
        }
    }
});
$('#hakkindarest').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
	  // navigation: true,
    navText: ["<i class='fa fa-arrow-left'></i>", "<i class='fa fa-arrow-right'></i>"],
    nav: true,
    dots:true,
	  navigation:true,
    autoWidth:true,
    responsive:{
        0:{
            items:2,
            nav:true
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:2,
            nav:true,
            loop:false
        }
    }
});

$('#genelbilgi').owlCarousel({
    loop:true,
    margin:10,
    responsiveClass:true,
	  // navigation: true,
    navText: ["<i class='fa fa-arrow-left'></i>", "<i class='fa fa-arrow-right'></i>"],
    nav: true,
    dots:true,
	  navigation:true,
    autoWidth:true,
    responsive:{
        0:{
            items:2,
            nav:true
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:2,
            nav:true,
            loop:false
        }
    }
});


var navItems = document.querySelectorAll(".mobile-bottom-nav__item");
navItems.forEach(function(e, i) {
  e.addEventListener("click", function(e) {
    navItems.forEach(function(e2, i2) {
      e2.classList.remove("mobile-bottom-nav__item--active");
    })
    this.classList.add("mobile-bottom-nav__item--active");
  });
});

var sidebar = document.getElementById("sidebar");
var close_nav_b = document.getElementById("close_nav_b");
var open_nav_b = document.getElementById("open_nav_b");
var nav_hidden = document.getElementById("nav_hidden");

var smileone = document.getElementById("smileone");
var smileonediv = document.getElementById("smileonediv");
var smileoneinput = document.getElementById("smileoneinput");

var smilefive = document.getElementById("smilefive");
var smilefivediv = document.getElementById("smilefivediv");
var smilefiveinput = document.getElementById("smilefiveinput");

var smiletwo = document.getElementById("smiletwo");
var smiletwodiv = document.getElementById("smiletwodiv");
var smiletwoinput = document.getElementById("smiletwoinput");

var smilethree = document.getElementById("smilethree");
var smilethreediv = document.getElementById("smilethreediv");
var smilethreeinput = document.getElementById("smilethreeinput");

var smilefour = document.getElementById("smilefour");
var smilefourdiv = document.getElementById("smilefourdiv");
var smilefourinput = document.getElementById("smilefourinput");


close_nav_b.style.display = "none";
function open_nav(){
  sidebar.style.width = "100%";
  close_nav_b.style.display = "block";
  open_nav_b.style.display = "none";
  nav_hidden.style.visibility = "visible";
}
function close_nav(){
  sidebar.style.width ="0%";
  open_nav_b.style.display = "block";
  close_nav_b.style.display = "none";
  nav_hidden.style.visibility = "hidden";
}

function smile1() {
 smileoneinput.checked = "true";
 smileonediv.style.backgroundColor = "#ced4da";
 smilefivediv.style.backgroundColor = "#fff";
 smiletwodiv.style.backgroundColor = "#fff";
 smilethreediv.style.backgroundColor = "#fff";
 smilefourdiv.style.backgroundColor = "#fff";
}
function smile5() {
 smilefiveinput.checked = "true";
 smilefivediv.style.backgroundColor = "#ced4da";
 smileonediv.style.backgroundColor = "#fff";
 smiletwodiv.style.backgroundColor = "#fff";
 smilethreediv.style.backgroundColor = "#fff";
 smilefourdiv.style.backgroundColor = "#fff";
}

function smile2() {
 smiletwoinput.checked = "true";
 smiletwodiv.style.backgroundColor = "#ced4da";
 smilefivediv.style.backgroundColor = "#fff";
 smileonediv.style.backgroundColor = "#fff";
 smilethreediv.style.backgroundColor = "#fff";
 smilefourdiv.style.backgroundColor = "#fff";
}

function smile3() {
 smilethreeinput.checked = "true";
 smilethreediv.style.backgroundColor = "#ced4da";
 smiletwodiv.style.backgroundColor = "#fff";
 smilefivediv.style.backgroundColor = "#fff";
 smileonediv.style.backgroundColor = "#fff";
 smilefourdiv.style.backgroundColor = "#fff";
}

function smile4() {
 smilefourinput.checked = "true";
 smilefourdiv.style.backgroundColor = "#ced4da";
 smiletwodiv.style.backgroundColor = "#fff";
 smilefivediv.style.backgroundColor = "#fff";
 smilethreediv.style.backgroundColor = "#fff";
 smileonediv.style.backgroundColor = "#fff";
}