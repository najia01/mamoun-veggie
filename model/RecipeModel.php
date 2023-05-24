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

    public function addRecipe($add)
    {
        $image = $add->getImage();
        $title = $add->getTitle();
        $description = $add->getDescription();
        $cookingTime = $add->getCookingTime();
        $numberOfCovers = $add->getNumberOfCovers();
        $publicationDate = $add->getPublicationDate();
        $userId = $add->getUserId();
    
        $req = $this->getDb()->prepare('INSERT INTO `recipe` (`image`, `title`, `description`, `cooking_time`, `number_of_covers`, `publication_date`, `user_id`) VALUES (:image, :title, :description, :cooking_time, :number_of_covers, :publication_date, :user_id)');
    
        $req->bindValue(":image", $image, PDO::PARAM_STR);
        $req->bindValue(":title", $title, PDO::PARAM_STR);
        $req->bindValue(":description", $description, PDO::PARAM_STR);
        $req->bindValue(":cooking_time", $cookingTime, PDO::PARAM_INT);
        $req->bindValue(":number_of_covers", $numberOfCovers, PDO::PARAM_INT);
        $req->bindValue(":publication_date", $publicationDate, PDO::PARAM_STR);
        $req->bindValue(":user_id", $userId, PDO::PARAM_INT);
    
        $req->execute();
    
        $req->closeCursor();
    }
    
    
}