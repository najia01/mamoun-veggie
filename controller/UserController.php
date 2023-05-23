<?php

class UserController extends Controller
{


    public function userLogin()
    {
        if ($_POST) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $model = new UserModel();
            $user = $model->getUserByUsername($username);

            if ($user && password_verify($password, $user->getPassword())) {
                $_SESSION['id'] = $user->getUser_Id();
                header('Location: ./');
            } else {
                // Identifiant ou mot de passe incorrect
                echo 'Identifiant ou mot de passe incorrect.';
            }
        } else {
            global $router;
            $link = $router->generate('login');
            echo self::getTwig()->render('connect.html.twig', ['link' => $link]);
        }
    }


    public function createUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $username = $_POST['username'];
            $rawPass = $_POST['psw'];
            $password = password_hash($rawPass, PASSWORD_DEFAULT);
            $mail = filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL);
            $userModel = new UserModel();

            $userData = new User([
                'username' => $username,
                'password' => $password,
                'mail' => $mail
            ]);


            $user = $userModel->register($userData);

            global $router;
            header('Location:' . $router->generate('home'));
            exit();

        } else {
            global $router;
            $link = $router->generate('login');
            echo self::getTwig()->render('connect.html.twig', ['link' => $link]);
        }
    }
    // public function logout()
    // {
    //     session_destroy();
    //     header('Location: ./');
    //     exit();
    // }

}
