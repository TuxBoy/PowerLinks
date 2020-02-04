import '../css/app.scss'

const showFormAddLink = document.querySelector('#showFormAddLink')

if (showFormAddLink) {
    showFormAddLink.addEventListener('click', event => {
        document.querySelector('#addFormLink').classList.toggle('hide')
    })
    document.addEventListener('keydown', event => {
        if (event.key === 't') {
            //event.preventDefault()
            document.querySelector('#addFormLink').classList.toggle('hide')
            const urlInput = document.querySelector('#addFormLink #urlInput')
            urlInput.focus()
        }
    })
}