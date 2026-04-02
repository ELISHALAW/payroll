document.addEventListener('DOMContentLoaded', function () {
    const openBtn = document.getElementById('openAddOffdayModalBtn');
    const modal = document.getElementById('offdayModalContainer');
    const closeModal = document.getElementById('closeAddOffdayModalBtn');
    const cancelBtn = document.getElementById('cancelOffdayBtn');
    if (closeModal) {
        closeModal.addEventListener('click', function () {
            modal.classList.add('hidden');
        });
    }

    if (cancelBtn) {
        cancelBtn.addEventListener('click', function () {
            modal.classList.add('hidden');
        });
    }

    if (openBtn) {
        openBtn.addEventListener('click', function () {
            modal.classList.remove('hidden');
        });
    }

});

document.addEventListener('DOMContentLoaded', function () {
    // 1. Get element references
    const checkbox = document.getElementById('isRecurrentCheckbox');
    const section = document.getElementById('recurrentSection');
    const radios = document.querySelectorAll('.mode-radio');
    const countInput = document.getElementById('repeatCountInput');
    const untilInput = document.getElementById('repeatUntilInput');

    // 2. Toggle the entire section visibility
    checkbox.addEventListener('change', function () {
        if (this.checked) {
            section.classList.remove('hidden');
        } else {
            section.classList.add('hidden');
        }
    });

    // 3. Handle Radio logic (Enable "Times" or "Until date")
    radios.forEach(radio => {
        radio.addEventListener('change', function () {
            if (this.value === 'times') {
                countInput.disabled = false;
                untilInput.disabled = true;
                untilInput.value = ""; // Clear unused field
            } else {
                countInput.disabled = true;
                untilInput.disabled = false;
                countInput.value = ""; // Clear unused field
            }
        });
    });
});


const btn = document.getElementById('menuButton');
const menu = document.getElementById('dropdownMenu');

btn.addEventListener('click', (e) => {
    e.stopPropagation();
    const isHidden = menu.classList.contains('hidden');
    if (isHidden) {
        menu.classList.remove('hidden');
        // Timeout to allow browser to register the class removal before animating
        setTimeout(() => {
            menu.classList.remove('opacity-0', '-translate-x-2');
            menu.classList.add('opacity-100', 'translate-x-0');
        }, 10);
    } else {
        hideMenu();
    }
});

document.addEventListener('click', (e) => {
    if (!menu.contains(e.target)) hideMenu();
});

function hideMenu() {
    menu.classList.add('opacity-0', '-translate-x-2');
    menu.classList.remove('opacity-100', 'translate-x-0');
    setTimeout(() => menu.classList.add('hidden'), 200);
}