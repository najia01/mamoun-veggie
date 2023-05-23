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
        echo self::getTwig()->render('homePage.html.twig',['recipes' => $datas,'linkConnexion'=>$linkConnexion,'link'=>$link]);
    }


    public function getOne(int $id)
    {
        global $router;
        $model = new RecipeModel();
                
        $datas = $model->getOneRecipe($id);
               
        echo self::getTwig()->render('oneRecipe.html.twig', ['recipe' => $datas]);
    }
}
