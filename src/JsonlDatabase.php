<?php

namespace CodingChallenge;

use CodingChallenge\Models\Contact;

/**
 * Implementation of jsonl to persist data in a single file.
 * Every database access (even reading a single Object by ID) implies a full read of the database file. This is intended
 * since it meets the requirements.
 *
 * @link https://jsonlines.org/
 */

class JsonlDatabase
{
    private string $jsonlFile;

    public function __construct($name = 'database')
    {
        $this->jsonlFile = db_path($name);

        if (!file_exists($this->jsonlFile))
            touch($this->jsonlFile);
    }

    /**
     * Full read on database with sorting capabilities.
     *
     * @param string|null $sortBy
     * @param string|null $sortDirection
     * @return array
     */
    public function readObjects(?string $sortBy = 'index', ?string $sortDirection = 'asc'): array
    {
        $contents = file_get_contents($this->jsonlFile);
        $lines = explode(PHP_EOL, $contents);
        $objects = [];
        foreach ($lines as $index => $line) {
            if (empty(trim($line))) continue;
            try {
                $object = json_decode($line, true);
                $object['index'] = $index;
                $objects[] = (new Contact($object))->toArray();
            } catch (\Exception $e) {}
        }

        // Sorting in memory since we use a simple database abstraction
        if (array_key_exists($sortBy, (new Contact())->getFields())) {
            $array = array_column($objects, $sortBy);
            array_multisort(
                $array,
                $sortDirection === 'desc' ? SORT_DESC : SORT_ASC,
                $objects
            );
        }

        return $objects;
    }

    /**
     * @param int $index
     * @return array|null
     */
    public function readObject(int $index): null|array
    {
        $objects = $this->readObjects();
        if (!array_key_exists($index, $objects))
            return null;
        return $objects[$index];
    }

    /**
     * @param int $index
     * @return bool
     */
    public function deleteObject(int $index): bool
    {
        $objects = $this->readObjects();
        if (!array_key_exists($index, $objects))
            return false;
        unset($objects[$index]);
        $this->writeObjects($objects);
        return true;
    }

    /**
     * @param array $objects
     * @return void
     */
    public function writeObjects(array $objects): void
    {
        unlink($this->jsonlFile);
        touch($this->jsonlFile);
        foreach ($objects as $object) {
            if ($object === null)
                continue;
            try {
                unset($object['index']);
                file_put_contents($this->jsonlFile, json_encode($object).PHP_EOL, FILE_APPEND);
            } catch (\Exception $e) {}
        }
    }

    /**
     * @param int $index
     * @param array $object
     * @return bool
     */
    public function updateObject(int $index, array $object): bool
    {
        $objects = $this->readObjects();
        if (!array_key_exists($index, $objects))
            return false;
        $objects[$index] = $object;
        $this->writeObjects($objects);
        return true;
    }

    /**
     * @param array $object
     * @return void
     */
    public function appendObject(array $object): void
    {
        try {
            file_put_contents($this->jsonlFile, json_encode($object).PHP_EOL, FILE_APPEND);
        } catch (\Exception $e) {}
    }
}
