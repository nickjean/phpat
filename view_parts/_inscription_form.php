<?php
    var_dump($_POST);
    /*if (array_key_exists('username', $_POST)) {
        echo "Username est present et vaut ", $_POST['username'];
    } else {
        echo "Username est Absent";
    }*/

$in_post = array_key_exists('register',$_POST);

$nom_ok = false;
if (array_key_exists('nom', $_POST)) {
    $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_MAGIC_QUOTES);
    $nom = filter_var($nom, FILTER_SANITIZE_STRING);
    $nom_ok = (1 === preg_match('/^[a-z0-9]{4,}$/', $nom)); // Validation du username : des alpha minuscules et chiffres, min 4 caractères
    var_dump($nom);
    var_dump($nom_ok);

}

$prenom_ok = false;
if (array_key_exists('prenom', $_POST)) {
    $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_MAGIC_QUOTES);
    $prenom = filter_var($prenom, FILTER_SANITIZE_STRING);
    $prenom_ok = (1 === preg_match('/^[a-z0-9]{4,}$/', $prenom)); // Validation du username : des alpha minuscules et chiffres, min 4 caractères
    var_dump($prenom);
    var_dump($prenom_ok);

}

$password_ok = false;
if (array_key_exists('password', $_POST)) {
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_MAGIC_QUOTES);
    $password = filter_var($password, FILTER_SANITIZE_STRING);
    $password_ok = (1 === preg_match('/^[A-Za-z0-9%&$!*?]{8,12}$/', $password)); // Validation du username : des alpha minuscules et chiffres, min 4 caractères
    var_dump($password);
    var_dump($password_ok);

}

$courriel_ok = false;
if (array_key_exists('courriel', $_POST)) {
    $courriel = filter_input(INPUT_POST, 'courriel', FILTER_SANITIZE_EMAIL);
    $courriel = filter_var($courriel, FILTER_VALIDATE_EMAIL);
    $courriel_ok = (false !== $courriel);
    var_dump($courriel);
    var_dump($courriel_ok);
}

if ($nom_ok && $prenom_ok && $password_ok && $courriel_ok) {
    // On enregistre les données et on s'en va vers une autre page
    header('Location: index.php');
}

?>

<form method="post" action="">
    <ul id="nonestyle">
        <li><label class="inscription" for="nom">Nom :</label>
            <input class="<?php echo $in_post && $nom_ok == false ? 'error' : ''?>" type="text" name="nom" id="nom" value="<?php echo array_key_exists('nom', $_POST) ? $_POST['nom'] : ''; ?>"/>
            <span><?php echo $in_post && $nom_ok == false ? 'Le nom saisi est invalide. Il doit etre d\'au moins 4 caracteres' : ''?></span></li>
        <li><label class="inscription" for="prenom">Prenom :</label>
            <input class="<?php echo $in_post && $prenom_ok == false ? 'error': ''?>" type="text" name="prenom" id="prenom" value="<?php echo array_key_exists('prenom', $_POST) ? $_POST['prenom'] : ''; ?>"/>
            <span><?php echo $in_post && $prenom_ok == false ? 'Le prénom saisi est invalide. Il doit etre d\'au moins 4 caracteres' : ''?></span></li>
        <li><label class="inscription" for="courriel">Courriel :</label>
            <input class="<?php echo $in_post && $courriel_ok == false ? 'error' : ''?>" type="text" name="courriel" id="courriel" value="<?php echo array_key_exists('courriel', $_POST) ? $_POST['courriel'] : ''; ?>"/>
            <span><?php echo $in_post && $courriel_ok == false ? 'Le courriel est invalide.' : ''?></span></li>
        <li><label class="inscription" for="password">Password :</label>
            <input class="<?php echo $in_post && $password_ok == false ? 'error' : ''?>" type="password" name="password" id="password"/><span><?php echo $in_post && $password_ok == false ? 'Le mot de passe est invalide' : ''?></span></li>
        <li><input type="submit" id="submit" name="register" value="Soumettre"/></li>
    </ul>
</form>
