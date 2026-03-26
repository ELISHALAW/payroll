window.toggleBankModal = function () {
    const modal = document.getElementById('bankModal');
    if (modal) {
        modal.classList.toggle('hidden');
        modal.classList.toggle('flex');
    }
}

// Listen for typing in any modal input
document.addEventListener('DOMContentLoaded', function () {
    const accountInput = document.querySelector('input[name="bank_account_no"]');
    const saveBtn = document.getElementById('saveBankBtn');

    if (accountInput && saveBtn) {
        // Run once on load in case the field is already filled by the browser/server
        const checkAccount = () => {
            if (accountInput.value.trim().length > 0) {
                // ENABLE STATE
                saveBtn.disabled = false;
                saveBtn.classList.remove('bg-gray-100', 'text-gray-300', 'cursor-not-allowed');
                saveBtn.classList.add('bg-cyan-500', 'text-white', 'hover:bg-cyan-600', 'cursor-pointer');
            } else {
                // DISABLE STATE
                saveBtn.disabled = true;
                saveBtn.classList.add('bg-gray-100', 'text-gray-300', 'cursor-not-allowed');
                saveBtn.classList.remove('bg-cyan-500', 'text-white', 'hover:bg-cyan-600', 'cursor-pointer');
            }
        };

        accountInput.addEventListener('input', checkAccount);
        checkAccount(); // Initial call
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const btnInfo = document.getElementById('tab-info');
    const btnHistory = document.getElementById('tab-history');
    const contentInfo = document.getElementById('content-info');
    const contentHistory = document.getElementById('content-history');

    btnInfo.addEventListener('click', function () {
        contentInfo.classList.remove('hidden');
        contentHistory.classList.add('hidden');

        btnInfo.classList.add('bg-cyan-50', 'border-cyan-500', 'text-cyan-600');
        btnInfo.classList.remove('bg-white', 'text-gray-700');

        btnHistory.classList.remove('bg-cyan-50', 'border-cyan-500', 'text-cyan-600');
        btnHistory.classList.add('bg-white', 'text-gray-700');
    })

    btnHistory.addEventListener('click', function () {
        contentHistory.classList.remove('hidden');
        contentInfo.classList.add('hidden');


        btnHistory.classList.add('bg-cyan-50', 'border-cyan-500', 'text-cyan-600');
        btnHistory.classList.remove('bg-white', 'text-gray-700');

        btnInfo.classList.remove('bg-cyan-50', 'border-cyan-500', 'text-cyan-600');
        btnInfo.classList.add('bg-white', 'text-gray-700');
    })
})




document.addEventListener('DOMContentLoaded', function () {
    // 1. Modal Elements
    const compModal = document.getElementById('compensationModal');
    const openBtn = document.getElementById('edit-compensation-btn');
    const closeBtn = document.getElementById('close-compensation-modal');
    const cancelBtn = document.getElementById('cancel-compensation-modal');

    // 2. Open Function
    openBtn.addEventListener('click', function () {
        compModal.classList.remove('hidden');
        compModal.classList.add('flex');
    });

    // 3. Close Function (Helper)
    function hideModal() {
        compModal.classList.add('hidden');
        compModal.classList.remove('flex');
    }

    // 4. Attach Close Events
    closeBtn.addEventListener('click', hideModal);
    cancelBtn.addEventListener('click', hideModal);

    // 5. Close if clicking outside the modal box
    window.addEventListener('click', function (event) {
        if (event.target === compModal) {
            hideModal();
        }
    });
});


document.addEventListener('DOMContentLoaded', function () {
    // Get elements by ID
    const modal = document.getElementById('taxModal');
    const openBtn = document.getElementById('openTaxModal'); // Your specific button ID
    const closeBtn = document.getElementById('closeTaxModal');
    const closeX = document.getElementById('closeModalX');
    const backdrop = document.getElementById('modalBackdrop');

    // Function to show the pop-up


    // Shared function to hide the pop-up
    const closeModal = () => {

        modal.style.display = 'none';
        document.body.style.overflow = 'auto'; // Restore background scrolling
    };


    if (openBtn && modal) {
        openBtn.addEventListener('click', function () {
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden'; // Stop background scrolling
        });
    }

    // Attach close events
    if (closeX) closeX.addEventListener('click', closeModal);
    if (closeBtn) closeBtn.addEventListener('click', closeModal);
    if (backdrop) backdrop.addEventListener('click', closeModal);

    // Close when user presses 'Escape' key
    document.addEventListener('keydown', (e) => {
        if (e.key === "Escape" && modal.style.display === 'block') {
            closeModal();
        }
    });

});