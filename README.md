# RecipeScrapers

RecipeScrapers is a PHP library that allows you to scrape and extract recipe information from somes cooking websites. It provides a simple and unified class to retrieve recipe details such as ingredients, instructions, cooking time, and more. This can be useful for building recipe apps, websites, or data analysis projects.

## Installation

You can install RecipeScrapers using Composer:

```bash
composer require matteolore/recipe-scrapers
```

## Usage
1. First, import `RecipeScrapers` class and create a scraper instance
```php
use RecipeScrapers\RecipeScrapers;

$scrapers = new RecipeScrapers();
```
2. Then, call the `getRecipe` method, passing the url parameter, like this
```php
$url = "https://www.example.com/recipe";
$recipe = $scrapers->getRecipe($url); // Returns a Recipe class if the url is correct
```
3. Finally, you can use the Recipe class to access all the available methods, such as `getName`, `getIngredient`, and [more](#methods-available)...
```php
echo $recipe->getName(); // Returns the recipe name
echo $recipe->getIngredients();
```

## Website available

RecipeScrapers currently supports these cooking websites:
    
- [Marmiton](www.marmiton.org)
- [GialloZafferano](www.giallozafferano.it)
- [BlogGialloZafferano](blog.giallozafferano.it)
- [FattoInCasaDaBenedetta](www.fattoincasadabenedetta.it)

## Methods available
The Recipe class provides a variety of methods to access different aspects of the scraped recipe data. Here are the available methods:

#### Recipe class:

- `getName` -> Returns the recipe name.
- `getAuthor` -> Returns the author of the recipe.
- `getDescription` -> Returns the recipe description.
- `getKeyword` -> Returns the keywords associated with the recipe.
- `getIngredients` -> Returns an array of all ingredients.
- `getIngredient` -> Returns a specific ingredient by its index.
- `getSteps` -> Returns an array of all cooking steps.
- `getStep` -> Returns a specific cooking step by its index.
- `getRecipeCuisine` -> Returns the cuisine of the recipe.
- `getCategory` -> Returns the category of the recipe.
- `getTotalTime` -> Returns the total time required to prepare and cook the recipe.
- `getCookTime` -> Returns the cooking time for the recipe.
- `getPrepTime` -> Returns the preparation time for the recipe.
- `getPerformTime` -> Returns the performance time for the recipe.
- `getYield` -> Returns the yield of the recipe.
- `getRecipeYield` -> Returns the recipe yield.
- `getImage` -> Returns the URL of the recipe image.
- `getVideo` -> Returns a VideoObject class.
- `getDateCreated` -> Returns the creation date of the recipe.
- `getDateModified` -> Returns the last modification date of the recipe.
- `getDatePublished` -> Returns the publication date of the recipe.
- `getSuitableForDiet` -> Returns information about dietary suitability.
- `getAggregaterating` -> Returns a AggregateRating class.
- `getCookingMethod` -> Returns the cooking method used in the recipe.
- `getEstimatedCost` -> Returns the estimated cost of the recipe.
- `getNutrition` -> Returns nutritional information about the recipe.
- `getTools` -> Returns an array of tools required for cooking.
- `getTool` -> Returns a specific tool by its index.
- `getSource` -> Returns the source of the recipe.
- `getJson` -> Returns the raw JSON data of the recipe.
- `getData` -> Returns an array containing all the extracted recipe data.

#### VideoObject class:

- `getName` -> Returns the name of the video.
- `getDescription` -> Returns the description of the video.
- `getThumbnailUrl` -> Returns the URL of the video's thumbnail image.
- `getContentUrl` -> Returns the URL of the video content.
- `getEmbedUrl` -> Returns the embed URL for the video.

#### AggregateRating class:

- `getRatingValue` -> Returns the rating value.
- `getReviewCount` -> Returns the total number of reviews.
- `getBestRating` -> Returns the best possible rating.
- `getWorstRating` -> Returns the worst possible rating.

## License

RecipeScrapers is distributed under the GNU General Public License v3.0. See [LICENSE](https://github.com/MatteoLore/RecipeScrapers/blob/main/LICENSE.md) for more information.

Happy cooking and coding!