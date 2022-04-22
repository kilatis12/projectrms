const modal = document.querySelector('#modal');
const openModal = document.querySelector('.open-button');
const closeModal = document.querySelector('.close-button');

openModal.addEventListener('click', ()=>{
  modal.showModal();
})

closeModal.addEventListener('click', ()=>{
  modal.close();
})


const button = document.querySelector('#btn')
const navigations = document.querySelector('.navigations')

button.addEventListener('click', () =>{
  if(button.classList.contains("active")){
    button.classList.remove('active')
    navigations.classList.remove('active')
  }else{
    button.classList.add('active')
    navigations.classList.add('active')
  }
})
