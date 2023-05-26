<?php
session_start();

require_once 'connexion.php';

// Vérifier si la clé 'user_id' existe dans $_SESSION
if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
    
    if (!empty($_POST['content'])) {
        $tag = $_POST['tag'];
        $content = $_POST['content'];
        $date = date('Y-m-d H:i:s');
        $picture = $_FILES['picture'];
        

        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
        $max_size = 209152;

        if (!empty($picture['name'])) {
            $picture_name = $picture['name'];
            $picture_tmp = $picture['tmp_name'];
            $picture_size = $picture['size'];
            $picture_error = $picture['error'];

            if ($picture_error === 0) {
                $picture_extension = pathinfo($picture_name, PATHINFO_EXTENSION);
                $picture_extension = strtolower($picture_extension);
                $picture_size_mb = $picture_size / 1024 / 1024;

                if (in_array($picture_extension, $allowed_extensions)) {
                    if ($picture_size_mb <= $max_size) {
                        $picture_name_new = uniqid('img_') . '.' . $picture_extension;
                        $picture_dest = '../asset/css/img/' . $picture_name_new;

                        // Créer le répertoire de destination s'il n'existe pas
                        if (!file_exists('../asset/css/img/')) {
                            mkdir('../asset/css/img/', 0777, true);
                        }

                        $data = [
                            'tag' => $tag,
                            'content' => $content,
                            'picture' => $picture_dest, // Utiliser le chemin complet de destination
                            'date' => $date,
                            'user' => $user_id
                        ];

                        move_uploaded_file($picture_tmp, $picture_dest);

                        $requete = $database->prepare("INSERT INTO articles(tag, content, picture, date, user_id) VALUES (:tag, :content, :picture, :date, :user)");
                        $requete->execute($data);

                        if ($requete) {
                            header('Location: index.php');
                            exit();
                        } else {
                            echo 'Une erreur est survenue';
                        }
                    } else {
                        echo 'Le poids de l\'image est trop important';
                    }
                } else {
                    echo 'Le format de l\'image est incorrect';
                }
            } else {
                echo 'Une erreur est survenue lors du téléchargement de l\'image';
            }
        } else {
            $data = [
                'tag' => $tag,
                'content' => $content,
                'date' => $date,
                'user' => $user_id
            ];

            $requete = $database->prepare('INSERT INTO articles(tag, content, date, user_id) VALUES (:tag, :content, :date, :user_id)');
            $requete->execute($data);

            if ($requete) {
                header('Location: index.php');
                exit();
            } else {
                echo 'Une erreur est survenue';
            }
        }
        
    } else {
        echo 'Veuillez remplir tous les champs';
    }
} else {
    echo 'Erreur: Utilisateur non connecté';
}
?>
