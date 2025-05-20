
const forms = document.querySelectorAll('.form');
forms.forEach((form) => {
    let container = form.querySelector('.editor');
    form.insertAdjacentElement('beforebegin', container);
    
    new Quill(container, {
        modules: {
            toolbar: [
                [{ header: [1, 2, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                [{ 'color': [] }, { 'background': [] }],
                ['link', 'image'],
            ],
        },
        placeholder: 'Het volgende deel gaat over...',
        theme: 'snow',
    });

    let resetButton = document.createElement('button');
    resetButton.type = 'reset';
    resetButton.className = 'btn btn-outline-primary mb-5 me-2';
    resetButton.innerText = 'Annuleren';
    resetButton.style.display = 'none';
    let saveButton = document.createElement('button');
    saveButton.type = 'submit';
    saveButton.className = 'btn btn-primary mb-5 me-2';
    saveButton.innerText = 'Opslaan';
    saveButton.style.display = 'none';

    resetButton.addEventListener('click', () => reloadPage());

    container.addEventListener('click', () => {
        resetButton.style.display = 'block';
        saveButton.style.display = 'block';
    });
    container.addEventListener('keydown', () => {
        resetButton.style.display = 'block';
        saveButton.style.display = 'block';
    });

    form.append(resetButton, saveButton);
});

let toolbars = document.querySelectorAll('.ql-toolbar');
toolbars.forEach((toolbar) => {
    toolbar.style.backgroundColor = 'white';
});

function reloadPage()
{
    if(confirm('Weet je zeker dat je de wijzigingen wilt annuleren?'))
    {
        window.location.reload();
    }
}