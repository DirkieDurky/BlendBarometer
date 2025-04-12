document.getElementById('addCustomQuestionBtn').addEventListener('click', function() {
    var customQuestion = document.getElementById('custom_collab').value.trim();
    
    if (customQuestion === '') {
        alert('Vul een vraag in!');
        return;
    }

    var questionField = document.createElement('div');
    questionField.classList.add('mb-3');
    
    var fieldName = "question_custom_" + Date.now();
    
    questionField.innerHTML = `
        <label class="form-label fw-bold">${customQuestion}</label>
        <div class="btn-group w-100" role="group">
            <input type="radio" class="btn-check" name="${fieldName}" id="${fieldName}_nooit" value="Nooit" autocomplete="off" required>    
            <label class="btn btn-outline-secondary d-flex flex-column align-items-center justify-content-center p-3" for="${fieldName}_nooit">
                <div style="font-size: 2rem;">😞</div>
                <div class="mt-2 text-nowrap">Nooit</div>
            </label>
            
            <input type="radio" class="btn-check" name="${fieldName}" id="${fieldName}_af_en_toe" value="Af en toe" autocomplete="off" required>
            <label class="btn btn-outline-secondary d-flex flex-column align-items-center justify-content-center p-3" for="${fieldName}_af_en_toe">
                <div style="font-size: 2rem;">😐</div>
                <div class="mt-2 text-nowrap">Af en toe</div>
            </label>

            <input type="radio" class="btn-check" name="${fieldName}" id="${fieldName}_vaak" value="Vaak" autocomplete="off" required>
            <label class="btn btn-outline-secondary d-flex flex-column align-items-center justify-content-center p-3" for="${fieldName}_vaak">
                <div style="font-size: 2rem;">😊</div>
                <div class="mt-2 text-nowrap">Vaak</div>
            </label>
        </div>
    `;

    document.querySelector('form').insertBefore(questionField, document.querySelector('form').lastElementChild);
    
    document.getElementById('custom_collab').value = '';
});
