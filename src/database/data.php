<?php
require("connexion.php");

//récupérer toutes les articles de la base de données
function getArticles()
{
    $db = connectToDB();
    $query = "SELECT * FROM article ORDER BY id_article ASC";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

//prendre un article en particulier
function getArticleDetails($id)
{
    $db = connectToDB();
    $query = "SELECT * FROM article WHERE id_article=" . $id;
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result;
}
//récupérer toutes les projets de la base de données
function getProjets()
{
    $db = connectToDB();
    $query = "SELECT * FROM projet";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // permet de récupérer les résultats de la requête
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

//pour se connecter
function login($login, $password)
{
    $db = connectToDB();
    //$hashpass = crypt($password, 'reinopassword');
    $query = "SELECT * FROM utilisateur WHERE login = :login";
    $stmt = $db->prepare($query);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $result = $stmt->execute();
    if ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if (hash_equals($password, $result['mdp'])) {
            $_SESSION['name'] = $result['nom'];
            $_SESSION['projets'] = $result['role_projets']; //1=peut voir les projets, 0=ne peut pas les voir
            $_SESSION['articles'] = $result['role_articles'];
            $_SESSION['admin'] = $result['role_admin'];
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

//ajouter un article
function addArticle($nom, $synopsis, $contenu,  $miniature_article)
{
    $db = connectToDB();
    //raccourcir le chemin qui sera renvoyé
    $target_dir = str_replace("\src\database", "", dirname(__FILE__)) . '/assets/image/';
    $target_file = $target_dir . basename($miniature_article['name']);
    move_uploaded_file($miniature_article['tmp_name'], $target_file);
    $query = "INSERT INTO article (nom_article, contenu_article, date_article, synopsis, auteur, miniature_article) VALUES (:nom_article, :contenu_article, NOW(),:synopsis, :auteur, :miniature_article)";
    $stmt = $db->prepare($query);
    $stmt->bindValue(":nom_article", $nom, PDO::PARAM_STR);
    $stmt->bindValue(":contenu_article", $contenu, PDO::PARAM_STR);
    $stmt->bindValue(":synopsis", $synopsis, PDO::PARAM_STR);
    $stmt->bindValue(":miniature_article", basename($miniature_article['name']), PDO::PARAM_STR);
    $stmt->bindValue(":auteur", $_SESSION['name'], PDO::PARAM_STR);
    $stmt->execute();
}

//ajouter un projet
function addProjet($nom_projet, $etudiants, $niveau, $lien, $image_projet, $description)
{
    $db = connectToDB();
    $target_dir = 'src/img/projet/';
    $target_file = $target_dir . basename($image_projet);
    move_uploaded_file($image_projet, $target_file);
    $query = "INSERT INTO projet (nom_projet, etudiants, niveau, lien, img_projet, description) VALUES (:nom_projet, :etudiants, :niveau, :lien, :img_projet, :description)";
    $stmt = $db->prepare($query);
    $stmt->bindValue(":nom_projet", $nom_projet, PDO::PARAM_STR);
    $stmt->bindValue(":etudiants", $etudiants, PDO::PARAM_STR);
    $stmt->bindValue(":niveau", $niveau, PDO::PARAM_STR);
    $stmt->bindValue(":lien", $lien, PDO::PARAM_STR);
    $stmt->bindValue(":img_projet", $target_file, PDO::PARAM_STR);
    $stmt->bindValue(":description", $description, PDO::PARAM_STR);
    $stmt->execute();
}

//ajouter un utilisateur
function addUser($name, $login, $pass, $bio, $art = null, $proj = null, $admin = null)
{
    $db = connectToDB();
    $hash = crypt($pass, '$2a$07$reinohash$');
    $query = "INSERT INTO utilisateur (nom, login, mdp, bio, role_articles, role_projets, role_admin) VALUES (:nom, :login, :mdp, :bio, :role_articles, :role_projets, :role_admin)";
    $stmt = $db->prepare($query);
    $stmt->bindValue(":nom", $name, PDO::PARAM_STR);
    $stmt->bindValue(":login", $login, PDO::PARAM_STR);
    $stmt->bindValue(":mdp", $hash, PDO::PARAM_STR);
    $stmt->bindValue(":bio", $bio, PDO::PARAM_STR);
    $stmt->bindValue(":role_articles", $art, PDO::PARAM_INT);
    $stmt->bindValue(":role_projets", $proj, PDO::PARAM_INT);
    $stmt->bindValue(":role_admin", $admin, PDO::PARAM_INT);
    $stmt->execute();
}

//modifier un article
function editArticle($id, $nom, $contenu, $synopsis)
{
    $db = connectToDB();
    $query = "UPDATE article SET nom_article=:nom_article, contenu_article=:contenu_article, synopsis=:synopsis WHERE id_article=:id_article";
    $stmt = $db->prepare($query);
    $stmt->bindValue(":nom_article", $nom, PDO::PARAM_STR);
    $stmt->bindValue(":contenu_article", $contenu, PDO::PARAM_STR);
    $stmt->bindValue(":synopsis", $synopsis, PDO::PARAM_STR);
    $stmt->bindValue(":id_article", $id, PDO::PARAM_INT);
    $stmt->execute();
}

//supprimer un article
function rmArticle($id)
{
    $db = connectToDB();
    $query = "DELETE FROM article WHERE id_article = :id_article";
    $stmt = $db->prepare($query);
    $stmt->bindValue(":id_article", $id, PDO::PARAM_INT);
    $stmt->execute();
}
