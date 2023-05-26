  <!DOCTYPE html>
  <html lang="fr">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
      <link rel="stylesheet" href="asset/css/components/singup.css">
      <title>inscription</title>
  </head>
  <body>
  <?php
require_once 'connexion.php';

// Traitement du formulaire d'inscription
if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérification si l'utilisateur existe déjà
    $query = $database->prepare("SELECT * FROM user WHERE email=:FormEmail");
    $query->bindParam(':FormEmail', $email);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        // Hash du mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insertion de l'utilisateur dans la base de données
        $data = [
            "FormName" => $name,
            "FormEmail" => $email,
            "FormPassword" => $hashedPassword
        ];
        
        $insertQuery = $database->prepare("INSERT INTO user (pseudo, passwords, email) VALUES (:FormName, :FormPassword, :FormEmail)");
        
        if ($insertQuery->execute($data)) {
            header('Location: login.php');
            exit;
        } else {
            echo "Une erreur est survenue.";
        }
    } else {
        echo "L'utilisateur existe déjà.";
    }
}
?>
<form method="POST">
    <section class="vh-100">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
              <div class="container-form row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">
                    Créer votre compte
                  </p>


                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" name="name" id="form3Example1c" class="form-control">
                        <label class="form-label" for="form3Example1c">Pseudo</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="email" name="email" id="form3Example3c" class="form-control">
                        <label class="form-label" for="form3Example3c">Votre Email</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" name="password" id="form3Example4c" class="form-control">
                        <label class="form-label" for="form3Example4c">Mot de passe</label>
                      </div>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" name="signup" class="btn btn-primary btn-pulse">Submit</button>
                        
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</form>

    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
  </html>