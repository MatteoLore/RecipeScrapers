<?php

namespace RecipeScrapers\models;

use RecipeScrapers\utils\Type;

class GialloZafferano extends Recipe
{

    public function __construct(array $json, string $data)
    {
        parent::__construct($json, $data);
        $this->source = Type::GIALLO_ZAFFERANO;
    }
}