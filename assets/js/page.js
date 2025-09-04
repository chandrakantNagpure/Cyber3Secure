// page.js
document.addEventListener("DOMContentLoaded", function() {
    const accordions = document.querySelectorAll(".accordion-button");

    accordions.forEach((button) => {
        button.addEventListener("click", function() {
            const collapseElement = button.parentElement.nextElementSibling;
            const isCollapsed = collapseElement.classList.contains("show");

            // Collapse all accordion items
            document.querySelectorAll('.accordion-collapse').forEach(collapse => {
                if (collapse !== collapseElement) {
                    collapse.classList.remove('show');
                    collapse.style.maxHeight = null;
                    collapse.style.opacity = 0;
                }
            });

            // If the clicked item was previously collapsed, expand it
            if (!isCollapsed) {
                collapseElement.classList.add("show");
                collapseElement.style.maxHeight = collapseElement.scrollHeight + "px";
                collapseElement.style.opacity = 1;
            } else {
                collapseElement.classList.remove("show");
                collapseElement.style.maxHeight = null;
                collapseElement.style.opacity = 0;
            }

            // Rotate the arrow
            button.querySelector('::before').style.transform = isCollapsed ? 'rotate(0deg)' : 'rotate(180deg)';
        });
    });
});
