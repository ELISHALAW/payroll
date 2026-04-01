document.addEventListener('DOMContentLoaded', function(){
    const openBtn = document.getElementById('openAddOffdayModalBtn');
    const modal = document.getElementById('offdayModal');


    if(openBtn){
        openBtn.addEventListener('click', function(){
            modal.classList.remove('hidden');
        });
    }

});