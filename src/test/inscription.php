<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inscription.css">
    <script src="https://kit.fontawesome.com/49a257572d.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div id="formulaire-inscription">
        <h1>Formulaire d'adhésion</h1>
        <div id="multi-step-form-container">
            <!-- Form Steps / Progress Bar -->
            <ul class="form-stepper form-stepper-horizontal text-center mx-auto pl-0">
                <!-- Step 1 -->
                <li class="form-stepper-active text-center form-stepper-list" step="1">
                    <a class="mx-2">
                        <span class="form-stepper-circle">
                            <span>1</span>
                        </span>
                        <div class="label">Informations Personnelles</div>
                    </a>
                </li>
                <!-- Step 2 -->
                <li class="form-stepper-unfinished text-center form-stepper-list" step="2">
                    <a class="mx-2">
                        <span class="form-stepper-circle text-muted">
                            <span>2</span>
                        </span>
                        <div class="label text-muted">Pieces Justificatives</div>
                    </a>
                </li>
                <!-- Step 3 -->
                <li class="form-stepper-unfinished text-center form-stepper-list" step="3">
                    <a class="mx-2">
                        <span class="form-stepper-circle text-muted">
                            <span>3</span>
                        </span>
                        <div class="label text-muted">Finalisation de l'adhésion</div>
                    </a>
                </li>
            </ul>
            <ul id="formLegend">
                <li>: champ requis</li>
                <li>: champ invalide</li>
                <li>: champ valide</li>
            </ul>
            <!-- Step Wise Form Content -->
            <form id="userAccountSetupForm" name="userAccountSetupForm" enctype="multipart/form-data" method="POST" action="index.php?module=mod_inscription&action=ajout">
                <!-- Step 1 Content -->
                <section id="step-1" class="form-step">
                    <h2 class="font-normal">Informations Personnelles</h2>
                    <!-- Step 1 input fields -->
                    <div class="mt-3">
                        <div id="formInfosPerso">
                            <div>
                                <label class="input-label" class="input-label" for="saison">Saison :</label>
                                <input class="input-field" class="input-field" type="text" name="saison" value="" disabled />
                            </div>
                            <div>
                                <label class="input-label" for="section">Section :</label>
                                <input class="input-field" type="text" name="section" value="A&iuml;kido" disabled />
                            </div>
                            <div>
                                <label class="input-label">Adhérent</label>
                                <div class="input-radio">
                                    <input type="radio" name="typeAdherent" class="typeAdherent" value="ancien" id="ancien" />
                                    <label class="input-label" for="ancien">Ancien</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="typeAdherent" class="typeAdherent" value="nouveau" id="nouveau" checked />
                                    <label class="input-label" for="nouveau">Nouveau</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="typeAdherent" class="typeAdherent" value="membre" id="membre" />
                                    <label class="input-label" for="membre">Membre</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="typeAdherent" class="typeAdherent" value="dirigeant" id="dirigeant" />
                                    <label class="input-label" for="dirigeant">Dirigeant</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="typeAdherent" class="typeAdherent" value="encadrant" id="encadrant" />
                                    <label class="input-label" for="encadrant">Encadrant</label>
                                </div>
                            </div>
                            <div>
                                <label class="input-label" for="nom">Nom de l'adherent :</label>
                                <input class="input-field" type="text" name="nom" value="" required />
                            </div>
                            <div>
                                <label class="input-label" for="prenom">Pr&eacute;nom :</label>
                                <input class="input-field" type="text" name="prenom" value="" required />
                            </div>
                            <div>
                                <label class="input-label">Sexe</label>
                                <div class="input-radio">
                                    <input type="radio" name="sexe" class="sexe" value="m" id="m" />
                                    <label class="input-label" for="m">M</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="sexe" class="sexe" value="f" id="f" />
                                    <label class="input-label" for="f">F</label>
                                </div>
                            </div>
                            <div>
                                <label class="input-label" for="date_naissance">N&eacute;(e) le :</label>
                                <input class="input-field" type="date" name="date_naissance" value="" required />
                            </div>
                            <div>
                                <label class="input-label" for="lieu_naissance">Lieu de naissance :</label>
                                <input class="input-field" type="text" name="lieu_naissance" value="" required />
                            </div>
                            <div>
                                <label class="input-label" for="nationalite">Nationalit&eacute; :</label>
                                <input class="input-field" type="text" name="nationalite" value="" required />
                            </div>
                            <div>
                                <label class="input-label" for="profession">Profession :</label>
                                <input class="input-field" type="text" name="profession" value="" required />
                            </div>
                            <div>
                                <label class="input-label">Autres sections :</label>
                                <div class="input-radio">
                                    <input type="radio" name="si_autre_section" class="si_autre_section" value="oui" onclick="hasOtherSection();" id="oui" />
                                    <label class="input-label" for="oui">Oui</label>
                                </div>
                                <div class="input-radio">
                                    <input type="radio" name="si_autre_section" class="si_autre_section" value="non" onclick="hasNoOtherSection();" checked id="non" />
                                    <label class="input-label" for="non">Non</label>
                                </div>
                            </div>
                            <div>
                                <label class="input-label" for="autre_section">Si oui, laquelle :</label>
                                <input class="input-field" type="text" name="autre_section" value="" id="autre_section" disabled />
                            </div>
                            <div>
                                <label class="input-label" for="adresse">Adresse :</label>
                                <input class="input-field" type="text" name="adresse" value="" required />
                            </div>
                            <div>
                                <label class="input-label" for="no_appt">Appt N&deg;</label>
                                <input class="input-field" type="text" name="no_appt" value="" />
                            </div>
                            <div>
                                <label class="input-label" for="code_postal">Code postal :</label>
                                <input class="input-field" type="text" name="code_postal" value="" required />
                            </div>
                            <div>
                                <label class="input-label" for="ville">Ville :</label>
                                <input class="input-field" type="text" name="ville" value="" required />
                            </div>
                            <div>
                                <label class="input-label" for="email">E-mail :</label>
                                <input class="input-field" type="email" name="email" value="" required />
                            </div>
                            <div>
                                <label class="input-label" for="tel_dom">T&eacute;l. Domicile :</label>
                                <input class="input-field" type="tel" name="tel_dom" value="" />
                            </div>
                            <div>
                                <label class="input-label" for="tel_port">T&eacute;l. Port. :</label>
                                <input class="input-field" type="tel" name="tel_port" value="" required />
                            </div>
                            <div>
                                <label class="input-label" for="tel_trav">T&eacute;l. Travail :</label>
                                <input class="input-field" type="tel" name="tel_trav" value="" />
                            </div>
                            <div>
                                <label class="input-label" for="num_secu">Num&eacute;ro de s&eacute;curit&eacute; sociale :</label>
                                <input class="input-field" type="text" name="num_secu" value="" required />
                            </div>
                            <div>
                                <label class="input-label" for="allergies">Allergies &eacute;ventuelles :</label>
                                <input class="input-field" type="text" name="allergies" value="" />
                            </div>
                            <div>
                                <label class="input-label" for="contact_urgence">Personne &agrave; contacter en cas d\'urgence (Nom et tel):</label>
                                <input class="input-field" type="text" name="contact_urgence" value="" required />
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="button btn-navigate-form-step submit" type="button" step_number="2">Suivant<i class="fa-solid fa-arrow-right" style="float: right;"></i></button>
                    </div>
                </section>
                <!-- Step 2 Content, default hidden on page load. -->
                <section id="step-2" class="form-step d-none">
                    <h2 class="font-normal">Pieces Justificatives</h2>
                    <!-- Step 2 input fields -->
                    <div class="mt-3">
                        <div id="depotFichiers">
                            <div class="wrap">
                                <h3>Pièce d'identité :</h3>
                                <div class="file">
                                    <div class="file__input" id="file__input">
                                        <input class="file__input--file" id="piece_identite" type="file" name="piece_identite" />
                                        <label class="file__input--label" for="piece_identite" data-text-btn="Upload"> file:</label>
                                    </div>
                                </div>
                            </div>
                            <div class="wrap">
                                <h3>Attestation de santé :</h3>
                                <div class="file">
                                    <div class="file__input" id="file__input">
                                        <input class="file__input--file" id="attestation_sante" type="file" name="attestation_sante" />
                                        <label class="file__input--label" for="attestation_sante" data-text-btn="Upload">Add file:</label>
                                    </div>
                                </div>
                            </div>
                            <div class="wrap">
                                <h3>Droit à l'image :</h3>
                                <div class="file">
                                    <div class="file__input" id="file__input">
                                        <input class="file__input--file" id="droit_image" type="file" name="droit_image" />
                                        <label class="file__input--label" for="droit_image" data-text-btn="Upload">Add file:</label>
                                    </div>
                                </div>
                            </div>
                            <div class="wrap">
                                <h3>Certificat médical :</h3>
                                <div class="file">
                                    <div class="file__input" id="file__input">
                                        <input class="file__input--file" id="certificat_medical" type="file" name="certificat_medical" />
                                        <label class="file__input--label" for="certificat_medical" data-text-btn="Upload">Add file:</label>
                                    </div>
                                </div>
                            </div>
                            <div class="wrap">
                                <h3>Autorisation parentale :</h3>
                                <div class="file">
                                    <div class="file__input" id="file__input">
                                        <input class="file__input--file" id="autorisation_parentale" type="file" name="autorisation_parentale" />
                                        <label class="file__input--label" for="autorisation_parentale" data-text-btn="Upload">Add file:</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="button btn-navigate-form-step submit" type="button" step_number="1"><i class="fa-solid fa-arrow-left" style="float: left;"></i>Precedent</button>
                        <button class="button btn-navigate-form-step submit" type="button" step_number="3">Suivant<i class="fa-solid fa-arrow-right" style="float: right;"></i></button>
                    </div>
                </section>
                <!-- Step 3 Content, default hidden on page load. -->
                <section id="step-3" class="form-step d-none">
                    <h2 class="font-normal">Finalisation de l'adhésion</h2>
                    <!-- Step 3 input fields -->
                    <div class="mt-3">
                        <div>
                            <p>Autorisation parentale :</p>
                            <p>Je soussign&eacute;(e)</p>
                            <input class="input-field" type="text" name="nom_resp_legal" placeholder="Nom du responsable légal" />
                            <select name="titre_resp_legal" id="titre_resp_legal">
                                <option value="pere">P&egrave;re</option>
                                <option value="mere">M&egrave;re</option>
                                <option value="tuteur">Tuteur l&eacute;gal</option>
                            </select>
                            <p>,autorise :</p>
                            <ul>
                                <li>
                                    <p>mon enfant à s’inscrire à la section</p>
                                    <input class="input-field" type="text" name="section" value="A&iuml;kido" readonly />
                                    <p>de l’Athletic Club de Bobigny.</p>
                                </li>
                                <li>
                                    <p>Les dirigeants de la section à faire hospitaliser mon enfant en cas de besoin.</p>
                                    <input class="input-field" type="radio" name="hospitalisation" id="hospitalisation_oui" value="oui" />
                                    <label class="input-label" for="oui">Oui</label>
                                    <input class="input-field" type="radio" name="hospitalisation" id="hospitalisation_non" value="non" checked />
                                    <label class="input-label" for="non">Non</label>
                                </li>
                                <li>
                                    <p>Les dirigeants de la section à transporter mon enfant en voitures particulières.</p>
                                    <input class="input-field" type="radio" name="transport" id="transport_oui" value="oui" />
                                    <label class="input-label" for="oui">Oui</label>
                                    <input class="input-field" type="radio" name="transport" id="transport_non" value="non" checked />
                                    <label class="input-label" for="non">Non</label>
                                </li>
                                <li>
                                    <p>L’A.C.BOBIGNY à prendre et à utiliser les photos et vidéos de mon enfant pour une diffusion sur
                                        différents supports de communication, site internet du club...</p>
                                    <input class="input-field" type="radio" name="photos" id="photos_oui" value="oui" />
                                    <label class="input-label" for="oui">Oui</label>
                                    <input class="input-field" type="radio" name="photos" id="photos_non" value="non" checked />
                                    <label class="input-label" for="non">Non</label>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <input class="input-field" type="checkbox" name="reglement" id="reglement_check">
                            <label class="input-label" for="reglement_check">J’ai bien pris connaissance des règles principales au règlement intérieur (voir <a href="">ici</a>).</label>
                        </div>
                        <div>
                            <p>Fait &agrave; Bobigny le :</p>
                            <input class="input-field" type="date" name="date_signature" value="" readonly />
                            <p>Signature (pr&eacute;c&eacute;d&eacute;e de la mention "lu et approuv&eacute;"</p>
                            <table>
                                <tr>
                                    <td>l\'adh&eacute;rent</td>
                                    <td>le responsable l&eacute;gal</td>
                                </tr>
                                <tr>
                                    <td><input class="input-field" type="file" name="signature_adherent" value="" /></td>
                                    <td><input class="input-field" type="file" name="signature_resp_legal" value="" /></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="button btn-navigate-form-step" type="button" step_number="2">Prev</button>
                        <button class="button submit-btn" type="submit">Save</button>
                    </div>
                </section>
            </form>
        </div>
    </div>
    <script>
        /**
         * Define a function to navigate betweens form steps.
         * It accepts one parameter. That is - step number.
         */
        const navigateToFormStep = (stepNumber) => {
            /**
             * Hide all form steps.
             */
            document.querySelectorAll(".form-step").forEach((formStepElement) => {
                formStepElement.classList.add("d-none");
            });
            /**
             * Mark all form steps as unfinished.
             */
            document.querySelectorAll(".form-stepper-list").forEach((formStepHeader) => {
                formStepHeader.classList.add("form-stepper-unfinished");
                formStepHeader.classList.remove("form-stepper-active", "form-stepper-completed");
            });
            /**
             * Show the current form step (as passed to the function).
             */
            document.querySelector("#step-" + stepNumber).classList.remove("d-none");
            /**
             * Select the form step circle (progress bar).
             */
            const formStepCircle = document.querySelector('li[step="' + stepNumber + '"]');
            /**
             * Mark the current form step as active.
             */
            formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-completed");
            formStepCircle.classList.add("form-stepper-active");
            /**
             * Loop through each form step circles.
             * This loop will continue up to the current step number.
             * Example: If the current step is 3,
             * then the loop will perform operations for step 1 and 2.
             */
            for (let index = 0; index < stepNumber; index++) {
                /**
                 * Select the form step circle (progress bar).
                 */
                const formStepCircle = document.querySelector('li[step="' + index + '"]');
                /**
                 * Check if the element exist. If yes, then proceed.
                 */
                if (formStepCircle) {
                    /**
                     * Mark the form step as completed.
                     */
                    formStepCircle.classList.remove("form-stepper-unfinished", "form-stepper-active");
                    formStepCircle.classList.add("form-stepper-completed");
                }
            }
        };
        /**
         * Select all form navigation buttons, and loop through them.
         */
        document.querySelectorAll(".btn-navigate-form-step").forEach((formNavigationBtn) => {
            /**
             * Add a click event listener to the button.
             */
            formNavigationBtn.addEventListener("click", () => {
                /**
                 * Get the value of the step.
                 */
                const stepNumber = parseInt(formNavigationBtn.getAttribute("step_number"));
                /**
                 * Call the function to navigate to the target form step.
                 */
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

        inputDateSignature = document.getElementsByName("date_signature")[0];
        inputDateSignature.value = new Date().toISOString().slice(0, 10);

        function hasOtherSection() {
            document.getElementById('autre_section').disabled = false;
            document.getElementById('autre_section').required = true;
        }

        function hasNoOtherSection() {
            document.getElementById('autre_section').disabled = true;
            document.getElementById('autre_section').required = false;
        }
        $(document).ready(function() {
            $('.file__input--file').on('change', function(event) {
                var file = event.target.files[0];
                var id = $(this).attr('id');
                $label = $('label[for="' + id + '"]');
                $label.text(file.name);
            });
        });
    </script>
</body>

</html>