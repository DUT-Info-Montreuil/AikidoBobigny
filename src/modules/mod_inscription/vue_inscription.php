<?php
require_once "./vue_generique.php";
class VueInscription extends VueGenerique
{

	public function __construct()
	{
		parent::__construct();
	}

	public function form_inscription()
	{
		$token = uniqid(rand(), true);
		$_SESSION['token'] = $token;
		$_SESSION['token_time'] = time();
		echo '
		<div id="formulaire-inscription">
		<h1>Formulaire d\'adhésion</h1>
		<div id="multi-step-form-container">
			<ul class="form-stepper form-stepper-horizontal text-center mx-auto pl-0">

				<li class="form-stepper-active text-center form-stepper-list" step="1">
					<a class="mx-2">
						<span class="form-stepper-circle">
							<span>1</span>
						</span>
						<div class="label">Informations Personnelles</div>
					</a>
				</li>

				<li class="form-stepper-unfinished text-center form-stepper-list" step="2">
					<a class="mx-2">
						<span class="form-stepper-circle text-muted">
							<span>2</span>
						</span>
						<div class="label text-muted">Pieces Justificatives</div>
					</a>
				</li>

				<li class="form-stepper-unfinished text-center form-stepper-list" step="3">
					<a class="mx-2">
						<span class="form-stepper-circle text-muted">
							<span>3</span>
						</span>
						<div class="label text-muted">Finalisation de l\'adhésion</div>
					</a>
				</li>

				<li class="form-stepper-unfinished text-center form-stepper-list" step="4">
					<a class="mx-2">
						<span class="form-stepper-circle text-muted">
							<span>4</span>
						</span>
						<div class="label text-muted">Choix des identifiants</div>
					</a>
				</li>
			</ul>
			<ul id="formLegend">
				<li>: champ requis</li>
				<li>: champ invalide</li>
				<li>: champ valide</li>
			</ul>
			<form id="userAccountSetupForm" name="userAccountSetupForm" enctype="multipart/form-data" method="POST" action="modules/mod_inscription/modele_inscription.php">

				<section id="step-1" class="form-step">
					<h2 class="font-normal">Informations Personnelles</h2>
	
					<div class="mt-3">
						<div id="formInfosPerso">
							<div>
								<label class="input-label" class="input-label" for="saison">Saison *:</label>
								<input class="input-field" class="input-field" type="text" name="saison" value="" readonly />
							</div>
							<div>
								<label class="input-label" for="section">Section *:</label>
								<input class="input-field" type="text" name="section" value="A&iuml;kido" readonly />
							</div>
							<div>
								<label class="input-label">Adhérent*</label>
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
								<label class="input-label" for="nom">Nom de l\'adherent *:</label>
								<input class="input-field" type="text" name="nom" value="" required />
							</div>
							<div>
								<label class="input-label" for="prenom">Pr&eacute;nom *:</label>
								<input class="input-field" type="text" name="prenom" value="" required />
							</div>
							<div>
								<label class="input-label">Sexe*</label>
								<div class="input-radio">
									<input type="radio" name="sexe" class="sexe" value="m" id="m" checked/>
									<label class="input-label" for="m">M</label>
								</div>
								<div class="input-radio">
									<input type="radio" name="sexe" class="sexe" value="f" id="f" />
									<label class="input-label" for="f">F</label>
								</div>
							</div>
							<div>
								<label class="input-label" for="date_naissance">N&eacute;(e) le *:</label>
								<input class="input-field" type="date" name="date_naissance" value="" required />
							</div>
							<div>
								<label class="input-label" for="lieu_naissance">Lieu de naissance *:</label>
								<input class="input-field" type="text" name="lieu_naissance" value="" required />
							</div>
							<div>
								<label class="input-label" for="nationalite">Nationalit&eacute; *:</label>
								<input class="input-field" type="text" name="nationalite" value="" required />
							</div>
							<div>
								<label class="input-label" for="profession">Profession *:</label>
								<input class="input-field" type="text" name="profession" value="" required />
							</div>
							<div>
								<label class="input-label">Autres sections *:</label>
								<div class="input-radio">
									<input type="radio" name="si_autre_section" class="si_autre_section" value="oui" id="oui" />
									<label class="input-label" for="oui">Oui</label>
								</div>
								<div class="input-radio">
									<input type="radio" name="si_autre_section" class="si_autre_section" value="non" checked id="non" />
									<label class="input-label" for="non">Non</label>
								</div>
							</div>
							<div>
								<label class="input-label" for="autre_section">Si oui, laquelle :</label>
								<input class="input-field" type="text" name="autre_section" value="" id="autre_section"/>
							</div>
							<div>
								<label class="input-label" for="adresse">Adresse *:</label>
								<input class="input-field" type="text" name="adresse" value="" required />
							</div>
							<div>
								<label class="input-label" for="no_appt">Appt N&deg;</label>
								<input class="input-field" type="text" name="no_appt" value="" />
							</div>
							<div>
								<label class="input-label" for="code_postal">Code postal *:</label>
								<input class="input-field" type="text" name="code_postal" value="" required />
							</div>
							<div>
								<label class="input-label" for="ville">Ville *:</label>
								<input class="input-field" type="text" name="ville" value="" required />
							</div>
							<div>
								<label class="input-label" for="email">E-mail *:</label>
								<input class="input-field" type="email" name="email" value="" required />
							</div>
							<div>
								<label class="input-label" for="tel_dom">T&eacute;l. Domicile :</label>
								<input class="input-field" type="tel" name="tel_dom" value="" />
							</div>
							<div>
								<label class="input-label" for="tel_port">T&eacute;l. Port. *:</label>
								<input class="input-field" type="tel" name="tel_port" value="" required />
							</div>
							<div>
								<label class="input-label" for="tel_trav">T&eacute;l. Travail :</label>
								<input class="input-field" type="tel" name="tel_trav" value="" />
							</div>
							<div>
								<label class="input-label" for="num_secu">Num&eacute;ro de s&eacute;curit&eacute; sociale :</label>
								<input class="input-field" type="text" name="num_secu" value="" />
							</div>
							<div>
								<label class="input-label" for="allergies">Allergies &eacute;ventuelles :</label>
								<input class="input-field" type="text" name="allergies" value="" />
							</div>
							<div>
								<label class="input-label" for="contact_urgence">Personne &agrave; contacter en cas d\'urgence (Nom et tel) *:</label>
								<input class="input-field" type="text" name="contact_urgence" value="" required />
							</div>
						</div>
					</div>
					<div class="mt-3">
						<button class="button btn-navigate-form-step submit" type="button" step_number="2">Suivant<i class="fa-solid fa-arrow-right" style="float: right;"></i></button>
					</div>
				</section>

				<section id="step-2" class="form-step d-none">
					<h2 class="font-normal">Pieces Justificatives</h2>
	
					<div class="mt-3">
						<div id="depotFichiers">
							<div class="wrap">
								<h3>Pièce d\'identité :</h3>
								<div class="file">
									<div class="file__input" id="file__input">
										<input class="file__input--file" id="piece_identite" type="file" name="piece_identite" />
										<label class="file__input--label" for="piece_identite" data-text-btn="Upload">Add file:</label>
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
								<h3>Droit à l\'image :</h3>
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

				<section id="step-3" class="form-step d-none">
					<h2 class="font-normal">Finalisation de l\'adhésion</h2>
	
					<div class="mt-3">
						<div id="finInscription">
							<p class="autParent">Autorisation parentale :</p>
							<div class="autParent">
								<p>Je soussign&eacute;(e) </p>
								<input class="input-field" type="text" name="nom_resp_legal" placeholder="Nom du responsable légal*" />
								<select name="titre_resp_legal" id="titre_resp_legal">
									<option value="pere">P&egrave;re</option>
									<option value="mere">M&egrave;re</option>
									<option value="tuteur">Tuteur l&eacute;gal</option>
								</select>
								<p>, autorise :
								</p>
							</div>
							<ul class="autParent">
								<li>
									<div>
										<p>mon enfant à s’inscrire à la section Aikido de l’Athletic Club de Bobigny.</p>
										<div class="input-radio">
											<input type="radio" name="inscription" class="inscription" value="oui" id="inscription_oui" />
											<label class="input-label" for="inscription_oui">Oui</label>
										</div>
										<div class="input-radio">
											<input type="radio" name="inscription" class="inscription" value="non" checked id="inscription_non" />
											<label class="input-label" for="inscription_non">Non</label>
										</div>
									</div>
								</li>
								<li>
									<div>
										<p>Les dirigeants de la section à faire hospitaliser mon enfant en cas de besoin.</p>
										<div class="input-radio">
											<input type="radio" name="hospitalisation" class="hospitalisation" value="oui" id="hospitalisation_oui" />
											<label class="input-label" for="hospitalisation_oui">Oui</label>
										</div>
										<div class="input-radio">
											<input type="radio" name="hospitalisation" class="hospitalisation" value="non" checked id="hospitalisation_non" />
											<label class="input-label" for="hospitalisation_non">Non</label>
										</div>
									</div>
								</li>
								<li>
									<div>
										<p>Les dirigeants de la section à transporter mon enfant en voitures particulières.</p>
										<div class="input-radio">
											<input type="radio" name="transport" class="transport" value="oui" id="transport_oui" />
											<label class="input-label" for="transport_oui">Oui</label>
										</div>
										<div class="input-radio">
											<input type="radio" name="transport" class="transport" value="non" checked id="transport_non" />
											<label class="input-label" for="transport_non">Non</label>
										</div>
									</div>
								</li>
								<li>
									<div>
										<p>L’A.C.BOBIGNY à prendre et à utiliser les photos et vidéos de mon enfant pour une diffusion sur
											différents supports de communication.</p>
										<div class="input-radio">
											<input type="radio" name="photos" class="photos" value="oui" id="photos_oui" />
											<label class="input-label" for="photos_oui">Oui</label>
										</div>
										<div class="input-radio">
											<input type="radio" name="photos" class="photos" value="non" checked id="photos_non" />
											<label class="input-label" for="photos_non">Non</label>
										</div>
									</div>
								</li>
							</ul>
							<div class="toggle-pill-color">
								<p>J’ai bien pris connaissance des règles principales au règlement intérieur (voir <a href="fichiers/reglement.pdf" target="_blank">ici</a>).</p>
								<input type="checkbox" id="reglement_check" name="reglement_check">
								<label for="reglement_check"></label>
							</div>

							<div style="display: block;">
								<p>Fait &agrave; Bobigny le : ' . date("d/m/Y") . '</p>
							</div>
						</div>
					</div>
					<div class="mt-3">
						<button class="button btn-navigate-form-step submit" type="button" step_number="2"><i class="fa-solid fa-arrow-left" style="float: left;"></i>Precedent</button>
						<button class="button btn-navigate-form-step submit" type="button" step_number="4">Suivant<i class="fa-solid fa-arrow-right" style="float: right;"></i></button>
					</div>
				</section>
	
				 <section id="step-4" class="form-step d-none">
					<h2 class="font-normal">Choix des identifiants</h2>
	
					<div class="mt-3">
						<div id="choixIdentifiants">
							<div>
								<label class="input-label" for="identifiant">Choisissez un identifiant de connexion *:</label>
								<input class="input-field" type="text" name="identifiant" placeholder="Identifiant" required />
							</div>
							<div>
								<label class="input-label" for="mdp">Choisissez un mot de passe *:</label>
								<input class="input-field" type="password" name="mdp" placeholder="Mot de passe" required />
							</div>
							<div>
								<label class="input-label" for="mdp2">Confirmez le mot de passe *:</label>
								<input class="input-field" type="password" name="mdp2" placeholder="Mot de passe" required />
							</div>
						</div>
					</div>
					<input type="hidden" name="token" id="token" value="' . $token . '" />
					<div class="mt-3">
						<button class="button btn-navigate-form-step submit" type="button" step_number="3"><i class="fa-solid fa-arrow-left" style="float: left;"></i>Precedent</button>
						<button class="button submit-btn submit" type="submit">Envoyer<i class="fa-solid fa-paper-plane" style="float: right;"></i></button>
					</div>
				</section>
			</form>
		</div>
	</div>
		';
	}
}
?>