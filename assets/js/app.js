import '../css/app.scss'

const showFormAddLink = document.querySelector('#showFormAddLink')

if (showFormAddLink) {
    showFormAddLink.addEventListener('click', event => {
        document.querySelector('#addFormLink').classList.toggle('hide')
    })
    document.addEventListener('keydown', event => {
        event.preventDefault()
        if (event.key === 't') {
            document.querySelector('#addFormLink').classList.toggle('hide')
            const urlInput = document.querySelector('#addFormLink #urlInput')
            urlInput.focus()
        }
    })
}