document.getElementById('menu-toggle').addEventListener('click', function() {
    document.getElementById('sidebar').classList.remove('-translate-x-full');
});

document.getElementById('sidebar-close').addEventListener('click', function() {
    document.getElementById('sidebar').classList.add('-translate-x-full');
});
