const customQuestionForm = document.getElementById('custom_input');
const form = document.querySelector('form');

function addQuestion() {
    let customQuestion = customQuestionForm.value.trim();

    if (customQuestion === '') {
        alert('Vul een vraag in!');
        return;
    }

    const questionField = document.createElement('div');
    questionField.classList.add('mb-5');

    const fieldName = "custom_question_" + customQuestion.toLowerCase().replace(/[^a-z0-9]+/g, '_');

    questionField.innerHTML = `
        <p class="fw-semibold">${customQuestion}</p>
        <div class="d-flex gap-4" role="group">
            <input type="radio" class="form-check-input visually-hidden" name="${fieldName}" id="${fieldName}_nooit" value="0" autocomplete="off" required>
            <label class="form-check-label border-2 border rounded shadow-sm flex-fill py-4 d-flex flex-column justify-content-center align-items-center" for="${fieldName}_nooit">
                <span style="font-size: 2rem;">🫢</span>
                <span class="mt-2 text-nowrap">Nooit</span>
            </label>

            <input type="radio" class="form-check-input visually-hidden" name="${fieldName}" id="${fieldName}_af_en_toe" value="1" autocomplete="off" required>
            <label class="form-check-label border-2 border rounded shadow-sm flex-fill py-4 d-flex flex-column justify-content-center align-items-center" for="${fieldName}_af_en_toe">
                <span style="font-size: 2rem;">🙂</span>
                <span class="mt-2 text-nowrap">Af en toe</span>
            </label>

            <input type="radio" class="form-check-input visually-hidden" name="${fieldName}" id="${fieldName}_vaak" value="2" autocomplete="off" required>
            <label class="form-check-label border-2 border rounded shadow-sm flex-fill py-4 d-flex flex-column justify-content-center align-items-center" for="${fieldName}_vaak">
                <span style="font-size: 2rem;">😃</span>
                <span class="mt-2 text-nowrap">Vaak</span>
            </label>
        </div>
    `;

    document.getElementById('custom-question-container').appendChild(questionField);

    customQuestionForm.value = '';
}

document.getElementById('addCustomQuestionBtn').addEventListener('click', addQuestion);

let customInputSelected = false;
customQuestionForm.addEventListener("focus", () => {
    customInputSelected = true;
    console.log("focus")
})
customQuestionForm.addEventListener("blur", () => {
    customInputSelected = false;
    console.log("blur")
})

addEventListener("keydown", (e) => {
    if (e.key === "Enter") {
        if (customInputSelected) {
            addQuestion();
            e.preventDefault();
        } else {
            if (form.reportValidity()) {
                form.submit();
            }
        }
    }
})
