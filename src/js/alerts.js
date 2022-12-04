function alertDeconnexion() {
    Swal.fire({
        icon: 'error',
        title: 'Voulez vous vous deconnecter ?',
        showCancelButton: true,
        confirmButtonText: 'Oui',
        cancelButtonText: 'Non'
    }).then((result) => {
        if (result.value) {
            Swal.fire(
                'Deconnexion',
                'Vous avez été déconnecté',
                'success'
            )
            setTimeout(function () { window.location.href = 'index.php?module=connexion&action=deconnexion'; }, 2000);
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire(
                'Annulation',
                'Vous êtes toujours connecté',
                'error'
            )
        }
    })
}

function alertLogin() {
    Swal.fire({
        icon: 'success',
        title: 'Connexion',
        text: 'Vous êtes connecté',
        footer: 'Vous allez être redirigé'
    })
    setTimeout(function () { history.back(); }, 2000);
}

function alertLoginError() {
    Swal.fire({
        icon: 'error',
        title: 'Erreur',
        text: 'Identifiant ou mot de passe incorrect',
        footer: 'Veuillez réessayer'
    })
    setTimeout(function () { history.back(); }, 2000);
}