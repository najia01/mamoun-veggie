<?php

class IngredientController extends Controller
{
    public function Ingredient()
    {
        global $router;
        $model = new IngredientModel();
        $datas = $model->getIngredient();
        $link = $router->generate('baseIngredient');
        echo self::getTwig()->render('homePage.html.twig',['ingredients' => $datas,'link'=>$link]);
    }


   
}
