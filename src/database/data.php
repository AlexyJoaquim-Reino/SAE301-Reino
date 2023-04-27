<?php
require("connexion.php");

function getArticles(){
    $db = connectToDB();
    $query= "SELECT * FROM article";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result= $stmt->fetchAll();
    return $result;
}