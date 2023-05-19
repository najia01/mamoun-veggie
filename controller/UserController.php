<?php

class UserController extends Controller
{
    public function userLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = new UserModel();
            $user = $userModel->getUserByUsername($username);

            if ($user && password_verify($password, $user->getPassword())) {
                // Authentification réussie
                // Effectuer des actions nécessaires, par exemple :
                // - Créer une session utilisateur
                // - Rediriger l'utilisateur vers une page sécurisée
                global $router;
                header('Location: ' . $router->generate('home'));
                exit();
            } else {
                // Authentification échouée
                // Afficher un message d'erreur à l'utilisateur
                echo "Identifiant ou mot de passe incorrect";
            }
        } else {
            global $router;
            $link = $router->generate('baseUser');
            echo self::getTwig()->render('connect.html.twig', ['link' => $link]);
        }
    }
}
