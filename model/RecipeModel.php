<?php

class RecipeModel extends Model{
    public function getRecipe(){
        $recipes = [];

        $req = $this->getDb()->query('SELECT `recipe_id`,`title`,`image`,`cooking_time`,`number_of_covers`, `publication_date`,`user_id`
        FROM  `recipe` ORDER BY `recipe_id` DESC LIMIT 6;');

        while($recipe = $req->fetch(PDO::FETCH_ASSOC)){
            $recipes[] = new Recipe($recipe);
        }
        
                 
        return $recipes;
        
    }
    public function getOneRecipe(int $recipe_id){
       
        $req = $this->getDb()->prepare('SELECT `recipe_id`,`title`,`image`,`description`,`cooking_time`,`number_of_covers`, `publication_date`,`user_id` FROM `recipe` WHERE `recipe_id` = :id');
        $req->bindParam('id',$recipe_id,PDO::PARAM_INT);
        $req->execute();

        $recipe = new Recipe($req->fetch(PDO::FETCH_ASSOC));
                       
            
        return $recipe;
        
    }

    public function addRecipe($add)
    {
        $image = $add->getImage();
        $title = $add->getTitle();
        $description = $add->getDescription();
        // $cooking_Time = $add->getCooking_Time();
        // $numberOfCovers = $add->getNumberOfCovers();
        $publicationDate = $add->getPublication_Date();
        $userId = $add->getUser_Id();
    
        $req = $this->getDb()->prepare('INSERT INTO `recipe` (`image`, `title`, `description`, `cooking_time`, `number_of_covers`, `publicationDate`, `userId`) VALUES (:image, :title, :description, :cooking_Time, :number_of_covers, :publicationDate, :userId)');
    
        $req->bindValue(":image", $image, PDO::PARAM_STR);
        $req->bindValue(":title", $title, PDO::PARAM_STR);
        $req->bindValue(":description", $description, PDO::PARAM_STR);
        // $req->bindValue(":cooking_time", $cooking_Time, PDO::PARAM_INT);
        // $req->bindValue(":number_of_covers", $numberOfCovers, PDO::PARAM_INT);
        $req->bindValue(":publicationDate", $publicationDate, PDO::PARAM_INT);
        $req->bindValue(":userId", $userId, PDO::PARAM_INT);
    
        $req->execute();
    
       
    }
    
    
}