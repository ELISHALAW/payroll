document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('family-member-modal');
    const openBtn = document.getElementById('btn-add-family-member');
    const closeBtn = document.getElementById('btn-cancel-family-member');
    const closeBtn2 = document.getElementById('btn-close-family-member');
    const confirmBtn = document.getElementById('btn-save-family-member');

    if (openBtn) {
        openBtn.addEventListener('click', function () {
            modal.classList.remove('hidden');
        })
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

    if (confirmBtn) {
        confirmBtn.addEventListener('click', function () {
            // Optionally, you can add form validation here before submitting
            modal.classList.add('hidden');
        });
    }
});


document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('edit-nok-modal');
    const openBtn = document.getElementById('btn-edit-nok');
    const closeBtn = document.getElementById('btn-cancel-edit-nok');
    const closeBtn2 = document.getElementById('btn-close-edit-nok');
    const confirmBtn = document.getElementById('btn-save-edit-nok');

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

    if (confirmBtn) {
        confirmBtn.addEventListener('click', function () {
            // Optionally, you can add form validation here before submitting
            modal.classList.add('hidden');
        });
    }

});

document.addEventListener('DOMContentLoaded', () => {
    // Select all buttons by class
    const buttons = document.querySelectorAll('.menu-button');

    buttons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.stopPropagation();

            // Find the specific menu next to this button
            const menu = btn.nextElementSibling;

            // Close other open menus first
            document.querySelectorAll('.dropdown-menu').forEach(m => {
                if (m !== menu) m.classList.add('hidden');
            });

            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                // Tiny delay to trigger CSS transition
                setTimeout(() => {
                    menu.classList.remove('opacity-0', 'scale-95');
                    menu.classList.add('opacity-100', 'scale-100');
                }, 10);
            } else {
                hideMenu(menu);
            }
        });
    });

    // Close when clicking anywhere else
    document.addEventListener('click', () => {
        document.querySelectorAll('.dropdown-menu').forEach(m => hideMenu(m));
    });

    function hideMenu(m) {
        m.classList.add('opacity-0', 'scale-95');
        m.classList.remove('opacity-100', 'scale-100');
        setTimeout(() => m.classList.add('hidden'), 300);
    }
});