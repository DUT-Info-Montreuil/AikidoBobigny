<?php
require_once "./vue_generique.php";
class VueFAQ extends VueGenerique
{

	public function __construct()
	{
		parent::__construct();
	}


	public function affichequestionreponse($tableau)
	{
		$faq = '
		<div class="faq-container">
			<h2>Foire Aux Questions</h2>
			<div class="faq-list">
		';
		foreach ($tableau as $cle => $valeur) {
			$faq .= '
				<div class="faq-item">
					<button id="faq-list-button-'.$cle.'" aria-expanded="false">
						<span class="faq-question">' . htmlspecialchars($valeur['question']) . '</span>
						<span class="icon" aria-hidden="true"></span>
					</button>
					<div class="faq-answer">
						<p>' . htmlspecialchars($valeur['reponse']) . '</p>
					</div>
				</div>
			';
		}
		$faq .= '
			</div>
		</div>
		';
		echo $faq;
	}


	public function form_faq()
	{

		echo '<form action="http://sae/src/index.php?module=faq&action=question_faq" method="POST">
			<p>Quelle est votre question :</p> <textarea <input type="text" name="question" placeholder="Votre question..."/></textarea></br>
			<input type="submit" value="Envoyer la question"/>
			</form>';
	}

	public function reponse_faq($id)
	{
		
		echo '<form action="http://sae/src/index.php?module=admin&action=faq" method="POST" style ="display:none" class="reponsefaq" id="reponse' . $id . '">
		<p>Reponse:</p> <textarea <input type="textarea" id ="reponsefaq' . $id . '" "name="reponsefaq" placeholder="Mettez votre reponse "/></textarea></br>
		<input type="submit" value="Poster la réponse" name="submit_reponse_faq" class="submit_reponse_faq" targetID="' . $id . '"/>
		
		</form>';
	}

	public function modifier_question($id)
	{
		
		echo '<form action="http://sae/src/index.php?module=admin&action=faq" method="POST" style ="display:none" class="corrigerquestion" id="corriger' . $id . '">
		<p>Modifier question:</p> <textarea <input type="textarea" id ="modifier_question' . $id . '" name="modifier_question" placeholder="Modifier la question "/></textarea></br>
		<input type="submit" value="Poster la question" name="submit_modifier_question" class="submit_modifier_question" targetID="' . $id . '"/>
		
		</form>';
	}
}


?>