<?php

namespace RecipeScrapers\utils;

use RecipeScrapers\models\Recipe;

class Utils
{
    public static function removeHowToStep(array $steps): array
    {
        $newSteps = [];
        foreach ($steps as $step){
            $newSteps[$step["text"]];
        }
        return $newSteps;
    }

    public static function makeKeywordsArray(string $keywords): array
    {
        return explode(",", $keywords);
    }
}