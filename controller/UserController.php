<?php

class UserController extends Controller
{

    public function userLogin()
    {
        if (!$_POST) {
            echo self::getTwig()->render('connect.html.twig', []);
        } else {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $model = new UserModel();
            $user = $model->getUserByUsername($username);
           
            if ($user) {
            
                if (password_verify($password, $user->getPassword())) {
                    $_SESSION['connect'] = true;
                    $_SESSION['id'] = $user->getUser_Id();
                    $_SESSION['username'] = $user->getUsername();

                    // header('Location: ./');

                    global $router;
                    $dashboard = $router->generate('dashboard');
                    echo self::getTwig()->render('dashboardUser.html.twig', ['dashboard' => $dashboard]); 

                } else {
                    // Identifiant ou mot de passe incorrect

                    global $router;
                    $login = $router->generate('login');
                    $dashboard = $router->generate('dashboard');
                    echo self::getTwig()->render('connect.html.twig', ['login' => $login]); 
                }
            } else {
                global $router;
                $login = $router->generate('login');
                echo self::getTwig()->render('connect.html.twig', ['login' => $login]);
            }
        }
    }

    public function createUser()
    {
       
        if (!$_POST) {
            echo self::getTwig()->render('connect.html.twig', []);
        } else {

            $username = $_POST['username'];
            $rawPass = $_POST['password'];
            $password = password_hash($rawPass, PASSWORD_DEFAULT);
            $mail = filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL);

            $user = new User([
                'username' => $username,
                'password' => $password,
                'mail' => $mail
            ]);
            

            $model = new UserModel();
            $result = $model->register($user);

            global $router;
            $register = $router->generate('register');
            echo self::getTwig()->render('connect.html.twig', ['register' => $register]);

           
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: ./');
        exit();
    }

}
