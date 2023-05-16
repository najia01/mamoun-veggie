<?php

class IngredientModel extends Model{
    public function getIngredient(){
        $ingredients = [];

        $req = $this->getDb()->query('SELECT `recipe_id`,`title`,`image`,`cooking_time`,`number_of_covers`, `publication_date`,`user_id`
        FROM  `recipe` ORDER BY `recipe_id` DESC LIMIT 6;');

        while($ingredients = $req->fetch(PDO::FETCH_ASSOC)){
            $ingredients[] = new Ingredient($ingredients);
        }
        
        $req->closeCursor();
         
        return $ingredients;
        
    }
   
}