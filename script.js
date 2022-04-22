const button = document.querySelector('#btn')
const ex = document.querySelector('#ex')
const navbutton = document.querySelector('.navbuttons')

button.addEventListener('click', () => {
  navbutton.classList.add('active')
})

ex.addEventListener('click', () => {
  navbutton.classList.remove('active')
})
