document.addEventListener("DOMContentLoaded", () => {
    const container = document.getElementById("floatingContainer");
    const button = document.getElementById("floatingButton");
    const menu = document.getElementById("floatingMenu");

    // Toggle menu
    button.addEventListener("click", (e) => {
        e.stopPropagation();
        menu.classList.toggle("hidden");
    });

    document.addEventListener("click", (e) => {
        if (!button.contains(e.target) && !menu.contains(e.target)) {
            menu.classList.add("hidden");
        }
    });

    function toggleButtonVisibility() {
        const scrollY = window.scrollY || window.pageYOffset;
        const windowHeight = window.innerHeight;
        const docHeight = document.body.scrollHeight;
        const distanceToBottom = docHeight - (scrollY + windowHeight);

        // cek ukuran layar
        const isMdUp = window.innerWidth >= 768; // md breakpoint Tailwind

        if (isMdUp) {
            // di md ke atas, tombol selalu muncul
            container.style.display = "flex";
        } else {
            // di sm, tombol muncul/hilang sesuai scroll
            if (distanceToBottom < 150) {
                container.style.display = "none";
            } else {
                container.style.display = "flex";
            }
        }
    }

    // event scroll
    window.addEventListener("scroll", toggleButtonVisibility);

    // cek saat halaman load
    window.addEventListener("load", toggleButtonVisibility);

    // cek saat resize window
    window.addEventListener("resize", toggleButtonVisibility);
});
