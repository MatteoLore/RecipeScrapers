<?php

namespace RecipeScrapers\models;

use RecipeScrapers\utils\Type;

class BlogGialloZafferano extends Recipe
{
    public function __construct(array $json, string $data)
    {
        parent::__construct($json, $data);
        $this->source = Type::BLOG_GIALLO_ZAFFERANO;
    }

    /*
     * On BlogGialloZafferano, the author have a dedicated schema, so to get the name we need the "name" key value;
     */
    public function getAuthor()
    {
        return $this->author["name"];
    }
}