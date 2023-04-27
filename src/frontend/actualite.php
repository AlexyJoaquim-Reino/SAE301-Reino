<?php include '../database/data.php'; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'head.php'; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualités | MMI-Champs</title>

    <style>

    </style>
</head>

<body>
    <?php include 'menu.php'; ?>
    <div class="container mb-5 mt-2">
        <main class='d-flex flex-column justify-conte,t-center'>
            <nav aria-label="breadcrumb" class="mt-5">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index">Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Actualités</li>
                </ol>
            </nav>

            <?php
            $result = getArticles();
            foreach ($result as $actu) {  // $actu = une table de la base de donnée
            ?>
                <div data-aos="fade-right" data-aos-offset="300" class="container mb-5">
                    <div class="card mb-2">
                        <div class="card-body">
                            <center>
                            <?php echo "<img src='assets/image/" . $actu['miniature_article'] . "' alt='Image' height='700px' width='1000px'>" ?>
                            <br>
                            <h3><b> <?php echo $actu['nom_article']; ?></b></h3>
                            <blockquote class="blockquote mb-0">
                                <p><?php echo $actu['date_article']; ?></p>
                                <p><?php echo $actu['contenu_article']; ?></p>
                                <footer class="blockquote-footer"><cite title="Source Title"><?php echo $actu['auteur']; ?></cite></footer>
                            </blockquote>
                            </center>
                           
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
    </div>
    </div>
</body>

<main>


</main>
<?php include 'footer.php'; ?>

</html>