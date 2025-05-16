
const home_editor = document.querySelector('#home-editor');
const home_quill = new Quill(home_editor, {
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
let home_save = document.querySelector('#home-save');
let home_reset = document.querySelector('#home-reset');
home_save.style.display = 'none';
home_reset.style.display = 'none';

home_editor.addEventListener('keydown', () => {
    home_save.style.display = 'block';
    home_reset.style.display = 'block';
});
home_editor.addEventListener('click', () => {
    home_save.style.display = 'block';
    home_reset.style.display = 'block';
});

// Add content to request on submit
const home_form = document.querySelector('#home-form');

home_form.addEventListener('submit', () => {
    let input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'content';
    input.value = DOMPurify.sanitize(quill.getSemanticHTML());
    home_form.append(input);
})

function reloadPage()
{
    if(confirm('Weet je zeker dat je de wijzigingen wilt annuleren?'))
    {
        window.location.reload();
    }
}