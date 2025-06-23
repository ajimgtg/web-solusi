(function ($) {
    "use strict";
    
    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });
    

    // Date and time picker
    $('.date').datetimepicker({
        format: 'L'
    });
    $('.time').datetimepicker({
        format: 'LT'
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        margin: 30,
        dots: true,
        loop: true,
        center: true,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });
    
})(jQuery);

// smooth transisi
document.addEventListener("DOMContentLoaded", function() {
    document.body.classList.add("loaded");
});

// animasi navbar
document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.querySelector(".navbar");
    const btnLogin = document.querySelector(".btn-login");

    window.addEventListener("scroll", function () {
        if (window.scrollY > 50) {
            navbar.classList.add("scrolled");
            btnLogin.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
            btnLogin.classList.remove("scrolled");
        }
    });
});
/* JavaScript File: script.js */

document.addEventListener("DOMContentLoaded", function () {
    const cards = document.querySelectorAll(".fade-in");

    function checkVisibility() {
        const triggerBottom = window.innerHeight * 0.85;
        cards.forEach(card => {
            const cardTop = card.getBoundingClientRect().top;
            if (cardTop < triggerBottom) {
                card.classList.add("show");
            }
        });
    }

    window.addEventListener("scroll", checkVisibility);
    checkVisibility();
});

/* service button slide */
function slideLeft() {
    document.querySelector('.row').scrollBy({ left: -300, behavior: 'smooth' });
}

function slideRight() {
    document.querySelector('.row').scrollBy({ left: 300, behavior: 'smooth' });
}

/* translate */
document.addEventListener("DOMContentLoaded", function () {
    const langButtons = document.querySelectorAll(".btn-lang");
    
    langButtons.forEach(button => {
        button.addEventListener("click", function () {
            const lang = this.querySelector("img").alt === "Bahasa Indonesia" ? "id" : "en";
            
            fetch("translate.php?lang=" + lang)
                .then(response => response.json())
                .then(data => {
                    document.querySelectorAll("[data-translate]").forEach(el => {
                        const key = el.getAttribute("data-translate");
                        if (data[key]) {
                            el.innerHTML = data[key];
                        }
                    });
                })
                .catch(error => console.error("Error fetching translation:", error));
        });
    });
});

