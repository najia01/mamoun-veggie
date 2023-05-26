<?php

class RecipeModel extends Model{

    public function getRecipe(){
        $recipes = [];

        $req = $this->getDb()->query('SELECT `recipe_id`,`title`,`image`,`cooking_time`,`number_of_covers`, `publication_date`,`author`
        FROM  `recipe` ORDER BY `recipe_id` DESC LIMIT 6;');

        while($recipe = $req->fetch(PDO::FETCH_ASSOC)){
            $recipes[] = new Recipe($recipe);
        }
        
                
        return $recipes;
        
    }
    public function getOneRecipe(int $recipe_id){
       
        $req = $this->getDb()->prepare('SELECT `recipe_id`,`title`,`image`,`description`,`cooking_time`,`number_of_covers`, `publication_date`,`author` FROM `recipe` WHERE `recipe_id` = :id');
        $req->bindParam('id',$recipe_id,PDO::PARAM_INT);
        $req->execute();

        $recipe = new Recipe($req->fetch(PDO::FETCH_ASSOC));
                     
       
        return $recipe;
        
    }
    
    public function getUserRecipes(int $author){
        $recipes = [];

        $req = $this->getDb()->prepare('SELECT `recipe`.`id`, `recipe`.`username`, `recipe`.`title`, `recipe`.`cooking_time`, `recipe`.`number_of_covers`, `recipe`.`description`, `recipe`.`publication_date`, `user`.`user_id`, `user`.`username`, `user`.`mail`, `user`.`favorites`, `user`.`password`
            FROM `recipe`
            INNER JOIN `user`
            ON `recipe`.`username` = `user`.`user_id`
            WHERE `user`.`user_id` = :id');
        $req->bindParam(':id', $author, PDO::PARAM_INT);
        $req->execute();

        while ($recipeData = $req->fetch(PDO::FETCH_ASSOC)) {
            $recipes[] = new Recipe($recipeData);
        }

      
        return $recipes;
    }

    public function addRecipe(Recipe $recipe)
    {  
        $title = $recipe->getTitle();
        $description = $recipe->getDescription();
        $cooking_time = $recipe->getCooking_time();
        $number_of_covers = $recipe->getNumber_of_covers();
        $author = $recipe->getAuthor();
    
        $req = $this->getDb()->prepare('INSERT INTO `recipe` ( `title`, `description`, `cooking_time`, `number_of_covers`, `author` ) VALUES ( :title, :description, :cooking_time, :number_of_covers, :author)');
    
        $req->bindParam(":title", $title, PDO::PARAM_STR);
        $req->bindParam(":description", $description, PDO::PARAM_STR);
        $req->bindParam(":cooking_time", $cooking_time, PDO::PARAM_STR);
        $req->bindParam(":number_of_covers", $number_of_covers, PDO::PARAM_INT);
        $req->bindParam(":author", $author, PDO::PARAM_INT);

        $req->execute();
    }
}