<?php
class Ingredient
{
    private $ingredient_Id;
    private $name;
    


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

    // *********************************GETTER AND SETTER*****************************************

    // **************************************GETTER****************************************************

    /**
     * Get the value of ingredientId
     */ 
    public function getIngredient_Id()
    {
        return $this->ingredient_Id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }


    // **************************************SETTER**********************************************************

     /**
     * Set the value of ingredientId
     *
     * @return  self
     */ 
    public function setIngredient_Id($ingredient_Id)
    {
        $this->ingredient_Id = $ingredient_Id;

        return $this;
    }
   
    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
