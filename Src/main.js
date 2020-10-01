document.addEventListener("DOMContentLoaded", () => {
    // const sortFields = document.querySelectorAll('.sortField');
    //
    // sortFields && sortFields.forEach(sortField => {
    //     sortField.addEventListener('click', function () {
    //         const {sort} = this.dataset;
    //     });
    // });

    const todoItems = document.querySelectorAll('.todoItem');

    todoItems && todoItems.forEach(todoItem => {
        todoItem.addEventListener('click', function () {
            if (!this.getElementsByTagName('input')[0].checked)
                this.classList.remove('completed');
            else
                this.classList.add('completed');
        })
    });
});
