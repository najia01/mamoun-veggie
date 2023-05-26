<?php
class Recipe
{
    private $recipe_id;
    private $image;
    private $title;
    private $description;
    private $cooking_time;
    private $number_of_covers;
    private $publication_date;
    private $author;
    


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
        return $this->recipe_id;
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
        return $this->cooking_time;
    }

    /**
     * Get the value of numberOfCovers
     */ 
    public function getNumber_of_covers()
    {
        return $this->number_of_covers;
    }

    /**
     * Get the value of publicationDate
     */ 
    public function getPublication_date()
    {
        return $this->publication_date;
    }

    /**
     * Get the value of userId
     */ 
    public function getAuthor()
    {
        return $this->author;
    }

// *********************************************************************SETTER********************************************************

    /**
     * Set the value of recipeId
     *
     * @return  self
     */ 
    public function setRecipe_id($recipe_id)
    {
        $this->recipe_id = $recipe_id;

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
    public function setCooking_time($cooking_time)
    {
        $this->cooking_time = $cooking_time;

        return $this;
    }

    /**
     * Set the value of numberOfCovers
     *
     * @return  self
     */ 
    public function setNumber_of_covers($number_of_covers)
    {
        $this->number_of_covers = $number_of_covers;

        return $this;
    }

    /**
     * Set the value of publicationDate
     *
     * @return  self
     */ 
    public function setPublication_date($publication_date)
    {
        $this->publication_date = $publication_date;

        return $this;
    }

    /**
     * Set the value of userId
     *
     * @return  self
     */ 
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }
    
}

   