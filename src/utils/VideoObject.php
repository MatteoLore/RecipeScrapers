<?php

namespace RecipeScrapers\utils;

class VideoObject
{

    public string $name;

    public string $description;

    public string $uploadDate;

    public array $thumbnailUrl;

    public string $contentUrl;

    public string $embedUrl;

    public function __construct(array $json)
    {
        if ($json["@type"] != "VideoObject"){
            throw new \ErrorException("Invalid data");
        }

        $this->name = $json["name"];
        $this->description = $json["description"];
        $this->uploadDate = $json["uploadDate"];

        $this->thumbnailUrl = $json["thumbnailUrl"];
        $this->contentUrl = $json["contentUrl"];
        $this->embedUrl = $json["embedUrl"];
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