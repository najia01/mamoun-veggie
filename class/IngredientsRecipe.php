<?php
class IngredientsRecipe
{
    private $recipeId;
    private $ingredientId;
    private $quantity;
    private $unit;
    
    
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
     * Get the value of recipeId
     */ 
    public function getRecipeId()
    {
        return $this->recipeId;
    }

    /**
     * Get the value of ingredientId
     */ 
    public function getIngredientId()
    {
        return $this->ingredientId;
    }

    /**
     * Get the value of quantity
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Get the value of unit
     */ 
    public function getUnit()
    {
        return $this->unit;
    }


// ******************************************SETTER***************************************************


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

    /**
     * Set the value of ingredientId
     *
     * @return  self
     */ 
    public function setIngredientId($ingredientId)
    {
        $this->ingredientId = $ingredientId;

        return $this;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Set the value of unit
     *
     * @return  self
     */ 
    public function setUnit($unit)
    {
        $this->unit = $unit;

        return $this;
    }
}