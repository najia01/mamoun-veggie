<?php
class Ingredient
{
    private $ingredientId;
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
    public function getIngredientId()
    {
        return $this->ingredientId;
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
    public function setIngredientId($ingredientId)
    {
        $this->ingredientId = $ingredientId;

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
