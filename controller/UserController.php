<?php

class UserController extends Controller
{
    public function userLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $model = new UserModel();
         $datas = $model->getUser($username);
        }


        global $router;

       

        $link = $router->generate('baseUser');
        echo self::getTwig()->render('connect.html.twig', ['link' => $link]);
    }
}
