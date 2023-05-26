<?php

class RecipeController extends Controller
{
    public function homePage()
    {
        global $router;

        $model = new RecipeModel();
        $datas = $model->getRecipe();

        // $link = $router->generate('baseRecipe');
        // $linkConnexion = $router->generate('login');
        // $logout = $router->generate('logout');
        // $addedrecipe = $router->generate('addedrecipe');
        echo self::getRender('homePage.html.twig', ['recipes' => $datas]);
    }

    public function getOne(int $id)
    {
        global $router;
        $model = new RecipeModel();

        $datas = $model->getOneRecipe($id);

        echo self::getRender('oneRecipe.html.twig', []);
    }

    public function getRecipesByUser($author)
    {
        $author = $_SESSION['id'];
        
        if ($_SESSION['connect']) {

            $model = new RecipeModel();
            $userRecipes = $model->getUserRecipes($author);

            global $router;
            $dashboard = $router->generate('dashboard');

            echo self::getRender('dashboardUser.html.twig', ['userRecipes' => $userRecipes, 'dashboard' => $dashboard]);
        }
    }

    public function added()
    {
        global $router;
        // si il n y a pas de post envoyé 
        if (!$_POST) {
            echo self::getRender('addRecipe.html.twig', []); // il execute cette condition 
        } else {
            if (isset($_POST['submit'])) { // sinon il recupere du form toutes les données demandées
                $user_id = $_SESSION['id'];
                $title = $_POST['title'];
                // $image = $_POST['image'];
                $description = $_POST['description'];
                $cooking_time = $_POST['cooking_time'];
                $number_of_covers = $_POST['number_of_covers'];


                $recipe = new Recipe([ // on rassemble toutes les données dans un tableau avec création d'une variable 
                    'user_id' => $user_id,
                    'title' => $title,
                    // 'image' => $image,
                    'description' => $description,
                    'cooking_time' => $cooking_time,
                    'number_of_covers' => $number_of_covers,

                ]);


                $recipeModel = new RecipeModel();
                $recipeModel->addRecipe($recipe);

                global $router;
                header('Location: ' . $router->generate('home'));
            } else {
                echo 'Votre ajout de recette n a pas été pris en compte ';
            }
        }
    }
}
