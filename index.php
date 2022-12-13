<?php
require('Utilisateur.php');

$utilisateur = new Utilisateur('Doe', 'John', 'john@example.com');
$utilisateur->setPassword('123456');


echo "<pre>";
var_dump($utilisateur);

$passwordOk = $utilisateur->isPasswordCorrect('nimportequoi');
if ($passwordOk) {
    echo "Le mot de passe est correct";
} else {
    echo "Le mot de passe est incorrect";
}

echo "</pre>";
