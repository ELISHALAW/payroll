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

    if(closeBtn2) {
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