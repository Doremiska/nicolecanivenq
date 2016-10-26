// Ancre Top
$(function(){
    $(window).scroll(function(){
        if($(document).scrollTop() >= 320)
            $('#ancre-top').fadeIn();
        else
            $('#ancre-top').fadeOut();
    })
});

// Script Scroll Smooth
$(function() {
    $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 800);
            return false;
            }
        }
    });
});

// Script Side Menu
function openNav() {
    document.getElementById("side-menu").style.width = "280px";
    document.getElementById("body-content").style.marginLeft = "280px";
    document.getElementById("body-content").style.marginRight = "-280px";
    document.getElementById("cover").style.zIndex = "1";
    document.getElementById("cover").style.backgroundColor = "rgba(0, 0, 0, 0.6)";
}

function closeNav() {
    document.getElementById("side-menu").style.width = "0";
    document.getElementById("body-content").style.marginLeft = "0";
    document.getElementById("body-content").style.marginRight = "0";
    document.getElementById("cover").style.zIndex = "-1";
    document.getElementById("cover").style.backgroundColor = "transparent";
}

function expandNav(name) {
    document.getElementById("side-menu-expand-".concat(name)).style.maxHeight = "200px";
    document.getElementById("side-menu-glyphicon-right-".concat(name)).style.display = "none";
    document.getElementById("side-menu-glyphicon-down-".concat(name)).style.display = "inline-block";
}

function unexpandNav(name) {
    document.getElementById("side-menu-expand-".concat(name)).style.maxHeight = "0";
    document.getElementById("side-menu-glyphicon-right-".concat(name)).style.display = "inline-block";
    document.getElementById("side-menu-glyphicon-down-".concat(name)).style.display = "none";
}

// Boutons close
$('.close').click(function() {
    $(this).parent().parent().fadeOut();
});
