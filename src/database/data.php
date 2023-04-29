<?php
require("connexion.php");

//récupérer toutes les articles de la base de données
function getArticles(){
    $db = connectToDB();
    $query= "SELECT * FROM article";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

//récupérer toutes les projets de la base de données
function getProjets(){
    $db = connectToDB();
    $query= "SELECT * FROM projet";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result= $stmt->fetchAll(PDO::FETCH_ASSOC); // permet de récupérer les résultats de la requête
    return $result;
}

//récupérer toutes les matières de la base de données
function getMatieres()
{
    $db = connectToDB();
    $query = "SELECT * FROM matiere";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
    return $result;
}