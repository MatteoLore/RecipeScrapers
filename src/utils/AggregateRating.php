<?php

namespace RecipeScrapers\utils;

class AggregateRating
{

    public int $ratingValue;

    public int $reviewCount;

    public int $bestRating;

    public int $worstRating;
    public function __construct(array $json)
    {
        $this->ratingValue = (int)$json["ratingValue"] ?? 5;
        $this->reviewCount = (int)$json["reviewCount"] ?? 0;

        $this->bestRating = (int)$json["bestRating"] ?? 5;
        $this->worstRating = (int)$json["worstRating"] ?? 0;
    }

    /**
     * @return int
     */
    public function getRatingValue(): int
    {
        return $this->ratingValue;
    }

    /**
     * @return int
     */
    public function getReviewCount(): int
    {
        return $this->reviewCount;
    }

    /**
     * @return int
     */
    public function getBestRating(): int
    {
        return $this->bestRating;
    }

    /**
     * @return int
     */
    public function getWorstRating(): int
    {
        return $this->worstRating;
    }
}