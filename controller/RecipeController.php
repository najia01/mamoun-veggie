<?php

class RecipeController extends Controller
{
    public function homePage()
    {
        global $router;
        $model = new RecipeModel();
        $datas = $model->getRecipe();
        $link = $router->generate('baseRecipe');
        echo self::getTwig()->render('homePage.html.twig',['recipes' => $datas,'link'=>$link]);
    }


    public function getOne(int $id)
    {
        global $router;
        $model = new RecipeModel();
        $recipe = $model->getOneRecipe($id);
        // $link = $router->generate('getOneRecipe');

        echo self::getTwig()->render('oneRecipe.html.twig', ['recipe' => $recipe]);
    }
}
