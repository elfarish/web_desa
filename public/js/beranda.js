// =======================================
// beranda.js - Revisi untuk Beranda Desa
// =======================================

document.addEventListener("DOMContentLoaded", function () {
    // -------------------------------
    // Inisialisasi AOS
    // -------------------------------
    AOS.init({
        duration: 1000,
        once: true,
    });

    // -------------------------------
    // Carousel caption animasi
    // -------------------------------
    const carousel = document.querySelector("#heroCarousel");
    if (carousel) {
        const captions = carousel.querySelectorAll(".carousel-caption");

        const resetCaptions = () => {
            captions.forEach((caption) => {
                caption.style.opacity = 0;
                caption.style.transform = "translateY(30px)";
            });
        };

        const showActiveCaption = () => {
            const activeItem = carousel.querySelector(
                ".carousel-item.active .carousel-caption"
            );
            if (activeItem) {
                activeItem.style.opacity = 1;
                activeItem.style.transform = "translateY(0)";
            }
        };

        resetCaptions();
        showActiveCaption();

        carousel.addEventListener("slid.bs.carousel", () => {
            resetCaptions();
            showActiveCaption();
        });
    }

    // -------------------------------
    // Counter animasi saat terlihat
    // -------------------------------
    const counters = document.querySelectorAll(".counter");

    const animateCounter = (el, target, duration = 3000) => {
        const startTime = performance.now();

        const update = (currentTime) => {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            el.textContent = Math.floor(progress * target);

            if (progress < 1) {
                requestAnimationFrame(update);
            } else {
                el.textContent = target;
            }
        };

        requestAnimationFrame(update);
    };

    const counterObserver = new IntersectionObserver(
        (entries, observer) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    animateCounter(
                        entry.target,
                        parseInt(entry.target.dataset.count),
                        3000
                    );
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.5 }
    );

    counters.forEach((c) => counterObserver.observe(c));

    // -------------------------------
    // Hero elements animasi bertahap
    // -------------------------------
    const heroElements = document.querySelectorAll(".hero-animate");
    heroElements.forEach((el, index) => {
        setTimeout(() => {
            el.classList.add("show");
        }, index * 300);
    });

    // -------------------------------
    // Navbar collapse auto-close mobile (Bootstrap dropdown tetap berfungsi)
    // -------------------------------
    const navbarCollapse = document.getElementById("navbarNav");
    if (navbarCollapse) {
        navbarCollapse.querySelectorAll(".nav-link").forEach((link) => {
            // Jangan tutup navbar jika link dropdown
            if (!link.classList.contains("dropdown-toggle")) {
                link.addEventListener("click", () => {
                    if (window.innerWidth < 992) {
                        const bsCollapse =
                            bootstrap.Collapse.getInstance(navbarCollapse);
                        if (bsCollapse) bsCollapse.hide();
                    }
                });
            }
        });
    }
});
