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
        $addedImage = $router->generate('addImg');
        echo self::getTwig()->render('homePage.html.twig', ['recipes' => $datas, 'linkConnexion' => $linkConnexion, 'link' => $link, 'logout' => $logout, 'addedrecipe' => $addedrecipe, 'addedImage'=> $addedImage]);
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
                $userId = $_SESSION['id'];
                $title = $_POST['title'];
                // $image = $_POST['image'];
                $description = $_POST['description'];
                // $cooking_Time = $_POST['cooking_Time'];
                $numberOfCovers = $_POST['numberOfCovers'];
                $publicationDate = $_POST['publicationDate'];

                $recipe = new Recipe([ // on rassemble toutes les données dans un tableau avec création d'une variable 
                    'userId' => $userId,
                    'title' => $title,
                    // 'image' => $image,
                    'description' => $description,
                    // 'cooking_Time' => $cooking_Time,
                    'numberOfCovers' => $numberOfCovers,
                    'publicationDate' => $publicationDate,
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

    public function addImage()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérifie si un fichier a été téléchargé
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                // Récupére les informations du fichier
                $file = $_FILES['image'];
                $filename = $file['name'];
                $tmpFilePath = $file['tmp_name'];

                // Valider si nécessaire (par exemple, vérifier le type de fichier, la taille, etc.)

                // Traite ou sauvegarde le fichier selon vos besoins

                $destination = '/path/to/destination/' . $filename;
                move_uploaded_file($tmpFilePath, $destination);

                // Redirige l'utilisateur vers une autre page ou affiche un message de confirmation
                header('Location: /');
               
            }
        }


        global $router;
        header('Location: ' . $router->generate('addImg'));
    }
}
