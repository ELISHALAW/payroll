import './bootstrap';

/**
 * 通用 Modal 控制逻辑
 */
const ModalManager = {
    // 切换 Modal 显示状态
    toggle: (modalId) => {
        const modal = document.getElementById(modalId);
        if (!modal) return;

        const isHidden = modal.classList.toggle('hidden');
        // 同步背景滚动锁定
        document.body.style.overflow = isHidden ? 'auto' : 'hidden';
    },

    // 为特定的 Modal 绑定内部的“取消/关闭/遮罩”按钮
    bindInternalButtons: (modalId) => {
        const modal = document.getElementById(modalId);
        if (!modal) return;

        // 寻找该 Modal 内部所有带有 'close-modal' 类名或特定 ID 的取消按钮
        const closeElements = modal.querySelectorAll('.close-modal, #cancelBtn, .absolute.inset-0');
        closeElements.forEach(el => {
            el.addEventListener('click', () => ModalManager.toggle(modalId));
        });
    }
};

/**
 * 页面加载完成后初始化
 */
document.addEventListener('DOMContentLoaded', () => {

    // 1. 初始化所有 Modal 的内部关闭逻辑
    ModalManager.bindInternalButtons('editModal');
    ModalManager.bindInternalButtons('emailModal'); // 假设你的 Email Modal ID 是这个

    // 2. 绑定触发按钮 (Open Buttons)
    const triggerMap = {
        'openEditModal': 'editModal',
        'editEmailModal': 'emailModal'
    };

    Object.keys(triggerMap).forEach(btnId => {
        const btn = document.getElementById(btnId);
        const targetModalId = triggerMap[btnId];
        if (btn) {
            btn.addEventListener('click', () => ModalManager.toggle(targetModalId));
        }
    });

    // 3. 处理表单提交状态 (防止重复点击)
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function () {
            const saveBtn = this.querySelector('button[type="submit"]');
            if (saveBtn) {
                saveBtn.disabled = true;
                saveBtn.innerHTML = '<i class="las la-spinner la-spin"></i> Saving...';
                saveBtn.classList.add('opacity-50', 'cursor-not-allowed');
            }
        });
    });

    // 4. 全局快捷键：按下 ESC 关闭当前开启的 Modal
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            const openModal = document.querySelector('.fixed.inset-0:not(.hidden)');
            if (openModal) {
                ModalManager.toggle(openModal.id);
            }
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('addressModal');
    const openBtn = document.getElementById('openAddressModal');

    // All elements that should close the modal
    const closeBtn = document.getElementById('closeAddressBtn');
    const closeX = document.getElementById('closeAddressX');
    const backdrop = document.getElementById('addressBackdrop');

    // Toggle function
    const toggleModal = () => modal.classList.toggle('hidden');

    // Open Trigger
    if (openBtn) openBtn.addEventListener('click', toggleModal);

    // Close Triggers (Triggered by ID)
    if (closeBtn) closeBtn.addEventListener('click', toggleModal);
    if (closeX) closeX.addEventListener('click', toggleModal);
    if (backdrop) backdrop.addEventListener('click', toggleModal);
});

document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('addressModal');
    const openBtn = document.getElementById('openAddressModal');
    const closeBtn = document.getElementById('closeAddressModal');

    // Open Modal
    openBtn.addEventListener('click', () => {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Prevent scrolling
    });

    // Close Modal
    closeBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto'; // Restore scrolling
    });

    // Close on background click
    modal.addEventListener('click', (e) => {
        if (e.target === modal.querySelector('.bg-opacity-75')) {
            closeBtn.click();
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('addressModal');
    const openBtn = document.getElementById('openAddressModal'); // Your existing button ID
    const closeBtn = document.getElementById('closeAddressModal');

    // Open Modal
    openBtn.addEventListener('click', (e) => {
        e.preventDefault();
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Stop background scrolling
    });

    // Close Modal
    closeBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto'; // Re-enable scrolling
    });

    // Close on background click
    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeBtn.click();
        }
    });
});



document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('correspondenceAddressModal');
    const openBtn = document.getElementById('openCorrespondenceModal');
    const form = document.getElementById('correspondenceForm'); // Get the specific form

    if (openBtn && modal) {
        const closeBtns = document.querySelectorAll('.closeModal');

        openBtn.addEventListener('click', function (e) {
            e.preventDefault();
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        });

        const hideModal = () => {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        };

        closeBtns.forEach(btn => {
            btn.addEventListener('click', hideModal);
        });

        // Close on background click
        modal.addEventListener('click', (e) => {
            if (e.target === modal) hideModal();
        });

        // Optional: Handle the Save Changes button click explicitly if needed
        const saveBtn = document.getElementById('saveCorrespondenceBtn');
        if (saveBtn && form) {
            saveBtn.addEventListener('click', function (e) {
                // If you want to perform validation before sending:
                console.log("Submitting to: " + form.action);
                // form.submit(); // Standard submit will trigger based on the action attribute
            });
        }
    }
});


document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('emergencyContactModal');
    const openBtn = document.getElementById('openEmergencyModal');
    const closeBtns = document.querySelectorAll('.closeEmergencyModal');

    // Only run if the button and modal exist on this page
    if (openBtn && modal) {
        // Show the pop-up
        openBtn.addEventListener('click', function (e) {
            e.preventDefault();
            modal.classList.remove('hidden'); // Removes 'hidden' to show the modal
            document.body.style.overflow = 'hidden'; // Prevents background scrolling
        });

        // Hide the pop-up
        const hideModal = () => {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto'; // Restores scrolling
        };

        closeBtns.forEach(btn => {
            btn.addEventListener('click', hideModal);
        });

        // Close if user clicks outside the white box
        modal.addEventListener('click', (e) => {
            if (e.target === modal) hideModal();
        });
    }
});


// This function is for employment.blade.php


const modal = document.getElementById('employmentModal');
const openBtn = document.getElementById('openEmploymentModal');
const closeBtn = document.getElementById('closeEmploymentModal');

openBtn.addEventListener('click', () => modal.classList.remove('hidden'));
closeBtn.addEventListener('click', () => modal.classList.add('hidden'));

// Enable Save button styling (optional logic)
document.getElementById('employmentForm').addEventListener('input', function () {
    const submitBtn = document.getElementById('submitBtn');
    submitBtn.classList.remove('bg-gray-100', 'text-gray-400', 'cursor-allowed');
    submitBtn.classList.add('bg-cyan-600', 'text-white', 'hover:bg-cyan-700');
});


document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('historyModal');
    const openBtn = document.getElementById('addHistoryBtn');
    const closeIcon = document.getElementById('closeIcon');
    const cancelBtn = document.getElementById('cancelBtn');

    // Function to open modal
    openBtn.addEventListener('click', () => {
        modal.classList.remove('hidden');
    });

    // Function to close modal
    const closeModal = () => {
        modal.classList.add('hidden');
    };

    // Event listeners for closing
    closeIcon.addEventListener('click', closeModal);
    cancelBtn.addEventListener('click', closeModal);

    // Close when clicking outside the white box (on the backdrop)
    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeModal();
    });
});


document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('historyModal');
    const openBtn = document.getElementById('addHistoryBtn');
    const closeIcon = document.getElementById('closeModalIcon');
    const cancelBtn = document.getElementById('cancelModalBtn');

    // Show Modal
    openBtn.addEventListener('click', () => {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Prevent background scrolling
    });

    // Hide Modal function
    const hideModal = () => {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto'; // Re-enable scrolling
    };

    // Event listeners for closing
    closeIcon.addEventListener('click', hideModal);
    cancelBtn.addEventListener('click', hideModal);

    // Close when clicking on the dark background
    modal.addEventListener('click', (e) => {
        if (e.target === modal) hideModal();
    });
});




// Get the elements by their IDs
const modalcareer = document.getElementById('careerModal');
const openBtncareer = document.getElementById('addPastJobBtn');
const closeBtncareer = document.getElementById('closeModalBtn');

// Function to show the modal
openBtncareer.addEventListener('click', function () {
    modalcareer.classList.remove('hidden');
    // Optional: prevent background scrolling
    document.body.style.overflow = 'hidden';
});

// Function to hide the modal
closeBtncareer.addEventListener('click', function () {
    modalcareer.classList.add('hidden');
    document.body.style.overflow = 'auto';
});

// Close modal if user clicks outside the white box
window.addEventListener('click', function (event) {
    if (event.target === modal) {
        modalcarrer.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
});
