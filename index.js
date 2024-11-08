burger=document.querySelector('.burger')
navbarItems=document.querySelector('.navbar')
nav=document.querySelector('.items')
head = document.querySelector('.head');
loginlink = document.querySelector('.login-link');
registerlink = document.querySelector('.register-link');

login = document.querySelector('.log');
closeicon = document.querySelector('.close-icon');

burger.addEventListener('click',()=>{
    navbarItems.classList.toggle('h-class')
    nav.classList.toggle('v-class')
})
registerlink.addEventListener('click', ()=>{
    head.classList.add('active');
});

loginlink.addEventListener('click', ()=> {
    head.classList.remove('active');
});

login.addEventListener('click', ()=>{
    head.classList.add('active-popup');
});

closeicon.addEventListener('click', ()=>{
    head.classList.remove('active-popup');
});
