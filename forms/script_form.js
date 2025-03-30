document.addEventListener('DOMContentLoaded', () => {
    let catA = document.querySelector('.cat-a');
    let catB = document.querySelector('.cat-b');

    // Se não tiver nenhuma ou tiver ambas as classes, redireciona com mensagem de erro
    if ((catA && catB) || (!catA && !catB)) {
        window.location.href = "../form_router.php?error=missingCategory";
        return;
    }

    let minAge, maxAge;
    if (catA) {
        minAge = 10;
        maxAge = 12;
    } else if (catB) {
        minAge = 13;
        maxAge = 15;
    }

    const nameInputs = document.querySelectorAll('.athlete-name');
    const dateInputs = document.querySelectorAll('.athlete-date');
    const submitButton = document.querySelector('.submit-button');

    function getAge(birthDateString) {
        const [BirthYear] = birthDateString.split('-').map(Number);
        const currentYear = new Date().getFullYear();
        return currentYear - BirthYear;
    }

    function showError(inputEl, message) {
        const span = document.createElement('span');
        span.classList.add('text-danger', 'age-error');
        span.textContent = message;
        inputEl.insertAdjacentElement('afterend', span);
    }

    function checkValidation() {
        let valid = true;

        nameInputs.forEach((nameInput, i) => {
            const dateInput = dateInputs[i];
            // Remove mensagem de erro existente, se houver.
            const errorMsgEl = dateInput.nextElementSibling;
            if (errorMsgEl && errorMsgEl.classList.contains('age-error')) {
                errorMsgEl.remove();
            }

            if (nameInput.value.trim() !== '') {
                // Adiciona o atributo "required" se houver nome.
                dateInput.setAttribute('required', 'required');
                if (!dateInput.value) {
                    valid = false;
                    showError(dateInput, "Data de Nascimento é obrigatória.");
                } else {
                    const athleteAge = getAge(dateInput.value);
                    if (athleteAge < minAge || athleteAge > maxAge) {
                        valid = false;
                        showError(dateInput, "O atleta está fora da idade estipulada pela categoria.");
                    }
                }
            } else {
                // Remove o atributo "required" se o nome estiver vazio.
                dateInput.removeAttribute('required');
            }
        });

        submitButton.disabled = !valid;
    }

    nameInputs.forEach((el) => el.addEventListener('input', checkValidation));
    dateInputs.forEach((el) => el.addEventListener('change', checkValidation));
});