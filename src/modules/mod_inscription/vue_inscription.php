<?php
require_once "./vue_generique.php";
class VueInscription extends VueGenerique
{

	public function __construct() {
		parent::__construct();
	}

	public function form_inscription() {
		$token = uniqid(rand(), true);
		$_SESSION['token'] = $token;
		$_SESSION['token_time'] = time();
		
		echo '
		<form action="index.php?module=mod_inscription&action=ajout" method="post" enctype="multipart/form-data">
		<div>
			<label for="saison">Saison :</label>
			<input type="text" name="saison" value="" readonly />
	
			<label for="section">Section :</label>
			<input type="text" name="section" value="A&iuml;kido" readonly />
	
			<label for="adherent">Adherent :</label>
			<select name="adherent" id="adherent">
				<option value="ancien">Ancien</option>
				<option value="nouveau">Nouveau</option>
				<option value="membre">Membre</option>
				<option value="dirigeant">Dirigeant</option>
				<option value="encadrant">Encadrant</option>
			</select>
	
			<label for="nom">Nom de l\'adherent :</label>
			<input type="text" name="nom" value="" required />
	
			<label for="prenom">Pr&eacute;nom :</label>
			<input type="text" name="prenom" value="" required />
	
			<label for="sexe">Sexe</label>
			<select name="sexe" id="sexe">
				<option value="M">M</option>
				<option value="F">F</option>
			</select>
	
			<label for="date_naissance">N&eacute;(e) le :</label>
			<input type="date" name="date_naissance" value="" required />
	
			<label for="lieu_naissance">Lieu de naissance :</label>
			<input type="text" name="lieu_naissance" value="" required />
	
			<label for="nationalite">Nationalit&eacute; :</label>
			<input type="text" name="nationalite" value="" required />
	
			<label for="profession">Profession :</label>
			<input type="text" name="profession" value="" required />
	
			<div>
				<p>Autres sections :</p>
				<input type="radio" name="si_autre_section" id="si_autre_section_oui" value="oui" />
				<label for="oui">Oui</label>
				<input type="radio" name="si_autre_section" id="si_autre_section_non" value="non" checked />
				<label for="non">Non</label>
			</div>
	
			<label for="autre_section">Si oui, laquelle :</label>
			<input type="text" name="autre_section" value="" />
	
			<label for="adresse">Adresse :</label>
			<input type="text" name="adresse" value="" required />
	
			<label for="no_appt">Appt N&deg;</label>
			<input type="text" name="no_appt" value="" />
	
			<label for="code_postal">Code postal :</label>
			<input type="text" name="code_postal" value="" required />
	
			<label for="ville">Ville :</label>
			<input type="text" name="ville" value="" required />
	
			<label for="email">E-mail :</label>
			<input type="email" name="email" value="" required />
	
			<label for="tel_dom">T&eacute;l. Domicile :</label>
			<input type="tel" name="tel_dom" value="" />
	
			<label for="tel_port">T&eacute;l. Port. :</label>
			<input type="tel" name="tel_port" value="" required />
	
			<label for="tel_trav">T&eacute;l. Travail :</label>
			<input type="tel" name="tel_trav" value="" />
	
			<label for="num_secu">Num&eacute;ro de s&eacute;curit&eacute; sociale :</label>
			<input type="text" name="num_secu" value="" required />
	
			<label for="allergies">Allergies &eacute;ventuelles :</label>
			<input type="text" name="allergies" value="" />
	
			<label for="contact_urgence">Personne &agrave; contacter en cas d\'urgence (Nom et tel):</label>
			<input type="text" name="contact_urgence" value="" required />
		</div>
		<div>
			<p>Autorisation parentale :</p>
			<p>Je soussign&eacute;(e)</p>
			<input type="text" name="nom_resp_legal" placeholder="Nom du responsable légal" />
			<select name="titre_resp_legal" id="titre_resp_legal">
				<option value="pere">P&egrave;re</option>
				<option value="mere">M&egrave;re</option>
				<option value="tuteur">Tuteur l&eacute;gal</option>
			</select>
			<p>,autorise :</p>
			<ul>
				<li>
					<p>mon enfant à s’inscrire à la section</p>
					<input type="text" name="section" value="A&iuml;kido" readonly />
					<p>de l’Athétic Club de Bobigny.</p>
				</li>
				<li>
					<p>Les dirigeants de la section à faire hospitaliser mon enfant en cas de besoin.</p>
					<input type="radio" name="hospitalisation" id="hospitalisation_oui" value="oui" />
					<label for="oui">Oui</label>
					<input type="radio" name="hospitalisation" id="hospitalisation_non" value="non" checked />
					<label for="non">Non</label>
				</li>
				<li>
					<p>Les dirigeants de la section à transporter mon enfant en voitures particulières.</p>
					<input type="radio" name="transport" id="transport_oui" value="oui" />
					<label for="oui">Oui</label>
					<input type="radio" name="transport" id="transport_non" value="non" checked />
					<label for="non">Non</label>
				</li>
				<li>
					<p>L’A.C.BOBIGNY à prendre et à utiliser les photos et vidéos de mon enfant pour une diffusion sur
						différents supports de communication, site internet du club...</p>
					<input type="radio" name="photos" id="photos_oui" value="oui" />
					<label for="oui">Oui</label>
					<input type="radio" name="photos" id="photos_non" value="non" checked />
					<label for="non">Non</label>
				</li>
			</ul>
		</div>
		<div>
			<input type="checkbox" name="reglement" id="reglement_check">
			<label for="reglement_check">J’ai bien pris connaissance des règles principales au règlement intérieur (voir <a href="">ici</a>).</label>
		</div>
		<div>
			<p>Fait &agrave; Bobigny le :</p>
			<input type="date" name="date_signature" value="" readonly />
			<p>Signature (pr&eacute;c&eacute;d&eacute;e de la mention "lu et approuv&eacute;"</p>
			<table>
				<tr>
					<td>l\'adh&eacute;rent</td>
					<td>le responsable l&eacute;gal</td>
				</tr>
				<tr>
					<td><input type="file" name="signature_adherent" value="" /></td>
					<td><input type="file" name="signature_resp_legal" value="" /></td>
				</tr>
			</table>
		</div>
		<div>
			a faire : partie Cadre réservé au bureau de section
		</div>
		<input type="submit" name="submit" value="Envoyer" />
		<input type="hidden" name="token" id="token" value="'.$token.'"/>
	</form>
	<script>
		inputSaison = document.getElementsByName("saison")[0];
		month = new Date().getMonth();
		if (month >= 9) {
			inputSaison.value = new Date().getFullYear() + "-" + (new Date().getFullYear() + 1);
		} else {
			inputSaison.value = (new Date().getFullYear() - 1) + "-" + new Date().getFullYear();
		}
	
		inputDateSignature = document.getElementsByName("date_signature")[0];
		inputDateSignature.value = new Date().toISOString().slice(0, 10);
	
		/* if (document.getElementById("si_autre_section_oui").checked) {
			document.getElementsByName("autre_section")[0].readOnly = false;
		} else {
			document.getElementsByName("autre_section")[0].readOnly = true;
		}  à faire en ajax pcq ça fonctionne pas sans actualiser la page */
	
	</script>';
	}
}
