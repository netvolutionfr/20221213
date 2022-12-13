<?php

class Utilisateur
{
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $password;
    private $age;

    public function __construct($nom, $prenom, $email)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function isPasswordCorrect($password): bool
    {
        return password_verify($password, $this->password);
    }

    public function setPassword($password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    // méthode enregistrement de l'objet dans MySQL
    public function save(): void
    {
        // connexion à la base de données
        $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        // préparation de la requête
        $query = $db->prepare('INSERT INTO utilisateur (nom, prenom, email, password) VALUES (:nom, :prenom, :email, :password)');
        // exécution de la requête
        $query->execute([
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'email' => $this->email,
            'password' => $this->password
        ]);
    }
}