// script  για το mobileMenu 

const mobileMenuBtn = document.getElementById('mobileMenuBtn');
const mobileMenu = document.getElementById('mobileMenu');

mobileMenuBtn.addEventListener('click', (e)=>{
    e.preventDefault();
    mobileMenu.classList.toggle('hidden');
    document.body.classList.toggle('overflowHidden');
})
