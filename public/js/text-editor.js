
const editor = document.querySelector('#editor');
const quill = new Quill(editor, {
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

// Show save button on keypress
let save = document.querySelector('#save');
let reset = document.querySelector('#reset');
save.style.display = 'none';
reset.style.display = 'none';

editor.addEventListener('keydown', () => {
    save.style.display = 'block';
    reset.style.display = 'block';
});
editor.addEventListener('click', () => {
    save.style.display = 'block';
    reset.style.display = 'block';
});

// Add content to request on submit
const form = document.querySelector('#form');

form.addEventListener('submit', () => {
    let input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'content';
    input.value = DOMPurify.sanitize(quill.getSemanticHTML());
    form.append(input);
})

function reloadPage()
{
    if(confirm('Weet je zeker dat je de wijzigingen wilt annuleren?'))
    {
        window.location.reload();
    }
}