<?php

namespace RecipeScrapers\models;

use RecipeScrapers\utils\Type;

class FattoInCasaDaBenedetta extends Recipe
{
    public function __construct(array $json, string $data)
    {
        parent::__construct($json, $data);
        $this->source = Type::FATTO_IN_CASA_DA_BENEDETTA;

        $this->keyword = null;

        $this->recipeCuisine = null;
        $this->yield = null;
        $this->cookingMethod = null;

        $this->nutrition = null;
        $this->estimatedCost = null;
        $this->suitableForDiet = null;
        $this->tool = null;

        $this->performTime = null;

        $this->video = null;

        $this->dateCreated = null;
        $this->dateModified = null;
        $this->datePublished = null;
    }

    /*
     * On FattoInCasaDaBenedetta, the author have a dedicated schema, so to get the name we need the "name" key value;
     */
    public function getAuthor()
    {
        return $this->author["name"];
    }
}