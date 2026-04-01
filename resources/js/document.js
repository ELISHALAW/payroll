document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('new-asset-modal');
    const closeBtn = document.getElementById('close-company-asset-modal');
    const closeBtn2 = document.getElementById('btn-cancel-new-asset');
    const openBtn = document.getElementById('open-company-asset-modal');
    const saveBtn = document.getElementById('btn-save-new-asset');

    if (openBtn) {
        openBtn.addEventListener('click', function () {
            modal.classList.remove('hidden');
        });
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', function () {
            modal.classList.add('hidden');
        });
    }

    if (closeBtn2) {
        closeBtn2.addEventListener('click', function () {
            modal.classList.add('hidden');
        });
    }
});


document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('update-asset-modal');
    const closeBtn = document.getElementById('close-update-asset-modal');
    const closeBtn2 = document.getElementById('btn-cancel-update-asset');
    const openBtn = document.getElementById('open-update-asset-modal');

    if (openBtn) {
        openBtn.addEventListener('click', function () {
            modal.classList.remove('hidden');
        });
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', function () {
            modal.classList.add('hidden');
        });
    }

    if (closeBtn2) {
        closeBtn2.addEventListener('click', function () {
            modal.classList.add('hidden');
        });
    }

});





document.addEventListener('DOMContentLoaded', function () {
    // Select all the three-dot buttons
    const menuButtons = document.querySelectorAll('.three-dot-btn');

    menuButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            // Prevent the click from bubbling up to the document
            event.stopPropagation();

            // Find the specific dropdown menu associated with this button
            const currentMenu = this.nextElementSibling;

            // Close all other open dropdowns first
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                if (menu !== currentMenu) {
                    menu.classList.add('hidden');
                }
            });

            // Toggle the 'hidden' class on the clicked menu
            currentMenu.classList.toggle('hidden');
        });
    });

    // Close any open menu if the user clicks anywhere else on the page
    document.addEventListener('click', function () {
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            menu.classList.add('hidden');
        });
    });
});