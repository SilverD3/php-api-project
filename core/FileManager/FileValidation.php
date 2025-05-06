<?php

declare(strict_types=1);

/**
 * PHP API skeleton project
 *
 * @copyright Copyright (c) Silevester D. (https://github.com/SilverD3)
 * @link      https://github.com/SilverD3/php-api-project PHP API skeleton project
 * @since     1.0 (2025)
 */

namespace Core\FileManager;

/**
 * File validation constraints
 */
class FileValidation
{
    private ?int $minSize = null;

    private ?int $maxSize = null;

    private array $fileTypes = [];


    /**
     * Get the value of minSize
     */
    public function getMinSize(): ?int
    {
        return $this->minSize;
    }

    /**
     * Set the value of minSize
     */
    public function setMinSize(?int $minSize): self
    {
        $this->minSize = $minSize;

        return $this;
    }

    /**
     * Get the value of maxSize
     */
    public function getMaxSize(): ?int
    {
        return $this->maxSize;
    }

    /**
     * Set the value of maxSize
     */
    public function setMaxSize(?int $maxSize): self
    {
        $this->maxSize = $maxSize;

        return $this;
    }

    /**
     * Get the value of fileTypes
     * @return array<FileType>
     */
    public function getFileTypes(): array
    {
        return $this->fileTypes;
    }

    /**
     * Set the value of fileTypes
     * @var array<FileType> $fileTypes
     */
    public function setFileTypes(array $fileTypes): self
    {
        $this->fileTypes = $fileTypes;

        return $this;
    }
}
