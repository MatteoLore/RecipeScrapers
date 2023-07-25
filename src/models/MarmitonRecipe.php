<?php

namespace RecipeScrapers\models;

use RecipeScrapers\utils\Type;

class MarmitonRecipe extends Recipe
{
    public function __construct(array $json, string $data)
    {
        parent::__construct($json, $data);
        $this->source = Type::MARMITON;
    }

    /*
     * On Marmiton, the ingredients have a HowToStep schema with a "text" key value;
     */
    public function getStep(int $index)
    {
        return $this->step[$index+1]["text"];
    }
}