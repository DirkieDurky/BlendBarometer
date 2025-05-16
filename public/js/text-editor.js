
const editor = document.querySelector('#editor');
const quill = new Quill(editor, {
    modules: {
        toolbar: [
            [{ header: [1, 2, false] }],
            ['bold', 'italic', 'underline', 'strike'],
            [{ 'list': 'ordered' }, { 'list': 'bullet' }],
            [{ 'color': [] }, { 'background': [] }],
            ['link', 'image', 'video'],
        ],
    },
    placeholder: 'Het volgende deel gaat over...',
    theme: 'snow',
});

// Show save button on keypress
let save = document.querySelector('#save');
save.style.display = 'none';

editor.addEventListener('keydown', () => {
    save.style.display = 'block';
})

// Add content to request on submit
const form = document.querySelector('#form');

form.addEventListener('submit', () => {
    let input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'html';
    input.value = DOMPurify.sanitize(quill.getSemanticHTML());
    form.append(input);
})