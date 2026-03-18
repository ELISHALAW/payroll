import './bootstrap';

// 1. 获取所有需要的 DOM 元素
const modal = document.getElementById('editModal');
const openBtn = document.getElementById('openEditModal');
const closeBtn = document.getElementById('closeEditModal');
const cancelBtn = document.getElementById('cancelBtn');
const saveBtn = document.getElementById('saveBtn');
const editForm = document.getElementById('editProfileForm');

// 确保 modal 存在再寻找 overlay
const overlay = modal ? modal.querySelector('.absolute.inset-0') : null;

// 2. 统一定义切换函数
const handleToggle = () => {
    if (!modal) return;
    
    modal.classList.toggle('hidden');
    
    // 弹窗时禁止背景滚动
    if (!modal.classList.contains('hidden')) {
        document.body.style.overflow = 'hidden';
    } else {
        document.body.style.overflow = 'auto';
    }
};

// 3. 绑定点击事件 (数组循环更简洁)
[openBtn, closeBtn, cancelBtn, overlay].forEach(btn => {
    if (btn) btn.addEventListener('click', handleToggle);
});

// 4. 处理保存时的状态反馈
if (editForm) {
    editForm.addEventListener('submit', () => {
        if (saveBtn) {
            saveBtn.disabled = true;
            saveBtn.innerHTML = '<i class="las la-spinner la-spin"></i> Saving...';
            saveBtn.classList.add('opacity-50', 'cursor-not-allowed');
        }
    });
}

// 5. 键盘 ESC 支持
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal && !modal.classList.contains('hidden')) {
        handleToggle();
    }
});