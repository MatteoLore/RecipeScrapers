<?php

namespace RecipeScrapers\models;

use RecipeScrapers\utils\Type;

class Marmiton extends Recipe
{
    public function __construct(array $json, string $data)
    {
        parent::__construct($json, $data);
        $this->source = Type::MARMITON;

        $this->cookingMethod = null;
        $this->yield = null;

        $this->nutrition = null;
        $this->estimatedCost = null;
        $this->suitableForDiet = null;
        $this->tool = null;

        $this->performTime = null;

        $this->dateCreated = null;
        $this->dateModified = null;

        if (is_null($json["video"])) $this->video = null;
    }

    /*
     * On Marmiton, the ingredients have a HowToStep schema with a "text" key value;
     */
    public function getStep(int $index)
    {
        return $this->step[$index-1]["text"];
    }
}