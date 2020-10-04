document.addEventListener("DOMContentLoaded", () => {
    const editBtns = document.querySelectorAll('.editBtn');
    const cancelBtns = document.querySelectorAll('.cancelBtn');
    const saveBtns = document.querySelectorAll('.saveBtn');

    editBtns && editBtns.forEach(editBtn => {
        editBtn.addEventListener('click', function (e) {
            const parent = this.closest('tr');

            const textField = parent.querySelector('.textField');

            textField.innerHTML = renderInput(textField.textContent);

            this.setAttribute('hidden', 'hidden');
            parent.querySelector('.saveCancelBlock').removeAttribute('hidden');
        });
    });

    cancelBtns && cancelBtns.forEach(cancelBtn => {
        cancelBtn.addEventListener('click', function (e) {
            const parent = this.closest('tr');

            const textField = parent.querySelector('.textField');

            textField.innerHTML = textField.dataset.val;

            parent.querySelector('.saveCancelBlock').setAttribute('hidden', 'hidden');
            parent.querySelector('.editBtn').removeAttribute('hidden');
        });
    });

    saveBtns && saveBtns.forEach(saveBtn => {
        saveBtn.addEventListener('click', function (e) {
            const parent = this.closest('tr');

            const text = parent.querySelector('.newText').value;
            const id = parent.dataset.id;
            const status = parent.querySelector('.statusField').checked ? 'closed' : 'open';

            if (id && text) {
                const idInput = document.querySelector('.idInput');
                const textInput = document.querySelector('.textInput');
                const statusInput = document.querySelector('.statusInput');

                idInput.value = id;
                textInput.value = text;
                statusInput.value = status;

                document.querySelector('.editForm').submit();
            }


        });
    });

});

function renderInput(value) {
    return `<input type="text" name="text" class="newText" value="${value}"/>`;
}