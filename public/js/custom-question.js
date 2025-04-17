const customQuestionForm = document.getElementById('custom_input');
const form = document.querySelector('form');

function addQuestion() {
    const txt = customQuestionForm.value.trim();
    if (!txt) return alert('Vul een vraag in!');

    // id and wrapper
    const uid = Date.now(); // unique ID based on timestamp, so no double IDs in html
    const idBase = 'custom_question_' + txt.toLowerCase().replace(/[^a-z0-9]+/g, '_') + '_' + uid;
    const wrapper = document.createElement('div');
    wrapper.classList.add('mb-5');

    // question title
    const p = document.createElement('p');
    p.className = 'fw-semibold';
    p.textContent = txt;
    wrapper.appendChild(p);

    // options container
    const row = document.createElement('div');
    row.className = 'row gap-4 mx-0';
    row.setAttribute('role', 'group');

    const options = [
        {id: 'nooit', emoji: '🫢', label: 'Nooit', value: 0},
        {id: 'af_en_toe', emoji: '🙂', label: 'Af en toe', value: 1},
        {id: 'vaak', emoji: '😃', label: 'Vaak', value: 2},
    ];

    options.forEach(opt => {
        const inp = document.createElement('input');
        inp.type = 'radio';
        inp.className = 'form-check-input visually-hidden';
        inp.name = idBase;
        inp.id = `${idBase}_${opt.id}`;
        inp.value = opt.value;
        inp.required = true;
        inp.autocomplete = 'off';
        inp.setAttribute('aria-label', opt.label);

        const lbl = document.createElement('label');
        lbl.className = 'form-check-label border-2 border rounded shadow-sm col py-4 d-flex flex-column justify-content-center align-items-center';
        lbl.htmlFor = inp.id;
        lbl.innerHTML = `<span style="font-size:2rem">${opt.emoji}</span><span class="mt-2 text-nowrap">${opt.label}</span>`;

        row.append(inp, lbl);
    });

    // add the options to the wrapper
    wrapper.appendChild(row);
    document.getElementById('custom-question-container').appendChild(wrapper);

    // reset state
    customQuestionForm.value = '';
    customQuestionForm.focus();
}

document.getElementById('addCustomQuestionBtn').addEventListener('click', addQuestion);

let customInputSelected = false;
customQuestionForm.addEventListener("focus", () => {
    customInputSelected = true;
})
customQuestionForm.addEventListener("blur", () => {
    customInputSelected = false;
})

addEventListener("keydown", (e) => {
    if (e.key === "Enter") {
        if (customInputSelected) {
            addQuestion();
            e.preventDefault();
        } else if (form.reportValidity()) {
            form.submit();
        }
    }
})
