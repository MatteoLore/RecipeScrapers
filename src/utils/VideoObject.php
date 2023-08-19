<?php

namespace RecipeScrapers\utils;

class VideoObject
{

    public string $name;

    public string $description;

    public string $uploadDate;

    public array|string $thumbnailUrl;

    public string $contentUrl;

    public string $embedUrl;

    public function __construct(array $json)
    {
        $notfound = "Data not found";

        $this->name = $json["name"] ?? $notfound;
        $this->description = $json["description"] ?? $notfound;
        $this->uploadDate = $json["uploadDate"] ?? $notfound;

        $this->thumbnailUrl = $json["thumbnailUrl"] ?? $notfound;
        $this->contentUrl = $json["contentUrl"] ?? $notfound;
        $this->embedUrl = $json["embedUrl"] ?? $notfound;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getUploadDate(): string
    {
        return $this->uploadDate;
    }

    /**
     * @return array
     */
    public function getThumbnailUrl(): array
    {
        return $this->thumbnailUrl;
    }

    /**
     * @return string
     */
    public function getContentUrl(): string
    {
        return $this->contentUrl;
    }

    /**
     * @return string
     */
    public function getEmbedUrl(): string
    {
        return $this->embedUrl;
    }
}