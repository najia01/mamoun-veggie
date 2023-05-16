<?php
class Category
{
    private $category_Id;
    private $title;
    

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
     * Get the value of categoryId
     */ 
    public function getCategory_Id()
    {
        return $this->category_Id;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    // *******************************************SETTER*****************************************
    
    /**
     * Set the value of categoryId
     *
     * @return  self
     */ 
    public function setCategory_Id($category_Id)
    {
        $this->category_Id = $category_Id;

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
}