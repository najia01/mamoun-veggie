<?php

abstract class Controller
{
    private static $loader;
    private static $twig;
    private static $render;

    private static function getLoader()
    {
        if (self::$loader === null) {
            self::$loader = new \Twig\Loader\FilesystemLoader('./view');
        }
        return self::$loader;
    }

    protected static function getTwig()
    {
        if (self::$twig === null) {
            self::$twig = new \Twig\Environment(self::getLoader());
            self::$twig->addGlobal('session', $_SESSION);
            self::$twig->addGlobal('get', $_GET);

            self::$twig->addFunction(new \Twig\TwigFunction('path', function ($routeName) {
                global $router;
                return $router->generate($routeName);
            }));
        }

        return self::$twig;
    }

    protected static function setRender(string $template, $datas)
    {
        global $router;

        //LINKS

        $link = $router->generate('baseRecipe');
        $linkConnexion = $router->generate('login');
        $logout = $router->generate('logout');
        $addedrecipe = $router->generate('addedrecipe');
        $dashboard = $router->generate('dashboard');


        // // CATEGORIES
        // $categories = new CategoryModel();
        // $cats = $categories->getAllCategory();

        $new = [
            'link' => $link,
            
            'linkConnexion' =>  $linkConnexion,
            'logout' => $logout,
            'addedrecipe' => $addedrecipe,
            'dashboard' =>  $dashboard
        ] + $datas;
        
        echo self::getTwig()->render($template, $new);
    }

    protected static function getRender($template, $datas)
    {
        if (self::$render === null) {
            self::setRender($template, $datas);
        }
        return self::$render;
    }
}
    // private static function setLoader()
    // {
    //     self::$loader = new \Twig\Loader\FilesystemLoader('./view');
    // }

    // private static function setTwig()
    // {
    //     self::$twig = new \Twig\Environment(self::getLoader(), [
    //         'cache' => false
    //     ]);
    //     // self::$twig->addGlobal('session', $_SESSION);
    // }

    // protected static function getLoader()
    // {
    //     if (self::$loader == null) {
    //         self::setLoader();
    //     }
    //     return self::$loader;
    // }

    // protected static function getTwig()
    // {
    //     if (self::$twig == null) {
    //         self::setTwig();

    //         self::$twig->addFunction(new \Twig\TwigFunction('path', function ($routeName) {
    //             global $router;
    //             return $router->generate($routeName);
    //             }));
    //     }
    //     return self::$twig;
    // }

