<?php
  session_start();
?>
<!DOCTYPE html>
	<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="asset/css/style.css">
		<title>Link'dUp</title>
	</head>
	<body>
		
		<?php
    if(!empty($_SESSION['id'])){
		echo "<div class= 'user'></div>";
	}
		?>
		
		
		<nav class="i_nav">
			<div class="haut">
			<img src="asset/css/img/Logo+Link'dUpb.png" class="logo" />
			</div>
		<div class="parametre"><img src="asset/css/img/icons8-engrenage-24.png" alt="parametre"></a></div>
		<button id="log"><a href="login.php">Login</a></button>
		<button id="singn"><a href="Signup.php">Inscription</a></button>
		</div>	
		</nav>
		
		
		
		<div class="modal" id="modal">
			Veuillez vous inscrire ou vous connecter pour continuer.
		</div>
		<div class="menu-btn-accueil">
            <span class="bar-acceuil"></span>
            <span class="bar-acceuil"></span>
            <span class="bar-acceuil"></span>
        </div>
		<section id="block">
		
			<div class="accueil">
			<div class="accueil-image">
				<img src="asset/css/img/icons8-accueil-24.png" alt="Accueil" />
			</div>
			<div class="accueil-texte">
			<p>Accueil</p>
			</div>
		</div>
			<div class="messages">
			<div class="messages-image">
				<img src="asset/css/img/icons8-messages-24.png" alt="Messages" />
			</div>
			<div class="message-texte">
				<p>Messages</p>
			</div>
		</div>
			<div class="profil">
			<div class="profil-image">
			<img src="asset/css/img/icons8-utilisateur-24.png" alt="profil" />
			</div>
			<div class="profil-texte">
			<a href="profil.php">Profil</a>
			</div>
			<div class="btn-sidenav">
			<button id="log"><a href="login.php">Login</a></button>
			<button id="singn"><a href="Signup.php">Inscription</a></button>
			</div>
			
		</div>
		</section>

		<!-- la liste de tag -->
		
		<div class="my-item" data-tags="tag1">
		<button class="tag-button" onclick="toggleCategories('lifestyle')" id="lifestyle" class = "myclass">lifestyle </button>
		<button class="tag-button" onclick="toggleCategories('voyage')" id="voyage" class = "myclass">Voyage </button>
		<button class="tag-button" onclick="toggleCategories('jeux')" id="jeux" class = "myclass">jeux </button>
		<button class="tag-button" onclick="toggleCategories('tech')" id="tech" class = "myclass">tech </button>
		<button class="tag-button" onclick="toggleCategories('musique')" id="musique" class = "myclass">musique </button>
		<button class="tag-button" onclick="toggleCategories('mood')" id="mood" class = "myclass">mood</button>
		<button class="tag-button" onclick="toggleCategories('recette')" id="recette" class = "myclass">recette</button>
		<button class="tag-button" onclick="toggleCategories('bouffe')" id="bouffe" class = "myclass">bouffe</button>
		<button class="tag-button" onclick="toggleCategories('film')" id="film" class = "myclass">film</button>
		<button class="tag-button" onclick="toggleCategories('serie')" id="serie" class = "myclass">serie</button>
		
		</div>


		<!-- publication -->
		<?php
		require_once 'connexion.php';
		$requete = $database->prepare("SELECT * FROM articles INNER JOIN user ON articles.user_id = user.user_id ORDER BY date DESC");
        $requete->execute();
        $articles = $requete->fetchAll(PDO::FETCH_ASSOC);
		

		foreach($articles as $article) : 
		?>
		<div class="post-tag" data-tag="<?= $article["tag"]; ?>">
			<div class="card">
				<div class="card-header">
					<div class="card-header-name">
						<p id="p_user"><?php echo $article["pseudo"];?></p>
					</div>
				</div>
				<p class="tri"><?php echo $article["tag"];?></p>
				<div class="card-body">
					<img src="<?php echo $article["picture"];?>" alt="publication">
					<p class="card-body-description">
					<p><?php echo $article["content"];?></p>
					</p>
					<div class="modalDelete">
			<button class="delete-button">
				<img src="asset/css/img/trash3.svg" alt="">
			</button>
			<div class="confirmation-panel hidden">
				<p>Êtes-vous sur de vouloir supprimmer?</p>
				<button class="confirm-button"><a href="supp.php?id=<?= $article['article_id'];?>">Oui</a></button>
				<button class="cancel-button">Non</button>	
			</div>
			
		</div>
				</div>
			</div><br>
		</div>
		<?php
		endforeach;
		?>
		
		<!-- pour la modal -->
		<div class="modal-container">

			<div class="overlay modal-trigger"></div>

			<div class="modal" role="dialog" aria-labelledby="modalTitle" aria-describedby="dialogDesc">
			
				<h1 id="modalTitle">Nouveau poste</h1>
				<form action="inserer.php" method="POST" enctype="multipart/form-data"> 
						<div class="i">
							<label for="picture">Image:</label>
							<input type="file" name="picture" accept="picture/jpeg  , picture/png, picture/jpg, picture/gif" >
						</div>
						<div>
							<label for="content">Contenu:</label>
							<textarea name="content" id="content" cols="30" rows="10"></textarea>
						</div>	
						
				<div>
					<label for="pet-select">Choix de tag:</label>
					<select name="tag" id="tag-select">
					<option value="">--Fait un choix de Tag--</option>
					<option value="lifestyle">lifestyle</option>
					<option value="voyage">Voyage</option>
					<option value="jeux">jeux vidéo</option>
					<option value="tech">Tecnologie</option>
					<option value="musique">musique</option>
					<option value="mood">Mood</option>
					<option value="recette">recette</option>
					<option value="bouffe">Bouffe</option>
					<option value="film">film</option>
					<option value="serie">Série</option>
				</select>
					<button type="submit" name="submit">Publier</button>
				</div>
			</form>
			</div>
		</div>

		<button class="modal-btn modal-trigger"><img src="asset/css/img/plus.svg" alt=""></button>


		<script src="asset/js/inscrit-toi.js"></script>
		<script src="asset/js/localstorage.js"></script>
		<script src="asset/js/supp.js"></script>
		<script src="asset/js/modal.js"></script>
		<script src="asset/js/filtre.js"></script>
	</body>
	</html>
