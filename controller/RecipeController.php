<?php

class RecipeController extends Controller
{
    public function homePage()
    {
        global $router;
        $model = new RecipeModel();
        $datas = $model->getRecipe();
        $link = $router->generate('baseRecipe');
        $linkConnexion = $router->generate('login');
        $logout = $router->generate('logout');
        // $addedrecipe = $router->generate('addedrecipe');
        echo self::getTwig()->render('homePage.html.twig', ['recipes' => $datas, 'linkConnexion' => $linkConnexion, 'link' => $link, 'logout' => $logout]);
    }


    public function getOne(int $id)
    {
        global $router;
        $model = new RecipeModel();

        $datas = $model->getOneRecipe($id);

        echo self::getTwig()->render('oneRecipe.html.twig', ['recipe' => $datas]);
    }

    public function added()
    {
        
        if (!$_POST) {
            echo self::getTwig()->render('homePage.html.twig', []);
           
            $title = $_POST['title'];
            $image = $_POST['image'];
            $description = $_POST['description'];
            $cookingTime = $_POST['cookingTime'];
            $numberOfCovers = $_POST['numberOfCovers'];
            $publicationDate = $_POST['publicationDate'];
                      
            $recipeModel = new recipeModel();
            $recipeModel->addRecipe($title, $image, $description,$cookingTime, $numberOfCovers, $publicationDate);

            
            // // header('Location: /');
           
        } else {


        global $router;
       
        $addedrecipe = $router->generate('addedrecipe');
        echo self::getTwig()->render('addRecipe.html.twig', ['addedrecipe' => $addedrecipe]);
        
        exit();
        
    }
}
}