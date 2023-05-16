<?php
class Recipe
{
    private $recipe_Id;
    private $image;
    private $title;
    private $description;
    private $cooking_Time;
    private $number_Of_Covers;
    private $publication_Date;
    private $user_Id;
    


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
        return $this->cooking_Time;
    }

    /**
     * Get the value of numberOfCovers
     */ 
    public function getNumber_of_covers()
    {
        return $this->number_Of_Covers;
    }

    /**
     * Get the value of publicationDate
     */ 
    public function getPublication_Date()
    {
        return $this->publication_Date;
    }

    /**
     * Get the value of userId
     */ 
    public function getUser_Id()
    {
        return $this->user_Id;
    }

// *********************************************************************SETTER********************************************************

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
    public function setCooking_time($cooking_Time)
    {
        $this->cooking_Time = $cooking_Time;

        return $this;
    }

    /**
     * Set the value of numberOfCovers
     *
     * @return  self
     */ 
    public function setNumber_of_covers($number_Of_Covers)
    {
        $this->number_Of_Covers = $number_Of_Covers;

        return $this;
    }

    /**
     * Set the value of publicationDate
     *
     * @return  self
     */ 
    public function setPublication_Date($publication_Date)
    {
        $this->publication_Date = $publication_Date;

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
    
}

   