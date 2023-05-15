<?php
require_once './vendor/altorouter/altorouter/AltoRouter.php';
require_once './vendor/autoload.php'; 

$router = new AltoRouter();

$router->setBasePath('/projets/mamoun-veggie');

$router->map( 'GET', '/','RecipeController#homePage','home');
$router->map( 'GET', '/recipes/','RecipeController#baseRecipe','baseRecipe');
$router->map( 'GET', '/recipes/[i:id]?','RecipeController#getOne','getOneRecipe');

$match = $router->match();

if(is_array($match)){
    list($controller, $action) = explode ('#', $match['target']);
 
    $obj = new $controller();

    if(is_callable(array($obj, $action))){
        call_user_func_array(array($obj, $action), $match['params']);
       
    }
}
