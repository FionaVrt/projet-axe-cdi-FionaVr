    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="asset/css/components/profil.css"/>
        <title>Profil</title>
    </head>
    <body>
    <header>
   
        </section>
        <!-- sidenav -->
        <div class="menu-btn">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        <div class="header__nav">
            <nav class="nav">
                <ul class="nav__list">
                
                <li class="nav__list_item"><a class="nav__link" href="index.php">Acceuil</a></li>
                <li class="nav__list_item"><a class="nav__link" href="logout.php">Déconnecter</a></li>
                </ul>
            </nav>
        </div>
        <div class="navbar">
            <nav class="navbar-max">
                <ul class="nav__list_bar">
                
                <li class="nav__list_item_bar"><a class="nav__link_bar" href="index.php">Acceuil</a></li>
                <li class="nav__list_item_bar"><a class="nav__link_bar" href="logout.php">Déconnecter</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="profile-page"></div>
    <?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}
// Récupérer l'Id de la personne connectée
$id = $_SESSION['id'];

// si url contient un paramètre "pseudo", utiliser cette valeur pour afficher le profil
if (isset($_GET['pseudo'])){
    $pseudo = $_GET['pseudo'];

    // Récupérer les infos de la personne quand elle son correspondante de puis la base de données
    require_once 'connexion.php';
    $query = $database->prepare('SELECT * FROM user WHERE pseudo = :pseudo');
    $query->bindParam(':pseudo',$pseudo);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    // si la personne n'existe pas message d'erreur
    if (!$user) {
        echo "La personne correspondante n'existe pas";
        exit;
    }

    // Récupérer les posts de la personne depuis la base de données
    $query = $database->prepare('SELECT * FROM posts WHERE user_id = :user_id');
    $query->bindParam(':user_id', $user['id']);
    $query->execute();
    $posts = $query->fetchAll(PDO::FETCH_ASSOC);

    // Afficher les posts de la personne correspondante
    echo  'Profil de ' . $user['pseudo'];
    foreach ($posts as $post) {
        echo "<p>".$post['content']."</p>";
    }
} else {

    // Récup des info de la personne connectée
    require_once 'connexion.php';
    $query = $database->prepare('SELECT * FROM user WHERE user_id = :user_id');
    $query->execute(['user_id' => $_SESSION['id']]);
    $user = $query->fetch(PDO::FETCH_ASSOC);

    $query = $database->prepare('SELECT * FROM articles WHERE user_id = :user_id');
    $query->execute(['user_id' => $_SESSION['id']]);
    $posts = $query->fetchAll(PDO::FETCH_ASSOC);

    // Afficher les posts personnels de la personne connectée
    echo "<h1>Mon profil</h1>";
    foreach ($posts as $post) { 
        echo "<p>".$post['content']."</p>";
    }
}
?>



    <script src="asset/js/sidenav.js"></script>
    </body>
    </html>