// // Show hide mobile top-menu
// (function () {
// 	'use strict'
// 	document.querySelector('#navbar-mobile').addEventListener('click', function () {
// 		document.querySelector('.offcanvas-collapse').classList.toggle('open')
// 	})
// })()
// // Datepicker
// $('.datepicker').datepicker({
// 	format: 'dd/mm/yy'
// });
// // Dropzone
// Dropzone.autoDiscover = false;
// (function () {
// 	$(".dropzone").dropzone({
// 			url: "/file/post"
// 	});

// })()

// Show hide mobile top-menu
(function() {
    'use strict'
    document.querySelector('#navbar-mobile').addEventListener('click', function() {
        document.querySelector('.offcanvas-collapse').classList.toggle('open')
    })
})()

// jquery on click event
$(document).on("click", ".slt-pet-order", function() {
    var e = $(this);
    $(".slt-pet-order").each(function() {
        if ($(this).hasClass("bg-b30-0d9")) {
            $(this).removeClass("bg-b30-0d9")
        }
    });
    if (!e.hasClass("bg-b30-0d9")) {
        e.addClass("bg-b30-0d9");
        var ei = $(this).find('input[type="radio"]')[0];
        $(ei).prop('checked', true);
        $(ei).trigger("change");
    }
});


$(document).on("click", ".slt-card-order", function() {
    var e = $(this);
    $(".slt-card-order").each(function() {
        if ($(this).hasClass("brd-2b-r12")) {
            $(this).removeClass("brd-2b-r12")
        }
    });
    if (!e.hasClass("brd-2b-r12")) {
        e.addClass("brd-2b-r12")
    }
});

$(document).on("click", ".slt-pet-wl", function() {
    var e = $(this);
    $(".slt-pet-wl").each(function() {
        if ($(this).hasClass("bg-chk-c4")) {
            $(this).removeClass("bg-chk-c4")
        }
    });
    if (!e.hasClass("bg-chk-c4")) {
        e.addClass("bg-chk-c4")
    }
});

$(document).on("click", ".slt-pet-al", function() {
    var e = $(this);
    $(".slt-pet-al").each(function() {
        if ($(this).hasClass("bg-chk-c4")) {
            $(this).removeClass("bg-chk-c4")
        }
    });
    if (!e.hasClass("bg-chk-c4")) {
        e.addClass("bg-chk-c4")
    }
});
/*
$(document).on("click", "#of-video-play", function() {
    if (!$(this).hasClass("dsp-n")) {
        $(this).addClass("dsp-n");
    }
    document.getElementById('of-video').play();
});
*/
var ofvPlay = false;
$(document).on("click", "#of-video-w", function() {
    var ofv = document.getElementById("of-video");
    if (ofvPlay) {
        try {
            ofv.pause();
            ofvPlay = false;
            if ($("#of-video-play").hasClass("dsp-n")) {
                $("#of-video-play").removeClass("dsp-n");
            }
        } catch (e) {}
    } else {
        try {
            ofv.play();
            ofvPlay = true;
            if (!$("#of-video-play").hasClass("dsp-n")) {
                $("#of-video-play").addClass("dsp-n");
            }
        } catch (e) {}
    }
});

// Preview image - input file type pic
function inputPicPreview(ie, ve) {
    var f = $("#" + ie).get(0).files[0];
    if (f) {
        var r = new FileReader();
        r.onload = function() {
            console.log(r.result);
            $("#" + ve).attr("src", r.result);
        }
        r.readAsDataURL(f);
    }
}

// Scroll to top - button
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() { scrollFunctionScrolltoTop() };

function scrollFunctionScrolltoTop() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("scrollToTopBtn").style.display = "block";
    } else {
        document.getElementById("scrollToTopBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function scrollToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
