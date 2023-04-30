<?php
class RecipeModel extends Model{
    public function getRecipe(){
        $recipe = [];

        $req = $this->getDb()->query('SELECT `recipe_id`,`title`,`image` FROM  `recipe` ORDER BY `recipe_id` DESC LIMIT 5;');

        while($recipe = $req->fetch(PDO::FETCH_ASSOC)){
            $recipe[] = new Recipe($recipe);
        }
        
        $req->closeCursor();
        // referme la requete 
        return $recipe;
        
    }
    public function getOneRecipe(int $id){
       
        $req = $this->getDb()->prepare('SELECT `id`,`title`,`image`,`description`,`cooking_time` FROM `recipe` WHERE `id` = :id');
        $req->bindParam('id',$id,PDO::PARAM_INT);
        $req->execute();

        $recipe = new Recipe($req->fetch(PDO::FETCH_ASSOC));
                       
        $req->closeCursor();
    //   liberer la memoire 
        return $recipe;
        
    }
}