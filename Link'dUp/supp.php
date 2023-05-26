<?php
require_once 'connexion.php';
    
    $data = [
        'id' => $_GET['id']
    ];

    $requete = $database->prepare('DELETE FROM articles WHERE article_id = :id');

    $requete->execute($data);

    header('Location: index.php');

?>