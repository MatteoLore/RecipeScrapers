<?php

namespace RecipeScrapers;

use RecipeScrapers\models\Recipe;
use RecipeScrapers\utils\Type;

class RecipeScrapers
{

    public \ErrorException $error;

    public function checkUri(String $uri) : bool
    {
        $url = parse_url($uri);
        if(!is_array($url)){
            $this->error = new \ErrorException("Invalid uri");
            return false;
        }
        return true;
    }

    public function getSource(String $uri): String
    {
        return parse_url($uri, PHP_URL_HOST);
    }
}