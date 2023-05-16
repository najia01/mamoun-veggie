<?php

class RecipeModel extends Model{
    public function getRecipe(){
        $recipes = [];

        $req = $this->getDb()->query('SELECT `recipe_id`,`title`,`image`,`cooking_time`,`number_of_covers`, `publication_date`,`user_id`
        FROM  `recipe` ORDER BY `recipe_id` DESC LIMIT 6;');

        while($recipe = $req->fetch(PDO::FETCH_ASSOC)){
            $recipes[] = new Recipe($recipe);
        }
        
        $req->closeCursor();
         
        return $recipes;
        
    }
    public function getOneRecipe(int $recipe_id){
       
        $req = $this->getDb()->prepare('SELECT `recipe_id`,`title`,`image`,`description`,`cooking_time`,`number_of_covers`, `publication_date`,`user_id` FROM `recipe` WHERE `recipe_id` = :id');
        $req->bindParam('id',$recipe_id,PDO::PARAM_INT);
        $req->execute();

        $recipe = new Recipe($req->fetch(PDO::FETCH_ASSOC));
                       
        $req->closeCursor();
    
        return $recipe;
        
    }
}