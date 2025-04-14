const customQuestionForm = document.getElementById('custom_input');

function addQuestion() {
    var customQuestion = customQuestionForm.value.trim();

    if (customQuestion === '') {
        alert('Vul een vraag in!');
        return;
    }

    var questionField = document.createElement('div');
    questionField.classList.add('mb-3');

    var fieldName = "custom_question_" + customQuestion.toLowerCase().replace(/[^a-z0-9]+/g, '_');

    questionField.innerHTML = `
        <label class="form-label fw-bold">${customQuestion}</label>
        <div class="btn-group w-100" role="group">
            <input type="radio" class="btn-check" name="${fieldName}" id="${fieldName}_nooit" value="0" autocomplete="off" required>
            <label class="btn btn-outline-secondary d-flex flex-column align-items-center justify-content-center p-3" for="${fieldName}_nooit">
                <div style="font-size: 2rem;">😞</div>
                <div class="mt-2 text-nowrap">Nooit</div>
            </label>

            <input type="radio" class="btn-check" name="${fieldName}" id="${fieldName}_af_en_toe" value="1" autocomplete="off" required>
            <label class="btn btn-outline-secondary d-flex flex-column align-items-center justify-content-center p-3" for="${fieldName}_af_en_toe">
                <div style="font-size: 2rem;">😐</div>
                <div class="mt-2 text-nowrap">Af en toe</div>
            </label>

            <input type="radio" class="btn-check" name="${fieldName}" id="${fieldName}_vaak" value="2" autocomplete="off" required>
            <label class="btn btn-outline-secondary d-flex flex-column align-items-center justify-content-center p-3" for="${fieldName}_vaak">
                <div style="font-size: 2rem;">😊</div>
                <div class="mt-2 text-nowrap">Vaak</div>
            </label>
        </div>
    `;

    document.getElementById('custom-question-container').appendChild(questionField);

    customQuestionForm.value = '';
}

document.getElementById('addCustomQuestionBtn').addEventListener('click', addQuestion);

let customInputSelected = false;
customQuestionForm.addEventListener("focus", () => { customInputSelected = true; console.log("focus") })
customQuestionForm.addEventListener("blur", () => { customInputSelected = false; console.log("blur") })

addEventListener("keydown", (e) => {
    if (e.key === "Enter") {
        if (customInputSelected) {
            addQuestion();
            e.preventDefault();
        } else {
            document.querySelector('form').submit();
        }
    }
})
