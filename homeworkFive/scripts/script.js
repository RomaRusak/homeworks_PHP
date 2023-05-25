class BurgerMenu {

    static init() {

        const burgerMenu = document.querySelector('.burger-menu')

        burgerMenu.addEventListener('click', () => {
            burgerMenu.classList.toggle('burger-active')
        })

        window.addEventListener('resize', () => {
            if (window.screen.width > 1200 && burgerMenu.classList.contains('burger-active')) burgerMenu.classList.remove('burger-active')
        })
    }
}

class ContactsForm {
    static init() {
        const confirmInput =  document.getElementById('getConsultationCheckbox')
        const submitButton = document.querySelector('.get-consultation-button');

        submitButton.addEventListener('click', (e) => {
            if (!confirmInput.checked) {
                e.preventDefault()
                alert('не успеваю сверстать модальное окно, но вы не дали согласие на обработку персональных данных')
            }
        })
    }
}

BurgerMenu.init()
ContactsForm.init()
