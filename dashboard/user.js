const tabs = document.querySelectorAll('[data-tab-target]')
const tabContents = document.querySelectorAll('[data-tab-content]')

tabs.forEach(tab => {
  tab.addEventListener('click', () => {
    const target = document.querySelector(tab.dataset.tabTarget)
    tabContents.forEach(tabContent => {
      tabContent.classList.remove('active')
    })
    tabs.forEach(tab => {
      tab.classList.remove('active')
    })
    tab.classList.add('active')
    target.classList.add('active')
  })
})

const button = document.querySelector("#btn")
const navbuttons = document.querySelector('.navbuttons')

button.addEventListener('click', () => {
  if(button.classList.contains("active")){
    button.classList.remove('active')
    navbuttons.classList.remove('active')
  }else{
    button.classList.add('active')
    navbuttons.classList.add('active')
  }
})
