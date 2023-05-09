<?php

class RecipeController
{
    public function homePage()
    {
        global $router;
        $model = new RecipeModel();
       
        $datas = $model->getRecipe();
       
        $loader = new \Twig\Loader\FilesystemLoader('./view');
        $twig = new \Twig\Environment($loader, [
            'cache' => false,
        ]);

        $link = $router->generate('basePost');
        echo $twig->render('homePage.html.twig', ['recipe' => $datas,'link'=> $link]);
    }

    public function getOne($id)
    {
        $model = new RecipeModel();
       
        $recipe = $model->getOneRecipe($id);
       
        $loader = new \Twig\Loader\FilesystemLoader('./view');
        $twig = new \Twig\Environment($loader, [
            'cache' => false,
        ]);

        echo $twig->render('oneRecipe.html.twig', ['recipe' => $recipe]);
    }
}
