<?php
class Recipe
{
    private $recipe_Id;
    private $image;
    private $title;
    private $description;
    private $cookingTime;
    private $numberOfCovers;
    private $publicationDate;
    private $userId;
    


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

    // // *******************************************************************GETTER AND SETTER**********************************************************

    // *************************************************************************GETTER******************************************************************

    /**
     * Get the value of recipeId
     */ 
    public function getRecipe_id()
    {
        return $this->recipe_Id;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the value of cookingTime
     */ 
    public function getCooking_time()
    {
        return $this->cookingTime;
    }

    /**
     * Get the value of numberOfCovers
     */ 
    public function getNumber_of_covers()
    {
        return $this->numberOfCovers;
    }

    /**
     * Get the value of publicationDate
     */ 
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    /**
     * Get the value of userId
     */ 
    public function getUserId()
    {
        return $this->userId;
    }

// *********************************************************************SETTER********************************************************

    /**
     * Set the value of recipeId
     *
     * @return  self
     */ 
    public function setRecipe_id($recipeId)
    {
        $this->recipe_Id = $recipeId;

        return $this;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set the value of cookingTime
     *
     * @return  self
     */ 
    public function setCooking_time($cookingTime)
    {
        $this->cookingTime = $cookingTime;

        return $this;
    }

    /**
     * Set the value of numberOfCovers
     *
     * @return  self
     */ 
    public function setNumber_of_covers($numberOfCovers)
    {
        $this->numberOfCovers = $numberOfCovers;

        return $this;
    }

    /**
     * Set the value of publicationDate
     *
     * @return  self
     */ 
    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;

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
    
}

   