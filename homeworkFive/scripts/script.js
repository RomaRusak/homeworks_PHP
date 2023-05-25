class NodeConstructor {
    static createNode (tagName, attributes, text) {
        let elem = document.createElement(`${tagName}`)

        const addAtributes = (elem, attributes) => {
            attributes.forEach(attr => {
                elem.setAttribute(attr[0], attr[1])
            })
            return elem
        }

        const addInnerText = (elem, text) => {
            elem.innerHTML = `${text}`
            return elem
        }
        
        switch (arguments.length) {
            case 1:
                return elem
            case 2:
                return Array.isArray(arguments[1])
                ? addAtributes(elem, attributes)
                : addInnerText(elem, attributes)        
            case 3:
                elem = addAtributes(elem, attributes)
                return addInnerText(elem, text)
        }
    }
}

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
                Modal.showModal()
            }
        })
    } 
}

class Modal {
    static showModal() {
        const backdrop = NodeConstructor.createNode('div', [['class', 'backdrop']])
        const modalBackground = NodeConstructor.createNode('div', [['class', 'modal-background']])
        const systemMessage = NodeConstructor.createNode('p', [['class', 'modal-message ']], 'К сожалению вы не дали согласие на обработку ваших персональных данных =(')
        const close = NodeConstructor.createNode('span', [['class', 'close-modal']], 'не могу найти красивый красный крестик, так что кликните сюда')

        modalBackground.append(systemMessage, close)
        backdrop.append(modalBackground)
        document.body.append(backdrop)
        document.body.style.overflow = "hidden"
        
        close.addEventListener('click', () => Modal.closeModal())

        backdrop.addEventListener('click', (e) => {
            if (!e.target.closest('.modal-background')) Modal.closeModal()
        })

    }

    static closeModal() {
        document.body.querySelector('.backdrop').remove()
        document.body.style.overflow = "auto"

    }
}

BurgerMenu.init()
if (location.href === 'http://homeworkfive/?page=contacts') ContactsForm.init()

