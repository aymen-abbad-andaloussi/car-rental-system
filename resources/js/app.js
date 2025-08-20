import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


let buttonForm = document.querySelector('#buttonForm');
let cardForm = document.querySelector('#cardForm');
let status = true

buttonForm.addEventListener('click', ()=>{
    if (status) {
        cardForm.classList.remove('hidden')
        status = false
    } else {
        cardForm.classList.add('hidden')
        status = true
        
    }
});

let btnEdite = document.querySelectorAll('.btnEdite');
let cancelButtonsEd = document.querySelectorAll('.cancelButtonEd');

btnEdite.forEach((btnEd) => {
    btnEd.addEventListener('click', () => {
        let postId = btnEd.closest('[data-post-id]').getAttribute('data-post-id');
        let divEdite = document.querySelector(`.divEdite[data-post-id="${postId}"]`);
        if (divEdite) {
            divEdite.classList.remove('hidden');
        }
    });
});

cancelButtonsEd.forEach((cancelBtn) => {
    cancelBtn.addEventListener('click', (e) => {
        e.preventDefault();
        let divEdite = cancelBtn.closest('.divEdite');
        divEdite.classList.add('hidden');
    });
});


let buttonBooking = document.querySelectorAll('.buttonBooking');

buttonBooking.forEach((btnBk) => {
    btnBk.addEventListener('click', () => {
        let divBooking = btnBk.parentElement.querySelector('.divBooking');
        if (divBooking) {
            divBooking.classList.toggle('hidden');
        }
    });
});