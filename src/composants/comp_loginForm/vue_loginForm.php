<?php

class VueLoginForm
{

	private $contenu;

	public function __construct()
	{
	}

	public function getContenu()
	{
		$token = uniqid(rand(), true);
		$_SESSION['token'] = $token;
		$_SESSION['token_time'] = time(); 
		$this->contenu = '<div id="loginForm" style="display: none;">
		<i class="fa-solid fa-xmark fa-2x" id="cross"></i>
		<form action="index.php?module=connexion&action=connexion" method="POST" id="card-form">
			<div class="login-input">
				<input type="text" class="input-field" name="login" maxlength="50" required />
				<label class="input-label" for="login">Identifiant</label>
			</div>
			<div class="login-input">
				<input type="password" class="input-field" name="mdp" maxlength="50" required />
				<label class="input-label" for="mdp">Password</label>
			</div>
			<div class="action">
				<button class="action-button">Connexion</button>
			</div>
			<input type="hidden" name="token" id="token" value="' . $token . '" />
		</form>
		<div class="card-info"></div>
	</div>';
		return $this->contenu;
	}
}

?>