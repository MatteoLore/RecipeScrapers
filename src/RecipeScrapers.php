<?php

namespace RecipeScrapers;

use ErrorException;
use RecipeScrapers\models\FattoInCasaDaBenedetta;
use RecipeScrapers\models\Marmiton;
use RecipeScrapers\models\GialloZafferano;
use RecipeScrapers\models\BlogGialloZafferano;
use RecipeScrapers\utils\Type;
use Symfony\Component\BrowserKit\HttpBrowser;
use Symfony\Component\HttpClient\HttpClient;

class RecipeScrapers
{
    public ErrorException $error;

    public function getRecipe(String $uri)
    {
        $invalidData = new ErrorException("Invalid data");

        if($this->checkUri($uri)){
            $client = new HttpBrowser(HttpClient::create());
            $crawler = $client->request("GET", $uri);
            switch ($this->getSource($uri)){
                case Type::MARMITON:
                    $data = $crawler->filterXPath('//head/script[@type="application/ld+json"]')->each(function ($node) {
                        return $node->text();
                    });
                    $json = json_decode($data[1], true);

                    if ($this->isValidSchema($json)){
                        return new Marmiton($json, $data[3]);
                    }else $this->error = $invalidData;
                    break;

                case Type::GIALLO_ZAFFERANO:
                    $data = $crawler->filterXPath('//head/script')->each(function ($node) {return $node->text();});
                    $json = json_decode($data[3], true);

                    if ($this->isValidSchema($json)){
                        return new GialloZafferano($json, $data[2]);
                    }else $this->error = $invalidData;
                    break;

                case Type::BLOG_GIALLO_ZAFFERANO:
                    $data = "";
                    $crawler->filter('script')->each(function ($node) use(&$data){
                        if ($this->isValidSchema(json_decode($node->text(), true))){
                            $data = $node->text();
                        }
                        return null;
                    });
                    $json = json_decode($data, true);

                    if ($this->isValidSchema($json)){
                        return new BlogGialloZafferano($json, $data);
                    }else $this->error = $invalidData;
                    break;

                case Type::FATTO_IN_CASA_DA_BENEDETTA:
                    $data = "";
                    $crawler->filter('script')->each(function ($node) use(&$data){
                        if ($this->isValidSchema(json_decode($node->text(), true))){
                            $data = $node->text();
                        }
                        return null;
                    });
                    $json = json_decode($data, true);

                    if ($this->isValidSchema($json)){
                        return new FattoInCasaDaBenedetta($json, $data);
                    }else $this->error = $invalidData;
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
        $contexts = ["https://schema.org", "http://schema.org", "http:\/\/schema.org", "https:\/\/schema.org"];

        if (!is_null($json)){
            if (in_array($json["@context"], $contexts) and $json["@type"] === "Recipe"){
                return true;
            }
        }
        return false;
    }
}