<?php

namespace RecipeScrapers;

use ErrorException;
use RecipeScrapers\models\MarmitonRecipe;
use RecipeScrapers\models\Recipe;
use RecipeScrapers\utils\Type;
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

class RecipeScrapers
{
    public ErrorException $error;

    public function getRecipe(String $uri) : ?Recipe
    {
        if($this->checkUri($uri)){
            $client = new HttpBrowser(HttpClient::create());
            $crawler = $client->request("GET", $uri);
            switch ($this->getSource($uri)){
                case Type::MARMITON:
                    $data = $crawler->filterXPath('//head/script')->text();
                    $json = json_decode($data, true);
                    if ($this->isValidSchema($json)){
                        return new MarmitonRecipe($json, $data);
                    }else $this->error = new ErrorException("Invalid data");
                    break;
                default:
                    $this->error = new ErrorException("This website isn't available");
                    break;
            }
        }
        return null;
    }

    public function checkUri(String $uri) : bool
    {
        $url = parse_url($uri);
        if(!is_array($url)){
            $this->error = new ErrorException("Invalid uri");
            return false;
        }
        return true;
    }

    public function getSource(String $uri): String
    {
        return parse_url($uri, PHP_URL_HOST);
    }

    private function isValidSchema(mixed $json): bool
    {
        if (!is_null($json)){
            if ($json["@context"] === "https://schema.org" and $json["@type"] === "Recipe"){
                return true;
            }
        }
        return false;
    }
}