document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('edit-modal');
    const openBtn = document.getElementById('btn-open-edit');
    const closeBtn = document.getElementById('btn-x-close');
    const closeBtn2 = document.getElementById('btn-close-modal');

    // 1. Open Modal
    if (openBtn) {
        openBtn.addEventListener('click', function () {
            modal.classList.remove('hidden');
        });
    }

    // 2. Close Modal (Fix: Handle buttons individually)
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

    // Optional: Close modal if user clicks the dark background
    window.addEventListener('click', function (event) {
        if (event.target == modal) {
            modal.classList.add('hidden');
        }
    });
});


document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('hospitalization-modal');
    const openBtn = document.getElementById('btn-open-hosp');
    const closeBtn = document.getElementById('btn-cancel-hospitalization');
    const closeBtn2 = document.getElementById('close-hosp-modal');
    const confirmBtn = document.getElementById('btn-confirm-hospitalization');


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
})

document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('sick-modal');
    const openBtn = document.getElementById('btn-open-sick');
    const closeBtn = document.getElementById('btn-cancel-sick');
    const closeBtn2 = document.getElementById('close-sick-modal');
    const confirmBtn = document.getElementById('btn-confirm-sick');


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