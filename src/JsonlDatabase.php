<?php

namespace CodingChallenge;

/**
 * Dateiformat jsonl implementiert um Daten ohne Datenbank zu persistieren.
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
     * @return array
     */
    public function readObjects(): array
    {
        $contents = file_get_contents($this->jsonlFile);
        $lines = explode(PHP_EOL, $contents);
        $objects = [];
        foreach ($lines as $line) {
            try {
                $objects[] = json_decode($line, true);
            } catch (\Exception $e) {}
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
                file_put_contents($this->jsonlFile, json_encode($object).PHP_EOL, FILE_APPEND);
            } catch (\Exception $e) {}
        }
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
