<?php

class RecipeModel extends Model{
    public function getRecipe(){
        $recipes = [];

        $req = $this->getDb()->query('SELECT `recipe_id`,`title`,`image`,`description` FROM  `recipe` ORDER BY `recipe_id` DESC LIMIT 7;');

        while($recipe = $req->fetch(PDO::FETCH_ASSOC)){
            $recipes[] = new Recipe($recipe);
        }
        
        $req->closeCursor();
         
        return $recipes;
        
    }
    public function getOneRecipe(int $id){
       
        $req = $this->getDb()->prepare('SELECT `id`,`title`,`image`,`description`,`cooking_time` FROM `recipe` WHERE `id` = :id');
        $req->bindParam('id',$id,PDO::PARAM_INT);
        $req->execute();

        $recipe = new Recipe($req->fetch(PDO::FETCH_ASSOC));
                       
        $req->closeCursor();
    
        return $recipe;
        
    }
}