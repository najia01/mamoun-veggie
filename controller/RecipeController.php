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
        $addedrecipe = $router->generate('addedrecipe');
        echo self::getTwig()->render('homePage.html.twig', ['recipes' => $datas, 'linkConnexion' => $linkConnexion, 'link' => $link, 'logout' => $logout,'addedrecipe' => $addedrecipe]);
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

        if (!$_POST) { // si il n y a pas de post envoyé 
            echo self::getTwig()->render('addRecipe.html.twig', []); // il execute cette condition 
        } else {
            if (isset($_POST['submit'])) { // sinon il recupere du form toutes les données demandées
            $user_id = $_SESSION['id'];  
            $title = $_POST['title'];
            $image = $_POST['image'];
            $description = $_POST['description'];
            $cookingTime = $_POST['cookingTime'];
            $numberOfCovers = $_POST['numberOfCovers'];
            $publicationDate = $_POST['publicationDate'];

            $recipe = new Recipe([// on rassemble toutes les données dans un tableau avec création d'une variable 
                'user_id' => $user_id,
                'title' => $title,
                'image' => $image,
                'description' => $description,
                'cookingTime' => $cookingTime,
                'numberOfCovers' => $numberOfCovers,
                'publicationDate' => $publicationDate,
            ]);


            $recipeModel = new RecipeModel();
            $recipeModel->addRecipe($recipe);

            global $router;
            header('Location: ' . $router->generate('home'));

            
            // $addedrecipe = $router->generate('addedrecipe');
            // echo self::getTwig()->render('addRecipe.html.twig', ['addedrecipe' => $addedrecipe]);

            
        } else {
            echo 'Votre ajout de recette n a pas été pris en compte ';
        }
    }
}
}