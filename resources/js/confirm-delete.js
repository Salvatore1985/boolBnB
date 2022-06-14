const deleteForms = document.querySelectorAll('.apartment-destroyer');
    console.log(deleteForms);
    deleteForms.forEach(singleForm => {
        singleForm.addEventListener('submit', function (event) {
            event.preventDefault();
            userConfirmation = window.confirm(`Are you sure you want to delete ${this.getAttribute('apartment-name')}?` );
            if (userConfirmation) {
                this.submit();
            }
    })
});
