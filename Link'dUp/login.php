<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
			crossorigin="anonymous"
		/>
		<link rel="stylesheet" href="asset/css/components/login.css">
		<title>déjà un compte</title>
	</head>
	<body>
		<header>
			<img src="asset/css/img/Logo+Link'dUp2.png" alt="logo">
		</header>
		<!-- la connexion -->
		
		<?php
require_once 'connexion.php';

if (isset($_POST['submit'])) {
    if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])) {
        // Traitement du formulaire de connexion
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        // Vérification des informations de connexion
        $query = $database->prepare("SELECT * FROM user WHERE email=:email");
        $query->bindParam(':email', $email);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            header('Location: login.php');
            exit;
        }

        $storedPassword = $result['passwords'];
        if (password_verify($password, $storedPassword)) {
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $result['user_id'];
            header("Location: index.php");
            exit;
        } else {
            echo "Email ou mot de passe incorrect.";
        }
    }
}
?>
		<!-- pour le page de connection en ayant déjà un compte  -->
		<form method="POST">
			<h1 id="co_1">Connexion</h1>
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Email address</label>
				<input
					type="email" name= "email"
					class="form-control"id="exampleInputEmail1"aria-describedby="emailHelp"/>
				<div id="emailHelp" class="form-text">
					We'll never share your email with anyone else.
				</div>
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Password</label>
				<input type="password" name="password"  class="form-control"id="exampleInputPassword1"/>
		</div>
				<div class="mb-3 form-check">
				<input type="checkbox" class="form-check-input" id="exampleCheck1" />
				<label class="form-check-label" for="exampleCheck1">Check me out</label>
		</div>
				<button type="submit" name="submit" class="btn btn-primary btn-puls">Submit</button>
		</form>
		
		
		
		<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
		crossorigin="anonymous"
		></script>
	</body>
</html>