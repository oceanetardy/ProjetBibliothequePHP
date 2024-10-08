<?php
// Vérifiez si l'utilisateur est connecté
$utilisateurConnecte = isset($_SESSION['utilisateur_id']);
$estAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';

// Déterminez si nous sommes sur la page "Mes Livres" ou "Ajouter un Livre"
$pageActuelle = basename($_SERVER['PHP_SELF']);
$estSurPageMesLivres = ($pageActuelle === 'liste_livres_utilisateurs.php');
$estSurPageAddLivres = ($pageActuelle === 'ajouter_livre.php');
$estSurPageMyInfos = ($pageActuelle === 'modifier_infos.php');
$estSurPageAllLivres = ($pageActuelle === 'liste_livres.php');
$estSurPageAllComment = ($pageActuelle === 'gestion_commentaire.php');
$estSurPageAllLivresAdmin = ($pageActuelle === 'gestion_livre.php');
$estSurPageSearchLivre = ($pageActuelle === 'recherche_livres.php');
?>
<header>
    <h1>BOOKNET</h1>
    <div class="auth-buttons">
        <?php if ($utilisateurConnecte) : ?>
        <?php if ($estSurPageMesLivres || $estSurPageAllLivres || $estSurPageMyInfos || $estSurPageAddLivres) : ?>
            <a href="../logout.php" class="button">Déconnexion</a>
        <?php else : ?>
                <a href="logout.php" class="button">Déconnexion</a>
            <?php endif ?>

            <!-- Affichez le lien "Tous les Commentaires" si l'utilisateur est administrateur -->
            <?php if ($estAdmin) : ?>
                <a href="gestion_commentaire.php?action=liste" class="button" <?php if ($estSurPageMesLivres || $estSurPageAddLivres || $estSurPageMyInfos || $estSurPageAllLivres || $estSurPageAllComment || $estSurPageAllLivresAdmin || $estSurPageSearchLivre ) echo 'style="display:none;"'; ?>>Tous les Commentaires</a>
                <a href="gestion_livre.php?action=liste" class="button" <?php if ($estSurPageMesLivres || $estSurPageAddLivres || $estSurPageMyInfos || $estSurPageAllLivres || $estSurPageAllComment || $estSurPageAllLivresAdmin || $estSurPageSearchLivre) echo 'style="display:none;"'; ?>>Tous les Livres</a>
            <?php endif; ?>

            <!-- Affichez le lien "Mes Livres" ou "Ajouter un Livre" selon la page actuelle -->
                <a href="views/liste_livres_utilisateurs.php" class="button" <?php if ($estSurPageAddLivres ||  $estSurPageMesLivres || $estSurPageMyInfos || $estSurPageAllLivres || $estSurPageAllComment || $estSurPageAllLivresAdmin || $estSurPageSearchLivre) echo 'style="display:none;"'; ?>>Mes Livres</a>

            <!-- Ajoutez le lien "Mes Infos" -->
            <a href="views/modifier_infos.php" class="button" <?php if ($estSurPageMesLivres || $estSurPageMyInfos || $estSurPageAllLivres || $estSurPageAllComment || $estSurPageAllLivresAdmin || $estSurPageSearchLivre || $estSurPageAddLivres) echo 'style="display:none;"'; ?>>Mes Infos</a>

        <?php else : ?>
            <a href="login.php" class="button">Se connecter</a>
            <a href="inscription.php" class="button">S'inscrire</a>
        <?php endif; ?>
    </div>
</header>
