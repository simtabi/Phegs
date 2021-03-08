<?php

declare(strict_types=1);

namespace Simtabi\Pheg\Facets\Helpers\Components\Countries;

use JsonException;
use function file_get_contents;
use function json_decode;
use const JSON_THROW_ON_ERROR;

class Countries
{

    /**
     * Loads a JSON file relative to the current directory.
     *
     * @param string $path
     *
     * @return array
     * @throws JsonException
     * @internal
     */
    public function load(string $path): array
    {
        static $cache = [];

        if (isset($cache[$path])) {
            return $cache[$path];
        }

        return $cache[$path] = json_decode(
            file_get_contents(__DIR__ . '/' . $path),
            true,
            512,
            JSON_THROW_ON_ERROR
        );
    }

    /**
     * Continents, key-value object (key is alpha-2 code).
     *
     * @return array
     * @throws JsonException
     */
    function continents(): array
    {
        return $this->load('continents.min.json');
    }

    /**
     * Countries, key-value object (key is alpha-2 code, uppercase).
     *
     * @return array
     * @throws JsonException
     */
    function countries(): array
    {
        return $this->load('countries.min.json');
    }

    /**
     * Languages in use only, key-value object (key is alpha-2 code).
     *
     * @return array
     * @throws JsonException
     */
    function languages(): array
    {
        return $this->load('languages.min.json');
    }

    /**
     * Languages, key-value object (key is alpha-2 code).
     * A complete list including not used by Countries list.
     *
     * @return array
     * @throws JsonException
     */
    function languagesAll(): array
    {
        return $this->load('languages.all.min.json');
    }

}