document.addEventListener("DOMContentLoaded", function () {
    // Get the current URL path
    var currentPath = window.location.pathname;

    // Get all sidebar links
    var sidebarLinks = document.querySelectorAll("#sidebar-nav a.nav-link");

    sidebarLinks.forEach(function (link) {
        // Get the href attribute of each link and parse it
        var linkPath = new URL(link.href, window.location.origin).pathname;

        // Check if the current path matches the link's href attribute
        if (linkPath === currentPath) {
            // Remove the 'collapsed' class from the parent nav-link
            link.classList.remove("collapsed");

            // If the link is within a dropdown, also expand the dropdown
            var parentNavContent = link.closest(".nav-content");
            if (parentNavContent) {
                parentNavContent.classList.add("show");
                var parentNavLink = parentNavContent.previousElementSibling;
                if (parentNavLink) {
                    parentNavLink.classList.remove("collapsed");
                }
            }
        }
    });
});
