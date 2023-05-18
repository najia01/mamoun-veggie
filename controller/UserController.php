<?php

class UserController extends Controller
{
    public function userLogin()
    {
        $model = new UserModel();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password = password_hash($password, PASSWORD_DEFAULT);
            $mail = filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL);

            $userData = new User([
                'username' => $username,
                'password' => $password,
                'mail' => $mail
            ]);

            $user = ($userData);
            $result = $model->getUser($user);
            global $router;
            header('Location:' . $router->generate('home'));
            exit();

        } else {

            global $router;
            $link = $router->generate('baseUser');
            echo self::getTwig()->render('connect.html.twig', ['link' => $link]);
        }
    }
}
