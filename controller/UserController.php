<?php

class UserController extends Controller
{
    public function userLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];''
            $mail = $_POST['email'];

            $userModel = new UserModel();

            $userData = new User([
            'username'=> $username,    
            'password'=> $password,    
            'mail'=> $mail,    
            ]);

            $user = $userModel->register($userData);

            global $router;
            header('Location:'.$router->generate('home'));
           exit();
           
        } else {
            global $router;
            $link = $router->generate('baseUser');
            echo self::getTwig()->render('connect.html.twig', ['link' => $link]);
        }
    }
}
