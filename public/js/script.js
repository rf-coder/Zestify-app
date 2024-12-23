// Show the button when scrolling down
window.onscroll = function() {
    const goTopBtn = document.getElementById("goTopBtn");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        goTopBtn.style.display = "block"; // Show the button
    } else {
        goTopBtn.style.display = "none"; // Hide the button
    }
};

// Scroll to the top of the page smoothly
document.getElementById("goTopBtn").addEventListener("click", function() {
    window.scrollTo({
        top: 0,
        behavior: "smooth" // Smooth scroll
    });
});


