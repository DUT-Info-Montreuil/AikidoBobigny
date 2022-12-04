const navigateToFormStep = (stepNumber) => {

    document.querySelectorAll(".form-step").forEach((formStepElement) => {
        formStepElement.classList.add("d-none");
    });

    document.querySelectorAll(".form-stepper-list").forEach((formStepHeader) => {
        formStepHeader.classList.add("form-stepper-unfinished");
        formStepHeader.classList.remove("form-stepper-active", "form-stepper-completed");
    });

    document.querySelector("#step-" + stepNumber).classList.remove("d-none");

    const formStepCircle = document.querySelector('li[step="' + stepNumber + '"]');

    formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-completed");
    formStepCircle.classList.add("form-stepper-active");

    for (let index = 0; index < stepNumber; index++) {
        const formStepCircle = document.querySelector('li[step="' + index + '"]');
        if (formStepCircle) {
            formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-active");
            formStepCircle.classList.add("form-stepper-completed");
        }
    }
};

document.querySelectorAll(".btn-navigate-form-step").forEach((formNavigationBtn) => {

    formNavigationBtn.addEventListener("click", () => {
        const stepNumber = parseInt(formNavigationBtn.getAttribute("step_number"));
        navigateToFormStep(stepNumber);
    });
});

inputSaison = document.getElementsByName("saison")[0];
month = new Date().getMonth();
if (month >= 9) {
    inputSaison.value = new Date().getFullYear() + "-" + (new Date().getFullYear() + 1);
} else {
    inputSaison.value = (new Date().getFullYear() - 1) + "-" + new Date().getFullYear();
}

function hasOtherSection() {
    document.getElementById('autre_section').readonly = false;
    document.getElementById('autre_section').required = true;
}

function hasNoOtherSection() {
    document.getElementById('autre_section').readonly = true;
    document.getElementById('autre_section').required = false;
}
$(document).ready(function () {
    $('.file__input--file').on('change', function (event) {
        var file = event.target.files[0];
        var id = $(this).attr('id');
        $label = $('label[for="' + id + '"]');
        $label.text(file.name);
    });
});