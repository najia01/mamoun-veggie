<?php
class Favorites
{
    private $favorites_Id;
    private $user_Id;
    private $recipe_Id;

    
    public function __construct(array $datas)
    {
        $this->hydrate($datas);
    }

    private function hydrate(array $datas)
    {
        foreach ($datas as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // // *********************************GETTER AND SETTER*****************************************

    // **************************************GETTER****************************************************
    

    /**
     * Get the value of favoritesId
     */ 
    public function getFavorites_Id()
    {
        return $this->favorites_Id;
    }

    /**
     * Get the value of userId
     */ 
    public function getUser_Id()
    {
        return $this->user_Id;
    }

    /**
     * Get the value of recipeId
     */ 
    public function getRecipe_Id()
    {
        return $this->recipe_Id;
    }


    // ***********************************************SETTER*************************************************

    

    /**
     * Set the value of favoritesId
     *
     * @return  self
     */ 
    public function setFavorites_Id($favorites_Id)
    {
        $this->favorites_Id = $favorites_Id;

        return $this;
    }

    /**
     * Set the value of userId
     *
     * @return  self
     */ 
    public function setUser_Id($user_Id)
    {
        $this->user_Id = $user_Id;

        return $this;
    }

    /**
     * Set the value of recipeId
     *
     * @return  self
     */ 
    public function setRecipe_Id($recipe_Id)
    {
        $this->recipe_Id = $recipe_Id;

        return $this;
    }
}