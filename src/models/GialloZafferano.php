<?php

namespace RecipeScrapers\models;

use RecipeScrapers\utils\Type;

class GialloZafferano extends Recipe
{

    public function __construct(array $json, string $data)
    {
        parent::__construct($json, $data);
        $this->source = Type::GIALLO_ZAFFERANO;

        $this->recipeCuisine = null;
        $this->yield = null;

        $this->tool = null;

        $this->performTime = null;

        $this->dateCreated = null;
    }

    /*
     * On GialloZafferano, the author have a dedicated schema, so to get the name we need the "name" key value;
     */
    public function getAuthor()
    {
        return $this->author["name"];
    }

}