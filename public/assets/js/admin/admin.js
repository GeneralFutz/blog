const toggle = document.getElementById("admin-sidebar-toggle");
const sidebar = document.getElementById("admin-sidebar");

// Function to manage sidebar visibility based on screen width
function manageSidebar() {
    const screenWidth = window.innerWidth;
    if (screenWidth >= 768) {
        sidebar.classList.add("open"); // Ensure sidebar is open on larger screens
    } else {
        sidebar.classList.remove("open"); // Ensure sidebar is closed on smaller screens
    }
}

// Event listener for toggle button
toggle.addEventListener("click", () => {
    sidebar.classList.toggle("open");
});

// Manage sidebar state on page load and window resize
document.addEventListener("DOMContentLoaded", manageSidebar);
window.addEventListener("resize", manageSidebar);
