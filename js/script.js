// Delete Confirmation
function confirmDelete() {
    return confirm("Are you sure you want to delete this record?");
}

// Success Alert
function successMessage(message) {
    alert(message);
}

// Sidebar Toggle
function toggleSidebar() {
    document.getElementById("sidebar").classList.toggle("active");
}
