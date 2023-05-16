<?php

class UserController extends Controller
{
    public function userLogin(int $id)
    {
        global $router;
        $model = new UserModel();
        $datas = $model->getUser($id);

        $link = $router->generate('baseUser');
        echo self::getTwig()->render('homePage.html.twig', ['users' => $datas, 'link' => $link]);
    }
}
