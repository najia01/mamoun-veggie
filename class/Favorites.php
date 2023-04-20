<?php
class Favorites
{
    private $favoritesId;
    private $userId;
    private $recipeId;

    
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
    public function getFavoritesId()
    {
        return $this->favoritesId;
    }

    /**
     * Get the value of userId
     */ 
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Get the value of recipeId
     */ 
    public function getRecipeId()
    {
        return $this->recipeId;
    }


    // ***********************************************SETTER*************************************************

    

    /**
     * Set the value of favoritesId
     *
     * @return  self
     */ 
    public function setFavoritesId($favoritesId)
    {
        $this->favoritesId = $favoritesId;

        return $this;
    }

    /**
     * Set the value of userId
     *
     * @return  self
     */ 
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Set the value of recipeId
     *
     * @return  self
     */ 
    public function setRecipeId($recipeId)
    {
        $this->recipeId = $recipeId;

        return $this;
    }
}