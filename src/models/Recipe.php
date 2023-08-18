<?php

namespace RecipeScrapers\models;

use RecipeScrapers\utils\AggregateRating;
use RecipeScrapers\utils\VideoObject;

abstract class Recipe
{

    public ?string $data;

    public ?array $json;

    public string $source;

    public ?string $name;

    public array|string $author;

    public ?string $cookTime;

    public ?string $cookingMethod;

    public ?string $category;

    public ?string $recipeCuisine;

    public  ?array $recipeInstructions;

    public ?string $recipeYield;

    public ?array $suitableForDiet;

    public ?array $nutrition;

    public ?string $estimatedCost;

    public ?string $performTime;

    public ?string $prepTime;

    public ?array $step;

    public ?array $tool;

    public  ?string $totalTime;

    public ?array $yield;

    public ?string $description;

    public ?array $image;

    public ?VideoObject $video;

    public ?array $keyword;

    public ?string $dateCreated;

    public ?string $datePublished;

    public ?string $dateModified;

    public ?AggregateRating $aggregaterating;

    public function __construct(array $json, string $data)
    {
        $notfound = "Data not found";

        $this->data = $data;
        $this->json = $json;
        $this->source = "unknown source";

        $this->name = $json["name"] ?? $notfound;
        $this->author = $json["author"] ?? $notfound;

        $this->description = $json["description"] ?? $notfound;
        $this->keyword = $json["keyword"] ?? [];

        $this->recipeInstructions = $json["recipeIngredient"] ?? [];
        $this->step = $json["recipeInstructions"] ?? [];
        $this->recipeCuisine = $json["recipeCuisine"] ?? $notfound;
        $this->category = $json["recipeCategory"] ?? $notfound;
        $this->recipeYield = $json["recipeYield"] ?? $notfound;
        $this->yield = $json["yield"] ?? [];
        $this->cookingMethod = $json["cookingMethod"] ?? $notfound;

        $this->nutrition = $json["nutrition"] ?? [];
        $this->aggregaterating = new AggregateRating($json["aggregateRating"] ?? [$notfound]);
        $this->estimatedCost = $json["estimatedCost"] ?? $notfound;
        $this->suitableForDiet = $json["suitableForDiet"] ?? [];
        $this->tool = $json["tool"] ?? [];

        $this->totalTime = $json["totalTime"] ?? $notfound;
        $this->cookTime = $json["cookTime"] ?? $notfound;
        $this->prepTime = $json["prepTime"] ?? $notfound;
        $this->performTime = $json["performTime"] ?? $notfound;

        $this->image = $json["image"] ?? "image unavailable";
        $this->video = new VideoObject($json["video"] ?? [$notfound]);

        $this->dateCreated = $json["dateCreated"] ?? $notfound;
        $this->dateModified = $json["dateModified"] ?? $notfound;
        $this->datePublished = $json["datePublished"] ?? $notfound;


    }

    public function getName(): String
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getIngredients()
    {
        return $this->recipeInstructions;
    }

    public function getSteps()
    {
        return $this->step;
    }

    public function getRecipeCuisine()
    {
        return $this->recipeCuisine;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getTotalTime()
    {
        return $this->totalTime;
    }

    public function getCookTime()
    {
        return $this->cookTime;
    }

    public function getPrepTime()
    {
        return $this->prepTime;
    }

    public function getPerformTime()
    {
        return $this->performTime;
    }

    public function getYield()
    {
        return $this->yield;
    }

    public function getRecipeYield()
    {
        return $this->recipeYield;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @return mixed
     */
    public function getDateModified()
    {
        return $this->dateModified;
    }

    /**
     * @return mixed
     */
    public function getDatePublished()
    {
        return $this->datePublished;
    }

    /**
     * @return mixed
     */
    public function getSuitableForDiet()
    {
        return $this->suitableForDiet;
    }

    /**
     * @return mixed
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * @return mixed
     */
    public function getAggregaterating(): AggregateRating
    {
        return $this->aggregaterating;
    }

    /**
     * @return mixed
     */
    public function getCookingMethod()
    {
        return $this->cookingMethod;
    }

    /**
     * @return mixed
     */
    public function getEstimatedCost()
    {
        return $this->estimatedCost;
    }

    /**
     * @return mixed
     */
    public function getNutrition()
    {
        return $this->nutrition;
    }

    /**
     * @return mixed
     */
    public function getTools()
    {
        return $this->tool;
    }

    /**
     * @return array
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * @return String
     */
    public function getJson(): array
    {
        return $this->json;
    }

    /**
     * @return String
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }


    public function getStep(int $index)
    {
        return $this->step[$index-1];
    }

    public function getIngredient(int $index)
    {
        return $this->recipeInstructions[$index-1];
    }

    public function getTool(int $index)
    {
        return $this->tool[$index-1];
    }

}