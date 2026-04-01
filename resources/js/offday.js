document.addEventListener('DOMContentLoaded', function(){
    const openBtn = document.getElementById('openAddOffdayModalBtn');
    const modal = document.getElementById('offdayModalContainer');
    const closeModal = document.getElementById('closeAddOffdayModalBtn');
    const cancelBtn = document.getElementById('cancelOffdayBtn');
    if(closeModal){
        closeModal.addEventListener('click', function(){
            modal.classList.add('hidden');
        });
    }

    if (cancelBtn){
        cancelBtn.addEventListener('click', function(){
            modal.classList.add('hidden');
        }); 
    }

    if(openBtn){
        openBtn.addEventListener('click', function(){
            modal.classList.remove('hidden');
        });
    }

});

document.addEventListener('DOMContentLoaded', function() {
    // 1. Get element references
    const checkbox = document.getElementById('isRecurrentCheckbox');
    const section = document.getElementById('recurrentSection');
    const radios = document.querySelectorAll('.mode-radio');
    const countInput = document.getElementById('repeatCountInput');
    const untilInput = document.getElementById('repeatUntilInput');

    // 2. Toggle the entire section visibility
    checkbox.addEventListener('change', function() {
        if (this.checked) {
            section.classList.remove('hidden');
        } else {
            section.classList.add('hidden');
        }
    });

    // 3. Handle Radio logic (Enable "Times" or "Until date")
    radios.forEach(radio => {
        radio.addEventListener('change', function() {
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