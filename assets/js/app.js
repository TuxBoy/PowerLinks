import '../css/app.scss'

const showFormAddLink = document.querySelector('#showFormAddLink')

if (showFormAddLink) {
    showFormAddLink.addEventListener('click', event => {
        event.preventDefault()
        document.querySelector('#addFormLink').classList.toggle('hide')
    })
    document.addEventListener('keydown', event => {
        const addFormLink = document.querySelector('#addFormLink')
        if (event.key === 't' && addFormLink.classList.contains('hide')) {
            event.preventDefault()
            document.querySelector('#addFormLink').classList.toggle('hide')
            const urlInput = document.querySelector('#addFormLink #urlInput')
            urlInput.focus()
        } else if (event.key === 'Escape') {
            addFormLink.classList.toggle('hide')
        }
    })
}