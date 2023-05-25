<?php
session_start();
require_once './vendor/altorouter/altorouter/AltoRouter.php';
require_once './vendor/autoload.php'; 

$router = new AltoRouter();

$router->setBasePath('/projets/mamoun-veggie');

$router->map( 'GET', '/','RecipeController#homePage','home');
$router->map( 'GET', '/recipes/','','baseRecipe');
$router->map( 'GET', '/recipes/[i:id]','RecipeController#getOne','getOneRecipe');


$router->map( 'GET|POST', '/login','UserController#userLogin','login');
$router->map('POST', '/register', 'UserController#createUser', 'register');
$router->map('GET', '/logout', 'UserController#logout', 'logout');

$router->map( 'GET', '/dashboard','UserController#userLogin','dashboard');

$router->map( 'GET|POST', '/addedrecipe','RecipeController#added','addedrecipe');



$match = $router->match();
// var_dump($match);

if(is_array($match)){
    list($controller, $action) = explode ('#', $match['target']);
 
    $obj = new $controller();

    if(is_callable(array($obj, $action))){
        call_user_func_array(array($obj, $action), $match['params']);
       
    }
}
