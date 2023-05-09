<?php
require_once './vendor/altorouter/altorouter/AltoRouter.php';
require_once './vendor/autoload.php'; 

$router = new AltoRouter();

$router->setBasePath('/php/router');

$router->map( 'GET', '/','RecipeController#homePage','home');
// $router->map( 'GET', '/post/','','basePost');
// $router->map( 'GET', '/post/[i:id]','PostController#getOne','getOnePost');

$match = $router->match();
if(is_array($match)){
    list($controller, $action) = explode ('#', $match['target']);
 
    $obj = new $controller();

    if(is_callable(array($obj, $action))){
        call_user_func_array(array($obj, $action), $match['params']);
       
    }
}
