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

$(document).ready(function () {
	$("#autre_section").attr("readonly", true);
	$(".si_autre_section").change(function () {
		if ($(this).val() == "oui") {
			$("#autre_section").attr("readonly", false);
		} else {
			$("#autre_section").attr("readonly", true);
		}
	});
});

$(document).ready(function () {
	$('.file__input--file').on('change', function (event) {
		var file = event.target.files[0];
		var id = $(this).attr('id');
		$label = $('label[for="' + id + '"]');
		$label.text(file.name);
	});
});

$(document).ready(function () {
	$('input[name="date_naissance"]').on('change', function (event) {
		var dob = event.target.value;
		var age = calculateAge(dob);
		if (age < 18) {
			$('.autParent').show();
			$('.autParent input[name="nom_resp_legal"]').attr('required', true);
		} else if (age >= 18) {
			$('.autParent').hide();
			$('.autParent input[name="nom_resp_legal"]').attr('required', false);
		}
	});
});

function calculateAge(birthday) {
	var today = new Date();
	var birthDate = new Date(birthday);
	var age = today.getFullYear() - birthDate.getFullYear();
	var m = today.getMonth() - birthDate.getMonth();
	if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
		age--;
	}
	return age;
}

jQuery.validator.addMethod("validDate", function (value, element) {
	var date = new Date(value);
	var today = new Date();
	return this.optional(element) || date < today;
}, "Veuillez entrer une date valide."
);

jQuery.validator.addMethod("validPostalCode", function (value, element) {
	return this.optional(element) || value.match(/^[0-9]{5}$/);
}, "Entrez un code postal valide."
);

jQuery.validator.addMethod("validEmail", function (value, element) {
	return this.optional(element) || value.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/);
}, "Entrez une adresse email valide."
);

jQuery.validator.addMethod("validPhone", function (value, element) {
	return this.optional(element) || value.match(/^0[0-9]{9}$/) || value.match(/^\+33[0-9]{9}$/);
}, "Entrez un numéro de téléphone valide."
);

jQuery.validator.addMethod("rulesCheck", function (value, element) {
	console.log(value);
	return this.optional(element) || value == "on";
}, "Vous devez accepter le reglement."
);

jQuery.validator.addMethod("validMdp", function (value, element) {
	return this.optional(element) || value.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/);
}, "Le mot de passe doit contenir au moins 8 caractères dont une majuscule, une minuscule et un chiffre."
);

$("form#userAccountSetupForm").validate({
	rules: {
		date_naissance: {
			date: true,
			validDate: true
		},
		email: {
			email: true,
			validEmail: true
		},
		code_postal: {
			validPostalCode: true,
			minlength: 5,
			maxlength: 5
		},
		tel_dom: {
			validPhone: true
		},
		tel_port: {
			validPhone: true
		},
		tel_trav: {
			validPhone: true
		},
		reglement_check: {
			rulesCheck: true
		},
		mdp: {
			validMdp: true,
			minlength: 8
		},
		mdp2: {
			validMdp: true,
			minlength: 8,
			equalTo: "input[name='mdp']"
		}
	},
});

$("form#userAccountSetupForm").submit(function (e) {
	e.preventDefault();
	var form = $(this);
	var url = form.attr('action');
	$.ajax({
		type: "POST",
		url: url,
		data: form.serialize(),
		success: function (data) {
			console.log(data);
			if (data == "ok") {
				Swal.fire({
					title: 'Adhésion réussie !',
					text: "Vous allez être redirigé vers la page d'accueil.",
					icon: 'success',
					confirmButtonText: 'Ok'
				}).then((result) => {
					if (result.isConfirmed) {
						window.location.href = "index.php";
					}
				});
			} else {
				if (data == "loginUsed") {
					Swal.fire({
						title: 'Erreur !',
						text: "Ce login est déjà utilisé.",
						icon: 'error',
						confirmButtonText: 'Ok'
					});
				} else if (data == "alreadyRegistered") {
					Swal.fire({
						title: 'Erreur !',
						text: "Vous êtes déjà inscrit à l'association.",
						icon: 'error',
						confirmButtonText: 'Ok'
					});
				}else if(data == "mailerror") {
					Swal.fire({
						title: 'Erreur !',
						text: "Nous n'avons pas réussi a vous envoyer un mail de vérification",
						icon: 'error',
						confirmButtonText: 'Ok'
					});	
				} else {
					Swal.fire({
						title: 'Erreur !',
						text: "Une erreur est survenue lors de l'inscription.",
						icon: 'error',
						confirmButtonText: 'Ok'
					});
				}
			}
		}
	});
});

